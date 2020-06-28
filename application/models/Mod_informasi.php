<?
class mod_informasi extends CI_Model
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
        //return $this->db->query("select foto from galeri where kd_informasi<>'0' and utama='1'");
        return $this->db->query("select foto from informasi order by tgljam DESC limit 0,1");
    }

    public function informasi($start = 0, $end = 10)
    {
        return $this->db->query("select * from informasi order by tgljam DESC limit $start,$end");
    }

    public function jumlah_data()
    {
        return $this->db->query("select * from informasi ")->num_rows();
    }
}