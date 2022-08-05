<?php include("db.php"); ?>

<?php include("includes/header.php"); ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">

                <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?php echo $_SESSION['message']; ?>                
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>    
                <?php session_unset(); } ?>
                <div class="card card-body">
                    <form action="guardar_tarea.php" method="POST">
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="titulo" placeholder="Titulo de la tarea" autofocus>
                        </div>                        
                        <div class="form-group mb-3">
                            <textarea class="form-control" name="descripcion" placeholder="Descripción de la tarea" rows="5"></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" class="btn btn-success btn-block" name="guardar_tarea" value="Guardar tarea">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        
                        $query = "SELECT * FROM tareas";
                        $resultado_tareas = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($resultado_tareas)){ ?>
                        <tr>
                            <td><?php echo $row['titulo']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

<?php include("includes/footer.php  "); ?>