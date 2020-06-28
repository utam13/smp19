<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mod_beranda');
    }

    public function index($page = 1, $pesanlogin = "-", $caristaff = "")
    {
        if ($pesanlogin == "-") {
            $data['pesanlogin'] = "";
        } else {
            $data['pesanlogin'] = $pesanlogin;
        }

        $alamat = $this->mod_beranda->alamat()->result();
        foreach ($alamat as $a) {
            $data['alamat'] = $a->alamat;
            $data['telp'] = $a->telp;
            $data['email'] = $a->email;
            $data['website'] = $a->website;
            $data['visi'] = $a->visi;
            $data['misi'] = $a->misi;
            $data['motto'] = $a->motto;
            $data['ppdb'] = $a->link_ppdb;
            $data['googlemap'] = $a->link_googlemap;
            $data['facebook'] = $a->link_facebook;
            $data['ig'] = $a->link_ig;
            $data['twitter'] = $a->link_twitter;
            $data['youtube'] = $a->link_youtube;
            $data['video1'] = $a->video1;
            $data['video2'] = $a->video2;

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

            if ($a->beranda != "") {
                $beranda = "upload/" . $a->beranda;
                if (file_exists($beranda)) {
                    $data['file_beranda'] = base_url() . "upload/" . $a->beranda . "?" . rand();
                } else {
                    $data['file_beranda'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['file_beranda'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }

        $kepsek = $this->mod_beranda->kepsek()->result();
        foreach ($kepsek as $k) {
            $data['nama_kepsek'] = $k->nama;
            $data['golongan_kepsek'] = $k->golongan;

            $data['facebook_kepsek'] = $k->link_facebook;
            $data['ig_kepsek'] = $k->link_ig;
            $data['twitter_kepsek'] = $k->link_twitter;

            if ($k->foto != "") {
                $foto = "upload/" . $k->foto;
                if (file_exists($foto)) {
                    $data['file_foto_kepsek'] = base_url() . "upload/" . $k->foto . "?" . rand();
                } else {
                    $data['file_foto_kepsek'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['file_foto_kepsek'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }

        //pagination
        if ($caristaff == "") {
            $query = "jabatan='Guru Mata Pelajaran'";
        } else {
            $cari = str_replace("%20", " ", $caristaff);
            $query = "jabatan='$cari'";
        }

        $data['cari'] = $caristaff;

        $jumlah_data = $this->mod_beranda->jumlah_data($query);

        $limit = 12;
        $limit_start = ($page - 1) * 12;

        $staff = $this->mod_beranda->staff($limit_start, $limit, $query)->result();

        $record = array();
        $subrecord = array();
        foreach ($staff as $s) {
            $subrecord['nip'] = $s->nip;
            $subrecord['nama'] = $s->nama;
            $subrecord['jabatan'] = $s->jabatan;
            $subrecord['golongan'] = $s->golongan;
            $subrecord['facebook'] = $s->link_facebook;
            $subrecord['ig'] = $s->link_ig;
            $subrecord['twitter'] = $s->link_twitter;

            if ($s->foto != "") {
                $foto = "upload/" . $s->foto;
                if (file_exists($foto)) {
                    $subrecord['file_foto'] = base_url() . "upload/" . $s->foto . "?" . rand();
                } else {
                    $subrecord['file_foto'] = base_url() . "upload/no-pic.jpg" . "?" . rand();
                }
            } else {
                $subrecord['file_foto'] = base_url() . "upload/no-pic.jpg" . "?" . rand();
            }

            array_push($record, $subrecord);
        }
        $data['staff'] = json_encode($record);

        $data['page'] = $page;
        $data['limit'] = $limit;
        $data['get_jumlah'] = $jumlah_data;
        $data['jumlah_page'] = ceil($jumlah_data / $limit);
        $data['jumlah_number'] = 2;
        $data['start_number'] = ($page > $data['jumlah_number']) ? $page - $data['jumlah_number'] : 1;
        $data['end_number'] = ($page < ($data['jumlah_page'] - $data['jumlah_number'])) ? $page + $data['jumlah_number'] : $data['jumlah_page'];


        $informasi = $this->mod_beranda->informasi()->result();

        $record = array();
        $subrecord = array();
        foreach ($informasi as $i) {
            $subrecord['kd_informasi'] = $i->kd_informasi;
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
                    $subrecord['file_foto'] = base_url() . "upload/" . $i->foto . "?" . rand();
                } else {
                    $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            array_push($record, $subrecord);
        }
        $data['informasi'] = json_encode($record);

        //menu aktif
        $data['menu_beranda'] = "active";
        $data['menu_profil'] = "";
        $data['menu_prestasi'] = "";
        $data['menu_ekskul'] = "";
        $data['menu_fasilitas'] = "";
        $data['menu_informasi'] = "";
        $data['menu_galeri'] = "";
        $data['menu_kontak'] = "";

        $this->load->view('body/bodyatas', $data);
        $this->load->view('body/menuatas', $data);
        $this->load->view('frontend/beranda', $data);
        $this->load->view('body/footer', $data);
        $this->load->view('body/bodybawah');
    }
}
