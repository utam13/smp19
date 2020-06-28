<?
class mod_galeri extends CI_Model
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

    public function ekskul($kode)
    {
        return $this->db->query("select nama,foto from ekskul where kd_ekskul='$kode'");
    }

    public function fasilitas($kode)
    {
        return $this->db->query("select nama,foto from fasilitas where kd_fasilitas='$kode'");
    }

    public function informasi($kode)
    {
        return $this->db->query("select foto from informasi where kd_informasi='$kode'");
    }

    public function galeri($start = 0, $end = 10, $query)
    {
        return $this->db->query("select * from galeri where $query and utama<>'1' order by tgl DESC limit $start,$end");
    }

    public function jumlah_data($query)
    {
        return $this->db->query("select * from galeri where $query")->num_rows();
    }
}