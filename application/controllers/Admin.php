<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{

 public function __construct(){
  parent::__construct();
  $this->load->model('M_admin');
  $this->cekLogin();
  //validasi jika session dengan level manager mengakses halaman ini maka akan dialihkan ke halaman manager
    if ($this->session->userdata('level') == "mhs") {
      redirect('mahasiswa');}
    if ($this->session->userdata('level') == "dosen") {
      redirect('dosen');}
}

  public function index()
  {
    $this->session->set_flashdata('home','active');
    $this->session->set_flashdata('master','');
    $this->session->set_flashdata('admin','');
    $this->session->set_flashdata('dosen','');
    $this->session->set_flashdata('mhs','');
    $this->session->set_flashdata('matkul','');
    $this->session->set_flashdata('kelas','');
    $this->session->set_flashdata('prodi','');
    $this->session->set_flashdata('fakul','');
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $this->load->view('admin/adm');
    $this->load->view('admin/themes/footer');
  }
  public function data_admin()
  {
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('master','active');
    $this->session->set_flashdata('admin','active');
    $this->session->set_flashdata('dosen','');
    $this->session->set_flashdata('mhs','');
    $this->session->set_flashdata('matkul','');
    $this->session->set_flashdata('kelas','');
    $this->session->set_flashdata('prodi','');
    $this->session->set_flashdata('fakul','');
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $data['adm'] = $this->M_admin->lihat_adm();
    $this->load->view('admin/data_admin', $data);
    $this->load->view('admin/themes/footer');
  }
  public function input_adm()
  {
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $this->load->view('admin/input_adm');
    $this->load->view('admin/themes/footer');
  }
  public function aksi_input_adm()
  {
    $nama_admin = $this->input->post('nama_admin');
    $username = $this->input->post('username');
    $passwd = $this->input->post('passwd');
 
    $data = array(
      'nama_admin' => $nama_admin,
      'username' => $username,
      'passwd' => md5($passwd)
      );
    $this->M_admin->input_adm($data,'admin');
    redirect(base_url("admin/data_admin"));
  }
  public function edt_adm($id_admin)
  {
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $data['edit']=$this->M_admin->edt_adm($id_admin);
    $this->load->view('admin/edt_adm', $data);
    $this->load->view('admin/themes/footer');
  }
  public function simpan_edt_adm()
  {
    $id_admin = $this->input->post('id_admin');
    $nama_admin = $this->input->post('nama_admin');
    $username = $this->input->post('username');
    $passwd = $this->input->post('passwd');
 
    $data['edit'] = $this->M_admin->simpan_edt_adm($id_admin, $nama_admin, $username, $passwd);
    redirect(base_url("admin/data_admin"));
  }

  public function data_dosen()
  {
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('master','active');
    $this->session->set_flashdata('admin','');
    $this->session->set_flashdata('dosen','active');
    $this->session->set_flashdata('mhs','');
    $this->session->set_flashdata('matkul','');
    $this->session->set_flashdata('kelas','');
    $this->session->set_flashdata('prodi','');
    $this->session->set_flashdata('fakul','');
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $data['dosen'] = $this->M_admin->lihat_dosen();
    $this->load->view('admin/data_dosen', $data);
    $this->load->view('admin/themes/footer');
  }
  public function data_mhs()
  {
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('master','active');
    $this->session->set_flashdata('admin','');
    $this->session->set_flashdata('dosen','');
    $this->session->set_flashdata('mhs','active');
    $this->session->set_flashdata('matkul','');
    $this->session->set_flashdata('kelas','');
    $this->session->set_flashdata('prodi','');
    $this->session->set_flashdata('fakul','');
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $data['mahasiswa'] = $this->M_admin->lihat_mhs();
    $this->load->view('admin/data_mhs', $data);
    $this->load->view('admin/themes/footer');
  }
  public function data_matkul()
  {
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('master','active');
    $this->session->set_flashdata('admin','');
    $this->session->set_flashdata('dosen','');
    $this->session->set_flashdata('mhs','');
    $this->session->set_flashdata('matkul','active');
    $this->session->set_flashdata('kelas','');
    $this->session->set_flashdata('prodi','');
    $this->session->set_flashdata('fakul','');
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $data['matkul'] = $this->M_admin->lihat_matkul();
    $this->load->view('admin/data_matkul', $data);
    $this->load->view('admin/themes/footer');
  }
  public function input_mk()
  {
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $this->load->view('admin/input_mk');
    $this->load->view('admin/themes/footer');
  }
  public function aksi_input_mk()
  {
    $kd_mk = $this->input->post('kd_mk');
    $matkul = $this->input->post('matkul');
    $sks = $this->input->post('sks');
    $semester = $this->input->post('semester');
 
    $data = array(
      'kd_mk' => $kd_mk,
      'matkul' => $matkul,
      'sks' => $sks,
      'semester' => $semester
      );
    $this->M_admin->input_mk($data,'matkul');
    redirect(base_url("admin/data_matkul"));
  }
  public function edt_mk($kd_mk)
  {
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $data['edit']=$this->M_admin->edt_mk($kd_mk);
    $this->load->view('admin/edt_mk', $data);
    $this->load->view('admin/themes/footer');
  }
  public function simpan_edt_mk()
  {
    $kd_mk = $this->input->post('kd_mk');
    $matkul = $this->input->post('matkul');
    $sks = $this->input->post('sks');
    $semester = $this->input->post('semester');
 
    $data['edit'] = $this->M_admin->simpan_edt_mk($kd_mk, $matkul, $sks, $semester);
    redirect(base_url("admin/data_matkul"));
  }
  public function data_kelas()
  {
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('master','active');
    $this->session->set_flashdata('admin','');
    $this->session->set_flashdata('dosen','');
    $this->session->set_flashdata('mhs','');
    $this->session->set_flashdata('matkul','');
    $this->session->set_flashdata('kelas','active');
    $this->session->set_flashdata('prodi','');
    $this->session->set_flashdata('fakul','');
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $data['kelas'] = $this->M_admin->lihat_kelas();
    $this->load->view('admin/data_kelas', $data);
    $this->load->view('admin/themes/footer');
  }
  public function input_kls()
  {
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $this->load->view('admin/input_kls');
    $this->load->view('admin/themes/footer');
  }
  public function aksi_input_kls()
  {
    $id_kelas = $this->input->post('id_kelas');
    $kelas = $this->input->post('kelas');
 
    $data = array(
      'id_kelas' => $id_kelas,
      'kelas' => $kelas
      );
    $this->M_admin->input_kls($data,'kelas');
    redirect(base_url("admin/data_kelas"));
  }
  public function edt_kls($id_kelas)
  {
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $data['edit']=$this->M_admin->edt_kls($id_kelas);
    $this->load->view('admin/edt_kls', $data);
    $this->load->view('admin/themes/footer');
  }
  public function simpan_edt_kls()
  {
    $id_kelas = $this->input->post('id_kelas');
    $kelas = $this->input->post('kelas');
 
    $data['edit'] = $this->M_admin->simpan_edt_kls($id_kelas, $kelas);
    redirect(base_url("admin/data_kelas"));
  }
  public function data_prodi()
  {
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('master','active');
    $this->session->set_flashdata('admin','');
    $this->session->set_flashdata('dosen','');
    $this->session->set_flashdata('mhs','');
    $this->session->set_flashdata('matkul','');
    $this->session->set_flashdata('kelas','');
    $this->session->set_flashdata('prodi','active');
    $this->session->set_flashdata('fakul','');
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $data['prodi'] = $this->M_admin->lihat_prodi();
    $this->load->view('admin/data_prodi', $data);
    $this->load->view('admin/themes/footer');
  }
  public function data_fakul()
  {
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('master','active');
    $this->session->set_flashdata('admin','');
    $this->session->set_flashdata('dosen','');
    $this->session->set_flashdata('mhs','');
    $this->session->set_flashdata('matkul','');
    $this->session->set_flashdata('kelas','');
    $this->session->set_flashdata('prodi','');
    $this->session->set_flashdata('fakul','active');
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $data['fakultas'] = $this->M_admin->lihat_fakul();
    $this->load->view('admin/data_fakul', $data);
    $this->load->view('admin/themes/footer');
  }

  //Transaksi
    public function data_ampu()
  {
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('master','');
    $this->session->set_flashdata('admin','');
    $this->session->set_flashdata('dosen','');
    $this->session->set_flashdata('mhs','');
    $this->session->set_flashdata('matkul','');
    $this->session->set_flashdata('kelas','');
    $this->session->set_flashdata('prodi','');
    $this->session->set_flashdata('fakul','');
    $this->session->set_flashdata('manipulasi','active');
    $this->session->set_flashdata('mengampu','active');
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $data['mengampu'] = $this->M_admin->lihat_ampu();
    $this->load->view('admin/data_ampu', $data);
    $this->load->view('admin/themes/footer');
  }
  public function input_ampu()
  {
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $this->load->view('admin/input_ampu');
    $this->load->view('admin/themes/footer');
  }
  public function aksi_input_ampu()
  {
    $id_ampu = $this->input->post('id_ampu');
    $nip = $this->input->post('nip');
    $kd_mk = $this->input->post('kd_mk');
    $thn_ajaran = $this->input->post('thn_ajaran');
 
    $data = array(
      'nip' => $nip,
      'kd_mk' => $kd_mk,
      'thn_ajaran' => $thn_ajaran
      );
    $this->M_admin->input_mk($data,'mengampu');
    redirect(base_url("admin/data_ampu"));
  }
  public function edt_ampu($id_ampu)
  {
    $data['admin'] = $this->M_admin->profil();
    $this->load->view('admin/themes/nav', $data);
    $data['edit']=$this->M_admin->edt_ampu($id_ampu);
    $this->load->view('admin/edt_ampu', $data);
    $this->load->view('admin/themes/footer');
  }
  public function simpan_edt_ampu()
  {
    $id_ampu = $this->input->post('id_ampu');
    $nip = $this->input->post('nip');
    $kd_mk = $this->input->post('kd_mk');
    $thn_ajaran = $this->input->post('thn_ajaran');
 
    $data['edit'] = $this->M_admin->simpan_edt_ampu($id_ampu, $nip, $kd_mk, $thn_ajaran);
    redirect(base_url("admin/data_ampu"));
  } 

}
