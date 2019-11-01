<?php
class M_admin extends CI_model{
  public function __construct() {
        parent::__construct();
  }
  //admin
  public function profil()
  {
  	$this->db->select('nama_admin, username');
    $this->db->from('admin');
    $this->db->where('username', $this->session->userdata('id'));
    $data = $this->db->get();
    return $data->result();
  }
   public function lihat_adm()
  {
  	$this->db->select('*');
    $this->db->from('admin');
    $data = $this->db->get();
    return $data->result();
  }
  public function input_adm($data,$table)
  {
  	$this->db->insert($table,$data);
  }	
  public function edt_adm($id_admin)
  {
  	$q="SELECT * FROM  admin WHERE id_admin='$id_admin'";
    $query=$this->db->query($q);
    return $query->row();
  }
  public function simpan_edt_adm($id_admin, $nama_admin, $username, $passwd)
  {
    $data = array(
        'id_admin'   => $id_admin,
        'nama_admin' => $nama_admin,
        'username'   => $username,
        'passwd'     => md5($passwd)    
        );
    $this->db->where('id_admin', $id_admin);
    $this->db->update('admin', $data);    
  }
  //dosen
  public function lihat_dosen()
  {
  	$this->db->select('*');
    $this->db->from('dosen');
    $data = $this->db->get();
    return $data->result();
  }
  //mhs
  public function lihat_mhs()
  {
  	$this->db->select('*');
    $this->db->from('mahasiswa');
    $data = $this->db->get();
    return $data->result();
  }
  //matkul
  public function lihat_matkul()
  {
  	$this->db->select('*');
    $this->db->from('matkul');
    $data = $this->db->get();
    return $data->result();
  }
  public function input_mk($data,$table)
  {
  	$this->db->insert($table,$data);
  }	
  public function edt_mk($kd_mk)
  {
  	$q="SELECT * FROM matkul WHERE kd_mk='$kd_mk'";
    $query=$this->db->query($q);
    return $query->row();
  }
  public function simpan_edt_mk($kd_mk, $matkul, $sks, $semester)
  {
    $data = array(
        'kd_mk'   => $kd_mk,
        'matkul' => $matkul,
        'sks'   => $sks,
        'semester' => $semester  
        );
    $this->db->where('kd_mk', $kd_mk);
    $this->db->update('matkul', $data);    
  }
  //kelas
  public function lihat_kelas()
  {
  	$this->db->select('*');
    $this->db->from('kelas');
    $data = $this->db->get();
    return $data->result();
  }
  public function input_kls($data,$table)
  {
  	$this->db->insert($table,$data);
  }	
  public function edt_kls($id_kelas)
  {
  	$q="SELECT * FROM kelas WHERE id_kelas='$id_kelas'";
    $query=$this->db->query($q);
    return $query->row();
  }
  public function simpan_edt_kls($id_kelas, $kelas)
  {
    $data = array(
        'id_kelas'   => $id_kelas,
        'kelas' => $kelas
        );
    $this->db->where('id_kelas', $id_kelas);
    $this->db->update('kelas', $data);    
  }
  //prodi
  public function lihat_prodi()
  {
  	$this->db->select('*');
    $this->db->from('prodi');
    $data = $this->db->get();
    return $data->result();
  }
  //fakul
  public function lihat_fakul()
  {
  	$this->db->select('*');
    $this->db->from('fakultas');
    $data = $this->db->get();
    return $data->result();
  }
  //ampu
  public function lihat_ampu()
  {
    $this->db->select('*');
    $this->db->from('mengampu');
    $data = $this->db->get();
    return $data->result();
  }
  public function input_ampu($data,$table)
  {
    $this->db->insert($table,$data);
  } 
  public function edt_ampu($id_ampu)
  {
    $q="SELECT * FROM mengampu WHERE id_ampu='$id_ampu'";
    $query=$this->db->query($q);
    return $query->row();
  }
  public function simpan_edt_ampu($id_ampu, $nip, $kd_mk, $thn_ajaran)
  {
    $data = array(
        'id_ampu'   => $id_ampu,
        'nip' => $nip,
        'kd_mk'   => $kd_mk,
        'thn_ajaran' => $thn_ajaran  
        );
    $this->db->where('id_ampu', $id_ampu);
    $this->db->update('mengampu', $data);    
  }

}