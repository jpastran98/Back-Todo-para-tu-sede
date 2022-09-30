<?php

require 'vendor/autoload.php';
require 'con_db.php';


use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};

$mysqli = new mysqli("localhost","root","","registro");

$sql = "SELECT id, name, dni, email, phone, date, pais, provincia FROM datos";
$resultado = $mysqli->query($sql);

$excel = new Spreadsheet();
$hojaActiva = $excel->getActiveSheet();
$hojaActiva-> setTitle("Registro");

$hojaActiva-> setCellValue('A1', 'ID');
$hojaActiva-> setCellValue('B1', 'Nombre y Apellido');
$hojaActiva-> setCellValue('C1', 'DNI');
$hojaActiva-> setCellValue('D1', 'Email');
$hojaActiva-> setCellValue('E1', 'Celular');
$hojaActiva-> setCellValue('F1', 'Fecha de Nacimiento');
$hojaActiva-> setCellValue('G1', 'Provincia');
$hojaActiva-> setCellValue('H1', 'Localidad');

$fila = 2;

while($rows = $resultado->fetch_assoc()){
$hojaActiva->setCellValue('A'.$fila, $rows['id']);
$hojaActiva->setCellValue('B'.$fila, $rows['name']);
$hojaActiva->setCellValue('C'.$fila, $rows['dni']);
$hojaActiva->setCellValue('D'.$fila, $rows['email']);
$hojaActiva->setCellValue('E'.$fila, $rows['phone']);
$hojaActiva->setCellValue('F'.$fila, $rows['date']);
$hojaActiva->setCellValue('G'.$fila, $rows['pais']);
$hojaActiva->setCellValue('H'.$fila, $rows['provincia']);
$fila++;
}
ob_end_clean(); 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Registros.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
?>
