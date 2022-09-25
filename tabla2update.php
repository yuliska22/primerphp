<?php

try{
    $mbd = new  PDO ( 'mysql:host=localhost;dbname=biblioteca' , 'root' , '' );
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try 
{   
      $id_table2=$_POST['id_table2'];
      $id_usuario  = $_POST['id_usuario'];
      $usuario     = $_POST['usuario'];
      $tipo_libro =  $_POST['tipo_libro'];
      $fecha_p = $_POST['fecha_p'];
      $vencimiento_P= $_POST['vencimiento_p'];
      $cantidad_libros = $_POST['cantidad_libros']; 
      $valor_pago =$_POST ['valor_pago']; 
      $email= $_POST['email'];

  $statement=$mbd->prepare ("UPDATE `table2` SET `id_usuario`= ? ,`usuario`= ?,`tipo_libro`= ?,`fecha_p`= ?,`vencimiento_p`= ?,`cantidad_libros`= ?,`valor_pago`= ?,`email`= ? WHERE id_table2 = ? ");
   
    
    $statement->bindParam( 1 , $id_usuario); 
    $statement->bindParam( 2, $usuario);
    $statement->bindParam(3 , $tipo_libro);
    $statement->bindParam( 4, $fecha_p);
    $statement->bindParam( 5, $vencimiento_P);
    $statement->bindParam(6, $cantidad_libros);
    $statement->bindParam(7 , $valor_pago);
    $statement->bindParam( 8, $email);
    $statement->bindParam(9 , $id_table2); 

   

    $statement->execute();
    $data=array("id"=>$id_table2,"id_u"=>$id_usuario,"usuario"=>$usuario,"t_l"=>$tipo_libro,"f_p"=>$fecha_p,"v_p"=>$vencimiento_P,"c_l"=>$cantidad_libros,"v_r"=>$valor_pago,"email"=>$email);
      $statement=$mbd->prepare("SELECT * FROM table1 WHERE id_table1= :id LIMIT 1");
    $statement->bindParam(':id', $id_usuario); 
    $statement->execute();
    $data["data_fk"]=$statement->fetchAll(PDO::FETCH_ASSOC)[0];

   
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode( ["mensaje"=> "Registro actualizado satisfactoriamente","data"=>$data]);

} catch (PDOException $e) {
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode([
        'error' => [
            'codigo' =>$e->getCode() ,
            'mensaje' => $e->getMessage()
        ]
    ]);
}



?>