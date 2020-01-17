<?php
    include_once('../config/conexion.php');

    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $eliminar = new Database();
        $eliminar = $eliminar->deleteSoda($id);
        if($eliminar){
            header('Location: ../home.php');
        }else{
            include_once('./header.php');
            ?>
                <body>
                    <div class="container">
                        <div class="m-1 alert alert-danger">
                            <p>Eliminar Falló</p>
                        </div>
                    </div>
                </body>
            <?php 
            include_once('./footer.php');
        }
    }
    ?>