<?php
// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Bemo');
$pdf->SetTitle('Logbook Kegiatan');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . '', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage('L');

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$title = <<<EOD
<h3>Laporan Pelanggan</h3>
EOD;
$no = 1;


$pdf->WriteHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);
// $pdf->WriteHTMLCell(0, 0, '', '', $row->tanggal, 0, 1, 0, true, 'C', true);
$table = '<p style="text-align: left;">Cetak Seluruh Tanggal</p>';
$table .= '<center><table style="border:1px solid #000; padding 6px;">';
$table .= '<tr style="background-color: #ccc;">
				<th width="35px" style="border:1px solid #000;">No</th>
				<th width="130px" style="border:1px solid #000;">Nama Pelanggan</th>
				<th width="80px" style="border:1px solid #000;">Merk Mobil</th>
				<th width="80px" style="border:1px solid #000;">Model Mobil</th>
				<th width="80px" style="border:1px solid #000;">No Kendaraan</th>
				<th width="100px" style="border:1px solid #000;">Waktu Servis</th>
				<th width="100px" style="border:1px solid #000;">Tanggal Servis</th>
				<th width="220px" style="border:1px solid #000;">Servis</th>
				<th width="100px" style="border:1px solid #000;">Total Harga</th>
            </tr>';
$j = 1;
$deskripsi = "";
$id = 0;
foreach ($laporan->result() as $row) {
    foreach ($harga->result() as $hg) {
        if ($row->id != $id) {
            $total_harga = 0;
            $deskripsi = "";
            $j = 1;
        }
        $id = $row->id;
        if ($id == $hg->pesanan_id) {
            $total_harga += $hg->harga;
            $deskripsi .= $j . ". " . $hg->nama_servis . "<br>";
            $j++;
        }
    }
    $table .= '<tr>
					<td width="35px" style="border:1px solid #000;" >' . $no . '</td>
					<td width="130px" style="border:1px solid #000; text-align: left;">' . $row->nama . '</td>
					<td width="80px" style="border:1px solid #000; text-align: left;">' . $row->merk_mobil . '</td>
					<td width="80px" style="border:1px solid #000; text-align: left;">' . $row->model_mobil . '</td>
					<td width="80px" style="border:1px solid #000; text-align: left;">' . $row->no_kendaraan . '</td>
					<td width="100px" style="border:1px solid #000;" >' . $row->wkt_mulai . ' - ' . $row->wkt_selesai . '</td>
					<td width="100px" style="border:1px solid #000;" >' . $row->tgl_keluar . '</td>
					<td width="220px" style="border:1px solid #000; text-align: left;">' . $deskripsi . '</td>
					<td width="100px" style="border:1px solid #000; text-align: left;">Rp' . number_format($total_harga, 0, ".", ".") . '</td>
				</tr>';
    $no++;
}

$table .= '</table></center>';
$table .= '<p style="color:black; text-align: left;">Dicetak pada tanggal: ' . date("Y-m-d h:i:sa") . '</p>';
$table .= '<p style=" text-align: right;">Dicetak Oleh</p>';
$table .= '<p style=" text-align: right;"><img src="' . base_url() . 'public/img/TTD.png" height="60" width="90"></p>';
$table .= '<p style=" text-align: right;">Sekertaris</p>';
$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);
// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdf->Output('Riwayat servis pelanggan.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
