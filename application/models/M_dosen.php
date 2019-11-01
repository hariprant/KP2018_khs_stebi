<?php
class M_dosen extends CI_Model {
  public function __construct() {
        parent::__construct();
  }

  public function profil()
  {
    $this->db->select('*');
    $this->db->from('dosen');
    $this->db->where('nip', $this->session->userdata('id'));
    $data = $this->db->get();
    return $data->result();
  }

  public function tampil(){
    $this->db->select('nilai.*, mahasiswa.nim, mahasiswa.nama, mahasiswa.semester, kelas.kelas, matkul.matkul, matkul.sks, nilai.uts, nilai.uas, nilai.nilai');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'nilai.nim = mahasiswa.nim');
    $this->db->join('kelas', 'mahasiswa.id_kelas = kelas.id_kelas');
    $this->db->join('mengampu', 'nilai.id_ampu = mengampu.id_ampu');
    $this->db->join('matkul', 'mengampu.kd_mk = matkul.kd_mk');
    $this->db->join('dosen', 'mengampu.nip = dosen.nip');
    $this->db->where('dosen.nip', $this->session->userdata('id'));
    $data = $this->db->get();
    return $data->result();
  }
  public function profil_mhs($nim,$kd_mk){
    $this->db->select('mengambil.*, mahasiswa.*');
    $this->db->from('mengambil');
    $this->db->join('mahasiswa', 'mengambil.nim = mahasiswa.nim');
    $this->db->join('kelas', 'mahasiswa.id_kelas = kelas.id_kelas');
    $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');
    $this->db->join('matkul', 'mengambil.kd_mk = matkul.kd_mk');
    $this->db->join('dosen', 'mengambil.nip = dosen.nip');
    $array = array('dosen.nip' => $this->session->userdata('id'), 'mahasiswa.nim' => $nim, 'matkul.kd_mk' => $kd_mk);
    $this->db->where($array);
    $data = $this->db->get();
    return $data->result();
  }
  public function get_matkul()
  {
    $this->db->join('matkul', 'mengampu.kd_mk = matkul.kd_mk');
    $this->db->join('dosen', 'mengampu.nip = dosen.nip');
    $this->db->order_by('matkul','asc');
    $this->db->where('dosen.nip', $this->session->userdata('id'));
    return $this->db->get('mengampu')->result();
  }
  public function get_thn_ajaran()
  {
    $this->db->join('matkul', 'mengampu.kd_mk = matkul.kd_mk');
    $this->db->join('dosen', 'mengampu.nip = dosen.nip');
    $this->db->group_by('thn_ajaran');
    $this->db->where('dosen.nip', $this->session->userdata('id'));
    return $this->db->get('mengampu')->result();
  }
    public function get_kelas()
  {
    $this->db->join('mahasiswa', 'nilai.nim = mahasiswa.nim');
    $this->db->join('kelas', 'mahasiswa.id_kelas = kelas.id_kelas');
    $this->db->join('mengampu', 'nilai.id_ampu = mengampu.id_ampu');
    $this->db->join('matkul', 'mengampu.kd_mk = matkul.kd_mk');
    $this->db->join('dosen', 'mengampu.nip = dosen.nip');
    $this->db->group_by('kelas');
    $this->db->where('dosen.nip', $this->session->userdata('id'));
    return $this->db->get('nilai')->result();
  }

  public function tampil_perKls($matkul, $thn_ajaran, $kelas){
    $this->db->select('nilai.*, fakultas.fakul, prodi.prodi, mahasiswa.nim, mahasiswa.nama, mengampu.thn_ajaran, matkul.kd_mk, matkul.matkul, kelas.kelas, matkul.semester, nilai.uts, nilai.uas, nilai.nilai');
    $this->db->from('nilai');
    $this->db->join('mahasiswa', 'nilai.nim = mahasiswa.nim');
    $this->db->join('kelas', 'mahasiswa.id_kelas = kelas.id_kelas');
    $this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');
    $this->db->join('fakultas', 'prodi.id_fakul = fakultas.id_fakul');
    $this->db->join('mengampu', 'nilai.id_ampu = mengampu.id_ampu');
    $this->db->join('matkul', 'mengampu.kd_mk = matkul.kd_mk');
    $this->db->join('dosen', 'mengampu.nip = dosen.nip');
    $array = array('dosen.nip' => $this->session->userdata('id'), 'matkul.kd_mk' => $matkul, 'mengampu.thn_ajaran' => $thn_ajaran, 'kelas.id_kelas' => $kelas);
    $this->db->where($array);

    $data = $this->db->get();
    return $data->result();
  }

  public function edt_nil($id_nilai)
  {
    $q="SELECT * FROM  nilai WHERE id_nilai='$id_nilai'";
    $query=$this->db->query($q);
    return $query->row();
  }

  public function simpan_edit_user($id_nilai, $nim, $uts, $uas, $nilai)
  {
    $data = array(
        'id_nilai'   => $id_nilai,
        'nim'        => $nim,
        'uts'        => $uts,
        'uas'        => $uas,     
        'nilai'      => $nilai
        );
    $this->db->where('id_nilai', $id_nilai);
    $this->db->update('nilai', $data);    
  }

  // Fungsi untuk melakukan proses upload file
  public function upload_file($filename){
    $this->load->library('upload'); // Load librari upload
    
    $config['upload_path'] = './excel/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size'] = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;
  
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  public function update_multiple($data){
    $this->db->update_batch('nilai', $data, 'id_nilai' );
  }

  // public function get_kelas()
  // {
  //   return $this->db->get("kelas");
  // }
}
?>