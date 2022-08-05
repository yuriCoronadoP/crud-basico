<?php 
include("db.php"); 

if(isset($_GET['id'])){
     $id = $_GET['id'];
     $query = "SELECT * FROM tareas WHERE id = $id";
     $resultado = mysqli_query($conn, $query);
     if(mysqli_num_rows($resultado) === 1){
        $row = mysqli_fetch_array($resultado);
        $titulo = $row['titulo'];
        $descripcion = $row['descripcion'];
    }
}

if(isset($_POST['actualizar'])){
    $id = $_GET['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE tareas SET titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Tarea actualizada exitosamente';
    $_SESSION['message_type'] = 'info';
    header("Location: index.php");
}


?>

<?php include("includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-control" placeholder="Actualiza el titulo">
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="descripcion" rows="5" class="form-control" placeholder="Actualiza la descripcion"><?php echo $descripcion; ?></textarea>
                    </div>
                    <button name="actualizar" class="btn btn-success">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>