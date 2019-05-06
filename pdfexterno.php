<?php
function generateRow()
{
    $contents = '';
    include_once 'connection.php';
    $sql = "SELECT * FROM registroexterno";

    //use for MySQLi OOP
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
        $contents .= "
            <tr>
                <td>" . $row['Cedula'] . "</td>
                <td>" . $row['Nombre'] . "</td>
                <td>" . $row['Apellido'] . "</td>

        <td>" . $row['Telefono'] . "</td>
                <td>" . $row['Fecha'] . "</td>
        <td>" . $row['Moivo'] . "</td>
            </tr>
            ";
    }

    return $contents;
}

require_once 'tcpdf/tcpdf.php';
$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("Reporte Usuarios externos");
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
        <center><h2 align="center">Reporte Usuarios externos</h2>
        <table border="1" cellspacing="0" cellpadding="3">
           <tr style="color:green;font-weight:bold">
                <th width="15%"  >Cedula</th>
                <th width="15%" >Nombre</th>
                <th width="15%">Apellido</th>
        <th width="15%">Telefono</th>
        <th width="15%">Fecha</th>
                <th width="20%">Motivo</th>
           </tr>
      ';
$content .= generateRow();
$content .= '</table>';
$pdf->writeHTML($content);
$pdf->Output('alumnos.pdf', 'I');
