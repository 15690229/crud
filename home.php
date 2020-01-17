<?php
	include_once('./views/header.php');
	include_once('./config/conexion.php');
	$ver = false;
?>
<body>
<div class="container">
	<div class="m-2"> <!--esa clase es de boostrap ya definida -->
				
		<a class="btn btn-outline-success" href="views/create.php"><i class="far fa-plus-square"></i> Agregar bebida</a>
	</div>
   		<div>
			 
			  <?php 
				  $bebidas = new Database();
				  $listaBebidas = $bebidas->readSodas();
				  $i = 0;
				  if($listaBebidas->rowCount()>0){
			  
				?>
						<table class="table table-bordered">					
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">marca</th>
									<th scope="col">sabor</th>
									<th scope="col">tamaño</th>
									<th scope="col">cantidad</th>
									<th scope="col">editar</th>
									<th scope="col">eliminar</th>
								</tr>
							</thead>
			<?php
						while($row = $listaBebidas->fetch(PDO::FETCH_ASSOC)){
								$i = $i + 1;
								$id = $row['id'];
								$marca = $row['marca'];
								$sabor = $row['sabor'];
								$tamano = $row['tamano'];	
								$cantidad = $row['cantidad'];		
			  ?>
							<tbody>			
									<tr>
										<th scope="row"><?php echo $i; ?></th>
										<td><?php echo $marca;?></td>
										<td><?php echo $sabor;?></td>
										<td><?php echo $tamano;?></td>
										<td><?php echo $cantidad;?></td>
										<td> <a class="btn btn-outline-info" href="./views/update.php?id=<?php echo $id; ?>"> <i class="far fa-edit"></i></a> </td>
										<td> <a class="btn btn-outline-danger" href="./views/delete.php?id=<?php echo $id; ?>"><i class="far fa-trash-alt"></i></a></td>

									</tr>
							<?php 
								}
							
							?>

						</tbody>
				</table>
			<?php						
			}else{
					?>
					    <div class="m-1 alert alert-warning">
                            <p>No hay bebidas registradas :(</p>
                        </div>
			<?php
			}
				?>
    	</div>
</div>
</body>
<?php
	include_once('./views/footer.php')
?>