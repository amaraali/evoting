<?php
session_start();
require '../../functions.php';
// require 'ini_header.php';
// require 'ini_footer.php';

// if (!isset($_SESSION["login"])) {
//     redirect("login");
// }

$hasil_jurusan = query("SELECT count(vote.id) as suara, calon.id as id_calon, no_urut, nama_ketua, nama_wakil, nama_jurusan
    FROM calon
        LEFT JOIN vote ON vote.id_calon = calon.id
        LEFT JOIN jurusan on calon.id_unit=jurusan.kode_jurusan
    WHERE id_tingkatan = 1
    GROUP BY id_calon
    ORDER BY no_urut");
// dd($hasil_jurusan);

require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();


$sheet->setCellValue("A1", "No.");
$sheet->setCellValue("B1", "Nama Calon");
$sheet->setCellValue("C1", "No Urut");
$sheet->setCellValue("D1", "Jurusan");
$sheet->setCellValue("E1", "Jumlah Suara");
// dd($hasil_jurusan);
foreach ($hasil_jurusan as $key => $value) {
    $row = $key + 2;

    $sheet->setCellValue("A" . $row, ($key + 1));
    $sheet->setCellValue("B" . $row, $value['nama_ketua'] . " - " . $value['nama_wakil']);
    $sheet->setCellValue("C" . $row, $value['no_urut']);
    $sheet->setCellValue("D" . $row, $value['nama_jurusan']);
    $sheet->setCellValue("E" . $row, $value['suara']);
}






$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="' . urlencode('Hasli.xlsx') . '"');

// $writer->save("transaksi.xlsx");
$writer->save("php://output");
