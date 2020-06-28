<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekskul extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mod_ekskul');
    }

    public function index($page = 1)
    {
        $data['pesanlogin'] = "";

        $alamat = $this->mod_ekskul->alamat()->result();
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

            if ($a->ekskul != "") {
                $ekskul = "upload/" . $a->ekskul;
                if (file_exists($ekskul)) {
                    $data['file_ekskul'] = base_url() . "upload/" . $a->ekskul . "?" . rand();
                } else {
                    $data['file_ekskul'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['file_ekskul'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }

        //pagination
        $jumlah_data = $this->mod_ekskul->jumlah_data();

        $limit = 6;
        $limit_start = ($page - 1) * 6;

        $ekskul = $this->mod_ekskul->ekskul($limit_start, $limit)->result();

        $no = 1;
        $record = array();
        $subrecord = array();
        foreach ($ekskul as $p) {
            $subrecord['kode'] = $p->kd_ekskul;
            $subrecord['nama'] = $p->nama;

            $subrecord['facebook'] = $p->link_facebook;
            $subrecord['ig'] = $p->link_ig;
            $subrecord['twitter'] = $p->link_twitter;

            $subrecord['foto'] = $p->foto;

            if ($p->foto != "") {
                $foto = "upload/" . $p->foto;
                if (file_exists($foto)) {
                    $subrecord['file_foto'] = base_url() . "upload/" . $p->foto . "?" . rand();
                } else {
                    $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            $subrecord['flip'] = "align-self-stretch";
            $flip = $no % 2;
            if ($flip == 0) {
                $subrecord['flip'] = "d-md-flex align-self-stretch flex-column-reverse";
            }

            $ada_galeri = $this->mod_ekskul->ada_galeri($p->kd_ekskul);
            if ($ada_galeri > 1) {
                $subrecord['url_galeri'] = base_url() . "galeri/index/1/$p->kd_ekskul/ekskul";
                $subrecord['alert_galeri'] = 0;
            } else {
                $subrecord['url_galeri'] = "#";
                $subrecord['alert_galeri'] = 1;
            }

            $no++;

            array_push($record, $subrecord);
        }
        $data['ekskul'] = json_encode($record);

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
        $data['menu_ekskul'] = "active";
        $data['menu_fasilitas'] = "";
        $data['menu_informasi'] = "";
        $data['menu_galeri'] = "";
        $data['menu_kontak'] = "";

        $this->load->view('body/bodyatas', $data);
        $this->load->view('body/menuatas', $data);
        $this->load->view('frontend/ekskul', $data);
        $this->load->view('body/footer', $data);
        $this->load->view('body/bodybawah');
    }
}
