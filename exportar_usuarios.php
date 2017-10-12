<?php  
	
	// Exportar datos a excel

	include 'conexion_bd.php';

	$sql = "SELECT * FROM clientesnuevos ORDER BY cedula ASC";
	$resultado = mysqli_query($con, $sql);
	$registros = mysqli_num_rows ($resultado);

	if($registros > 0 ){

		// Aquí se trae la libreria de PHPExcel
		require_once 'Classes/PHPExcel.php';

		// Declaración del objeto de la librería usada
		$objPHPExcel = new PHPExcel();

		// Información de las propiedades del excel
		$objPHPExcel->getProperties()
        ->setCreator("asweb.co")
        ->setLastModifiedBy("asweb.co")
        ->setTitle("Exportar excel desde mysql")
        ->setSubject("Clientes Nuevos")
        ->setDescription("Documento generado con PHPExcel")
        ->setKeywords("asweb.co  php  phpexcel")
        ->setCategory("Clientes_nuevos");

        $i = 1;

        while($row = mysqli_fetch_object($resultado)){

        	// Resultados de la BD que pone en cada campo del excel.
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $row->cedula);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, $row->nombre);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $row->fecha);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $row->habeasData);

        	$i++;
        }
	}

	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="clientesNuevos.xls"');
	header('Cache-Control: max-age=0');

	$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
	$objWriter->save('php://output');
	exit;
?>