<?
class mod_sekolah extends CI_Model
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

    public function simpan($data)
    {
        extract($data);
        $this->db->query("update sekolah set alamat='$alamat',telp='$telp',email='$email',website='$website',visi='$visi',misi='$misi',motto='$motto',link_googlemap='$link_googlemap',link_facebook='$link_facebook',link_ig='$link_ig',link_twitter='$link_twitter',link_youtube='$link_youtube',link_ppdb='$link_ppdb',logo='$logo',beranda='$beranda',profil='$profil',ekskul='$ekskul',fasilitas='$fasilitas',berita='$berita',galeri='$galeri',kontak='$kontak',usercms='$username',passcms='$password' where kd_sekolah<>'0'");
    }

    public function simpan_sejarah($sejarah)
    {
        $this->db->query("update sejarah set uraian='$sejarah' where kd_sekolah<>'0'");
    }

    public function simpan_video($data)
    {
        extract($data);
        $this->db->query("update link_video set video1='$video1',video2='$video2' where kd_sekolah<>'0'");
    }
}