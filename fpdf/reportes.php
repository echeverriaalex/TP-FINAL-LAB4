<?php

use DAO\ApplicationPDO;
use Models\Application;

require_once('fpdf.php');

    class PDF extends FPDF{
        
       
        // Cabecera de página
        function Header()
        {
            

            
            // Arial bold 15
            $this->SetFont('Arial','B',16);
            // Movernos a la derecha
            $this->Cell(60);
            // Título
            $this->Cell(70,10,'Job Offer ',0,0,'C');
            // Salto de línea
            $this->Ln(20);

            $this->Cell(80,10,'Nombre',1,0,'C',0);
            $this->Cell(50,10,'Precio',1,0,'C',0);
            $this->Cell(50,10,'Stock',1,1,'C',0);
        
        }

        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
        }
        

        /*
        // para que sea tabla
        // Cargar los datos
        function LoadData($file)
        {
            // Leer las líneas del fichero
            $lines = file($file);
            $data = array();
            foreach($lines as $line)
                $data[] = explode(';',trim($line));
            return $data;
        }

        // Tabla simple
        function BasicTable($header, $data)
        {
            // Cabecera
            foreach($header as $col)
                $this->Cell(40,7,$col,1);
            $this->Ln();
            // Datos
            foreach($data as $row)
            {
                foreach($row as $col)
                    $this->Cell(40,6,$col,1);
                $this->Ln();
            }
        }

        // Una tabla más completa
        function ImprovedTable($header, $data)
        {
            // Anchuras de las columnas
            $w = array(40, 35, 45, 40);
            // Cabeceras
            for($i=0;$i<count($header);$i++)
                $this->Cell($w[$i],7,$header[$i],1,0,'C');
            $this->Ln();
            // Datos
            foreach($data as $row)
            {
                $this->Cell($w[0],6,$row[0],'LR');
                $this->Cell($w[1],6,$row[1],'LR');
                $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
                $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
                $this->Ln();
            }
            // Línea de cierre
            $this->Cell(array_sum($w),0,'','T');
        }

        // Tabla coloreada
        function FancyTable($header, $data)
        {
            // Colores, ancho de línea y fuente en negrita
            $this->SetFillColor(255,0,0);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,0,0);
            $this->SetLineWidth(.3);
            $this->SetFont('','B');
            // Cabecera
            $w = array(40, 35, 45, 40);
            for($i=0;$i<count($header);$i++)
                $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
            $this->Ln();
            // Restauración de colores y fuentes
            $this->SetFillColor(224,235,255);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Datos
            $fill = false;
            foreach($data as $row)
            {
                $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
                $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
                $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
                $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
                $this->Ln();
                $fill = !$fill;
            }
            // Línea de cierre
            $this->Cell(array_sum($w),0,'','T');
        }      
        */  
    }
    /*
    // esto para que sea tabla
        $pdf = new PDF();
        // Títulos de las columnas
        $header = array('Nombre postulante', 'Carrera postulante', 'otro dato', 'otro dato 2');
        // Carga de datos
        //$data = $pdf->LoadData('paises.txt');
        $apliPDO = new ApplicationPDO();
        $data = $apliPDO->GetAllApplications();
        $pdf->SetFont('Arial','',14);
        $pdf->AddPage();
        $pdf->BasicTable($header,$data);
        $pdf->AddPage();
        $pdf->ImprovedTable($header,$data);
        $pdf->AddPage();
        $pdf->FancyTable($header,$data);
        $pdf->Output();


*/












    //require_once("cn.php");
    //$consulta = "SELECT * FROM productos";
    //$resultado = mysqli_query($conexion, $consulta);

   // $applicationPDO = new ApplicationPDO();
   // $applicationsList = 

    

    // esto andaba
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);

    
    $pdf->Cell(80,10,'¡Hola, Mundo!');
    $pdf->Cell(50,10,'1000');
    $pdf->Cell(50,10,'952');

    $pdf->Cell(80,10,'¡Globant!');
    $pdf->Cell(50,10,'99999');
    $pdf->Cell(50,10,'888888');

    $pdf->Cell(40,10,'¡Accenture!');
    $pdf->Cell(40,10,'¡Facebook!');
    $pdf->Cell(40,10,'¡Twitter!');
    $pdf->Cell(40,10,'¡TIK tok!');
    
    $pdf->Output();
    
    /*

     // esto para la tabla
    while ($row= $applicationPDO->GetAllApplications()) {
        $pdf->Cell(80,10,$row['nombre'],1,0,'C',0);
        $pdf->Cell(50,10,$row['precio'],1,0,'C',0);
        $pdf->Cell(50,10,$row['stock'],1,1,'C',0);

    }
*/



  
    
?>