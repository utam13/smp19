<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mod_galeri');
    }

    public function index($page = 1, $kode = "", $kelompok = "")
    {
        $data['pesanlogin'] = "";

        $alamat = $this->mod_galeri->alamat()->result();
        foreach ($alamat as $a) {
            $data['alamat'] = $a->alamat;
            $data['telp'] = $a->telp;
            $data['email'] = $a->email;
            $data['website'] = $a->website;
            $data['googlemap'] = $a->link_googlemap;
            $data['facebook'] = $a->link_facebook;
            $data['ig'] = $a->link_ig;
            $data['twitter'] = $a->link_twitter;
            $data['youtube'] = $a->link_youtube;

            if ($a->logo != "") {
                $logo = "upload/" . $a->logo;
                if (file_exists($logo)) {
                    $data['file_logo'] = base_url() . "upload/" . $a->logo . "?" . rand();
                } else {
                    $data['file_logo'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['file_logo'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            if ($a->galeri != "") {
                $galeri = "upload/" . $a->galeri;
                if (file_exists($galeri)) {
                    $data['file_galeri'] = base_url() . "upload/" . $a->galeri . "?" . rand();
                } else {
                    $data['file_galeri'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['file_galeri'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }

        //pagination
        if ($kelompok != "") {
            switch ($kelompok) {
                case "ekskul":
                    $query = "kd_ekskul='$kode'";

                    $nama_ekskul = "";
                    $ekskul = $this->mod_galeri->ekskul($kode)->result();
                    foreach ($ekskul as $e) {
                        $nama_ekskul = $e->nama;

                        if ($e->foto != "") {
                            $galeri = "upload/" . $e->foto;
                            if (file_exists($galeri)) {
                                $data['file_galeri'] = base_url() . "upload/" . $e->foto . "?" . rand();
                            }
                        }
                    }
                    $data['kelompok'] = "Ekstra Kurikuler<br>" . ucwords($nama_ekskul);
                    break;
                case "fasilitas":
                    $query = "kd_fasilitas='$kode'";

                    $nama_fasilitas = "";
                    $fasilitas = $this->mod_galeri->fasilitas($kode)->result();
                    foreach ($fasilitas as $f) {
                        $nama_fasilitas = $f->nama;

                        if ($f->foto != "") {
                            $galeri = "upload/" . $f->foto;
                            if (file_exists($galeri)) {
                                $data['file_galeri'] = base_url() . "upload/" . $f->foto . "?" . rand();
                            }
                        }
                    }
                    $data['kelompok'] = ucwords($kelompok) . "<br>" . ucwords($nama_fasilitas);
                    break;
                case "informasi":
                    $query = "kd_informasi='$kode'";

                    $informasi = $this->mod_galeri->informasi($kode)->result();
                    foreach ($informasi as $i) {

                        if ($i->foto != "") {
                            $galeri = "upload/" . $i->foto;
                            if (file_exists($galeri)) {
                                $data['file_galeri'] = base_url() . "upload/" . $i->foto . "?" . rand();
                            }
                        }
                    }
                    $data['kelompok'] = "Berita";
                    break;
            }
        } else {
            $query = "kd_galeri<>'0'";
            $data['kelompok'] = "";
        }

        $jumlah_data = $this->mod_galeri->jumlah_data($query);

        $limit = 12;
        $limit_start = ($page - 1) * 12;

        $galeri = $this->mod_galeri->galeri($limit_start, $limit, $query)->result();

        $record = array();
        $subrecord = array();
        foreach ($galeri as $g) {
            $subrecord['kode'] = $g->kd_galeri;
            $subrecord['tgl'] = $g->tgl;
            $subrecord['judul'] = $g->nama;

            if ($g->foto != "") {
                $foto = "upload/" . $g->foto;
                if (file_exists($foto)) {
                    $subrecord['file_foto'] = base_url() . "upload/" . $g->foto . "?" . rand();
                } else {
                    $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            array_push($record, $subrecord);
        }
        $data['galeri'] = json_encode($record);

        $data['page'] = $page;
        $data['limit'] = $limit;
        $data['get_jumlah'] = $jumlah_data;
        $data['jumlah_page'] = ceil($jumlah_data / $limit);
        $data['jumlah_number'] = 2;
        $data['start_number'] = ($page > $data['jumlah_number']) ? $page - $data['jumlah_number'] : 1;
        $data['end_number'] = ($page < ($data['jumlah_page'] - $data['jumlah_number'])) ? $page + $data['jumlah_number'] : $data['jumlah_page'];

        //menu aktif
        $data['menu_beranda'] = "";
        $data['menu_profil'] = "";
        $data['menu_prestasi'] = "";
        $data['menu_ekskul'] = "";
        $data['menu_fasilitas'] = "";
        $data['menu_informasi'] = "";
        $data['menu_galeri'] = "active";
        $data['menu_kontak'] = "";

        $this->load->view('body/bodyatas', $data);
        $this->load->view('body/menuatas', $data);
        $this->load->view('frontend/galeri', $data);
        $this->load->view('body/footer', $data);
        $this->load->view('body/bodybawah');
    }
}
