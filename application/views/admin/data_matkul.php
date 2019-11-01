    <section class="content">
        <div class="container-fluid">
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Matakuliah
                            </h2>
                          </br>
                            <a href="<?php echo base_url("admin/input_mk"); ?>" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Tambah Matakuliah</span></a>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode MK</th>
                                        <th>Matakuliah</th>
                                        <th>SKS</th>
                                        <th>Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  if( ! empty($matkul)){
                                    foreach($matkul as $data){
                                      echo "<tr>";
                                      echo "<td>".$no++."</td>";
                                      echo "<td>".$data->kd_mk."</td>";
                                      echo "<td>".$data->matkul."</td>";
                                      echo "<td>".$data->sks."</td>";
                                      echo "<td>".$data->semester."</td>";
                                      echo "<td>".anchor('admin/edt_mk/'.$data->kd_mk,'Edit','class="btn bg-orange waves-effect"')."</td>";
                                      echo "</tr>";
                                    }
                                  }else{
                                    echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
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