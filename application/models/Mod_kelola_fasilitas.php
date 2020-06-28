<?
class mod_kelola_fasilitas extends CI_Model
{
    public function fasilitas($start = 0, $end = 10, $q_cari)
    {
        return $this->db->query("select * from fasilitas where $q_cari  order by kd_fasilitas DESC limit $start,$end");
    }

    public function jumlah_data($q_cari)
    {
        return $this->db->query("select * from fasilitas where $q_cari ")->num_rows();
    }

    public function ambil($kode)
    {
        return $this->db->query("select * from fasilitas where kd_fasilitas='$kode'");
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("insert into fasilitas values('$kode','$nama','$foto')");
    }

    public function ubah($data)
    {
        extract($data);
        $this->db->query("update fasilitas set nama='$nama',foto='$foto' where kd_fasilitas='$kode'");
    }

    public function ambil_galeri($kode)
    {
        return $this->db->query("select foto from galeri where kd_fasilitas='$kode'");
    }

    public function hapus_galeri($kode)
    {
        $this->db->query("delete from galeri where kd_fasilitas='$kode'");
    }

    public function hapus($kode)
    {
        $this->db->query("delete from fasilitas where kd_fasilitas='$kode'");
    }

    public function cek_kode($foto)
    {
        return $this->db->query("select kd_fasilitas from fasilitas where foto='$foto' ");
    }

    public function adafoto($kode)
    {
        return $this->db->query("select * from galeri where kd_fasilitas='$kode' ")->num_rows();
    }

    public function galeribaru($data)
    {
        extract($data);
        $this->db->query("insert into galeri values('','','$kode','','$tgl','$nama','$foto','1')");
    }

    public function galeriupdate($data)
    {
        extract($data);
        $this->db->query("update galeri set kd_fasilitas='$kode',nama='$nama' where foto='$foto'");
    }
}