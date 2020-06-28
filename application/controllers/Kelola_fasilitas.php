<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_fasilitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("beranda"));
        }

        $this->load->model('mod_kelola_fasilitas');
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
        $jumlah_data = $this->mod_kelola_fasilitas->jumlah_data($q_cari);

        $limit = 10;
        $limit_start = ($page - 1) * 10;

        $kelola_fasilitas = $this->mod_kelola_fasilitas->fasilitas($limit_start, $limit, $q_cari)->result();

        $record = array();
        $subrecord = array();
        foreach ($kelola_fasilitas as $kf) {
            $subrecord['kd_fasilitas'] = $kf->kd_fasilitas;
            $subrecord['nama'] = $kf->nama;

            if ($kf->foto != "") {
                $foto = "upload/" . $kf->foto;
                if (file_exists($foto)) {
                    $subrecord['dp'] = $kf->foto;
                    $subrecord['nama_file'] = $kf->foto;
                    $subrecord['file_foto'] = base_url() . "upload/" . $kf->foto . "?" . rand();
                } else {
                    $subrecord['dp'] = "";
                    $subrecord['nama_file'] = date('dmYHis') . "-foto";
                    $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $subrecord['dp'] = "";
                $subrecord['nama_file'] = date('dmYHis') . "-foto";
                $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            array_push($record, $subrecord);
        }
        $data['kelola_fasilitas'] = json_encode($record);

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
        $this->load->view('backend/kelola_fasilitas', $data);
        $this->load->view('body/cms/bodybawah');
    }

    public function proses($proses, $kode = "")
    {
        $kd_fasilitas = $this->input->post('kode');
        $tgl = $this->input->post('tgl');
        $nama = $this->input->post('nama');
        $foto = $this->input->post('nama_file');

        $data = array(
            "kode" => $kd_fasilitas,
            "tgl" => $tgl,
            "nama" => $nama,
            "foto" => $foto
        );


        switch ($proses) {
            case 1:
                $this->mod_kelola_fasilitas->simpan($data);

                $pesan = 1;
                $isipesan = "Data fasilitas baru ditambahkan";
                break;
            case 2:
                $this->mod_kelola_fasilitas->ubah($data);

                $pesan = 2;
                $isipesan = "Data fasilitas diubah";
                break;
            case 3:
                $nama = "";
                $data_kelola_fasilitas = $this->mod_kelola_fasilitas->ambil($kode)->result();
                foreach ($data_kelola_fasilitas as $dkf) {
                    $nama = $dkf->nama;
                    if ($dkf->foto != "") {
                        $foto_fasilitas = "upload/" . $dkf->foto;
                        if (file_exists($foto_fasilitas)) {
                            unlink("./upload/" . $dkf->foto);
                        }
                    }
                }

                $data_galeri_fasilitas = $this->mod_kelola_fasilitas->ambil_galeri($kode)->result();
                foreach ($data_galeri_fasilitas as $dgp) {
                    if ($dgp->foto != "") {
                        $foto_fasilitas = "upload/" . $dgp->foto;
                        if (file_exists($foto_fasilitas)) {
                            unlink("./upload/" . $dgp->foto);
                        }
                    }
                }

                $this->mod_kelola_fasilitas->hapus_galeri($kode);

                $this->mod_kelola_fasilitas->hapus($kode);
                $pesan = 3;
                $isipesan = "Data fasilitas dengan nama $nama telah dihapus";
                break;
        }

        if ($foto != "") {
            $kode_data = "";
            $cek_kode = $this->mod_kelola_fasilitas->cek_kode($foto)->result();
            foreach ($cek_kode as $ck) {
                $kode_data = $ck->kd_fasilitas;
            }

            $datafoto = array(
                "kode" => $kode_data,
                "tgl" => date('Y-m-d'),
                "nama" => $nama,
                "foto" => $foto
            );

            $adafoto = $this->mod_kelola_fasilitas->adafoto($kode_data);
            if ($adafoto == 0) {
                $this->mod_kelola_fasilitas->galeribaru($datafoto);
            } else {
                $this->mod_kelola_fasilitas->galeriupdate($datafoto);
            }
        }

        redirect("kelola_fasilitas/index/1/-/$pesan/$isipesan");
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
