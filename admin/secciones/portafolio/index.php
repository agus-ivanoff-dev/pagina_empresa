<?php

include('../../bd.php');


if(isset($_GET['id'])){

    $id = (isset($_GET['id']))?$_GET['id']:"";

   $sentencia = $conn->prepare("SELECT imagen FROM `portafolio` WHERE id=:id");
   $sentencia->bindParam(":id", $id, PDO::PARAM_INT);
   $sentencia->execute();
   $registro_imagen = $sentencia->fetch(PDO::FETCH_LAZY);

}


$sentencia = $conn->prepare("SELECT * FROM `portafolio`");
$sentencia->execute();
$listaPortafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);





include('../../templates/header.php'); ?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Subtitulo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">URL</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($listaPortafolio as $registro) { ?>
                        <tr class="">
                            <td scope="col"><?php echo $registro['id'] ?></td>
                            <td scope="col"><?php echo $registro['titulo'] ?></td>
                            <td scope="col"><?php echo $registro['subtitulo'] ?></td>
                            <td scope="col">
                                <img width="170" height="70" src="../../../assets/img/portfolio/<?php echo $registro['imagen'];?>" alt="">
                            </td>
                            <td scope="col"><?php echo $registro['descripcion'] ?></td>
                            <td scope="col"><?php echo $registro['cliente'] ?></td>
                            <td scope="col"><?php echo $registro['categoria'] ?></td>
                            <td scope="col"><?php echo $registro['url'] ?></td>
                            <td scope="col">
                            <a name="" id="" class="btn btn-info" href="editar.php?id=<?php echo $registro['id']?>" role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="index.php?id=<?php echo $registro['id']?>" role="button">Eliminar</a> 
                            </td>
                        <?php } ?>
                        </tr>

                </tbody>
            </table>
        </div>

    </div>

</div>

<?php include('../../templates/footer.php'); ?>