<?php

include("db.php"); 

if(isset($_POST["guardar_tarea"])){
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];

    $query = "INSERT INTO tareas(titulo, descripcion) VALUES ('$titulo', '$descripcion')";
    $resultado = mysqli_query($conn, $query);
    if(!$resultado){
        // die("Query Failed");
        $_SESSION['message'] = 'Tarea no guardada';
        $_SESSION['message_type'] = 'danger';
    }else{
        $_SESSION['message'] = 'Tarea guardada exitosamente';
        $_SESSION['message_type'] = 'success';
    }    

    header("Location: index.php");
}

?>