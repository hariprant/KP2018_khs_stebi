<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mahasiswa extends MY_Controller{

 public function __construct(){
  parent::__construct();
  $this->load->model('M_mahasiswa');
  $this->load->library('Pdf');
  $this->cekLogin();
    if ($this->session->userdata('level') == "dosen") {
      redirect('dosen');}
    if ($this->session->userdata('level') == "admin") {
      redirect('admin');}
}

  public function index()
  {    
    $this->session->set_flashdata('home','active');
    $this->session->set_flashdata('mhs','');
    $data['mahasiswa'] = $this->M_mahasiswa->profil();
    $this->load->view('mahasiswa/themes/nav', $data);
    $this->load->view('mahasiswa/mhs');
    $this->load->view('mahasiswa/themes/footer');
  }
  public function khs()
  {    
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('mhs','active');
    $data['mahasiswa'] = $this->M_mahasiswa->profil();
    $this->load->view('mahasiswa/themes/nav', $data);
    $data['nilai'] = $this->M_mahasiswa->rekap_nil();
    $this->load->view('mahasiswa/khs', $data);
    $this->load->view('mahasiswa/themes/footer');
  }
  public function khs_semester()
  {    
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('mhs','active');
    $data['mahasiswa'] = $this->M_mahasiswa->profil();
    $this->load->view('mahasiswa/themes/nav', $data);

    $thn_ajaran = $this->input->get('thn_ajaran_');
    $semester = $this->input->get('semester_');
    $data = array(
      'thn_ajaran' => $this->M_mahasiswa->get_thn_ajaran(),
      'thn_ajaran_selected' => $thn_ajaran,
      'semester_selected' => $semester,
      'nilai' => $this->M_mahasiswa->nilai_semester($thn_ajaran,$semester)
    );
    $this->load->view('mahasiswa/khs_semester', $data);
    $this->load->view('mahasiswa/themes/footer');
  }
  public function edt_pw()
  {    
    $data['mahasiswa'] = $this->M_mahasiswa->profil();
    $this->load->view('mahasiswa/themes/nav', $data);
    $this->load->view('mahasiswa/edt_pw');
    $this->load->view('mahasiswa/themes/footer');
  }
  public function profil()
  {    
    $data['mahasiswa'] = $this->M_mahasiswa->profil();
    $this->load->view('mahasiswa/themes/nav', $data);
    $this->load->view('mahasiswa/profil', $data);
    $this->load->view('mahasiswa/themes/footer');
  }
  public function cetak_pdf($thn_ajaran_selected, $semester_selected)
  {
    $thn_ajaran = $thn_ajaran_selected;
    $semester = $semester_selected;
    $data['nilai'] =$this->M_mahasiswa->nilai_semester($thn_ajaran,$semester);
    $this->load->view('mahasiswa/laporan',$data);

  }
  public function cetak_pdf_rekap()
  {
    $data['nilai'] = $this->M_mahasiswa->rekap_nil();
    $this->load->view('mahasiswa/laporan_rekap',$data);

  }
}
?>
