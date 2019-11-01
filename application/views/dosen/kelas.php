<?php
echo "
<select name='kelas' id='select-kelas' required>
 <option value='' disabled selected>Pilih Kelas</option>";
  foreach ($kelas->result() as $row_kelas) {  
  echo "<option value='".$row_agama->id_kelas."'>".$row_kelas->kelas."</option>";
  }
  echo"
</select>";
?>