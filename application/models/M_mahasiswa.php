<?php
class M_mahasiswa extends CI_Model {
  public function __construct() {
        parent::__construct();
  }

  public function profil()
  {
    $this->db->select('*');
    $this->db->from('mahasiswa');
    $this->db->where('nim', $this->session->userdata('id'));
    $data = $this->db->get();
    return $data->result();
  }

  //Model KHS
  public function rekap_nil(){
    $this->db->select('nilai.*, prodi.prodi, mahasiswa.nim, mahasiswa.nama, mahasiswa.semester, kelas.kelas, matkul.kd_mk, matkul.matkul, matkul.sks');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'nilai.nim = mahasiswa.nim');
    $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');
    $this->db->join('kelas', 'mahasiswa.id_kelas = kelas.id_kelas');
    $this->db->join('mengampu', 'nilai.id_ampu = mengampu.id_ampu');
    $this->db->join('matkul', 'mengampu.kd_mk = matkul.kd_mk');
    $this->db->join('dosen', 'mengampu.nip = dosen.nip');
    $this->db->order_by('matkul.semester', "asc");
    $this->db->where('mahasiswa.nim', $this->session->userdata('id'));

    $data = $this->db->get();
    return $data->result();
  }
  public function get_thn_ajaran()
  {
    $this->db->join('mahasiswa', 'nilai.nim = mahasiswa.nim');
    $this->db->join('mengampu', 'nilai.id_ampu = mengampu.id_ampu');
    $this->db->join('matkul', 'mengampu.kd_mk = matkul.kd_mk');
    $this->db->group_by('thn_ajaran');
    $this->db->where('mahasiswa.nim', $this->session->userdata('id'));
    return $this->db->get('nilai')->result();
  }
  public function get_semester()
  {
    $this->db->join('mahasiswa', 'nilai.nim = mahasiswa.nim');
    $this->db->join('mengampu', 'nilai.id_ampu = mengampu.id_ampu');
    $this->db->join('matkul', 'mengampu.kd_mk = matkul.kd_mk');
    $this->db->group_by('matkul.semester');
    $this->db->where('mahasiswa.nim', $this->session->userdata('id'));
    return $this->db->get('nilai')->result();
  }
  public function nilai_semester($thn_ajaran,$semester){
    $this->db->select('nilai.*, prodi.prodi, mahasiswa.nim, mahasiswa.nama, kelas.kelas, matkul.kd_mk, matkul.matkul, matkul.sks, matkul.semester');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'nilai.nim = mahasiswa.nim');
    $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');
    $this->db->join('kelas', 'mahasiswa.id_kelas = kelas.id_kelas');
    $this->db->join('mengampu', 'nilai.id_ampu = mengampu.id_ampu');
    $this->db->join('matkul', 'mengampu.kd_mk = matkul.kd_mk');
    $this->db->join('dosen', 'mengampu.nip = dosen.nip');
    $this->db->order_by('matkul.semester', "asc");
    $array = array('mahasiswa.nim' => $this->session->userdata('id'));
    $this->db->where($array);

    $smt_ganjil = array('1','3','5','7','9');
    $smt_genap = array('2','4','6','8','10');
    if ($semester == 2) {
      $this->db->where('mengampu.thn_ajaran', $thn_ajaran);
      $this->db->where_in('matkul.semester', $smt_genap);
    }elseif($semester == 1){
      $this->db->where('mengampu.thn_ajaran', $thn_ajaran);
      $this->db->where_in('matkul.semester', $smt_ganjil);
    }

    $data = $this->db->get();
    return $data->result();
  }
}