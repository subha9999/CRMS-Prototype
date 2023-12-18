<?php
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
function agentDetailsCSV(){
    include "../Configuration/database.php";
    $sql="SELECT * FROM agent";
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
header('Content-Disposition:attachment;filename=Agent_Details.csv');
header("Pragma: no-cache");  
header("Expires: 0");
fclose($file);
exit();
}
function agentDetailsXLSX(){
    include "../Configuration/database.php";
    $sql = "SELECT * FROM agent";  
$result = mysqli_query($link, $sql);   
$data = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    $spreadsheet = new Spreadsheet();
    $spreadsheet->setActiveSheetIndex(0);
    $spreadsheet->getActiveSheet()->fromArray(array_keys($data[0]), null, 'A1');
    $spreadsheet->getActiveSheet()->fromArray($data, null, 'A2');
    $filename = 'Agent_Details.xlsx';
    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Pragma: no-cache');
    $writer->save('php://output');
    exit();
}
function leadDetailsCSV(){
    include "../Configuration/database.php";
    $sql="SELECT * FROM team_lead";
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
header('Content-Disposition:attachment;filename=Team_Lead_Details.csv');
header("Pragma: no-cache");  
header("Expires: 0");
fclose($file);
exit();
}
function leadDetailsXLSX(){
    include "../Configuration/database.php";
    $sql = "SELECT * FROM team_lead";  
$result = mysqli_query($link, $sql);   
$data = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    $spreadsheet = new Spreadsheet();
    $spreadsheet->setActiveSheetIndex(0);
    $spreadsheet->getActiveSheet()->fromArray(array_keys($data[0]), null, 'A1');
    $spreadsheet->getActiveSheet()->fromArray($data, null, 'A2');
    $filename = 'Team_lead_Details.xlsx';
    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Pragma: no-cache');
    $writer->save('php://output');
    exit();
}
function clientDetailsCSV(){
    include "../Configuration/database.php";
    $sql="SELECT * FROM client";
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
header('Content-Disposition:attachment;filename=Client_Details.csv');
header("Pragma: no-cache");  
header("Expires: 0");
fclose($file);
exit();
}
function clientDetailsXLSX(){
    include "../Configuration/database.php";
    $sql = "SELECT * FROM client";  
$result = mysqli_query($link, $sql);   
$data = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    $spreadsheet = new Spreadsheet();
    $spreadsheet->setActiveSheetIndex(0);
    $spreadsheet->getActiveSheet()->fromArray(array_keys($data[0]), null, 'A1');
    $spreadsheet->getActiveSheet()->fromArray($data, null, 'A2');
    $filename = 'Clint_Details.xlsx';
    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Pragma: no-cache');
    $writer->save('php://output');
    exit();
}
function ticketDetailsCSV(){
    include "../Configuration/database.php";
    $sql="SELECT * FROM tickets";
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
function ticketDetailsXLSX(){
    include "../Configuration/database.php";
    $sql = "SELECT * FROM tickets";  
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
function customerDetailsCSV(){
    include "../Configuration/database.php";
    $sql="SELECT * FROM customers";
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
header('Content-Disposition:attachment;filename=Customer_Details.csv');
header("Pragma: no-cache");  
header("Expires: 0");
fclose($file);
exit();
}
function customerDetailsXLSX(){
    include "../Configuration/database.php";
    $sql = "SELECT * FROM customers";  
    $result = mysqli_query($link, $sql);   
    $data = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    $spreadsheet = new Spreadsheet();
    $spreadsheet->setActiveSheetIndex(0);
    $spreadsheet->getActiveSheet()->fromArray(array_keys($data[0]), null, 'A1');
    $spreadsheet->getActiveSheet()->fromArray($data, null, 'A2');
    $filename = 'Customer_Details.xlsx';
    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Pragma: no-cache');
    $writer->save('php://output');
    exit();
}
?>