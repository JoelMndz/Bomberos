<?php

require 'fpdf/fpdf.php';
require 'conexion/Conexion.php'; //puede que no lo necesiten
class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
		global $logo;

		$this->SetTitle('Permiso');
		$this->SetFont('Times', 'B', 20);
		$this->setY(45);
		//$w = $this->GetStringWidth($logo)+6;
		//$this->SetX((210-$w)/2);
		$this->Cell(0, 8, utf8_decode('CUERPO DE BOMBEROS DE LA CIUDAD DE AZOGUES'), 0, 1, 'C', 0);
		$this->setXY(200, 5);
		//$w = $this->GetStringWidth($logo)+6;
		//$this->SetX((210-$w)/2);
		$this->SetFont('Times', 'B', 20);
		$this->Image('img/escudo_sin.png', 120, 5, 35); //imagen(archivo, png/jpg || x,y,tamaño)        
		$this->SetFont('Times', 'B', 15);
		$this->setXY(20, 45);

		$this->SetFont('Times', 'B', 15);
		$this->setXY(230,73);
		$this->Cell(240, 8, utf8_decode('N° '), 0, 1, 'L', 0);
		$this->SetFont('Times', '', 12);

		$this->SetFont('Courier', '', 12);
		$this->setXY(10, 55);
		$this->MultiCell(255, 8, utf8_decode('En uso de sus atribuciones establecidas en la Ley de Defensa Contra Incendios, en su Art 36. y la ordenanza que fija la tasa de permisos de funcionamiento anual y provisional según Registro Oficial No.255, concede el presente Permiso de Funcionamiento. '));

		$this->setXY(10, 90);
		$this->SetFont('Times', 'B', 15);
		$this->Cell(10, 8, utf8_decode('Local:______________________________'), 0, 0, 'L', 0);
		$this->setXY(60, 90);
		$this->SetFont('Times', '', 12);
		$this->Cell(10, 8, utf8_decode('Tienda MiniMarket'), 0, 1, 'C', 0);

		$this->setXY(110, 90);
		$this->SetFont('Times', 'B', 15);
		$this->Cell(10, 8, utf8_decode('Propietario:___________________________________'), 0, 0, 'L', 0);
		$this->setXY(180, 90);
		$this->SetFont('Times', '', 12);
		$this->Cell(10, 8, utf8_decode('Geovanny Patricio Herrera Pinos'), 0, 1, 'C', 0);

		$this->setXY(235, 90);
		$this->SetFont('Times', 'B', 15);
		$this->Cell(10, 8, utf8_decode('Valor:______'), 0, 0, 'L', 0);
		$this->setXY(255, 90);
		$this->SetFont('Times', '', 12);
		$this->Cell(10, 8, utf8_decode('$ 9.00'), 0, 1, 'C', 0);

		$this->setXY(10, 100);
		$this->SetFont('Times', 'B', 15);
		$this->Cell(40, 8, utf8_decode('Dirección:________________________________________________________________________________________'), 0, 0, 'L', 0);
		$this->SetFont('Times', '', 12);
		$this->Cell(200, 8, utf8_decode('Serrano y Luis Cordero '), 0, 1, 'C', 0);

		$this->setXY(10, 110);
		$this->SetFont('Times', 'B', 15);
		$this->Cell(40, 8, utf8_decode('Lugar y Fecha de Expedición:_______________________________________________________________________ '), 0, 0, 'L', 0);
		$this->SetFont('Times', '', 12);
		$this->Cell(250, 8, utf8_decode('Lugar y Fecha de Expedición Lugar y Fecha de Expedición'), 0, 1, 'C', 0);

		$this->setXY(10, 120);
		$this->SetFont('Times', 'B', 15);
		$this->Cell(40, 8, utf8_decode('Válido hasta el:____________________________________________________________________________________'), 0, 0, 'L', 0);
		$this->SetFont('Times', '', 12);
		$this->Cell(200, 8, utf8_decode('31 DE DICIEMBRE DEL 2023'), 0, 1, 'C', 0);

		$this->setXY(10, 130);
		$this->SetFont('Courier', '', 12);
		$this->MultiCell(260, 8, utf8_decode('Por haber cumplido los requisitos determinados en el REGLAMENTO de PREVENCIÓN MITIGACIÓN Y PROTECCIÓN CONTRA INCENDIOS:'));

		$this->setXY(0, 150);
		$this->SetFont('Times', 'B', 15);
		$this->Cell(300, 8, utf8_decode('ABNEGACIÓN Y DISCIPLINA'), 0, 1, 'C', 0);

		$this->setXY(30, 190);
		$this->SetFont('Times', 'B', 15);
		$this->Cell(0, 8, utf8_decode('PRIMER JEFE DEL C.B.V.A.'), 0, 1, 'L', 0);

		$this->setXY(180, 190);
		$this->SetFont('Times', 'B', 15);
		$this->Cell(0, 8, utf8_decode('TESORERA DEL C.B.V.A.'), 0, 1, 'C', 0);

		$this->setXY(240, 73);
		$this->SetTextColor(255, 34, 17);
		$this->Cell(250, 8, utf8_decode('000000001'), 0, 1, 'L', 0);


		//$this->Ln(0);
	}
	
	// Pie de página
	function Footer()
	{
		$this->setXY(0, 208);
		$this->SetFont('Times', 'B', 15);
		$this->Cell(0, 8, utf8_decode('Teléfono: 072240188 / 072242102 / 911'), 1, 1, 'C', 0);
	}
}

//------------------OBTENES LOS DATOS DE LA BASE DE DATOS-------------------------
$data = new Conexion();
$conexion = $data->conect();
$strquery = "SELECT * FROM rangos";
$result = $conexion->prepare($strquery);
$result->execute();
$data = $result->fetchall(PDO::FETCH_ASSOC);

//--------------TERMINA BASE DE DATOS-----------------------------------------------

// Creación del objeto de la clase heredada
$pdf = new PDF('L', 'mm', 'Letter'); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); //añade l apagina / en blanco
$pdf->SetMargins(10, 10, 10); //MARGENES
$pdf->SetAutoPageBreak(true, 20); //salto de pagina automatico

$pdf->Output();
