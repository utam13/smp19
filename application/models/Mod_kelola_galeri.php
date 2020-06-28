<?
class mod_kelola_galeri extends CI_Model
{
    public function galeri($start = 0, $end = 10, $q_cari)
    {
        return $this->db->query("select * from galeri where $q_cari limit $start,$end");
    }

    public function jumlah_data($q_cari)
    {
        return $this->db->query("select * from galeri where $q_cari ")->num_rows();
    }

    public function ekskul($kode)
    {
        return $this->db->query("select nama from ekskul where kd_ekskul='$kode'");
    }

    public function fasilitas($kode)
    {
        return $this->db->query("select nama from fasilitas where kd_fasilitas='$kode'");
    }

    public function informasi($kode)
    {
        return $this->db->query("select judul from informasi where kd_informasi='$kode'");
    }

    public function ambil_galeri($kode)
    {
        return $this->db->query("select * from galeri where kd_galeri='$kode'");
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("insert into galeri values('','$kd_ekskul','$kd_fasilitas','$kd_informasi','$tgl','$judul','$foto','$utama')");
    }

    public function bersihkan_utama($query)
    {
        $this->db->query("update galeri set utama='0' where $query");
    }

    public function utama($kode)
    {
        $this->db->query("update galeri set utama='1' where kd_galeri='$kode'");
    }

    public function hapus($kode)
    {
        $this->db->query("delete from galeri where kd_galeri='$kode'");
    }
}