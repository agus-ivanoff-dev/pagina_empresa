<?php 

include('../../bd.php');

if(isset($_GET['id'])){

    $id = (isset($_GET['id']))?$_GET['id']:"";

    $sentencia = $conn->prepare("SELECT * FROM `servicios` WHERE id=:id");

    $sentencia->bindParam(':id',$id);

    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $icono = $registro['icono'];
    $titulo = $registro['titulo'];
    $descripcion = $registro['descripcion'];


}

if($_POST){
    $id = (isset($_POST['id']))?$_POST['id']:"";
    $icono = (isset($_POST['icono']))?$_POST['icono']:"";
    $titulo = (isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";

    $sentencia = $conn->prepare("UPDATE servicios 
                                SET icono=:icono,
                                    titulo=:titulo, 
                                    descripcion=:descripcion
                                WHERE id=:id");

    $sentencia->bindParam(':icono',$icono);
    $sentencia->bindParam(':titulo',$titulo);
    $sentencia->bindParam(':descripcion',$descripcion);
    $sentencia->bindParam(':id',$id);

    $sentencia->execute();
    $mensaje = "editado correctamente";
    header("Location:index.php?mensaje=" . $mensaje);

}


include('../../templates/header.php');?>

<div class="card">
    <div class="card-header">
        Editando la información de Servicios
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">

            <div class="mb-3">
              <label for="id" class="form-label">ID: </label>
              <input readonly type="text" value="<?php echo $id;?>" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3">
                <label for="icono" class="form-label">Icono:</label>
                <input type="text" value="<?php echo $icono;?>" class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="Icono">

            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo: </label>
                <input type="text" value="<?php echo $titulo;?>" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">


                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion: </label>
                    <input type="text" value="<?php echo $descripcion;?>" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">

                </div>

                <button type="submit" class="btn btn-success">Actualizar</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>

    <div class="card-footer text-muted">

    </div>

</div>


<?php include('../../templates/footer.php');?>