<?php 
include('../../bd.php');
if(isset($_GET['txtID'])){

    echo $_GET['txtID'];   

    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia = $conn->prepare("DELETE FROM `servicios` WHERE id=:id");

    $sentencia->bindParam(':id',$txtID);

    $sentencia->execute();


}

$sentencia = $conn->prepare("SELECT * FROM `servicios`");
$sentencia->execute();
$listaServicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);


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
                        <th scope="col">Icono</th>
                        <th scope="col">Título</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listaServicios as $servicio){?>
                    <tr class="">
                        <td><?php echo $servicio['id']?></td>
                        <td><?php echo $servicio['icono']?></td>
                        <td><?php echo $servicio['titulo']?></td>
                        <td><?php echo $servicio['descripcion']?></td>
                        <td>
                            <a name="" id="" class="btn btn-info" href="editar.php?id=<?php echo $servicio['id']?>" role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $servicio['id']?>" role="button">Eliminar</a> 
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('../../templates/footer.php'); ?>