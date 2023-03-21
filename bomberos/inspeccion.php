<?php

require 'fpdf/fpdf.php';
require 'conexion/Conexion.php'; //puede que no lo necesiten
class PDF extends FPDF {

// Cabecera de página
	function Header() {
		$this->SetTitle(utf8_decode('Reporte de Inspección'));
        $this->SetFont('Times', 'B', 25);
		$this->setXY(100, 15);

		//$this->SetFont('Times', 'B', 20);
		$this->setXY(45, 15);
		$this->SetFont('Times', '', 18);
		$this->MultiCell(150, 8, utf8_decode('DEPARTAMENTO DE PREVENCIÓN CONTRA INCENDIOS DEL CUERPO DE BOMBEROS VOLUNTARIOS DE LA CIUDAD DE AZOGUES'));
        $this->setXY(60, 25);
		$this->SetFont('Times', 'B', 20);
		$this->Image('img/escudo_sin.png', 10, 10, 30); //imagen(archivo, png/jpg || x,y,tamaño)  
		
		
		$this->SetFont('Times', 'B', 14);
		$this->setXY(10, 45);
        $this->Cell(30, 8, utf8_decode('Notificación: '), 0, 0, 'L', 0);
		$this->SetFont('Times', '', 12);        
        $this->Cell(0, 8, utf8_decode('1'), 0, 1, 'L', 0);  

		$this->SetFont('Times', 'B', 14);
        $this->setXY(10, 55);
        $this->Cell(15, 8, utf8_decode('Fecha: '), 0, 0, 'L', 0);
        $this->Cell(24, 8, utf8_decode('Azogues, '), 0, 0, 'L', 0);
		$this->SetFont('Times', '', 12);
        $this->Cell(45, 8, utf8_decode('16 de marzo del 2023'), 0, 1, 'L', 0);   

		$this->SetFont('Times', 'B', 14);
		$this->setXY(10, 65);
		$this->Cell(15, 8, utf8_decode('Señor: '), 0, 0, 'L', 0);
		$this->SetFont('Times', '', 12);
		$this->Cell(50, 8, utf8_decode('Geovanny Patricio Herrerra Pinos'), 0, 1, 'L', 0);

		$this->SetFont('Times', 'B', 14);
		$this->setXY(10, 75);
		$this->Cell(15, 8, utf8_decode('Dirección: '), 0, 0, 'L', 0);
		$this->SetFont('Times', '', 12);
		$this->setXY(35, 75);
		$this->Cell(0, 8, utf8_decode('Primero de mayo'), 0, 1, 'L', 0);

		$this->SetFont('Times', 'B', 14);
		$this->setXY(10,85);
		$this->Cell(15, 8, utf8_decode('Propietario de: '), 0, 0, 'L', 0);
		$this->SetFont('Times', '', 12);
		$this->setXY(45, 85);
		$this->Cell(0, 8, utf8_decode('Softech'), 0, 1, 'L', 0);


		$this->SetFont('Times', '', 14);
		$this->setXY(10,100);
		$this->MultiCell(190, 8, utf8_decode('Basándonos en la Ley de Defensa Contra Incendios se le exige que cumpla las siguientes recomendaciones:'));





	 

	






		$this->SetFont('Times', 'B', 15);
		$this->setXY(10,250);
		$this->Cell(190, 8, utf8_decode('ABNEGACIÓN Y DISCIPLINA '), 0, 1, 'C', 0);
		$this->SetFont('Times', 'B', 15);
		$this->setXY(0, 270);
		$this->Cell(210, 8, utf8_decode('INSPECTOR'), 0, 1, 'C', 0);




		$this->SetFont('Times', 'B', 15);    
		$this->SetTextColor(255, 34, 17);   
        $this->setXY(0, 45);
        $this->Cell(170, 8, utf8_decode('N°: '), 0, 1, 'R', 0);
		
		$this->setXY(0, 45);		
		$this->Cell(195, 8, utf8_decode('000000001'), 0, 1, 'R', 0);

		


	
		$this->Ln(10);
	}

// Pie de página
	function Footer() {
		// Posición: a 1,5 cm del final
		$this->SetY(-15);

		$this->SetFont('Arial', 'B', 10);
		// Número de página
		//$this->Cell(70, 10, 'Todos los derechos reservados', 0, 0, 'C', 0);
		$this->Cell(200, 10, utf8_decode('Página ') . $this->PageNo() . ' / {nb}', 0, 0, 'C');
	}

// --------------------METODO PARA ADAPTAR LAS CELDAS------------------------------
	var $widths;
	var $aligns;

	function SetWidths($w) {
		//Set the array of column widths
		$this->widths = $w;
	}

	function SetAligns($a) {
		//Set the array of column alignments
		$this->aligns = $a;
	}

