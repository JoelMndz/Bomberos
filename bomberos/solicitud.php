<?php

require 'fpdf/fpdf.php';
require 'conexion/Conexion.php'; //puede que no lo necesiten
class PDF extends FPDF {

	//$this->SetTitle('Permiso');

// Cabecera de página
	function Header() {
		$this->SetTitle(utf8_decode('Solicitud de Inspección'));
        $this->SetFont('Times', 'B', 20);
		$this->setXY(60, 25);
		$this->Cell(90, 8, utf8_decode('SOLICITUD DE INSPECCIÓN'), 0, 1, 'C', 0);
        $this->setXY(60, 25);
		$this->SetFont('Times', 'B', 20);
		$this->Image('img/escudo_sin.png', 10, 10, 30); //imagen(archivo, png/jpg || x,y,tamaño)        
        $this->Image('img/azo.png', 160, 10, 40); //imagen(archivo, png/jpg || x,y,tamaño)
		//$this->setXY(60, 40);
		//$this->Cell(90, 8, utf8_decode('Solicitud de Inspección'), 0, 1, 'C', 0);
		//$this->Image('img/shinheky.png', 150, 10, 35); //imagen(archivo, png/jpg || x,y,tamaño)
        $this->SetFont('Times', 'B', 15);
        $this->setXY(20, 45);
        $this->Cell(15, 8, utf8_decode('Azogues, '), 0, 1, 'R', 0);
		$this->SetFont('Times', '', 12);
        $this->setXY(35, 45);
        $this->Cell(250, 8, utf8_decode('17 de marzo del 2023 '), 0, 1, 'L', 0);   
		$this->SetFont('Times', 'B', 15);       
        $this->setXY(20, 45);
        $this->Cell(230, 8, utf8_decode('Número de solicitud: '), 0, 1, 'C', 0);
		$this->SetFont('Times', '', 12);
        $this->setXY(160, 45);
        $this->Cell(250, 8, utf8_decode('000000001'), 0, 1, 'L', 0);
		$this->SetFont('Times', '', 12);
        $this->setXY(10, 65);
        $this->Cell(10, 6, utf8_decode('Señor '), 0, 1, 'L', 0);
        $this->Cell(10, 6, utf8_decode('Coronel Jairo Araujo Álvarez '), 0, 1, 'L', 0);
		$this->SetFont('Times', 'B', 12);
        $this->Cell(10, 6, utf8_decode('CUERPO DE BOMBEROS DE AZOGUES '), 0, 1, 'L', 0);
		$this->SetFont('Times', '', 12);
        $this->Cell(10, 6, utf8_decode('Presente. - '), 0, 1, 'L', 0);
		$this->setXY(10, 100);
        $this->Cell(10, 6, utf8_decode('De mi consideración: '), 0, 1, 'L', 0);
        $this->Cell(10, 6, utf8_decode('Yo, Geovanny Patricio Herrera Pinos , con # cedula o RUC: 0350008355, propietario o representante '), 0, 1, 'J', 0);
        $this->Cell(10, 6, utf8_decode('legal de Softech , mi contacto es el 0984821482 '), 0, 1, 'L', 0);

		$this->setXY(80, 125);
		$this->SetFont('Times', 'B', 15);
        $this->Cell(10, 6, utf8_decode('Dirección'), 0, 1, 'L', 0);
		//$this->SetFont('Times', 'B', 15);  
		$this->setXY(10, 135);
		$this->SetFont('Times', 'B', 12);
        $this->Cell(40, 6, utf8_decode('Calle Principal: '), 0, 0, 'L', 0);
		$this->SetFont('Times', '', 12);
        $this->Cell(10, 6, utf8_decode('Bolivar'), 0, 1, 'L', 0);
		$this->SetFont('Times', 'B', 12);
        $this->Cell(40, 6, utf8_decode('Calle Secundaria: '), 0, 0, 'L', 0);
		$this->SetFont('Times', '', 12);
        $this->Cell(10, 6, utf8_decode('Serrano'), 0, 1, 'L', 0);
		$this->SetFont('Times', 'B', 12);
        $this->Cell(40, 6, utf8_decode('Parroquia: '), 0, 0, 'L', 0);
		$this->SetFont('Times', '', 12);
        $this->Cell(10, 6, utf8_decode('Azogues'), 0, 1, 'L', 0);
		$this->SetFont('Times', 'B', 12);
        $this->Cell(40, 6, utf8_decode('Referencia: '), 0, 0, 'L', 0);
		$this->SetFont('Times', '', 12);
        $this->Cell(10, 6, utf8_decode('Junto al Banco Bolivariano'), 0, 1, 'L', 0);
		$this->SetFont('Times', 'B', 12);
        $this->Cell(40, 6, utf8_decode('Contactarse con: '), 0, 0, 'L', 0);
		$this->SetFont('Times', '', 12);
        $this->Cell(10, 6, utf8_decode('Juan Carlos Castro'), 0, 1, 'L', 0);

		$this->SetFont('Times', '', 12);
		$this->setXY(10, 170);
        $this->Cell(10, 6, utf8_decode('Por medio de la presente solicito a usted, se digne autorizar a quien corresponda, realice el '), 0, 1, 'J', 0);
        $this->Cell(10, 6, utf8_decode('siguiente trabajo:'), 0, 1, 'L', 0);

		$this->setXY(80, 190);
		$this->SetFont('Times', 'B', 15);
        $this->Cell(10, 6, utf8_decode('Inspección'), 0, 1, 'L', 0);

		$this->setXY(10, 205);
		$this->SetFont('Times', '', 12);
        $this->Cell(10, 6, utf8_decode('Aqui va el tipo de inspección que requiere el contribuyente'), 0, 1, 'L', 0);

		$this->setXY(10, 220);
		$this->SetFont('Times', 'B', 15);
        $this->Cell(10, 6, utf8_decode('Atentamente'), 0, 1, 'L', 0);

		$this->setXY(10, 250);
		$this->SetFont('Times', '', 15);
        $this->Cell(10, 6, utf8_decode('Geovanny Patricio Herrera Pinos'), 0, 1, 'L', 0);





		$this->Ln(20);
	}

// Pie de página
	function Footer() {
		// Posición: a 1,5 cm del final
		$this->SetY(-15);

		$this->SetFont('Arial', 'B', 10);
		// Número de página
		//$this->Cell(170, 10, 'Todos los derechos reservados', 0, 0, 'C', 0);
		$this->Cell(190, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
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
$strquery = "SELECT * FROM rangos";
$result = $conexion->prepare($strquery);
$result->execute();
$data = $result->fetchall(PDO::FETCH_ASSOC);

/* IMPORTANTE: si estan usando MVC o algún CORE de php les recomiendo hacer uso del metodo
que se llama *select_all* ya que es el que haria uso del *fetchall* tal y como ven en la linea 161
ya que es el que devuelve un array de todos los registros de la base de datos
si hacen uso de el metodo *select* hara uso de fetch y este solo selecciona una linea*/

//--------------TERMINA BASE DE DATOS-----------------------------------------------

// Creación del objeto de la clase heredada
$pdf = new PDF(); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); //añade l apagina / en blanco
$pdf->SetMargins(10, 10, 10); //MARGENES
$pdf->SetAutoPageBreak(true, 20); //salto de pagina automatico

// -----------ENCABEZADO------------------
/* $pdf->SetX(50);
$pdf->SetFont('Helvetica', 'B', 15);
$pdf->Cell(10, 8, 'N', 1, 0, 'C', 0);
$pdf->Cell(50, 8, utf8_decode('Descripción'), 1, 0, 'C', 0);
$pdf->Cell(40, 8, 'Estado', 1, 1, 'C', 0); */

// -------TERMINA----ENCABEZADO------------------

$pdf->SetFillColor(233, 229, 235); //color de fondo rgb
$pdf->SetDrawColor(61, 61, 61); //color de linea  rgb

$pdf->SetFont('Arial', '', 12);

//El ancho de las celdas
$pdf->SetWidths(array(10, 50, 40, 35)); //???
// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
$pdf->SetAligns(array('C','L','C'));

/* for ($i = 0; $i < count($data); $i++) {
	$pdf->Row(array($i + 1, $data[$i]['descripcion'], 
	ucwords(strtolower(utf8_decode($data[$i]['estado'])))), 50);
} */

// cell(ancho, largo, contenido,borde?, salto de linea?)

$pdf->Output();
