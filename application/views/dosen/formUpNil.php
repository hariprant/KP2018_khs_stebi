<!-- <html>
<head>
	<title>Form Import</title>
	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	
	<script>
	$(document).ready(function(){
		$("#kosong").hide();
	});
	</script>
</head>
<body>
	<h3>Form Import</h3>
	<hr>
	
	<a href="<?php echo base_url("dosen/export/$matkul_selected/$thn_ajaran_selected/$kelas_selected"); ?>">Download Format</a>
	<br>
	<br>
	
	<form method="post" action="<?php echo base_url("dosen/form/$matkul_selected/$thn_ajaran_selected/$kelas_selected"); ?>" enctype="multipart/form-data">
		<input type="file" name="file">
		<input type="submit" name="preview" value="Preview">
	</form>
	
	<?php
	if(isset($_POST['preview'])){
		if(isset($upload_error)){
			echo "<div style='color: red;'>".$upload_error."</div>";
			die;
		}
		
		echo "<form method='post' action='".base_url("dosen/import")."'>";
		
		echo "<div style='color: red;' id='kosong'>
		Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		</div>";
		
		echo "<table border='1' cellpadding='8'>
		<tr>
			<th colspan='5'>Preview Data</th>
		</tr>
		<tr>
			<th>id_nilai</th>
			<th>NIM</th>
			<th>UTS</th>
			<th>UAS</th>
			<th>Nilai</th>
		</tr>";
		
		$numrow = 1;
		$kosong = 0;
		
		foreach($sheet as $row){ 

			$id_nilai = $row['A'];
			$nim = $row['B'];
			$uts = $row['C'];
			$uas = $row['D'];
			$nilai = $row['E'];
			
			if(empty($id_nilai) && empty($nim) && empty($uts) && empty($uas) && empty($nilai))
				continue;
			
			if($numrow > 1){
				$id_nilai_td = ( ! empty($id_nilai))? "" : " style='background: #E07171;'";
				$nim_td = ( ! empty($nim))? "" : " style='background: #E07171;'";
				$uts_td = ( ! empty($uts))? "" : " style='background: #E07171;'";
				$uas_td = ( ! empty($uas))? "" : " style='background: #E07171;'";
				$nilai_td = ( ! empty($nilai))? "" : " style='background: #E07171;'";
				
				if(empty($id_nilai) or empty($nim) or empty($uts) or empty($uas) or empty($nilai)){
					$kosong++;
				}
				
				echo "<tr>";
				echo "<td".$id_nilai_td.">".$id_nilai."</td>";
				echo "<td".$nim_td.">".$nim."</td>";
				echo "<td".$uts_td.">".$uts."</td>";
				echo "<td".$uas_td.">".$uas."</td>";
				echo "<td".$nilai_td.">".$nilai."</td>";
				echo "</tr>";
			}
			
			$numrow++;
		}
		
		echo "</table>";
		
		if($kosong > 1){
		?>	
			<script>
			$(document).ready(function(){
				$("#jumlah_kosong").html('<?php echo $kosong; ?>');
				
				$("#kosong").show();
			</script>
		<?php
		}else{
			echo "<hr>";
			
			echo "<button type='submit' name='import'>Import</button>";
			echo "<a href='".base_url("dosen/nilai")."'>Cancel</a>";
		}
		echo "</form>";
	}
	?>
</body>
</html> -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<section class="content">
        <div class="container-fluid">
            <!-- Striped Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Upload Nilai Mahasiswa
                            </h2>
                          </br>
                          <a class="btn bg-orange waves-effect" href="<?php echo base_url("dosen/export/$matkul_selected/$thn_ajaran_selected/$kelas_selected"); ?>"><i class="material-icons">print</i><span>Unduh Format</span></a>

                          	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	
							<script>
							$(document).ready(function(){
								$("#kosong").hide();
							});
							</script>
                        </div>
	
						<form  method="post" action="<?php echo base_url("dosen/form/$matkul_selected/$thn_ajaran_selected/$kelas_selected"); ?>" enctype="multipart/form-data">
							<div class="row clearfix">
								<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">

								</div>
								<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                	<div class="form-group">
                                		<div class="form-line">
                                			<input type="file" name="file">
                                		</div>
                                	</div>
                                </div>
							</div>
							<div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" name="preview" class="class="btn btn-primary m-t-15 waves-effect">Preview</button>
                                    </div></br>
                                </div>
						</form>
						
						<?php
						if(isset($_POST['preview'])){
							if(isset($upload_error)){
								echo "<div style='color: red;'>".$upload_error."</div>";
								die;
							}
							
							echo "<form method='post' action='".base_url("dosen/import")."'>";
							
							echo "<div style='color: red;' id='kosong'>
							Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
							</div>";
							echo "<div align='center'>";
							echo "<table border='1' cellpadding='8'>
							<tr>
								<td colspan='5' align='center'><strong>Preview Data</strong></td>
							</tr>
							";
							
							$numrow = 1;
							$kosong = 0;
							
							foreach($sheet as $row){ 

								$id_nilai = $row['A'];
								$nim = $row['B'];
								$uts = $row['C'];
								$uas = $row['D'];
								$nilai = $row['E'];
								
								if(empty($id_nilai) && empty($nim) && empty($uts) && empty($uas) && empty($nilai))
									continue;
								
								if($numrow > 1){
									$id_nilai_td = ( ! empty($id_nilai))? "" : " style='background: #E07171;'";
									$nim_td = ( ! empty($nim))? "" : " style='background: #E07171;'";
									$uts_td = ( ! empty($uts))? "" : " style='background: #E07171;'";
									$uas_td = ( ! empty($uas))? "" : " style='background: #E07171;'";
									$nilai_td = ( ! empty($nilai))? "" : " style='background: #E07171;'";
									
									if(empty($id_nilai) or empty($nim) or empty($uts) or empty($uas) or empty($nilai)){
										$kosong++;
									}
									
									echo "<tr>";
									echo "<td".$id_nilai_td.">".$id_nilai."</td>";
									echo "<td".$nim_td.">".$nim."</td>";
									echo "<td".$uts_td.">".$uts."</td>";
									echo "<td".$uas_td.">".$uas."</td>";
									echo "<td".$nilai_td.">".$nilai."</td>";
									echo "</tr>";
								}
								
								$numrow++;
							}
							
							echo "</table>";
							echo "</div>";
							
							if($kosong > 1){
							?>	
								<script>
								$(document).ready(function(){
									$("#jumlah_kosong").html('<?php echo $kosong; ?>');
									
									$("#kosong").show();
								</script>
							<?php
							}else{
								echo "<hr>";
								
								echo "<button type='submit' name='import'>Import</button>";
								echo "<a href='".base_url("dosen/nilai")."'>Cancel</a>";
							}
							echo "</form>";
						}
						?>
                    </div>
                </div>
            </div>
            <!-- #END# Striped Rows -->
        </div>
    </section>