	function Row($data, $setX) //yo modifique el script a  mi conveniencia :D
	{
		//Calculate the height of the row
		$nb = 0;
		for ($i = 0; $i < count($data); $i++) {
			$nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
		}

		$h = 8 * $nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h, $setX);
		//Draw the cells of the row
		for ($i = 0; $i < count($data); $i++) {
			$w = $this->widths[$i];
			$a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
			//Save the current position
			$x = $this->GetX();
			$y = $this->GetY();
			//Draw the border
			$this->Rect($x, $y, $w, $h, 'DF');
			//Print the text
			$this->MultiCell($w, 8, $data[$i], 0, $a);
			//Put the position to the right of the cell
			$this->SetXY($x + $w, $y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h, $setX) {
		//If the height h would cause an overflow, add a new page immediately
		if ($this->GetY() + $h > $this->PageBreakTrigger) {
			$this->AddPage($this->CurOrientation);
			$this->SetX($setX);

			//volvemos a definir el  encabezado cuando se crea una nueva pagina
			/* $this->SetFont('Helvetica', 'B', 15);
			$this->Cell(10, 8, 'N', 1, 0, 'C', 0);
			$this->Cell(30, 8, utf8_decode('Nombre'), 1, 0, 'C', 0);
			$this->Cell(30, 8, utf8_decode('Apellido'), 1, 0, 'C', 0);
			$this->Cell(30, 8, utf8_decode('Dirección'), 1, 0, 'C', 0);
			$this->Cell(25, 8, utf8_decode('Teléfono'), 1, 0, 'C', 0);
			$this->Cell(30, 8, 'Correo', 1, 0, 'C', 0);
			$this->Cell(25, 8, 'F. Nac. ', 1, 0, 'C', 0);
			$this->Cell(20, 8, 'Estado', 1, 0, 'C', 0);
			$this->Cell(20, 8, 'Disc', 1, 1, 'C', 0);
			$this->SetFont('Arial', '', 8); */
		}
		if ($setX == 100) {
			$this->SetX(100);
		} else {
			$this->SetX($setX);
		}
	}

	function NbLines($w, $txt) {
		//Computes the number of lines a MultiCell of width w will take
		$cw = &$this->CurrentFont['cw'];
		if ($w == 0) {
			$w = $this->w - $this->rMargin - $this->x;
		}

		$wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
		$s = str_replace("\r", '', $txt);
		$nb = strlen($s);
		if ($nb > 0 and $s[$nb - 1] == "\n") {
			$nb--;
		}

		$sep = -1;
		$i = 0;
		$j = 0;
		$l = 0;
		$nl = 1;
		while ($i < $nb) {
			$c = $s[$i];
			if ($c == "\n") {
				$i++;
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
				continue;
			}
			if ($c == ' ') {
				$sep = $i;
			}

			$l += $cw[$c];
			if ($l > $wmax) {
				if ($sep == -1) {
					if ($i == $j) {
						$i++;
					}

				} else {
					$i = $sep + 1;
				}

				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
			} else {
				$i++;
			}
		}
		return $nl;
	}
// -----------------------------------TERMINA---------------------------------
}

//------------------OBTENES LOS DATOS DE LA BASE DE DATOS-------------------------
$data = new Conexion();
$conexion = $data->conect();
$strquery = "SELECT * FROM contribuyentes";
$result = $conexion->prepare($strquery);
$result->execute();
$data = $result->fetchall(PDO::FETCH_ASSOC);



//--------------TERMINA BASE DE DATOS-----------------------------------------------

// Creación del objeto de la clase heredada
$pdf = new PDF(); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); //añade l apagina / en blanco
$pdf->SetMargins(10, 10, 10); //MARGENES
$pdf->SetAutoPageBreak(true, 20); //salto de pagina automatico

// -----------ENCABEZADO------------------
$pdf->SetXY(10,120);
$pdf->SetFont('Helvetica', 'B', 15);
$pdf->Cell(60, 8, utf8_decode('Extintores:'), 0, 0, 'L', 0);
$pdf->Cell(130, 25, utf8_decode(''), 1, 1, 'C', 0);
$pdf->Cell(60, 8, utf8_decode('Señaletica:'), 0, 0, 'L', 0);
$pdf->Cell(130, 25, utf8_decode(''), 1, 1, 'C', 0);
$pdf->Cell(60, 8, utf8_decode('Cables Electricos:'), 0, 0, 'L', 0);
$pdf->Cell(130, 25, utf8_decode(''), 1, 1, 'C', 0);
$pdf->Cell(60, 8, utf8_decode('Ventilacion:'), 0, 0, 'L', 0);
$pdf->Cell(130, 25, utf8_decode(''), 1, 1, 'C', 0);
$pdf->Cell(60, 8, utf8_decode('Otros:'), 0, 0, 'L', 0);
$pdf->Cell(130, 25, utf8_decode(''), 1, 1, 'C', 0);
$pdf->Cell(60, 8, utf8_decode('Evidencia:'), 0, 0, 'L', 0);
$pdf->Cell(130, 35, utf8_decode(''), 1, 1, 'C', 0);








// -------TERMINA----ENCABEZADO------------------

$pdf->SetFillColor(233, 229, 235); //color de fondo rgb
$pdf->SetDrawColor(61, 61, 61); //color de linea  rgb

$pdf->SetFont('Arial', '', 8);

//El ancho de las celdas
$pdf->SetWidths(array(10, 30, 30, 30,30,25,30,25,20,20,25)); //???
// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
$pdf->SetAligns(array('C','C','L','L','L','C','L','C','C','C'));

/* for ($i = 0; $i < count($data); $i++) { 
    $pdf->Row(array($i + 1, $data[$i]['identificacion'], 
    utf8_decode($data[$i]['nombre']),  
    utf8_decode($data[$i]['apellidos']),
    utf8_decode($data[$i]['direccion']), 
    $data[$i]['telefono'], $data[$i]['email'], 
    $data[$i]['fecha_nacimiento'], 
    $data[$i]['estado'], 
    $data[$i]['discapacidad']),15);
} */




$pdf->Output();
?>