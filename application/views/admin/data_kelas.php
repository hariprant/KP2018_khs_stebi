    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?php echo base_url("admin/input_kls"); ?>" class="btn btn-primary waves-effect"><i class="material-icons">add</i>
                <span>Tambah Kelas</span></a>
            </div>
          </div>
            </br>
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Kelas
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Kelas</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  if( ! empty($kelas)){
                                    foreach($kelas as $data){
                                      echo "<tr>";
                                      echo "<td>".$no++."</td>";
                                      echo "<td>".$data->id_kelas."</td>";
                                      echo "<td>".$data->kelas."</td>";
                                      echo "<td>".anchor('admin/edt_kls/'.$data->id_kelas,'Edit','class="btn bg-orange waves-effect"')."</td>";
                                      echo "</tr>";
                                    }
                                  }else{
                                    echo "<tr><td colspan='3'>Data tidak ada</td></tr>";
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