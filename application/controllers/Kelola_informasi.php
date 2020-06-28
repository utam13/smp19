<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_informasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("beranda"));
        }

        $this->load->model('mod_kelola_informasi');
    }

    public function index($page = 1, $isicari = "-", $pesan = "", $isipesan = "")
    {
        $data['halaman'] = "berita";

        //cari
        if ($isicari != "-") {
            $cari = str_replace("%20", " ", $isicari);
        } else {
            $cari =  $this->clear_string->clear_quotes($this->input->post('cari'));
        }

        if ($cari != "") {
            $q_cari = "judul like '%$cari%'";
        } else {
            $q_cari = "judul<>''";
        }

        $data['cari'] =  $cari;

        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        //pagination
        $jumlah_data = $this->mod_kelola_informasi->jumlah_data($q_cari);

        $limit = 10;
        $limit_start = ($page - 1) * 10;

        $kelola_informasi = $this->mod_kelola_informasi->informasi($limit_start, $limit, $q_cari)->result();

        $record = array();
        $subrecord = array();
        foreach ($kelola_informasi as $ki) {
            $subrecord['kd_informasi'] = $ki->kd_informasi;
            $subrecord['tgljam'] = $ki->tgljam;
            $subrecord['tgljam2'] = date('Y-m-d', strtotime($ki->tgljam)) . "T" . date('H:i', strtotime($ki->tgljam));
            $subrecord['judul'] = $ki->judul;
            $subrecord['youtube'] = $ki->youtube;

            if ($ki->pdf != "") {
                $pdf = "upload/" . $ki->pdf;
                if (file_exists($pdf)) {
                    $subrecord['pdf'] = $ki->pdf;
                    $subrecord['nama_pdf'] = $ki->pdf;
                    $subrecord['file_pdf'] = base_url() . "upload/" . $ki->pdf . "?" . rand();
                } else {
                    $subrecord['pdf'] = "";
                    $subrecord['nama_pdf'] = date('dmYHis') . "-pdf";
                    $subrecord['file_pdf'] = "";
                }
            } else {
                $subrecord['pdf'] = "";
                $subrecord['nama_pdf'] = date('dmYHis') . "-pdf";
                $subrecord['file_pdf'] = "";
            }

            if ($ki->foto != "") {
                $foto = "upload/" . $ki->foto;
                if (file_exists($foto)) {
                    $subrecord['dp'] = $ki->foto;
                    $subrecord['nama_gambar'] = $ki->foto;
                    $subrecord['file_gambar'] = base_url() . "upload/" . $ki->foto . "?" . rand();
                } else {
                    $subrecord['dp'] = "";
                    $subrecord['nama_gambar'] = date('dmYHis') . "-gambar";
                    $subrecord['file_gambar'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $subrecord['dp'] = "";
                $subrecord['nama_gambar'] = date('dmYHis') . "-gambar";
                $subrecord['file_gambar'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            array_push($record, $subrecord);
        }
        $data['kelola_informasi'] = json_encode($record);

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
        $this->load->view('backend/kelola_informasi', $data);
        $this->load->view('body/cms/bodybawah', $data);
    }

    public function proses($proses, $kode = "")
    {
        $kd_informasi = $this->input->post('kode');
        $tgljam = $this->input->post('tgljam');
        $judul = $this->input->post('judul');
        $youtube = $this->input->post('youtube');
        $pdf = $this->input->post('nama_pdf');
        $gambar = $this->input->post('nama_file');

        if ($proses != 3) {
            $data = array(
                "kode" => $kd_informasi,
                "tgljam" => $tgljam,
                "judul" => $judul,
                "youtube" => $youtube,
                "pdf" => $pdf,
                "gambar" => $gambar
            );
        }

        switch ($proses) {
            case 1:
                $this->mod_kelola_informasi->simpan($data);

                $pesan = 1;
                $isipesan = "Data informasi baru ditambahkan";
                break;
            case 2:
                $this->mod_kelola_informasi->ubah($data);

                $pesan = 2;
                $isipesan = "Data informasi diubah";
                break;
            case 3:
                $judul = "";
                $data_kelola_informasi = $this->mod_kelola_informasi->ambil($kode)->result();
                foreach ($data_kelola_informasi as $dki) {
                    $judul = $dki->judul;
                    if ($dki->foto != "") {
                        $foto_informasi = "upload/" . $dki->foto;
                        if (file_exists($foto_informasi)) {
                            unlink("./upload/" . $dki->foto);
                        }
                    }
                }

                $data_galeri_informasi = $this->mod_kelola_informasi->ambil_galeri($kode)->result();
                foreach ($data_galeri_informasi as $dgp) {
                    if ($dgp->foto != "") {
                        $foto_informasi = "upload/" . $dgp->foto;
                        if (file_exists($foto_informasi)) {
                            unlink("./upload/" . $dgp->foto);
                        }
                    }
                }

                $this->mod_kelola_informasi->hapus_galeri($kode);

                $this->mod_kelola_informasi->hapus($kode);

                $pesan = 3;
                $isipesan = "Data informasi dengan judul $judul telah dihapus";
                break;
        }

        /*
            if ($gambar != "") {
                $kode_data = "";
                $cek_kode = $this->mod_kelola_informasi->cek_kode($foto)->result();
                foreach ($cek_kode as $ck) {
                    $kode_data = $ck->kd_informasi;
                }

                $datafoto = array(
                    "kode" => $kode_data,
                    "tgl" => date('Y-m-d'),
                    "nama" => $judul,
                    "foto" => $foto
                );

                $adafoto = $this->mod_kelola_informasi->adafoto($kode_data);
                if ($adafoto == 0) {
                    $this->mod_kelola_informasi->galeribaru($datafoto);
                } else {
                    $this->mod_kelola_informasi->galeriupdate($datafoto);
                }
            }
        } else {
            $pesan = 3;
            $isipesan = "Jumlah karakter pada isi berita kurang dari 45, silakan masukkan kembali dan pastikan isi berita lebih dari 45 karakter";
        }
        */

        redirect("kelola_informasi/index/1/-/$pesan/$isipesan");
    }

    public function upload($nama_file)
    {
        $config['upload_path']        = './upload';
        $config['allowed_types']     = 'gif|jpg|jpeg|png|bmp|pdf';
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
