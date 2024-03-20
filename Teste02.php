<?php
	require("Spreadsheet/src/Spreadsheet.php");
    require("Spreadsheet/Writer&Xlsx.php");
	// Crie uma instância do PhpSpreadsheet
	$spreadsheet = new Spreadsheet();
	$activeWorksheet = $spreadsheet->getActiveSheet();	
	// Defina o valor da célula A1
	$activeWorksheet->setCellValue('A1', 'Hello World!');
	
	// Salve o arquivo Excel
	$writer = new Xlsx($spreadsheet);
	$writer->save('hello_world.xlsx');
	
	echo 'Arquivo Excel gerado com sucesso!';
	?>
