<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_prestasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("beranda"));
        }

        $this->load->model('mod_kelola_prestasi');
    }

    public function index($page = 1, $isicari = "-", $pesan = "", $isipesan = "")
    {
        //cari
        if ($isicari != "-") {
            $cari = str_replace("%20", " ", $isicari);
        } else {
            $cari =  $this->clear_string->clear_quotes($this->input->post('cari'));
        }

        if ($cari != "") {
            $q_cari = "nama like '%$cari%'";
        } else {
            $q_cari = "nama<>''";
        }

        $data['cari'] =  $cari;

        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        //pagination
        $jumlah_data = $this->mod_kelola_prestasi->jumlah_data($q_cari);

        $limit = 10;
        $limit_start = ($page - 1) * 10;

        $kelola_prestasi = $this->mod_kelola_prestasi->prestasi($limit_start, $limit, $q_cari)->result();

        $record = array();
        $subrecord = array();
        foreach ($kelola_prestasi as $kp) {
            $subrecord['kd_prestasi'] = $kp->kd_prestasi;
            $subrecord['tahun'] = $kp->tahun;
            $subrecord['nama'] = $kp->nama;
            $subrecord['lokasi'] = $kp->lokasi;
            $subrecord['uraian'] = $kp->uraian;

            if ($kp->foto != "") {
                $foto = "upload/" . $kp->foto;
                if (file_exists($foto)) {
                    $subrecord['nama_file'] = $kp->foto;
                    $subrecord['file_foto'] = base_url() . "upload/" . $kp->foto . "?" . rand();
                } else {
                    $subrecord['nama_file'] = date('dmYHis') . "-foto";
                    $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $subrecord['nama_file'] = date('dmYHis') . "-foto";
                $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            array_push($record, $subrecord);
        }
        $data['kelola_prestasi'] = json_encode($record);

        $data['page'] = $page;
        $data['limit'] = $limit;
        $data['get_jumlah'] = $jumlah_data;
        $data['jumlah_page'] = ceil($jumlah_data / $limit);
        $data['jumlah_number'] = 2;
        $data['start_number'] = ($page > $data['jumlah_number']) ? $page - $data['jumlah_number'] : 1;
        $data['end_number'] = ($page < ($data['jumlah_page'] - $data['jumlah_number'])) ? $page + $data['jumlah_number'] : $data['jumlah_page'];

        $data['no'] = $limit_start + 1;

        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/kelola_prestasi', $data);
        $this->load->view('body/cms/bodybawah');
    }

    public function proses($proses, $kode = "")
    {
        $kd_prestasi = $this->input->post('kode');
        $tahun = $this->input->post('tahun');
        $nama = $this->input->post('nama');
        $lokasi = $this->input->post('lokasi_kejuaraaan');
        $uraian = $this->input->post('uraian');
        $foto = $this->input->post('nama_file');

        $data = array(
            "kode" => $kd_prestasi,
            "tahun" => $tahun,
            "nama" => $nama,
            "lokasi" => $lokasi,
            "uraian" => $uraian,
            "foto" => $foto
        );


        switch ($proses) {
            case 1:
                $this->mod_kelola_prestasi->simpan($data);

                $pesan = 1;
                $isipesan = "Data Prestasi baru ditambahkan";
                break;
            case 2:
                $this->mod_kelola_prestasi->ubah($data);

                $pesan = 2;
                $isipesan = "Data Prestasi diubah";
                break;
            case 3:
                $nama = "";
                $data_kelola_prestasi = $this->mod_kelola_prestasi->ambil($kode)->result();
                foreach ($data_kelola_prestasi as $dkp) {
                    $nama = $dkp->nama;
                    if ($dkp->foto != "") {
                        $foto_prestasi = "upload/" . $dkp->foto;
                        if (file_exists($foto_prestasi)) {
                            unlink("./upload/" . $dkp->foto);
                        }
                    }
                }

                $data_galeri_prestasi = $this->mod_kelola_prestasi->ambil_galeri($kode)->result();
                foreach ($data_galeri_prestasi as $dgp) {
                    if ($dgp->foto != "") {
                        $foto_prestasi = "upload/" . $dgp->foto;
                        if (file_exists($foto_prestasi)) {
                            unlink("./upload/" . $dgp->foto);
                        }
                    }
                }

                $this->mod_kelola_prestasi->hapus_galeri($kode);

                $this->mod_kelola_prestasi->hapus($kode);
                $pesan = 3;
                $isipesan = "Data prestasi dengan nama $nama telah dihapus";
                break;
        }

        if ($foto != "") {
            $kode_data = "";
            $cek_kode = $this->mod_kelola_prestasi->cek_kode($foto)->result();
            foreach ($cek_kode as $ck) {
                $kode_data = $ck->kd_prestasi;
            }

            $datafoto = array(
                "kode" => $kode_data,
                "tgl" => date('Y-m-d'),
                "nama" => $nama,
                "foto" => $foto
            );

            $adafoto = $this->mod_kelola_prestasi->adafoto($kode_data);
            if ($adafoto == 0) {
                $this->mod_kelola_prestasi->galeribaru($datafoto);
            } else {
                $this->mod_kelola_prestasi->galeriupdate($datafoto);
            }
        }

        redirect("kelola_prestasi/index/1/-/$pesan/$isipesan");
    }

    public function upload($nama_file)
    {
        $config['upload_path']        = './upload';
        $config['allowed_types']     = 'gif|jpg|jpeg|png|bmp';
        $config['file_name']        = $nama_file;
        $config['overwrite']        = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas')) {
            $error = "";
            echo "gagal";
        } else {
            $data = $this->upload->data();

            extract($data);

            echo $file_name;
        }
    }
}
