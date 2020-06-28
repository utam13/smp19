<?
class mod_kelola_informasi extends CI_Model
{
    public function informasi($start = 0, $end = 10, $q_cari)
    {
        return $this->db->query("select * from informasi where $q_cari  order by tgljam DESC limit $start,$end");
    }

    public function jumlah_data($q_cari)
    {
        return $this->db->query("select * from informasi where $q_cari ")->num_rows();
    }

    public function ambil($kode)
    {
        return $this->db->query("select * from informasi where kd_informasi='$kode'");
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("insert into informasi values('$kode','$tgljam','$judul','$pdf','$youtube','$gambar')");
    }

    public function ubah($data)
    {
        extract($data);
        $this->db->query("update informasi set tgljam='$tgljam',judul='$judul',pdf='$pdf',youtube='$youtube',foto='$gambar' where kd_informasi='$kode'");
    }

    public function ambil_galeri($kode)
    {
        return $this->db->query("select foto from galeri where kd_informasi='$kode'");
    }

    public function hapus_galeri($kode)
    {
        $this->db->query("delete from galeri where kd_informasi='$kode'");
    }

    public function hapus($kode)
    {
        $this->db->query("delete from informasi where kd_informasi='$kode'");
    }

    public function cek_kode($foto)
    {
        return $this->db->query("select kd_informasi from informasi where foto='$foto' ");
    }

    /*
    public function adafoto($kode)
    {
        return $this->db->query("select * from galeri where kd_informasi='$kode' ")->num_rows();
    }

    public function galeribaru($data)
    {
        extract($data);
        $this->db->query("insert into galeri values('','','','$kode','$tgl','$nama','$foto','')");
    }

    public function galeriupdate($data)
    {
        extract($data);
        $this->db->query("update galeri set kd_informasi='$kode',nama='$nama' where foto='$foto'");
    }
    */
}