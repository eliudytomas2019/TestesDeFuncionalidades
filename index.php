<?php
include("PHPExcel/Classes/PHPExcel.php");

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Nome');
$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Idade');
