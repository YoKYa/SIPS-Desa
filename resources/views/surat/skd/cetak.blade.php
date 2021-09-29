<?php
include(app_path().'\FPDF\fpdf.php');
include(app_path().'\FPDF\exfpdf.php');
include(app_path().'\FPDF\easyTable.php');

$pdf = new exFPDF('P', 'mm', array(210,297));
$border = 0;
// Path Gambar Logp
$path = public_path() . '/assets/img/logo/logo.png';
$pdf->SetTitle('SKD - '.$id->name.' - '.strtotime(now()));
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
$pdf->Cell(0,6,'SURAT KETERANGAN BERDOMISILI',$border,1,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,5,'Nomor :        /        /      /   /        ',0,1,'C');
$pdf->Cell(0,10,'',0,1,'C');
$pdf->MultiCell(0,5, "     Dengan ini Kepala Desa Sanggrahan Kecamatan Gondang Kabupaten Nganjuk, menerangkan yang sebenarnya bahwa : ");
$pdf->Cell(0,5,'',0,5,'C');

$tabel = new easyTable($pdf, '{3,60,10,150}','border:0; paddingX:2');

$tabel->easyCell(" ", 'valign:T;'); 
$tabel->easyCell('NIK', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->nik, 'valign:T;'); 
$tabel->printRow();
$tabel->easyCell(" ", 'valign:T;'); 
$tabel->easyCell('Nama', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->name, 'valign:T;'); 
$tabel->printRow();

$tabel->printRow();
$tabel->easyCell(" ", 'valign:T;'); 
$tabel->easyCell('Jenis Kelamin', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
if ($id->jk == 0) {
    $jk = "Laki-Laki";
}else {
    $jk = "Perempuan";
}
$tabel->easyCell($jk, 'valign:T;'); 
$tabel->printRow();
$tabel->easyCell(" ", 'valign:T;'); 
$tabel->easyCell('Tempat, Tanggal Lahir', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->tempatlahir.', '.date("d-m-Y", strtotime($id->tanggallahir)), 'valign:T;'); 
$tabel->printRow();
$tabel->easyCell(" ", 'valign:T;'); 
$tabel->easyCell('Warga Negara/Agama', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->kewarganegaraan.' / '.$id->agama, 'valign:T;'); 
$tabel->printRow();
$tabel->easyCell(" ", 'valign:T;'); 
$tabel->easyCell('Pekerjaan', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->pekerjaan, 'valign:T;'); 
$tabel->printRow();

$tabel->easyCell(" ", 'valign:T;'); 
$tabel->easyCell('Alamat', 'valign:T');
$tabel->easyCell(":", 'valign:T;'); 
$tabel->easyCell($id->alamat    , 'valign:T;'); 
$tabel->printRow();
$tabel->endTable();
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(0,5, "     Berdasarkan Permohonannya serta catatan kependudukan yang ada di kantor kami, nama tersebut Bertugas selaku (".$id->pekerjaan.") yang Berdomisili Desa Sanggrahan Kecamatan Gondang Kabupaten Nganjuk.");
$pdf->MultiCell(0,5, "Surat Keterangan ini dibuat untuk ___________");
$pdf->Cell(0,5,'',0,5,'C');
$pdf->MultiCell(0,5, "Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya mohon kepada yang berkepentingan untuk mengetahui dan maklum adanya.");
$pdf->Cell(0,10,'',0,5,'C');
$tabel = new easyTable($pdf, '{100, 20,100}','border:0; paddingX:2;align:{CCC}');
$tabel->easyCell('');
$tabel->easyCell(""); 
$tabel->easyCell('SANGGRAHAN, '. date(" d  M Y") ); 
$tabel->printRow();
$tabel->easyCell('Pemohon');
$tabel->easyCell(""); 
$tabel->easyCell('KEPALA DESA SANGGRAHAN'); 
$tabel->printRow();
$pdf->Cell(0,20,'',0,5,'C');
$tabel->easyCell('________________________');
$tabel->easyCell(""); 
$tabel->easyCell('________________________'); 
$tabel->printRow();
$tabel->endTable();
$pdf->Output('I','SKD - '.$id->name.' - '.strtotime(now()).'.pdf');
exit;
?>