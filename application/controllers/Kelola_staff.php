<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('stat_cms') == "") {
            redirect(base_url("beranda"));
        }

        $this->load->model('mod_kelola_staff');
    }

    public function index($page = 1, $isicari = "-", $pesan = "", $isipesan = "")
    {
        //cari
        if ($isicari != "-") {
            $cari = str_replace("%20", " ", $isicari);
        } else {
            $cari =  $this->clear_string->clear_quotes($this->input->post('cari'));
        }

        if ($cari != "") {
            $q_cari = "nip like '%$cari%' or nama like '%$cari%'";
        } else {
            $q_cari = "nip<>''";
        }

        $data['cari'] =  $cari;

        $data['alert'] = $this->alert_lib->alert($pesan, $isipesan);

        //pagination
        $jumlah_data = $this->mod_kelola_staff->jumlah_data($q_cari);

        $limit = 10;
        $limit_start = ($page - 1) * 10;

        $kelola_staff = $this->mod_kelola_staff->staff($limit_start, $limit, $q_cari)->result();

        $record = array();
        $subrecord = array();
        foreach ($kelola_staff as $ks) {
            $subrecord['kd_staff'] = $ks->kd_staff;
            $subrecord['nip'] = $ks->nip;
            $subrecord['nama'] = $ks->nama;
            $subrecord['jabatan'] = $ks->jabatan;
            $subrecord['golongan'] = $ks->golongan;

            $subrecord['facebook'] = $ks->link_facebook;
            $subrecord['ig'] = $ks->link_ig;
            $subrecord['twitter'] = $ks->link_twitter;

            if ($ks->foto != "") {
                $foto = "upload/" . $ks->foto;
                if (file_exists($foto)) {
                    $subrecord['foto_staff'] = $ks->foto;
                    $subrecord['nama_file'] = $ks->foto;
                    $subrecord['file_foto'] = base_url() . "upload/" . $ks->foto . "?" . rand();
                } else {
                    $subrecord['foto_staff'] = "";
                    $subrecord['nama_file'] = date('dmYHis') . "-foto";
                    $subrecord['file_foto'] = base_url() . "upload/no-pic.jpg" . "?" . rand();
                }
            } else {
                $subrecord['foto_staff'] = "";
                $subrecord['nama_file'] = date('dmYHis') . "-foto";
                $subrecord['file_foto'] = base_url() . "upload/no-pic.jpg" . "?" . rand();
            }

            array_push($record, $subrecord);
        }
        $data['kelola_staff'] = json_encode($record);

        $data['page'] = $page;
        $data['limit'] = $limit;
        $data['get_jumlah'] = $jumlah_data;
        $data['jumlah_page'] = ceil($jumlah_data / $limit);
        $data['jumlah_number'] = 2;
        $data['start_number'] = ($page > $data['jumlah_number']) ? $page - $data['jumlah_number'] : 1;
        $data['end_number'] = ($page < ($data['jumlah_page'] - $data['jumlah_number'])) ? $page + $data['jumlah_number'] : $data['jumlah_page'];

        $data['no'] = $limit_start + 1;

        $this->load->view('body/cms/bodyatas');
        $this->load->view('body/cms/menuatas');
        $this->load->view('backend/kelola_staff', $data);
        $this->load->view('body/cms/bodybawah', $data);
    }

    public function proses($proses, $kode = "")
    {
        $kd_staff = $this->input->post('kode');
        $awal = $this->input->post('awal');
        $nip = $this->input->post('nip');
        $nama = $this->clear_string->clear_quotes($this->input->post('nama'));
        $jabatan = $this->input->post('jabatan');
        $golongan = $this->input->post('golongan');
        $link_facebook = $this->input->post('link_facebook');
        $link_ig = $this->input->post('link_ig');
        $link_twitter = $this->input->post('link_twitter');
        $foto = $this->input->post('nama_file');

        $data = array(
            "kode" => $kd_staff,
            "nip" => $nip,
            "nama" => $nama,
            "jabatan" => $jabatan,
            "golongan" => $golongan,
            "link_facebook" => $link_facebook,
            "link_ig" => $link_ig,
            "link_twitter" => $link_twitter,
            "foto" => $foto
        );

        if ($proses != 3) {
            $ada = $this->mod_kelola_staff->ada($kd_staff);
        }

        switch ($proses) {
            case 1:
                if ($ada == 0) {
                    $this->mod_kelola_staff->simpan($data);

                    $pesan = 1;
                    $isipesan = "Data staff baru ditambahkan";
                } else {
                    $pesan = 3;
                    $isipesan = "Data staff dengan nip $nip sudah terdaftar";
                }
                break;
            case 2:
                if ($awal == $nip || ($awal != $nip && $ada == 0)) {
                    $this->mod_kelola_staff->ubah($data);

                    $pesan = 2;
                    $isipesan = "Data staff diubah";
                } else {
                    $pesan = 3;
                    $isipesan = "Data staff dengan nip $nip sudah terdaftar";
                }
                break;
            case 3:
                $nama = "";
                $data_kelola_staff = $this->mod_kelola_staff->ambil($kode)->result();
                foreach ($data_kelola_staff as $dki) {
                    $judul = $dki->judul;
                    if ($dki->foto != "") {
                        $foto_staff = "upload/" . $dki->foto;
                        if (file_exists($foto_staff)) {
                            unlink("./upload/" . $dki->foto);
                        }
                    }
                }

                $this->mod_kelola_staff->hapus($kode);

                $pesan = 3;
                $isipesan = "Data staff dengan judul $judul telah dihapus";
                break;
        }

        redirect("kelola_staff/index/1/-/$pesan/$isipesan");
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
