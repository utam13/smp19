<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mod_kontak');
    }

    public function index()
    {
        $data['pesanlogin'] = "";

        $alamat = $this->mod_kontak->alamat()->result();
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

            if ($a->kontak != "") {
                $kontak = "upload/" . $a->kontak;
                if (file_exists($kontak)) {
                    $data['file_kontak'] = base_url() . "upload/" . $a->kontak . "?" . rand();
                } else {
                    $data['file_kontak'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['file_kontak'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }

        //menu aktif
        $data['menu_beranda'] = "";
        $data['menu_profil'] = "";
        $data['menu_prestasi'] = "";
        $data['menu_ekskul'] = "";
        $data['menu_fasilitas'] = "";
        $data['menu_informasi'] = "";
        $data['menu_galeri'] = "";
        $data['menu_kontak'] = "active";

        $this->load->view('body/bodyatas', $data);
        $this->load->view('body/menuatas', $data);
        $this->load->view('frontend/kontak', $data);
        $this->load->view('body/footer', $data);
        $this->load->view('body/bodybawah');
    }

    public function kirimpesan()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $subjek = $this->input->post('subjek');
        $pesan = "Nama: " . $nama . "<br>Email: " . $email . "<br>Pesan: <br>" . $this->input->post('pesan');
        $email_sekolah = $this->input->post('email_sekolah');

        $proses = $this->kirim_email->email($email_sekolah, $subjek, $pesan);

        if ($proses == "Email berhasil dikirim") {
            echo "OK";
        } else {
            echo $proses;
        }
    }
}
