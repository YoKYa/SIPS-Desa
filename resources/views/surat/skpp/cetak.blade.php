<?php
include(app_path().'\FPDF\fpdf.php');
include(app_path().'\FPDF\exfpdf.php');
include(app_path().'\FPDF\easyTable.php');

$pdf = new exFPDF('P', 'mm', array(210,297));
$border = 0;
// Path Gambar Logp
$path = public_path() . '/assets/img/logo/logo.png';
$pdf->SetTitle('SKPP - '.$id->name.' - '.strtotime(now()));
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->image($path,15,12,18);
$pdf->Cell(0,2,'',$border,1);
$pdf->Cell(0,5,'PEMERINTAH KABUPATEN NGANJUK',$border,1,'C');
$pdf->Cell(0,5,'KECAMATAN GONDANG',$border,1,'C');
$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,5,'DESA SANGGRAHAN',$border,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(0,4,'Jalan Raya Gondang - Lengkong, Kode Pos 64451',$border,1,'C');
$pdf->Cell(0,4,'Email : pemerintahdesasanggrahan@gmail.com, Ig @pemdes_sanggrahan',$border,1,'C');
$pdf->Cell(0,4,'Website: https://gondang.nganjukkab.go.id/desa/sanggrahan',0,1,'C');
$pdf->Cell(0,1,'',0,1,'C');
$table=new easyTable($pdf, '{200}', 'width:70; border:0; font-size:8; line-height:1.2; paddingX:0');
$table->rowStyle('min-height:1;paddingY:0.02;marginY:1');
 $table->easyCell('', 'colspan:4; bgcolor:#000;');
 $table->printRow();
 $table->endTable();

$pdf->Cell(0,3,'',$border,1,'C');
$pdf->SetFont('Arial','BU',13);
$pdf->Cell(0,6,'SURAT KETERANGAN PINDAH PENDUDUK',$border,1,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,5,'Nomor :        /        /      /   /        ',0,1,'C');
$pdf->Cell(0,10,'',0,1,'C');
$pdf->MultiCell(0,5, "Yang bertanda tangan dibawah ini Kepala Desa Sanggrahan Kecamatan Gondang menerangkan dengan sebenarnya bahwa : ");
$pdf->Cell(0,5,'',0,5,'C');

$tabel = new easyTable($pdf, '{20,60,10,150}','border:0; paddingX:2');

$tabel->easyCell("1.", 'align:R'); 
$tabel->easyCell('Nama', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->name, 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("2.", 'align:R'); 
$tabel->easyCell('NIK', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->nik, 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("3.", 'align:R'); 
$tabel->easyCell('Nomor Kartu Keluarga', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell('', 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("4.", 'align:R;'); 
$tabel->easyCell('Tempat, Tanggal Lahir', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->tempatlahir.', '.date("d-m-Y", strtotime($id->tanggallahir)), 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("5. ", 'align:R;'); 
$tabel->easyCell('Jenis Kelamin', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
if ($id->jk == 0) {
    $jk = "Laki-Laki";
}else {
    $jk = "Perempuan";
}
$tabel->easyCell($jk, 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("6.", 'align:R;'); 
$tabel->easyCell('Agama', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->agama, 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("7.", 'align:R;'); 
$tabel->easyCell('Kewarganegaraan', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->kewarganegaraan, 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("8.", 'align:R;'); 
$tabel->easyCell('Pendidikan', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell('', 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("9.", 'align:R;'); 
$tabel->easyCell('Status Pernikahan', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->statuspernikahan, 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("10.", 'align:R;'); 
$tabel->easyCell('Pekerjaan', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->pekerjaan, 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("11.", 'align:R;'); 
$tabel->easyCell('Alamat', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->alamatasal    , 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("12.", 'align:R;'); 
$tabel->easyCell('Pindah Ke', 'valign:T');
$tabel->easyCell("", 'valign:T;'); 
$tabel->easyCell('', 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("", 'align:R;'); 
$tabel->easyCell("-   Desa / Kelurahan", 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->alamat_pindah_kelurahan, 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("", 'align:R;'); 
$tabel->easyCell("-   Kecamatan", 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->alamat_pindah_kecamatan, 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("", 'align:R;'); 
$tabel->easyCell("-   Kota / Kabupaten", 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->alamat_pindah_kabupaten, 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("", 'align:R;'); 
$tabel->easyCell("-   Provinsi", 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->alamat_pindah_provinsi, 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("13.", 'align:R;'); 
$tabel->easyCell('Alasan Pindah', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell('', 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell("14.", 'align:R;'); 
$tabel->easyCell('Pengikut', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell('-', 'valign:T;'); 
$tabel->printRow();
$tabel->endTable();

$pdf->SetFont('Arial','',11);
$pdf->Cell(0,5,'',0,5,'C');
$pdf->MultiCell(0,5, "Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya mohon kepada yang berkepentingan untuk mengetahui dan maklum adanya.");
$pdf->Cell(0,10,'',0,5,'C');
$tabel = new easyTable($pdf, '{100, 20,100}','border:0; paddingX:2;align:{CCC}');
$tabel->easyCell('MENGETAHUI');
$tabel->easyCell(""); 
$tabel->easyCell('SANGGRAHAN, '. date(" d  M Y") ); 
$tabel->printRow();
$tabel->easyCell('CAMAT GONDANG');
$tabel->easyCell(""); 
$tabel->easyCell('KEPALA DESA SANGGRAHAN'); 
$tabel->printRow();
$pdf->Cell(0,20,'',0,5,'C');
$tabel->easyCell('________________________');
$tabel->easyCell(""); 
$tabel->easyCell('________________________'); 
$tabel->printRow();
$tabel->endTable();
$pdf->Output('I','SKPP - '.$id->name.' - '.strtotime(now()).'.pdf');
exit;
?>