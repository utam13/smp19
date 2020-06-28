<?
class mod_kelola_staff extends CI_Model
{
    public function staff($start = 0, $end = 10, $q_cari)
    {
        return $this->db->query("select * from staff where $q_cari  order by jabatan ASC limit $start,$end");
    }

    public function jumlah_data($q_cari)
    {
        return $this->db->query("select * from staff where $q_cari ")->num_rows();
    }

    public function ambil($kode)
    {
        return $this->db->query("select * from staff where kd_staff='$kode'");
    }

    public function ada($nip)
    {
        return $this->db->query("select * from staff where nip='$nip' ")->num_rows();
    }

    public function simpan($data)
    {
        extract($data);
        $this->db->query("insert into staff values('$kode','$nip','$nama','$jabatan','$golongan','$link_facebook','$link_ig','$link_twitter','$foto')");
    }

    public function ubah($data)
    {
        extract($data);
        $this->db->query("update staff set nip='$nip',nama='$nama',jabatan='$jabatan',golongan='$golongan',link_facebook='$link_facebook',link_ig='$link_ig',link_twitter='$link_twitter',foto='$foto' where kd_staff='$kode'");
    }

    public function hapus($kode)
    {
        $this->db->query("delete from staff where kd_staff='$kode'");
    }
}