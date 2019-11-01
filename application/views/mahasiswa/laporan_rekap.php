<?php
			$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetAuthor('Hari Pranata');
			$pdf->SetTitle('KHS Nilai Mahasiswa');
			$pdf->SetKeywords('KHS');
			$pdf->AddPage();

			$pdf->setTopMargin(13);
			$pdf->setFooterMargin(20);
			$pdf->Image('assets/images/stebi_kop.png',10,10,25,25);

			$pdf->Cell(25);
			$pdf->SetFont('Times','B','12');
			$pdf->Cell(0,5,'SEKOLAH TINGGI EKONOMI DAN BISNIS ISLAM',0,1,'C');
			$pdf->Cell(25);
			$pdf->SetFont('Times','B','15');
			$pdf->Cell(0,5,'STEBI AL-MUHSIN YOGYAKARTA',0,1,'C');
			$pdf->Cell(25);
			$pdf->SetFont('Times','B','8');
			$pdf->Cell(0,5,'Jl.parangtritis Km. 3.5 no 280 Krapyak Wetan, Sewon, Bantul, Yogyakarta',0,1,'C');
			$pdf->Cell(25);
			$pdf->Cell(0,2,'Telp./Fax : (0274)372979 Website : www.stebi.almuhsin.ac.id ',0,1,'C');

         	$pdf->SetLineWidth(1);
			$pdf->Line(10,36,200,36);
			$pdf->SetLineWidth(0);
			$pdf->Line(10,37,200,37);
			$pdf->Cell(75);
			$pdf->Ln(5);
			$pdf->SetFont('Times','14');
			$i=0;
         	foreach ($nilai as $row) {
			$html='<br>
			<table border="" cellpadding="2">
			<tr>
			<td>NAMA</td>
			<td>:</td>
			<td colspan="2">'.$row->nama.'</td>
			<td colspan="2"></td>
			<td>NIM</td>
			<td>:</td>
			<td colspan="2">'.$row->nim.'</td>
			</tr>
			<tr>
			<td>Prodi</td>
			<td>:</td>
			<td colspan="2">'.$row->prodi.'</td>
			<td colspan="2"></td>
			<td>Kelas</td>
			<td>:</td>
			<td colspan="2">'.$row->kelas.'</td>
			</tr>
			</table>
					<table border="1" cellspacing="1" bgcolor="#666666" cellpadding="2">
						<tr bgcolor="#BCDEE6;" align="center">
							<td align="center">No</td>
							<td align="center">Kode Matakuliah</td>
							<td align="center">Matakuliah</td>
							<td align="center">UTS</td>
							<td align="center">UAS</td>
							<td align="center">Nilai</td>
						</tr>';
					}
			foreach ($nilai as $row) {
					$i++;
					$html.='<tr bgcolor="#ffffff" align="center">
							<td align="center">'.$i.'</td>
							<td>'.$row->kd_mk.'</td>
							<td>'.$row->matkul.'</td>
							<td>'.$row->uts.'</td>
							<td>'.$row->uas.'</td>
							<td>'.$row->nilai.'</td>
						</tr>';
					}
			$html.='</table>';

			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('NilaiSemester.pdf', 'I');
?>