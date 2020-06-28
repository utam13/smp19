<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mod_detail');
    }

    public function index($kode)
    {
        $data['pesanlogin'] = "";

        $alamat = $this->mod_detail->alamat()->result();
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
        }

        $informasi = $this->mod_detail->informasi($kode)->result();
        foreach ($informasi as $i) {
            $data['kode'] = $i->kd_informasi;
            $data['tgljam'] = $i->tgljam;
            $data['judul'] = $i->judul;
            $data['youtube_info'] = $i->youtube;

            if ($i->youtube == "") {
                $no = 1;
                $record = array();
                $subrecord = array();
                $galeri = $this->mod_detail->galeri($kode)->result();
                foreach ($galeri as $g) {
                    $subrecord['no'] = $no;
                    $subrecord['nama_galeri'] = $g->nama;

                    if ($g->foto != "") {
                        $foto = "upload/" . $g->foto;
                        if (file_exists($foto)) {
                            $subrecord['file_galeri'] = base_url() . "upload/" . $g->foto . "?" . rand();
                        } else {
                            $subrecord['file_galeri'] = base_url() . "upload/no-image.png" . "?" . rand();
                        }
                    } else {
                        $subrecord['file_galeri'] = base_url() . "upload/no-image.png" . "?" . rand();
                    }
                    $no++;
                    array_push($record, $subrecord);
                }
                $data['galeri'] = json_encode($record);
            }

            if ($i->pdf != "") {
                $pdf = "upload/" . $i->pdf;
                if (file_exists($pdf)) {
                    $data['file_pdf'] = base_url() . "upload/" . $i->pdf . "?" . rand();
                } else {
                    $data['file_pdf'] = "";
                }
            } else {
                $data['file_pdf'] = "";
            }

            if ($i->foto != "") {
                $foto = "upload/" . $i->foto;
                if (file_exists($foto)) {
                    $data['file_foto'] = base_url() . "upload/" . $i->foto . "?" . rand();
                } else {
                    $data['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }

        $ada_galeri = $this->mod_detail->ada_galeri($kode);
        if ($ada_galeri > 0) {
            $data['url_galeri'] = base_url() . "galeri/index/1/$kode/informasi";
        } else {
            $data['url_galeri'] = "#";
        }

        /*
        $data['jmlgaleri'] = $this->mod_detail->jmlgaleri($kode);

        $galeri = $this->mod_detail->galeri($kode)->result();

        $record = array();
        $subrecord = array();
        foreach ($galeri as $g) {
            if ($g->foto != "") {
                $foto = "upload/" . $g->foto;
                if (file_exists($foto)) {
                    $subrecord['file_foto'] = base_url() . "upload/" . $g->foto . "?" . rand();
                } else {
                    $subrecord['file_foto'] = "";
                }
            } else {
                $subrecord['file_foto'] = "";
            }

            array_push($record, $subrecord);
        }
        $data['galeri'] = json_encode($record);
        */

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
        $this->load->view('frontend/detail', $data);
        $this->load->view('body/footer', $data);
        $this->load->view('body/bodybawah2');
    }
}
