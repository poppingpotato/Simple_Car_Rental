<?php
//Specify where FPDF is located
require("../assets/fpdf/fpdf.php");
//Creating Connection to the server and database
$db = new PDO ('mysql:host=localhost;dbname=dbcarrental', 'root', '');
$value = $_POST['value'];

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(185,5, 'CARS FOR RENT', 0, 0, 'C');
        $this->Ln();
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, 'Page'.$this->PageNo().'/{nb}', 0, 0, 'C');
    }
    function headerTable(){
        $this->SetFont('Times', 'B', 12);
        $this->Cell(20, 10, "Car ID", 1, 0, 'C' );
        $this->Cell(30, 10, "Car ", 1, 0, 'C' );
        $this->Cell(40, 10, "Car Type", 1, 0, 'C' );
        $this->Cell(40, 10, "Transmission", 1, 0, 'C' );
        $this->Cell(30, 10, "Capacity", 1, 0, 'C' );
        $this->Cell(30, 10, "Hire Price", 1, 1, 'C' );
    }
    function viewTable($db, $value){
        $this->SetFont('Times', '', 12);
        $stmt = $db->query('SELECT c_id, car_id, cartype, transmission_id, description, hireprice, V.name, T.transmissiontype 
        FROM cars as C 
          LEFT JOIN vehicle as V 
                ON C.car_id = V.v_id
                LEFT JOIN transmission as T 
                        ON C.transmission_id = T.t_id WHERE hireprice <' .$value);
        while($data = $stmt->fetch(PDO::FETCH_OBJ)){
            $this->Cell(20, 10,$data->c_id, 1, 0, 'C' );
            $this->Cell(30, 10,$data->name , 1, 0, 'L' );
            $this->Cell(40, 10,$data->cartype, 1, 0, 'L' );
            $this->Cell(40, 10,$data->transmissiontype, 1, 0, 'L' );
            $this->Cell(30, 10,$data->description, 1, 0, 'L' );
            $this->Cell(30, 10,$data->hireprice, 1, 1, 'C' );
        }

    }
    
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0);
$pdf->headerTable();
$pdf->viewTable($db, $value);
$pdf->Output();
?>