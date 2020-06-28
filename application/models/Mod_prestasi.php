<?
class mod_prestasi extends CI_Model
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

    public function galeri_utama()
    {
        return $this->db->query("select foto from galeri where kd_prestasi<>'0' and utama='1'");
    }

    public function prestasi($start = 0, $end = 10, $query)
    {
        return $this->db->query("select * from prestasi where $query order by tahun DESC limit $start,$end");
    }

    public function jumlah_data($query)
    {
        return $this->db->query("select * from prestasi where $query")->num_rows();
    }
}
