    <section class="content">
        <div class="container-fluid">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="btn-group btn-group-lg" role="group">
                    <button type="button" class="btn btn-primary waves-effect" onclick="location.href='<?php echo base_url("dosen/nilai"); ?>'">Rekap</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="location.href='<?php echo base_url("dosen/nilai_kelas"); ?>'">Kelas</button>
                </div>
                <p></p>
                </br>
            </div>
                    
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                  <div class="row" style="margin-bottom:15px;">
                    <form action="<?php echo site_url('dosen/nilai_kelas') ?>" method="get">
                    <div class="col-md-3"><div class="form-group">
                        <select class="form-control" name="matkul_" id="matkul" style="width: 25px">
                            <option value="">Pilih Matkul</option>
                            <?php
                            foreach ($matkul as $mk) {
                                ?>
                                <option <?php echo $matkul_selected == $mk->kd_mk ? 'selected="selected"' : '' ?> 
                                    value="<?php echo $mk->kd_mk ?>"><?php echo $mk->matkul ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                  </div>
                    <div class="col-md-3"><div class="form-group">

                        <select class="form-control" name="thn_ajaran_" id="thn_ajaran">
                            <option value="">Pilih Thn Ajrn</option>
                            <?php
                            foreach ($thn_ajaran as $thn) {
                                ?>
                                <option <?php echo $thn_ajaran_selected == $thn->thn_ajaran ? 'selected="selected"' : '' ?> 
                                    class="<?php echo $thn->kd_mk ?>" value="<?php echo $thn->thn_ajaran ?>"><?php echo $thn->thn_ajaran ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                  </div>
                    <div class="col-md-3"><div class="form-group">
                        <select class="form-control" name="kelas_" id="kelas">
                            <option value="">Pilih Kelas</option>
                            <?php
                            foreach ($kelas as $kls) {
                                ?>
                                <option <?php echo $kelas_selected == $kls->id_kelas ? 'selected="selected"' : '' ?> 
                                    class="<?php echo $kls->id_ampu ?>" value="<?php echo $kls->id_kelas ?>"><?php echo $kls->kelas ?></option>
                                <?php
                            }
                            ?>
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
            <p></p>
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Nilai Per Kelas
                            </h2>
                          </br>
                            <button type="button" class="btn bg-orange waves-effect" onclick="location.href='<?php echo base_url("dosen/form/$matkul_selected/$thn_ajaran_selected/$kelas_selected"); ?>'">
                                <i class="material-icons">add</i>
                                <span>Unggah Nilai</span>
                            </button>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nim</th>
                                        <th>Nama</th>
                                        <th>Semestes</th>
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
                                      echo "<td>".$data->uts."</td>";
                                      echo "<td>".$data->uas."</td>";
                                      echo "<td>".$data->nilai."</td>";
                                      echo "<td>".anchor('dosen/edit_nilai/'.$data->id_nilai,'Edit', 'class="btn bg-red waves-effect"').'  '.
                                      anchor('dosen/profil_mhs/'.$data->nim.'/'.$data->kd_mk,'Detail', 'class="btn bg-green waves-effect"')."</td>";
                                      echo "</tr>";
                                    }
                                  }else{
                                    echo "<tr><td colspan='7' align='center'>Data tidak ada</td></tr>";
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