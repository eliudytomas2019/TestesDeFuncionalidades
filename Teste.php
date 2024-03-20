<?php
    include("Config.inc.php");
    include("vendor/PHPExcel/PHPExcel.php");

    $rowCount = 1;
    date_default_timezone_set("Africa/Luanda"); // set timezone to Africa/Luanda
    $date = date("d-m-Y_H-i-s",time());

     
    $objPHPExcel = new PHPExcel();
    $objPHPExcel->setActiveSheetIndex(0);

    $objPHPExcel->getActiveSheet()->SetCellValue('A'. $rowCount, 'ID');
    $objPHPExcel->getActiveSheet()->SetCellValue('B'. $rowCount, 'Product');
    $objPHPExcel->getActiveSheet()->SetCellValue('C'. $rowCount, 'Qtd');
    $objPHPExcel->getActiveSheet()->SetCellValue('D'. $rowCount, 'Preço');

    $Read = new Read();
    $Read->ExeRead("cv_product");

    if($Read->getResult()):
        foreach($Read->getResult() as $key):
            $rowCount++;
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $rowCount, $key['id']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $rowCount, $key['product']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $rowCount, $key['quantidade']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $rowCount, number_format($key['preco_venda'],2, ",", "."));
        endforeach;
    endif;

    header('Content-type: text/html; charset=utf-8');
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="xXx_'.time().'.xlsx"');
    header('Pragma: private');
    header('Cache-control: private: must-revalidate');
                
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
    $objWriter->save('php://output');