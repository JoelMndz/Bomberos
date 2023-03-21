<?php 
require('conexion.php');
	$data=new conexion();
	$conexion=$data->conect();
	$strquery ="SELECT * FROM rangos";
	$result = $conexion->prepare($strquery);
	$result->execute();
	$data = $result->fetchall(PDO::FETCH_ASSOC);
	
	var_dump($data);
 ?>

<?php 
require('conexion.php');
	$data=new conexion();
	$conexion=$data->conect();
	$strquery ="SELECT * FROM contribuyentes";
	$result = $conexion->prepare($strquery);
	$result->execute();
	$data = $result->fetchall(PDO::FETCH_ASSOC);
	
	var_dump($data);
 ?>

<?php 
require('conexion.php');
	$data=new conexion();
	$conexion=$data->conect();
	$strquery ="SELECT * FROM roles";
	$result = $conexion->prepare($strquery);
	$result->execute();
	$data = $result->fetchall(PDO::FETCH_ASSOC);
	
	var_dump($data);
 ?>

<?php 
require('conexion.php');
	$data=new conexion();
	$conexion=$data->conect();
	$strquery ="SELECT * FROM tipo_inspeccion";
	$result = $conexion->prepare($strquery);
	$result->execute();
	$data = $result->fetchall(PDO::FETCH_ASSOC);
	
	var_dump($data);
 ?>

<?php 
require('conexion.php');
	$data=new conexion();
	$conexion=$data->conect();
	$strquery ="SELECT * FROM usuarios";
	$result = $conexion->prepare($strquery);
	$result->execute();
	$data = $result->fetchall(PDO::FETCH_ASSOC);
	
	var_dump($data);
 ?>

<?php 
require('conexion.php');
	$data=new conexion();
	$conexion=$data->conect();
	$strquery ="SELECT * FROM locales";
	$result = $conexion->prepare($strquery);
	$result->execute();
	$data = $result->fetchall(PDO::FETCH_ASSOC);
	
	var_dump($data);
 ?>