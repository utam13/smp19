<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mod_profil');
    }

    public function index($page = 1)
    {
        $data['pesanlogin'] = "";

        $alamat = $this->mod_profil->alamat()->result();
        foreach ($alamat as $a) {
            $data['alamat'] = $a->alamat;
            $data['telp'] = $a->telp;
            $data['email'] = $a->email;
            $data['website'] = $a->website;
            $data['motto'] = $a->motto;
            $data['sejarah'] = $a->sejarah;
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

            if ($a->profil != "") {
                $profil = "upload/" . $a->profil;
                if (file_exists($profil)) {
                    $data['file_profil'] = base_url() . "upload/" . $a->profil . "?" . rand();
                } else {
                    $data['file_profil'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['file_profil'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }

        $kepsek = $this->mod_profil->kepsek()->result();
        foreach ($kepsek as $k) {
            $data['nama_kepsek'] = $k->nama;

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
        /*
        $jumlah_data = $this->mod_profil->jumlah_data();

        $limit = 6;
        $limit_start = ($page - 1) * 6;

        $staff = $this->mod_profil->staff($limit_start, $limit)->result();

        $record = array();
        $subrecord = array();
        foreach ($staff as $s) {
            $subrecord['nip'] = $s->nip;
            $subrecord['nama'] = $s->nama;
            $subrecord['jabatan'] = $s->jabatan;
            if ($s->selesai == "0000-00-00") {
                $subrecord['masa'] = date('d-m-Y', strtotime($s->mulai)) . " - sekarang";
            } else {
                $subrecord['masa'] = date('d-m-Y', strtotime($s->mulai)) . " - " . date('d-m-Y', strtotime($s->selesai));
            }

            $subrecord['facebook'] = $s->link_facebook;
            $subrecord['ig'] = $s->link_ig;
            $subrecord['twitter'] = $s->link_twitter;

            if ($s->foto != "") {
                $foto = "upload/" . $s->foto;
                if (file_exists($foto)) {
                    $subrecord['file_foto'] = base_url() . "upload/" . $s->foto . "?" . rand();
                } else {
                    $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
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
*/
        //menu aktif
        $data['menu_beranda'] = "";
        $data['menu_profil'] = "active";
        $data['menu_prestasi'] = "";
        $data['menu_ekskul'] = "";
        $data['menu_fasilitas'] = "";
        $data['menu_informasi'] = "";
        $data['menu_galeri'] = "";
        $data['menu_kontak'] = "";

        $this->load->view('body/bodyatas', $data);
        $this->load->view('body/menuatas', $data);
        $this->load->view('frontend/profil', $data);
        $this->load->view('body/footer', $data);
        $this->load->view('body/bodybawah');
    }
}
