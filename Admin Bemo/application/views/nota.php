<?php
// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT_A5, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Bemo');
$pdf->SetTitle('Logbook Kegiatan');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE_NOTA . '', PDF_HEADER_STRING);

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
$pdf->AddPage('P');

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$title = <<<EOD
<h3>Faktur</h3>
EOD;
$no = 1;

$jumlah_waktu = 0;
$total_harga = 0;
foreach ($riwayat->result() as $row) {
    $kode = $row->kode;
    $nama = $row->nama;
    $tgl_masuk = $row->tgl_masuk;
    $tgl_keluar = $row->tgl_keluar;
    $wkt_mulai = $row->wkt_mulai;
    $wkt_selesai = $row->wkt_selesai;
    $keterangan = $row->keterangan;
    $jumlah_waktu += $row->waktu_pengerjaan;
    $total_harga += $row->harga;
}

$table =  '<a style="text-decoration:none;color:black;">Nama Pelanggan ' . "\t" . ': ' . $nama . '</a><br>';
$table .= '<a style="text-decoration:none;color:black;">No Nota ' . "\t\t" . ': #' . $kode . '</a><br>';
$table .= '<a style="text-decoration:none;color:black;">Tanggal ' . "\t" . ': ' . $tgl_keluar . '</a><br><br>';
$table .= '<center><table style="border:1px solid #000; padding 6px;">';
$table .= '<tr style="background-color: #ccc; text-align: center;">
				<th width="35px" style="border:1px solid #000;">No</th>
				<th width="240px" style="border:1px solid #000;">Servis</th>
				<th width="120px" style="border:1px solid #000;">Harga</th>
			</tr>';
$i = 1;

foreach ($riwayat->result() as $row) {
    $table .= '<tr>
                    <td width="35px" style="border:1px solid #000;">' . $i . '</td>
                    <td width="240px" style="border:1px solid #000;text-align: left;">' . $row->nama_servis . '</td>
                    <td width="120px" style="border:1px solid #000;text-align: right;">Rp' . number_format($row->harga, 0, ".", ".") . '</td>
				</tr>';
    $i++;
}
$table .= '<tr>
                    <td colspan="2" width="275px" style="text-align: right;border:1px solid #000;background-color: #ccc;">Total Harga</td>
                    <td width="120px" style="border:1px solid #000;text-align: right;">Rp' . number_format($total_harga, 0, ".", ".") . '</td>
				</tr>';
$table .= '</table></center><br><br><br>';
$table .= '<a style="text-align: right; text-decoration:none; color:black;">Bengkel Martono</a><br>';
$table .= '<a style="text-align: right; text-decoration:none;"><img src="' . base_url() . 'public/img/TTD.png" height="50" width="75"><br><br>';
$table .= '<p style="color:black; text-align: center;">Terimakasih</p>';
$pdf->WriteHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'L', true);
// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdf->Output('Nota_#' . $kode . '.pdf', 'I');

    //============================================================+
    // END OF FILE
    //============================================================+
