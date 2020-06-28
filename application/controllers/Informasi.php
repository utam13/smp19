<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mod_informasi');
    }

    public function index($page = 1)
    {
        $data['pesanlogin'] = "";

        $alamat = $this->mod_informasi->alamat()->result();
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

            if ($a->berita != "") {
                $berita = "upload/" . $a->berita;
                if (file_exists($berita)) {
                    $data['file_berita'] = base_url() . "upload/" . $a->berita . "?" . rand();
                } else {
                    $data['file_berita'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['file_berita'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }

        //pagination
        $jumlah_data = $this->mod_informasi->jumlah_data();

        $limit = 6;
        $limit_start = ($page - 1) * 6;

        $informasi = $this->mod_informasi->informasi($limit_start, $limit)->result();

        $record = array();
        $subrecord = array();
        foreach ($informasi as $i) {
            $subrecord['kode'] = $i->kd_informasi;
            $subrecord['tgljam'] = $i->tgljam;
            $subrecord['judul'] = $i->judul;
            $subrecord['youtube'] = $i->youtube;

            if ($i->pdf != "") {
                $pdf = "upload/" . $i->pdf;
                if (file_exists($pdf)) {
                    $subrecord['file_pdf'] = base_url() . "upload/" . $i->pdf . "?" . rand();
                } else {
                    $subrecord['file_pdf'] = "";
                }
            } else {
                $subrecord['file_pdf'] = "";
            }

            if ($i->foto != "") {
                $foto = "upload/" . $i->foto;
                if (file_exists($foto)) {
                    $subrecord['file_gambar'] = base_url() . "upload/" . $i->foto . "?" . rand();
                } else {
                    $subrecord['file_gambar'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $subrecord['file_gambar'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            array_push($record, $subrecord);
        }
        $data['informasi'] = json_encode($record);

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
        $data['menu_informasi'] = "active";
        $data['menu_galeri'] = "";
        $data['menu_kontak'] = "";

        $this->load->view('body/bodyatas', $data);
        $this->load->view('body/menuatas', $data);
        $this->load->view('frontend/informasi', $data);
        $this->load->view('body/footer', $data);
        $this->load->view('body/bodybawah');
    }
}
