<?
class mod_kelola_ekskul extends CI_Model
{
    public function ekskul($start = 0, $end = 10, $q_cari)
    {
        return $this->db->query("select * from ekskul where $q_cari  order by kd_ekskul DESC limit $start,$end");
    }

    public function jumlah_data($q_cari)
    {
        return $this->db->query("select * from ekskul where $q_cari ")->num_rows();
    }

    public function ambil($kode)
    {
        return $this->db->query("select * from ekskul where kd_ekskul='$kode'");
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("insert into ekskul values('$kode','$nama','$link_facebook','$link_ig','$link_twitter','$foto')");
    }

    public function ubah($data)
    {
        extract($data);
        $this->db->query("update ekskul set nama='$nama',link_facebook='$link_facebook',link_ig='$link_ig',link_twitter='$link_twitter',foto='$foto' where kd_ekskul='$kode'");
    }

    public function ambil_galeri($kode)
    {
        return $this->db->query("select foto from galeri where kd_ekskul='$kode'");
    }

    public function hapus_galeri($kode)
    {
        $this->db->query("delete from galeri where kd_ekskul='$kode'");
    }

    public function hapus($kode)
    {
        $this->db->query("delete from ekskul where kd_ekskul='$kode'");
    }

    public function cek_kode($foto)
    {
        return $this->db->query("select kd_ekskul from ekskul where foto='$foto' ");
    }

    public function adafoto($kode)
    {
        return $this->db->query("select * from galeri where kd_ekskul='$kode'")->num_rows();
    }

    public function galeribaru($data)
    {
        extract($data);
        $this->db->query("insert into galeri values('','$kode','','','$tgl','$nama','$foto','1')");
    }

    public function galeriupdate($data)
    {
        extract($data);
        $this->db->query("update galeri set kd_ekskul='$kode',nama='$nama' where foto='$foto'");
    }
}