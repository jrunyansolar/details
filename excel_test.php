<?php

require_once('vendor/autoload.php');

class Workbook {
    function __construct($fileName) { 
        $this->excel = PHPExcel_IOFactory::createReaderForFile($fileName);
        print("Loading workbook ". PHP_EOL);
        $this->workbook = $this->excel->load($fileName);
    }
    
    function sheet_handler() {
        //$columnCount = $this->workbook->setActiveSheetIndex(0)->getHighestColumn();
        $sheet = $this->workbook->getSheet(1);
        $dataArray =$this->workbook->getSheet(01)->rangeToArray('G2:CE2');
        foreach($dataArray[0] as $cellValue) {
            //$value = $sheet->getCell($cell)->getValue();
            print($cellValue . PHP_EOL);
        }
    }
}

$fileName = 'files/product_sheet.xlsx';
$workbook = new Workbook($fileName);
$workbook->sheet_handler();

?>
