<?
class mod_detail extends CI_Model
{
    public function alamat()
    {
        return $this->db->query("select a.*,
                                        b.uraian as sejarah,
                                        c.video1,c.video2 
                                    from sekolah a
                                        inner join sejarah b
                                            on a.kd_sekolah=b.kd_sekolah
                                        inner join link_video c
                                            on a.kd_sekolah=c.kd_sekolah");
    }

    public function informasi($kode)
    {
        return $this->db->query("select * from informasi where kd_informasi='$kode'");
    }

    public function ada_galeri($kode)
    {
        return $this->db->query("select foto from galeri where kd_informasi='$kode'")->num_rows();
    }

    public function galeri($kode)
    {
        return $this->db->query("select nama,foto from galeri where kd_informasi='$kode'");
    }

    /*
    public function jmlgaleri($kode)
    {
        return $this->db->query("select * from galeri where kd_informasi='$kode'")->num_rows();
    }

    public function galeri($kode)
    {
        return $this->db->query("select * from galeri where kd_informasi='$kode'");
    }
    */
}