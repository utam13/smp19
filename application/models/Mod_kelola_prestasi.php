<?
class mod_kelola_prestasi extends CI_Model
{
    public function prestasi($start = 0, $end = 10, $q_cari)
    {
        return $this->db->query("select * from prestasi where $q_cari  order by kd_prestasi DESC limit $start,$end");
    }

    public function jumlah_data($q_cari)
    {
        return $this->db->query("select * from prestasi where $q_cari ")->num_rows();
    }

    public function ambil($kode)
    {
        return $this->db->query("select * from prestasi where kd_prestasi='$kode'");
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("insert into prestasi values('$kode','$tahun','$nama','$lokasi','$uraian','$foto')");
    }

    public function ubah($data)
    {
        extract($data);
        $this->db->query("update prestasi set tahun='$tahun',nama='$nama',lokasi='$lokasi',uraian='$uraian',foto='$foto' where kd_prestasi='$kode'");
    }

    public function ambil_galeri($kode)
    {
        return $this->db->query("select foto from galeri where kd_prestasi='$kode'");
    }

    public function hapus_galeri($kode)
    {
        $this->db->query("delete from galeri where kd_prestasi='$kode'");
    }

    public function hapus($kode)
    {
        $this->db->query("delete from prestasi where kd_prestasi='$kode'");
    }

    public function cek_kode($foto)
    {
        return $this->db->query("select kd_prestasi from prestasi where foto='$foto' ");
    }

    public function adafoto($kode)
    {
        return $this->db->query("select * from galeri where kd_prestasi='$kode' ")->num_rows();
    }

    public function galeribaru($data)
    {
        extract($data);
        $this->db->query("insert into galeri values('','$kode','','','$tgl','$nama','$foto','1')");
    }

    public function galeriupdate($data)
    {
        extract($data);
        $this->db->query("update galeri set kd_prestasi='$kode',nama='$nama' where foto='$foto'");
    }
}