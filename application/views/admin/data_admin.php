    <section class="content">
        <div class="container-fluid">
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Admin
                            </h2>
                          </br>
                          <a href="<?php echo base_url("admin/input_adm"); ?>" class="btn btn-primary waves-effect"><i class="material-icons">add</i><span>Tambah Admin</span></a>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Admin</th>
                                        <th>Nama Admin</th>
                                        <th>Username</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  if( ! empty($adm)){
                                    foreach($adm as $data){
                                      echo "<tr>";
                                      echo "<td>".$no++."</td>";
                                      echo "<td>".$data->id_admin."</td>";
                                      echo "<td>".$data->nama_admin."</td>";
                                      echo "<td>".$data->username."</td>";
                                      echo "<td>".anchor('admin/edt_adm/'.$data->id_admin,'Edit','class="btn bg-orange waves-effect"')."</td>";
                                      echo "</tr>";
                                    }
                                  }else{
                                    echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
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