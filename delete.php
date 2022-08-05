<?php 
include("db.php"); 

if(isset($_GET['id'])){
     $id = $_GET['id'];
     $query = "DELETE FROM tareas WHERE id = $id";
     $resultado = mysqli_query($conn, $query);
     if(!$resultado){
        // die("Query Failed");
        $_SESSION['message'] = 'Tarea no eliminada';
        $_SESSION['message_type'] = 'danger';
    }else{
        $_SESSION['message'] = 'Tarea eliminada exitosamente';
        $_SESSION['message_type'] = 'warning';
    }  
    header("Location: index.php");
}

?>