<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mod_prestasi');
    }

    public function index($page = 1, $isicari = "-")
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

        $data['pesanlogin'] = "";

        $alamat = $this->mod_prestasi->alamat()->result();
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

            if ($a->prestasi != "") {
                $prestasi = "upload/" . $a->prestasi;
                if (file_exists($prestasi)) {
                    $data['file_prestasi'] = base_url() . "upload/" . $a->prestasi . "?" . rand();
                } else {
                    $data['file_prestasi'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['file_prestasi'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }

        //pagination
        $jumlah_data = $this->mod_prestasi->jumlah_data($q_cari);

        $limit = 6;
        $limit_start = ($page - 1) * 6;

        $prestasi = $this->mod_prestasi->prestasi($limit_start, $limit, $q_cari)->result();

        $no = 1;
        $record = array();
        $subrecord = array();
        foreach ($prestasi as $p) {
            $subrecord['kode'] = $p->kd_prestasi;
            $subrecord['tahun'] = $p->tahun;
            $subrecord['nama'] = $p->nama;
            $subrecord['lokasi'] = $p->lokasi;
            $subrecord['uraian'] = $p->uraian;
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

            $no++;

            array_push($record, $subrecord);
        }
        $data['prestasi'] = json_encode($record);

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
        $data['menu_prestasi'] = "active";
        $data['menu_ekskul'] = "";
        $data['menu_fasilitas'] = "";
        $data['menu_informasi'] = "";
        $data['menu_galeri'] = "";
        $data['menu_kontak'] = "";

        $this->load->view('body/bodyatas', $data);
        $this->load->view('body/menuatas', $data);
        $this->load->view('frontend/prestasi', $data);
        $this->load->view('body/footer', $data);
        $this->load->view('body/bodybawah');
    }
}
