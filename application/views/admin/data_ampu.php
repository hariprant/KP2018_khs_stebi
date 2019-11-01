    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="<?php echo base_url("admin/input_ampu"); ?>" class="btn btn-primary waves-effect"><i class="material-icons">add</i>
                <span>Tambah Ampu</span></a>
            </div>
          </div>
            </br>
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Ampu Mata Kuliah
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Ampu</th>
                                        <th>NIP Dosen</th>
                                        <th>KD MK</th>
                                        <th>Thn Ajaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  if( ! empty($mengampu)){
                                    foreach($mengampu as $data){
                                      echo "<tr>";
                                      echo "<td>".$no++."</td>";
                                      echo "<td>".$data->id_ampu."</td>";
                                      echo "<td>".$data->nip."</td>";
                                      echo "<td>".$data->kd_mk."</td>";
                                      echo "<td>".$data->thn_ajaran."</td>";
                                      echo "<td>".anchor('admin/edt_ampu/'.$data->id_ampu,'Edit','class="btn bg-orange waves-effect"')."</td>";
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