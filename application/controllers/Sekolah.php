<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("beranda"));
        }

        $this->load->model('mod_sekolah');
    }

    public function index($pesan = "", $isipesan = "")
    {
        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        $data['halaman'] = "sekolah";

        //reset kontent
        $data['alamat'] = "";
        $data['telp'] = "";
        $data['email'] = "";
        $data['website'] = "";
        $data['visi'] = "";
        $data['misi'] = "";
        $data['motto'] = "";
        $data['sejarah'] = "";
        $data['googlemap'] = "";
        $data['facebook'] = "";
        $data['ig'] = "";
        $data['twitter'] = "";
        $data['youtube'] = "";
        $data['ppdb'] = "";
        $data['video1'] = "";
        $data['video2'] = "";
        $data['logo'] = date('dmYHis') . "-logo";
        $data['beranda'] = date('dmYHis') . "-beranda";
        $data['profil'] = date('dmYHis') . "-profil";
        $data['galeri'] = date('dmYHis') . "-galeri";
        $data['kontak'] = date('dmYHis') . "-kontak";
        $data['file_logo'] = base_url() . "upload/no-image.png" . "?" . rand();

        $alamat = $this->mod_sekolah->alamat()->result();

        foreach ($alamat as $a) {
            $data['alamat'] = str_replace('<br />', '', $a->alamat);
            $data['telp'] = $a->telp;
            $data['email'] = $a->email;
            $data['website'] = $a->website;
            $data['visi'] = str_replace('<br />', '', $a->visi);
            $data['misi'] = str_replace('<br />', '', $a->misi);
            $data['motto'] = str_replace('<br />', '', $a->motto);
            $data['sejarah'] = $this->clear_string->clear_quotes($a->sejarah);
            $data['ppdb'] = $a->link_ppdb;
            $data['googlemap'] = $a->link_googlemap;
            $data['facebook'] = $a->link_facebook;
            $data['ig'] = $a->link_ig;
            $data['twitter'] = $a->link_twitter;
            $data['youtube'] = $a->link_youtube;
            $data['ppdb'] = $a->link_ppdb;
            $data['video1'] = $a->video1;
            $data['video2'] = $a->video2;
            $data['username'] = $a->usercms;
            $data['password'] = $a->passcms;

            if ($a->logo != "") {
                $logo = "upload/" . $a->logo;
                if (file_exists($logo)) {
                    $data['logo'] = $a->logo;
                    $data['nama_file'] = $a->logo;
                    $data['file_logo'] = base_url() . "upload/" . $a->logo . "?" . rand();
                } else {
                    $data['logo'] = "";
                    $data['nama_file'] = date('dmYHis') . "-logo";
                    $data['file_logo'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['logo'] = "";
                $data['nama_file'] = date('dmYHis') . "-logo";
                $data['file_logo'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            if ($a->beranda != "") {
                $beranda = "upload/" . $a->beranda;
                if (file_exists($beranda)) {
                    $data['beranda'] = $a->beranda;
                    $data['nama_beranda'] = $a->beranda;
                    $data['file_beranda'] = base_url() . "upload/" . $a->beranda . "?" . rand();
                } else {
                    $data['beranda'] = "";
                    $data['nama_beranda'] = date('dmYHis') . "-beranda";
                    $data['file_beranda'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['beranda'] = "";
                $data['nama_beranda'] = date('dmYHis') . "-beranda";
                $data['file_beranda'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            if ($a->profil != "") {
                $profil = "upload/" . $a->profil;
                if (file_exists($profil)) {
                    $data['profil'] = $a->profil;
                    $data['nama_profil'] = $a->profil;
                    $data['file_profil'] = base_url() . "upload/" . $a->profil . "?" . rand();
                } else {
                    $data['profil'] = "";
                    $data['nama_profil'] = date('dmYHis') . "-profil";
                    $data['file_profil'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['profil'] = "";
                $data['nama_profil'] = date('dmYHis') . "-profil";
                $data['file_profil'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            if ($a->ekskul != "") {
                $ekskul = "upload/" . $a->ekskul;
                if (file_exists($ekskul)) {
                    $data['ekskul'] = $a->ekskul;
                    $data['nama_ekskul'] = $a->ekskul;
                    $data['file_ekskul'] = base_url() . "upload/" . $a->ekskul . "?" . rand();
                } else {
                    $data['ekskul'] = "";
                    $data['nama_ekskul'] = date('dmYHis') . "-ekskul";
                    $data['file_ekskul'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['ekskul'] = "";
                $data['nama_ekskul'] = date('dmYHis') . "-ekskul";
                $data['file_ekskul'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            if ($a->fasilitas != "") {
                $fasilitas = "upload/" . $a->fasilitas;
                if (file_exists($fasilitas)) {
                    $data['fasilitas'] = $a->fasilitas;
                    $data['nama_fasilitas'] = $a->fasilitas;
                    $data['file_fasilitas'] = base_url() . "upload/" . $a->fasilitas . "?" . rand();
                } else {
                    $data['fasilitas'] = "";
                    $data['nama_fasilitas'] = date('dmYHis') . "-fasilitas";
                    $data['file_fasilitas'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['fasilitas'] = "";
                $data['nama_fasilitas'] = date('dmYHis') . "-fasilitas";
                $data['file_fasilitas'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            if ($a->berita != "") {
                $berita = "upload/" . $a->berita;
                if (file_exists($berita)) {
                    $data['berita'] = $a->berita;
                    $data['nama_berita'] = $a->berita;
                    $data['file_berita'] = base_url() . "upload/" . $a->berita . "?" . rand();
                } else {
                    $data['berita'] = "";
                    $data['nama_berita'] = date('dmYHis') . "-berita";
                    $data['file_berita'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['berita'] = "";
                $data['nama_berita'] = date('dmYHis') . "-berita";
                $data['file_berita'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            if ($a->galeri != "") {
                $galeri = "upload/" . $a->galeri;
                if (file_exists($galeri)) {
                    $data['galeri'] = $a->galeri;
                    $data['nama_galeri'] = $a->galeri;
                    $data['file_galeri'] = base_url() . "upload/" . $a->galeri . "?" . rand();
                } else {
                    $data['galeri'] = "";
                    $data['nama_galeri'] = date('dmYHis') . "-galeri";
                    $data['file_galeri'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['galeri'] = "";
                $data['nama_galeri'] = date('dmYHis') . "-galeri";
                $data['file_galeri'] = base_url() . "upload/no-image.png" . "?" . rand();
            }

            if ($a->kontak != "") {
                $kontak = "upload/" . $a->kontak;
                if (file_exists($kontak)) {
                    $data['kontak'] = $a->kontak;
                    $data['nama_kontak'] = $a->kontak;
                    $data['file_kontak'] = base_url() . "upload/" . $a->kontak . "?" . rand();
                } else {
                    $data['kontak'] = "";
                    $data['nama_kontak'] = date('dmYHis') . "-kontak";
                    $data['file_kontak'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $data['kontak'] = "";
                $data['nama_kontak'] = date('dmYHis') . "-kontak";
                $data['file_kontak'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
        }

        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/sekolah', $data);
        $this->load->view('body/cms/bodybawah2', $data);
    }

    public function proses()
    {
        $alamat = nl2br($this->input->post('alamat'));
        $telp = $this->input->post('telp');
        $email = $this->input->post('email');
        $website = $this->input->post('website');
        $visi =  nl2br($this->input->post('visi'));
        $misi = $this->input->post('misi');
        $motto = $this->input->post('motto');
        $sejarah = $this->input->post('sejarah');
        $link_googlemap = $this->input->post('link_googlemap');
        $link_facebook = $this->input->post('link_facebook');
        $link_ig = $this->input->post('link_ig');
        $link_twitter = $this->input->post('link_twitter');
        $link_youtube = $this->input->post('link_youtube');
        $link_ppdb = $this->input->post('link_ppdb');
        $video1 = $this->input->post('video1');
        $video2 = $this->input->post('video2');
        $logo = $this->input->post('file_target');
        $beranda = $this->input->post('file_target_beranda');
        $profil = $this->input->post('file_target_profil');
        $ekskul = $this->input->post('file_target_ekskul');
        $fasilitas = $this->input->post('file_target_fasilitas');
        $berita = $this->input->post('file_target_berita');
        $galeri = $this->input->post('file_target_galeri');
        $kontak = $this->input->post('file_target_kontak');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            "alamat" => $alamat,
            "telp" => $telp,
            "email" => $email,
            "website" => $website,
            "visi" => $visi,
            "misi" => $misi,
            "motto" => $motto,
            "sejarah" => $sejarah,
            "link_googlemap" => $link_googlemap,
            "link_facebook" => $link_facebook,
            "link_ig" => $link_ig,
            "link_twitter" => $link_twitter,
            "link_youtube" => $link_youtube,
            "link_ppdb" => $link_ppdb,
            "video1" => $video1,
            "video2" => $video2,
            "logo" => $logo,
            "beranda" => $beranda,
            "profil" => $profil,
            "ekskul" => $ekskul,
            "fasilitas" => $fasilitas,
            "berita" => $berita,
            "galeri" => $galeri,
            "kontak" => $kontak,
            "username" => $username,
            "password" => $password
        );

        $data_video = array(
            "video1" => $video1,
            "video2" => $video2
        );

        $this->mod_sekolah->simpan($data);

        $this->mod_sekolah->simpan_sejarah($sejarah);

        $this->mod_sekolah->simpan_video($data_video);

        $pesan = 1;
        $isipesan = "Informasi Sekolah ter-update";

        redirect("sekolah/index/$pesan/$isipesan");
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
