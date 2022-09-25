<?php


// Conexión a la base de datos
try{
    $mbd = new  PDO ( 'mysql:host=localhost;dbname=biblioteca' , 'root' , '' );
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

try 
{   
    
    $id =$_POST['id_table1'];
    $libro   = $_POST['libro'];
    $nombre  = $_POST['nombre'];
    $apellido     = $_POST['apellido'];
    

    $statement=$mbd->prepare("UPDATE `table1` SET `libro`=:lib,`nombre`=:nom,`apellido`=:ape WHERE id_table1=:id ");
    $statement->bindParam(':id', $id);
    $statement->bindParam(':lib', $libro); 
    $statement->bindParam(':nom', $nombre);
    $statement->bindParam(':ape', $apellido);
   


    $statement->execute();
    

    header('Content-type:application/json;charset=utf-8');    
    echo json_encode( ["mensaje"=> "Registro actualizado satisfactoriamente","data"=>$_POST]);

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