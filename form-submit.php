<?php 

    //error_reporting(0); // sem msg de erro
    //error_reporting(E_ALL); // todas
    //var_dump($_FILES);

    function isEmptyRow($row) {
        foreach($row as $cell){
            if (null !== $cell) return false;
        }
        return true;
    }

    require 'vendor/autoload.php';
 
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    //use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();

    //create directly an object instance of the IOFactory class, and load the xlsx file
    $fxls ='sede.xlsx';
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($fxls);

    //read excel data and store it into an array
    $xls_data = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    //now it is created a html table with the excel file data
    $html_tb ='<table border="1"><tr><th>'. implode('</th><th>', $xls_data[1]) .'</th></tr>';
    
    //number of rows
    $nr = count($xls_data);
    
    for($i=2; $i <= $nr; $i++){

        $html_tb .='<tr><td>'. implode('</td><td>', $xls_data[$i]) .'</td></tr>';
    }
    $html_tb .='</table>';

    echo $html_tb;

    /*
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Hello World !');

    $writer = new Xlsx($spreadsheet);
    $writer->save('hello world.xlsx');
    */
    /*
    add some data in excel cells
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Domain')
    ->setCellValue('B1', 'Category')
    ->setCellValue('C1', 'Nr. Pages');


    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A2', 'CoursesWeb.net')
    ->setCellValue('B2', 'Web Development')
    ->setCellValue('C2', '4000');

    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A3', 'MarPlo.net')
    ->setCellValue('B3', 'Courses & Games')
    ->setCellValue('C3', '15000');

    set style for A1,B1,C1 cells
    $cell_st =[
    'font' =>['bold' => true],
    'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
    'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
    ];
    $spreadsheet->getActiveSheet()->getStyle('A1:C1')->applyFromArray($cell_st);

    set columns width
    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(16);
    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);

    $spreadsheet->getActiveSheet()->setTitle('Simple'); //set a title for Worksheet

    make object of the Xlsx class to save the excel file
    $writer = new Xlsx($spreadsheet);
    $fxls ='excel-file_1.xlsx';
    $writer->save($fxls);
    */
    
    
    

?>