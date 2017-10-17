<?php  
	
	// Exportar datos a excel

	include 'conexion_bd.php';

	$sql = "SELECT * FROM clientes ORDER BY cedula ASC";
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
        ->setCategory("Clientes");

        $i = 1;

        while($row = mysqli_fetch_object($resultado)){

        	// Resultados de la BD que pone en cada campo del excel.
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$i, $row->codigo);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$i, $row->nombre);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$i, $row->cedula);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$i, $row->profesion);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$i, $row->empresa);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$i, $row->direccion);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$i, $row->barrio);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$i, $row->email);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$i, $row->telefono);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$i, $row->celular);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$i, $row->fechaNacimiento);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$i, $row->fechaCumple);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$i, $row->nohijos);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$i, $row->sucursal);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O'.$i, $row->sexo);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P'.$i, $row->habeasData);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.$i, $row->clubVino);
        	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R'.$i, $row->avvillas);

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