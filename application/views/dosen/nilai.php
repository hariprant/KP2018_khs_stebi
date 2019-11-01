    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="btn-group btn-group-lg" role="group">
                    <button type="button" class="btn btn-primary waves-effect" onclick="location.href='<?php echo base_url("dosen/nilai"); ?>'">Rekap</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="location.href='<?php echo base_url("dosen/nilai_kelas"); ?>'">Kelas</button>
                </div>
                <p></p>
              </br>
            </div>
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Rekap Nilai Mahasiswa
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nim</th>
                                        <th>Nama</th>
                                        <th>Semestes</th>
                                        <th>Kelas</th>
                                        <th>Matkul</th>
                                        <th>SKS</th>
                                        <th>UTS</th>
                                        <th>UAS</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  if( ! empty($nilai)){
                                    foreach($nilai as $data){
                                      echo "<tr>";
                                      echo "<td>".$no++."</td>";
                                      echo "<td>".$data->nim."</td>";
                                      echo "<td>".$data->nama."</td>";
                                      echo "<td>".$data->semester."</td>";
                                      echo "<td>".$data->kelas."</td>";
                                      echo "<td>".$data->matkul."</td>";
                                      echo "<td>".$data->sks."</td>";
                                      echo "<td>".$data->uts."</td>";
                                      echo "<td>".$data->uas."</td>";
                                      echo "<td>".$data->nilai."</td>";
                                      echo "</tr>";
                                    }
                                  }else{ // Jika data tidak ada
                                    echo "<tr><td colspan='10'>Data tidak ada</td></tr>";
                                  }
                                  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Striped Rows -->
        </div>
    </section>