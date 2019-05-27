<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Estadisticas</title>

    <style type="text/css">

    </style>
</head>

<body>
    <script src="Highcharts/code/highcharts.js"></script>
    <script src="Highcharts/code/modules/exporting.js"></script>
    <script src="Highcharts/code/modules/export-data.js"></script>
    <script>
        var num6a;
        var num7a;
        var num8a;
        var num9a;
        var num10a;
        var num11a;
    </script>





    <div id="grados" style="width: 600px; height: 400px; margin: 0 auto; padding-right:900px; "></div>

    <div id="edad" style="width: 600px; height: 400px; margin: 0 auto; padding-right:900px; "></div>


    <div id="materias" style="width: 600px; height: 400px; margin: 0 auto; padding-left: 600px; margin-top: -800px;">
    </div>




    <?php

include ("Conexion/connection.php");


$consul6A = "SELECT COUNT(*) as numbery FROM asistencia  WHERE asistencia.Grado LIKE '%6A%' AND asistencia.Asistio = 0";
$consul7A = "SELECT COUNT(*) as numbery FROM asistencia  WHERE asistencia.Grado LIKE '%7A%' AND asistencia.Asistio = 0";
$consul8A = "SELECT COUNT(*) as numbery FROM asistencia  WHERE asistencia.Grado LIKE '%8A%' AND asistencia.Asistio = 0";
$consul9A = "SELECT COUNT(*) as numbery FROM asistencia  WHERE asistencia.Grado LIKE '%9A%' AND asistencia.Asistio = 0";
$consul10A = "SELECT COUNT(*) as numbery FROM asistencia  WHERE asistencia.Grado LIKE '%10A%' AND asistencia.Asistio = 0";
$consul11A = "SELECT COUNT(*) as numbery FROM asistencia  WHERE asistencia.Grado LIKE '%11A%' AND asistencia.Asistio = 0";

$query6A = $conn->query($consul6A);
$query7A = $conn->query($consul7A);
$query8A = $conn->query($consul8A);
$query9A = $conn->query($consul9A);
$query10A = $conn->query($consul10A);
$query11A = $conn->query($consul11A);

while ($row = $query6A->fetch_assoc()) {
echo '<script> num6a = '.$row['numbery'].'</script>';
}
while ($row = $query7A->fetch_assoc()) {
    echo '<script> num7a = '.$row['numbery'].'</script>';
}
while ($row = $query8A->fetch_assoc()) {
    echo '<script> num8a = '.$row['numbery'].'</script>';
}
while ($row = $query9A->fetch_assoc()) {
    echo '<script> num9a = '.$row['numbery'].'</script>';
}
while ($row = $query10A->fetch_assoc()) {
    echo '<script> num10a = '.$row['numbery'].'</script>';
}

while ($row = $query11A->fetch_assoc()) {
    echo '<script> num11a = '.$row['numbery'].'</script>';
}
  ?>
    <script type="text/javascript">
        Highcharts.chart('grados', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Inasistencias por grado'
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: 'grados: <b>{point.y:.1f}  inasistencias</b>'
            },
            series: [{
                name: 'Population',
                data: [
                    
                    ['6A', num6a],
                    ['7A', num7a],
                    ['8A', num8a],
                    ['9A', num9a],
                    ['10A', num10a],
                    ['11A', num11a]
                   
                ],
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    format: '{point.y:.1f}', // one decimal
                    y: 10, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    </script>

    



</body>

</html>