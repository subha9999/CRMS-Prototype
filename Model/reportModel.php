<?php
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function ticketDetailsCSV($to,$from,$ticketType){
    include "../Configuration/database.php";
    if($ticketType=='all'){
    $sql="SELECT * FROM tickets
    WHERE DATE(created_at) BETWEEN '$from' AND '$to'" ;
    }
    else{
    $sql=" SELECT * FROM tickets WHERE DATE(created_at) BETWEEN '$from' AND '$to' AND status='$ticketType';";
    }
    $res=mysqli_query($link,$sql);
    $file=fopen("php://output","w");
    $list=array();
    while($row=mysqli_fetch_row($res)){
        $list[]=$row;
    }
    foreach ($list as $line){
        fputcsv($file,$line);
    }
header('Content-Description:File Transfer');
header('Content-Type: text/csv ; charset=utf-8');
header('Content-Disposition:attachment;filename=Ticket_Details.csv');
header("Pragma: no-cache");  
header("Expires: 0");
fclose($file);
exit();
}
function ticketDetailsXLSX($to,$from,$ticketType){
    include "../Configuration/database.php";
    if($ticketType=='all'){
        $sql="SELECT * FROM tickets
        WHERE DATE(created_at) BETWEEN '$from' AND '$to'" ;
        }
        else{
        $sql=" SELECT * FROM tickets WHERE DATE(created_at) BETWEEN '$from' AND '$to' AND status='$ticketType';";
        }
    $result = mysqli_query($link, $sql);   
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    $spreadsheet = new Spreadsheet();
    $spreadsheet->setActiveSheetIndex(0);
    $spreadsheet->getActiveSheet()->fromArray(array_keys($data[0]), null, 'A1');
    $spreadsheet->getActiveSheet()->fromArray($data, null, 'A2');
    $filename = 'Ticket_Details.xlsx';
    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Pragma: no-cache');
    $writer->save('php://output');
    exit();
}

?>