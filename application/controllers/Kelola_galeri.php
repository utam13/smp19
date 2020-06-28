<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("beranda"));
        }

        $this->load->model('mod_kelola_galeri');
    }

    public function index($kode, $kelompok, $page = 1, $isicari = "-", $pesan = "", $isipesan = "")
    {
        //cari
        if ($isicari != "-") {
            $cari = str_replace("%20", " ", $isicari);
        } else {
            $cari =  $this->clear_string->clear_quotes($this->input->post('cari'));
        }

        switch ($kelompok) {
            case "ekskul":
                $q_cari = "kd_ekskul='$kode'";

                $nama_ekskul = "";
                $ekskul = $this->mod_kelola_galeri->ekskul($kode)->result();
                foreach ($ekskul as $e) {
                    $nama_ekskul = $e->nama;
                }

                $data['nama_kelompok'] = "Ekstra Kurikuler ($nama_ekskul)";
                break;
            case "fasilitas":
                $q_cari = "kd_fasilitas='$kode'";

                $nama_fasilitas = "";
                $fasilitas = $this->mod_kelola_galeri->fasilitas($kode)->result();
                foreach ($fasilitas as $f) {
                    $nama_fasilitas = $f->nama;
                }

                $data['nama_kelompok'] = ucwords($kelompok) . " ($nama_fasilitas)";
                break;
            case "informasi":
                $q_cari = "kd_informasi='$kode'";

                $judul_berita = "";
                $informasi = $this->mod_kelola_galeri->informasi($kode)->result();
                foreach ($informasi as $i) {
                    $judul_berita = $i->judul;
                }

                $data['nama_kelompok'] = "Berita ($judul_berita)";
                break;
        }

        $data['kodedata'] = $kode;
        $data['kelompok'] = $kelompok;

        if ($cari != "") {
            $q_cari .= " and nama like '%$cari%'";
        } else {
            $q_cari .= "";
        }

        $data['cari'] =  $cari;

        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        //pagination
        $jumlah_data = $this->mod_kelola_galeri->jumlah_data($q_cari);

        $limit = 10;
        $limit_start = ($page - 1) * 10;

        $kelola_galeri = $this->mod_kelola_galeri->galeri($limit_start, $limit, $q_cari)->result();

        $record = array();
        $subrecord = array();
        foreach ($kelola_galeri as $kg) {
            $subrecord['kd_galeri'] = $kg->kd_galeri;
            switch ($kelompok) {
                case "ekskul":
                    $subrecord['kodedata'] = $kg->kd_ekskul;
                    break;
                case "fasilitas":
                    $subrecord['kodedata'] = $kg->kd_fasilitas;
                    break;
                case "informasi":
                    $subrecord['kodedata'] = $kg->kd_informasi;
                    break;
            }
            $subrecord['tgl'] = $kg->tgl;
            $subrecord['nama'] = $kg->nama;
            $subrecord['utama'] = $kg->utama;

            if ($kg->foto != "") {
                $foto = "upload/" . $kg->foto;
                if (file_exists($foto)) {
                    $subrecord['nama_file'] = $kg->foto;
                    $subrecord['file_foto'] = base_url() . "upload/" . $kg->foto . "?" . rand();
                } else {
                    $subrecord['nama_file'] = date('dmYHis') . "-foto";
                    $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
                }
            } else {
                $subrecord['nama_file'] = date('dmYHis') . "-foto";
                $subrecord['file_foto'] = base_url() . "upload/no-image.png" . "?" . rand();
            }
            array_push($record, $subrecord);
        }
        $data['kelola_galeri'] = json_encode($record);

        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/kelola_galeri', $data);
        $this->load->view('body/cms/bodybawah');
    }

    public function proses($kodedata, $kelompok, $proses, $kode = "")
    {
        $kd_galeri = $this->input->post('kode');
        $tgl = $this->input->post('tgl');
        $judul = $this->input->post('judul');
        $foto = $this->input->post('nama_file');
        $utama = $this->input->post('utama', true) == null ? 0 : 1;

        switch ($kelompok) {
            case "ekskul":
                $query = "kd_ekskul='$kodedata'";
                $nama_kelompok = "Ekstra Kulikuler";
                $kd_ekskul = $kodedata;
                $kd_fasilitas = "";
                $kd_informasi = "";
                break;
            case "fasilitas":
                $query = "kd_fasilitas='$kodedata'";
                $nama_kelompok = "Fasilitas";
                $kd_ekskul = "";
                $kd_fasilitas = $kodedata;
                $kd_informasi = "";
                break;
            case "informasi":
                $query = "kd_informasi='$kodedata'";
                $nama_kelompok = "Berita";
                $kd_ekskul = "";
                $kd_fasilitas = "";
                $kd_informasi = $kodedata;
                break;
        }

        $data = array(
            "kode" => $kd_galeri,
            "kd_ekskul" => $kd_ekskul,
            "kd_fasilitas" => $kd_fasilitas,
            "kd_informasi" => $kd_informasi,
            "tgl" => $tgl,
            "judul" => $judul,
            "foto" => $foto,
            "utama" => $utama
        );

        switch ($proses) {
            case 1:
                if ($utama == 1) {
                    $this->mod_kelola_galeri->bersihkan_utama($query);
                }

                $this->mod_kelola_galeri->simpan($data);

                $pesan = 1;
                $isipesan = "Gambar Galeri $nama_kelompok ditambahkan";
                break;
            case 2:
                $this->mod_kelola_galeri->bersihkan_utama($query);

                $this->mod_kelola_galeri->utama($kode);

                $pesan = 1;
                $isipesan = "Data Gambar Galeri $nama_kelompok diubah";
                break;
            case 3:
                $data_galeri = $this->mod_kelola_galeri->ambil_galeri($kode)->result();
                foreach ($data_galeri as $dg) {
                    if ($dg->foto != "") {
                        $foto = "upload/" . $dg->foto;
                        if (file_exists($foto)) {
                            unlink("./upload/" . $dg->foto);
                        }
                    }
                }

                $this->mod_kelola_galeri->hapus($kode);

                $pesan = 3;
                $isipesan = "Gambar Galeri $nama_kelompok dihapus";
                break;
        }

        redirect("kelola_galeri/index/$kodedata/$kelompok/1/-/$pesan/$isipesan");
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
