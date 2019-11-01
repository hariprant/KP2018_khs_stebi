<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends MY_Controller
{
  private $filename = "upload_nilai";
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_dosen');
    $this->cekLogin();
    if ($this->session->userdata('level') == "mhs") {
      redirect('mahasiswa');}
    if ($this->session->userdata('level') == "admin") {
      redirect('admin');}
}

  public function profil()
  {    
    $data['dosen'] = $this->M_dosen->profil();
    $this->load->view('dosen/themes/nav', $data);
    $this->load->view('dosen/profil', $data);
    $this->load->view('dosen/themes/footer');
  }
  public function index()
  {
    $this->session->set_flashdata('home','active');
    $this->session->set_flashdata('nilai','');
    $data['dosen'] = $this->M_dosen->profil();
    $this->load->view('dosen/themes/nav', $data);
    $this->load->view('dosen/dsn');
    $this->load->view('dosen/themes/footer');
  }
  public function nilai()
  {
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('nilai','active');
    $data['dosen'] = $this->M_dosen->profil();
    $this->load->view('dosen/themes/nav', $data);
    $data['nilai'] = $this->M_dosen->tampil();
    $this->load->view('dosen/nilai', $data);
    $this->load->view('dosen/themes/footer');
  }
  public function profil_mhs($nim,$kd_mk)
  {
    $data['dosen'] = $this->M_dosen->profil();
    $this->load->view('dosen/themes/nav', $data);
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('nilai','active');
    $data['profil'] = $this->M_dosen->profil_mhs($nim,$kd_mk);
    $this->load->view('dosen/profil_mhs', $data);
    $this->load->view('dosen/themes/footer');
  }
  // public function nil()
  // {
  //   $this->session->set_flashdata('home','');
  //   $this->session->set_flashdata('nilai','active');
  //   $data['dosen'] = $this->M_dosen->profil();
  //   $this->load->view('dosen/themes/nav', $data);
  //   $data['nilai'] = $this->M_dosen->tampil();
  //   $this->load->view('dosen/nilai_kelas', $data);
  //   $this->load->view('dosen/themes/footer');
  // }
  // public function form_pilih()
  // {
  //   $data = array(
  //     'matkul' => $this->M_dosen->get_matkul(),
  //     'thn_ajaran' => $this->M_dosen->get_thn_ajaran(),
  //     'kelas' => $this->M_dosen->get_kelas(),
  //     'matkul_selected' => '',
  //     'thn_ajaran_selected' => '',
  //     'kelas_selected' => '',
  //   );
  //   $this->load->view('dosen/form_pilih', $data);
  // }

  public function nilai_kelas()
  {
    $data['dosen'] = $this->M_dosen->profil();
    $this->load->view('dosen/themes/nav', $data);
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('nilai','active');

    $matkul = $this->input->get('matkul_');
    $thn_ajaran = $this->input->get('thn_ajaran_');
    $kelas = $this->input->get('kelas_');
    $data = array(
      'matkul' => $this->M_dosen->get_matkul(),
      'thn_ajaran' => $this->M_dosen->get_thn_ajaran(),
      'kelas' => $this->M_dosen->get_kelas(),
      'matkul_selected' => $matkul,
      'thn_ajaran_selected' => $thn_ajaran,
      'kelas_selected' => $kelas,
    );
    $data['nilai'] = $this->M_dosen->tampil_perKls($matkul,$thn_ajaran,$kelas);

    $this->load->view('dosen/nilai_kelas', $data);
    $this->load->view('dosen/themes/footer');
  }
  public function edit_nilai($id_nilai)
  {
    $data['dosen'] = $this->M_dosen->profil();
    $this->load->view('dosen/themes/nav', $data);
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('nilai','active');

    $data['edit']=$this->M_dosen->edt_nil($id_nilai);
    $this->load->view('dosen/edit_nilai', $data);
    $this->load->view('dosen/themes/footer');
  }
  public function simpan_edit_nilai()
  {
        $id_nilai = $this->input->post('id_nilai');
        $nim = $this->input->post('nim');
        $uts = $this->input->post('uts');
        $uas = $this->input->post('uas');
        $nilai = $this->input->post('nilai');
 
        $data['edit'] = $this->M_dosen->simpan_edit_user($id_nilai, $nim, $uts, $uas, $nilai);
        redirect(base_url("dosen/nilai"));
  }
  public function absen()
  {
    $this->load->view('dosen/themes/nav');
    $this->load->view('dosen/absen');
    $this->load->view('dosen/themes/footer');
  }
  public function export($matkul_selected,$thn_ajaran_selected,$kelas_selected)
  {
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    $excel = new PHPExcel();

    $excel->getProperties()->setCreator('Pranata')
                 ->setLastModifiedBy('Pranata')
                 ->setTitle("Data Nilai Mahasiswa")
                 ->setSubject("Mahasiswa")
                 ->setDescription("Data Nilai Mahasiswa Per-Kelas")
                 ->setKeywords("Data Nilai Mahasiswa");

    $style_col = array(
      'font' => array('bold' => true),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
      )
    );

    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
      )
    );

    $matkul = $matkul_selected;
    $thn_ajaran = $thn_ajaran_selected;
    $kelas = $kelas_selected;
    $data = $this->M_dosen->tampil_perKls($matkul,$thn_ajaran,$kelas);

    $excel->setActiveSheetIndex(0)->setCellValue('A1', "REKAP NILAI KELAS");
    $excel->getActiveSheet()->mergeCells('A1:E1');
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $numrow = 6;
    foreach($data as $mhs){
    $excel->setActiveSheetIndex(0)->setCellValue('A2', " ");
    $excel->setActiveSheetIndex(0)->setCellValue('A3', " ");
    $excel->setActiveSheetIndex(0)->setCellValue('B2', "Fakultas");
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "Program Studi");
    $excel->setActiveSheetIndex(0)->setCellValue('C2', ": ".$mhs->fakul);
    $excel->setActiveSheetIndex(0)->setCellValue('C3', ": ".$mhs->prodi);
    $excel->setActiveSheetIndex(0)->setCellValue('D2', "Semester/Thn.Akademik");
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "Matakuliah/Kelas");
    $excel->setActiveSheetIndex(0)->setCellValue('E2', ": ".$mhs->semester." / ".$mhs->thn_ajaran);
    $excel->setActiveSheetIndex(0)->setCellValue('E3', ": ".$mhs->matkul." / ".$mhs->kelas);

    $excel->setActiveSheetIndex(0)->setCellValue('A5', "id_nilai");
    $excel->setActiveSheetIndex(0)->setCellValue('B5', "NIM");
    $excel->setActiveSheetIndex(0)->setCellValue('C5', "UTS");
    $excel->setActiveSheetIndex(0)->setCellValue('D5', "UAS");
    $excel->setActiveSheetIndex(0)->setCellValue('E5', "NILAI");

    $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);

      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $mhs->id_nilai);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $mhs->nim);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $mhs->uts);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $mhs->uas);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $mhs->nilai);
      
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      
      $numrow++;
    }

    // $excel->getActiveSheet()->getProtection()->setPassword('PHPExcel');
    // $excel->getActiveSheet()->getProtection()->setSheet(true);
    // // $excel->getActiveSheet()->getProtection()->setSort(true);
    // // $excel->getActiveSheet()->getProtection()->setInsertRows(true);
    // // $excel->getActiveSheet()->getProtection()->setFormatCells(true);  
    // $excel->getActiveSheet()->protectCells('A1:E50', $this->session->userdata('id'));

    $excel->getActiveSheet()->getColumnDimension('A')->setVisible(false);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    $excel->getActiveSheet(0)->setTitle("Laporan Data Nilai Mahasiswa");
    $excel->setActiveSheetIndex(0);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Nilai Mahasiswa.xlsx"');
    header('Cache-Control: max-age=0');

    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');

  }
  // public function input()
  // {
  //   $this->load->view('Dosen/form-input');
  // }
  // public function proses_input()
  // {
  //   /*-----------Menangkap Data Dari Form------------------*/
  //   $akun_mahasiswa = array(
  //      'username' => $this->input->post('username'),
  //      'password' => md5($this->input->post('password')),
  //      'level' => $this->input->post('level'),
  //      'active' => $this->input->post('active'));
  //   /*-------Mengambil id users dan mengirimkan ke model-----*/
  //   $id_akun = $this->data_mahasiswa->tambah_akun($akun_mahasiswa);

  //   /*-----------Menangkap Data Dari Form------------------*/
  //   $data_mahasiswa = array(
  //      'nama' => $this->input->post('nama'),
  //      'jenkel' => $this->input->post('jenkel'),
  //      'tgl_lahir' => $this->input->post('tgl'),
  //      'alamat' => $this->input->post('alamat'),
  //      'akun'     => $id_akun); //Memasukan id yang ada di variabel $id_akun
  //   $proses = $this->data_mahasiswa->tambah_mahasiswa($data_mahasiswa); //mengirimkan data ke model
  //   redirect('dosen/dosen'); //mengembalikan halaman setelah berhasil menginputkan data
  // }
  
  // public function data(){
  //   $data['nilai'] = $this->M_data->tampil(); //memanggil function tampil di model m_data
  //   $this->load->view('Dosen/tampil_data', $data); //memasukan data tersebut ke view tampil_data
  // }

  // public function upnilai()
  // {
  //   $data['nilai'] = $this->M_dosen->view();
  //   $this->load->view('dosen/nilai', $data);
  // }

  public function form($matkul_selected,$thn_ajaran_selected,$kelas_selected)
  {
    $data['dosen'] = $this->M_dosen->profil();
    $this->load->view('dosen/themes/nav', $data);
    $this->session->set_flashdata('home','');
    $this->session->set_flashdata('nilai','active');

    $data = array(); // Buat variabel $data sebagai array
    $data['matkul_selected'] = $matkul_selected;
    $data['thn_ajaran_selected'] = $thn_ajaran_selected;
    $data['kelas_selected'] = $kelas_selected;   
    
    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->M_dosen->upload_file($this->filename);
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet; 
      }else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    
    $this->load->view('Dosen/formUpNil', $data);
    $this->load->view('dosen/themes/footer');
  }

  public function import()
  {
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx');
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    $data = [];
    
    $numrow = 5;
    foreach($sheet as $row){
      if($numrow > 5){
        array_push($data, [
          'id_nilai'=>$row['A'],
          'nim'=>$row['B'],
          'uts'=>$row['C'],
          'uas'=>$row['D'],
          'nilai'=>$row['E'],
        ]);
      }
      
      $numrow++;
    }

    $this->M_dosen->update_multiple($data);
    
    redirect("dosen/nilai");
  }

  public function get_kelas()
  {
    $this->data['kelas'] = $this->M_dosen->get_kelas();
    $this->load->view('dosen/kelas', $this->data);
  }
}
