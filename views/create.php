<?php
	include_once('./header.php')
?>
<body>
	<div class="container m-2">
		<a class="btn btn-outline-info" href="../home.php"><i class="fas fa-backspace"></i> Regresar</a>
		
		<?php  
			include_once("../config/conexion.php");
			if(isset($_POST) && !empty($_POST)){
				$bebida = new Database();
				$marca = $_POST['marca'];
				$sabor = $_POST['sabor'];
				$tamano = $_POST['tamano'];	
				$cantidad = $_POST['cantidad'];	
				
				$insertar = $bebida->createSoda($marca,$sabor, $tamano, $cantidad);
				if($insertar){
					$class = "alert alert-success";
					$message = "Datos enviados correctamente";
				}else {
					$class = "alert alert-danger";
					$message = "Datos no validos";

				}?>

				<div class="m-1 <?php  echo $class; ?>">
					<?php echo $message; ?>
			
				</div>
		<?php
			} 
			?>



		<div class="m-1">
	      <form method="post">
	        <div class="row">
	          <div class="col">
	            <div class="form-group">
	              <label for="marca">Marca</label>
	              <input type="text" name="marca" class="form-control" id="marca" placeholder="Marca de la bebida">
	            </div>
	          </div>

	          <div class="col">
	            <div class="form-group">
	              <label for="sabor">Sabor</label>
	              <input type="text" name="sabor" class="form-control" id="sabor" placeholder="Sabor de la bebida">
	            </div>
	          </div>
	        </div>
	          <!-- Segunda parte -->
	        <div class="row">
	          <div class="col">
	            <div class="form-group">
	              <label for="tamano">Tamaño</label>
	              <input type="text" name="tamano" class="form-control" id="tamano" placeholder="Tamaño de la bebida">
	            </div>
	          </div>

	          <div class="col">
	            <div class="form-group">
	              <label for="cantidad">Cantidad</label>
	              <input type="number" name="cantidad" class="form-control" id="cantidad" placeholder="Cantidad de bebidas">
	            </div>
	          </div>
	        </div>
	        <!-- Final -->

	        <button type="submit" class="btn btn-primary">Submit</button>
	      </form>
        </div>

		

	</div>

</body>
<?php
	include_once('./footer.php')
?>