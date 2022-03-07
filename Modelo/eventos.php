<?php
include_once "funciones.php";
    
if(isset($_POST['action']) or isset($_GET['view'])) //show all events
{
    if(isset($_GET['view']))
    {
        header('Content-Type: application/json');
        $inicio = mysqli_real_escape_string($conexion,$_GET["inicio"]);
        $fin = mysqli_real_escape_string($conexion,$_GET["fin"]);
        
        $result = Query("SELECT 'id', 'inicio' ,'fin' ,'titulo' FROM  'eventos_calendario' where (date(inicio) >= '$inicio' AND date(inicio) <= '$fin')");
        while($row = mysqli_fetch_assoc($result))
        {
            $events[] = $row; 
        }
        echo json_encode($events); 
        exit;
    }
    elseif($_POST['action'] == "add") // add new event
    {   
        Query("INSERT INTO 'eventos_calendario' (
                    'titulo' ,
                    'inicio' ,
                    'fin' 
                    )
                    VALUES (
                    '".mysqli_real_escape_string($conexion,$_POST["titulo"])."',
                    '".mysqli_real_escape_string($conexion,date('Y-m-d H:i:s',strtotime($_POST["inicio"])))."',
                    '".mysqli_real_escape_string($conexion,date('Y-m-d H:i:s',strtotime($_POST["fin"])))."'
                    )");
        header('Content-Type: application/json');
        echo '{"id":"'.mysqli_insert_id($conexion).'"}';
        exit;
    }
    elseif($_POST['action'] == "update")  // update event
    {
        Query("UPDATE 'eventos_calendario' set 
            'inicio' = '".mysqli_real_escape_string($conexion,date('Y-m-d H:i:s',strtotime($_POST["inicio"])))."', 
            'fin' = '".mysqli_real_escape_string($conexion,date('Y-m-d H:i:s',strtotime($_POST["fin"])))."' 
            where id = '".mysqli_real_escape_string($conexion,$_POST["id"])."'");
        exit;
    }
    elseif($_POST['action'] == "delete")  // remove event
    {
        Query("DELETE from 'eventos_calendario' where id = '".mysqli_real_escape_string($conexion,$_POST["id"])."'");
        if (mysqli_affected_rows($conexion) > 0) {
            echo "1";
        }
        exit;
    }
}
?>