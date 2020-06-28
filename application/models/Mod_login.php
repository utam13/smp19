<?
class mod_login extends CI_Model
{
    public function cek_user($username, $password)
    {
        return $this->db->query("select * from sekolah where usercms='$username' and passcms='$password'")->num_rows();
    }

    public function resetpass($username, $password)
    {
        $this->db->query("update sekolah set usercms='$username',passcms='$password' where kd_sekolah<>'0'");
    }
}
