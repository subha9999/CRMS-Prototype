<?php
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function ticketDetailsXLSX($to,$from,$ticketType){
    include "../Configuration/database.php";
    if($ticketType=='all'){
        $sql="SELECT * FROM tickets
        WHERE DATE(created_at) BETWEEN '$from' AND '$to'" ;
        }
    else if($ticketType=='open'){
            $sql="SELECT * FROM tickets WHERE DATE(created_at) BETWEEN '$from' AND '$to' AND status='open'";
        }
    else if($ticketType=='close'){
        $sql="SELECT * FROM tickets WHERE DATE(created_at) BETWEEN '$from' AND '$to' AND status='close'";
    }
    $result = mysqli_query($link, $sql);   
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    if(!empty($data)){
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
    }
    else {
        echo '<script>alert("File cannot be downloaded becuase such data does not exist")</script>';
        header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
    }
    exit();
}
function agent_ticketDetailsXLSX($to,$from,$ticketType,$id){
    include "../Configuration/database.php";
    if($ticketType=='all'){
        $sql="SELECT * FROM tickets
        WHERE DATE(created_at) BETWEEN '$from' AND '$to' AND agentID='$id'" ;
        }
    else if($ticketType=='open'){
            $sql="SELECT * FROM tickets WHERE DATE(created_at) BETWEEN '$from' AND '$to' AND status='open' AND agentID='$id'";
        }
    else if($ticketType=='close'){
            $sql="SELECT * FROM tickets WHERE DATE(created_at) BETWEEN '$from' AND '$to' AND status='close' AND agentID='$id'";
        }
    $result = mysqli_query($link, $sql);   
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    if(!empty($data)){
    $spreadsheet = new Spreadsheet();
    $spreadsheet->setActiveSheetIndex(0);
    $spreadsheet->getActiveSheet()->fromArray(array_keys($data[0]), null, 'A1');
    $spreadsheet->getActiveSheet()->fromArray($data, null, 'A2');
    $filename = 'Agent_Ticket_Details.xlsx';
    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Pragma: no-cache');
    $writer->save('php://output');
    }
    else {
        echo '<script>alert("File cannot be downloaded becuase such data does not exist")</script>';
        header( 'Refresh:0.2,URL= ' . $_SERVER['HTTP_REFERER'] );
    }
    exit();
}
?>