<?php 


include "Conexion/connection.php";
include "class.upload.php";

if(isset($_FILES["name"])){
    $up = new Upload($_FILES["name"]);
    if($up->uploaded){
        $up->Process("./uploads/");
        if($up->processed){
            /// leer el archivo excel
            require_once 'PHPExcel/php-excel-reader/excel_reader2.php';
            $archivo = "uploads/".$up->file_dst_name;
            $inputFileType = PHPExcel_IOFactory::identify($archivo);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($archivo);
            $sheet = $objPHPExcel->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); 
            $highestColumn = $sheet->getHighestColumn();
            for ($row = 2; $row <= $highestRow; $row++){ 
                $x_Codigo = $sheet->getCell("A".$row)->getValue();
                $x_Nombre = $sheet->getCell("B".$row)->getValue();
                $x_Apellido = $sheet->getCell("C".$row)->getValue();
                $x_Edad = $sheet->getCell("D".$row)->getValue();
                $x_Curso = $sheet->getCell("E".$row)->getValue();
                $x_Telefono = $sheet->getCell("F".$row)->getValue();
                 $x_Direccion = $sheet->getCell("G".$row)->getValue();
                $sql = "INSERT INTO alumnos (Codigo, Nombre, Apellido, Edad, Curso, Telefono, Direccion) value ";
                $sql .= " (\'$x_Codigo\',\'$x_Nombre\',\'$x_Apellido\',\'$x_Edad\',\'$x_Curso\',\'$x_Telefono\', \'$x_Direccion\', NOW())";
               $conn->query($sql);
            }
        unlink($archivo);
        }   

}
}







 ?>