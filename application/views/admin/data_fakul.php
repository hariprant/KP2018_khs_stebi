    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?php echo base_url("admin/tambah_fakul"); ?>" class="btn btn-primary waves-effect"><i class="material-icons">add</i>
                <span>Tambah Fakultas</span></a>
            </div>
          </div>
            </br>
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Fakultas
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Fakultas</th>
                                        <th>Fakultas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  if( ! empty($fakultas)){
                                    foreach($fakultas as $data){
                                      echo "<tr>";
                                      echo "<td>".$no++."</td>";
                                      echo "<td>".$data->id_fakul."</td>";
                                      echo "<td>".$data->fakul."</td>";
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