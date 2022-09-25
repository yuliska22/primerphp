<?php

try{
    $mbd = new  PDO ( 'mysql:host=localhost;dbname=biblioteca' , 'root' , '' );
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try 
{   
    
      $id_usuario  = $_POST['id_usuario'];
      $usuario     = $_POST['usuario'];
      $tipo_libro =  $_POST['tipo_libro'];
      $fecha_p = $_POST['fecha_p'];
      $vencimiento_P= $_POST['vencimiento_p'];
      $cantidad_libros = $_POST['cantidad_libros']; 
      $valor_pago =$_POST ['valor_pago']; 
      $email= $_POST['email'];


    $statement=$mbd->prepare("INSERT INTO `table2`( `id_usuario`, `usuario`, `tipo_libro`, `fecha_p`, `vencimiento_p`, `cantidad_libros`, `valor_pago`, `email`) 
    VALUES (:id_u,:usuario,:t_l,:f_p,:v_p,:c_l,:v_r,:email)");
  
    $statement->bindParam(':id_u', $id_usuario); 
    $statement->bindParam(':usuario', $usuario);
    $statement->bindParam(':t_l', $tipo_libro);
    $statement->bindParam(':f_p', $fecha_p);
    $statement->bindParam(':v_p', $vencimiento_P);
    $statement->bindParam(':c_l', $cantidad_libros);
    $statement->bindParam(':v_r', $valor_pago);
    $statement->bindParam(':email', $email);

   

    $statement->execute();
    $data=array("id"=>$mbd->lastInsertId(),"id_u"=>$id_usuario,"usuario"=>$usuario,"t_l"=>$tipo_libro,"f_p"=>$fecha_p,"v_p"=>$vencimiento_P,"c_l"=>$cantidad_libros,"v_r"=>$valor_pago,"email"=>$email);
     
    $statement=$mbd->prepare("SELECT * FROM table1 WHERE id_table1= :id LIMIT 1");
    $statement->bindParam(':id', $id_usuario); 
    $statement->execute();
    $data["data_fk"]=$statement->fetchAll(PDO::FETCH_ASSOC)[0];

   
    header('Content-type:application/json;charset=utf-8');    
    echo json_encode( $data);

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