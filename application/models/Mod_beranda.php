<?
class mod_beranda extends CI_Model
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

    public function staff($start = 0, $end = 10, $qcari)
    {
        return $this->db->query("select * from staff where $qcari order by golongan DESC limit $start,$end");
    }

    public function kepsek()
    {
        return $this->db->query("select * from staff where jabatan='Kepala Sekolah' order by kd_staff DESC limit 0,1");
    }

    public function jumlah_data($qcari)
    {
        return $this->db->query("select * from staff where $qcari")->num_rows();
    }

    public function informasi()
    {
        return $this->db->query("select * from informasi order by tgljam DESC limit 0,6");
    }
}