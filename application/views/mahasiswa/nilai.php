    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Nilai Mahasiswa</h2>
            </div>
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                STRIPED ROWS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Kuliah</th>
                                        <th>SKS</th>
                                        <th>Semestes</th>
                                        <th>UTS</th>
                                        <th>UAS</th>
                                        <th>Nilai</th>
                                        <th>Bobot</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $no = 1;
                                  if( ! empty($nilai)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                                    foreach($nilai as $data){ // Lakukan looping pada variabel siswa dari controller
                                      echo "<tr>";
                                      echo "<td>".$no++."</td>";
                                      echo "<td>".$data->matkul."</td>";
                                      echo "<td>".$data->sks."</td>";
                                      echo "<td>".$data->semester."</td>";
                                      echo "<td>".$data->uts."</td>";
                                      echo "<td>".$data->uas."</td>";
                                      echo "<td>".$data->nilai."</td>";
                                      echo "</tr>";
                                    }
                                  }else{ // Jika data tidak ada
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