   <section class="content">
        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="btn-group btn-group-lg" role="group">
                    <button type="button" class="btn btn-primary waves-effect" onclick="location.href='<?php echo base_url("mahasiswa/khs"); ?>'">Rekap</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="location.href='<?php echo base_url("mahasiswa/khs_semester"); ?>'">Kelas</button>
                  </div>
                  <p></p>
                </div>
            
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="row" style="margin-bottom:10px;">
                    <form action="<?php echo site_url('mahasiswa/khs_semester') ?>" method="get">
                    <div class="col-md-4"><div class="form-group">
                        <select class="form-control" name="thn_ajaran_" id="thn_ajaran">
                            <option value="">Pilih Thn Ajrn</option>
                            <?php
                            foreach ($thn_ajaran as $thn) {
                                ?>
                                <option <?php echo $thn_ajaran_selected == $thn->thn_ajaran ? 'selected="selected"' : '' ?> 
                                    value="<?php echo $thn->thn_ajaran ?>"><?php echo $thn->thn_ajaran ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                  </div>
                    <div class="col-md-4"><div class="form-group">
                        <select class="form-control" name="semester_" id="semester">
                            <option value="">Pilih Semester</option>
                            <option value="2">Genap</option>
                            <option value="1">Ganjil</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Lihat">
                    </div>
                  </div>
                </form>
                  </div>
                </div>
                    
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Rekap Total Nilai Mahasiswa
                            </h2>
                          </br>
                            <a class="btn bg-orange waves-effect" href="<?php echo base_url("mahasiswa/cetak_pdf/$thn_ajaran_selected/$semester_selected"); ?>"><i class="material-icons">print</i><span>Cetak Nilai</span></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Matkul</th>
                                            <th>Matkul</th>
                                            <th>Smt</th>
                                            <th>SKS</th>
                                            <th>UTS</th>
                                            <th>UAS</th>
                                            <th>Nilai</th>
                                            <th>Bobot</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                      $no = 0;
                                      $total_sks = 0;
                                      $total_nil = 0;
                                      $ip_smt = 0;
                                      $total_bobot = 0;
                                      if( ! empty($nilai)){
                                        foreach($nilai as $data){
                                          $no++;
                                          // $warna=($data->nilai == 'A') ? "green" : ($data->nilai == 'C') ? "yellow":"red";
                                          echo "<tr>";
                                          echo "<td>".$no."</td>";
                                          echo "<td>".$data->kd_mk."</td>";
                                          echo "<td>".$data->matkul."</td>";
                                          echo "<td>".$data->semester."</td>";
                                          echo "<td>".$data->sks."</td>";
                                          $total_sks += $data->sks;
                                          echo "<td>".$data->uts."</td>";
                                          echo "<td>".$data->uas."</td>";
                                          echo "<td style=\"color: white;\" bgcolor=";
                                          switch ($data->nilai) {
                                            case 'A':
                                              echo "green";
                                              break;
                                            case 'B':
                                              echo "yellow";
                                              break;
                                            case 'C':
                                              echo "red";
                                              break;
                                            default:
                                              echo "white";
                                              break;
                                          }
                                          echo ">";
                                          echo $data->nilai."</td>";
                                          if ($data->sks == '3' || $data->sks == '2') {
                                            if ($data->nilai == 'A'){
                                              $bobot = '4';
                                            }else if ($data->nilai == 'B') {
                                              $bobot = '2';
                                            }else{
                                              $bobot = '1';
                                            }
                                          }
                                          echo "<td>".$bobot."</td>";
                                          $total = $data->sks * $bobot;
                                          $total_bobot += $bobot;

                                          $total_nil += $total;
                                          echo "<td>".$total."</td>";
                                          echo "</tr>";
                                        }
                                      }else{
                                        echo "<tr><td colspan='9' align='center'>Data tidak ada</td></tr>";
                                      }
                                      if ($no == 0) {
                                        $ip_smt = 0;
                                      }else{
                                        $ip_smt = number_format($total_bobot / $no, 2);
                                      }
                                      
                                      echo "<tr>
                                        <td colspan='12'>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td colspan='3'><strong>Total SKS : $total_sks</strong></td>
                                        <td colspan='3'><strong>Total Nilai : $total_nil</strong></td>
                                        <td colspan='4'><strong>IP Semester : $ip_smt</strong></td>
                                      </tr>";
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>