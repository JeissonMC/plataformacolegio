<?php
function generateRow()
{
    $contents = '';
    include_once 'Conexion/connection.php';
    $sql = "SELECT * FROM alumnos";

    //use for MySQLi OOP
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
        $contents .= "
            <tr>
                <td>" . $row['ID'] . "</td>
                <td>" . $row['Nombre'] . "</td>
                <td>" . $row['Apellido'] . "</td>
        <td>" . $row['Edad'] . "</td>
        <td>" . $row['Curso'] . "</td>
                <td>" . $row['Telefono'] . "</td>
        <td>" . $row['Direccion'] . "</td>
            </tr>
            ";
    }

    return $contents;
}

require_once 'tcpdf/tcpdf.php';
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("Lista de alumnos");
$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('helvetica', '', 11);
$pdf->AddPage();
$content = '';
$content .= '
        <center><h2 align="center">Lista de alumnos</h2>
        <table border="1" cellspacing="0" cellpadding="3">
           <tr style="color:green;font-weight:bold">
                <th width="5%"  >ID</th>
                <th width="15%" >Nombre</th>
                <th width="15%">Apellido</th>
        <th width="10%">Edad</th>
        <th width="10%">Curso</th>
        <th width="15%">Telefono</th>
                <th width="20%">Dirección</th>
           </tr>
      ';
$content .= generateRow();
$content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('alumnos.pdf', 'I');
