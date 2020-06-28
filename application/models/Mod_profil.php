<?
class mod_profil extends CI_Model
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

    public function kepsek()
    {
        return $this->db->query("select * from staff where jabatan='Kepala Sekolah' order by kd_staff DESC limit 0,1");
    }

    public function staff($start = 0, $end = 10)
    {
        return $this->db->query("select * from staff where jabatan='Kepala Sekolah' order by nama ASC limit $start,$end");
    }

    public function jumlah_data()
    {
        return $this->db->query("select * from staff where jabatan='Kepala Sekolah'")->num_rows();
    }
}