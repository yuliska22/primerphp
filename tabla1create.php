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
     
    $libro   = $_POST['libro'];
    $nombre  = $_POST['nombre'];
    $apellido     = $_POST['apellido'];


    $statement=$mbd->prepare("INSERT INTO `table1`( `libro`, `nombre`, `apellido`) VALUES (:lib,:nom,:ape)");
    $statement->bindParam(':lib', $libro); 
    $statement->bindParam(':nom', $nombre);
    $statement->bindParam(':ape', $apellido);

    

    $statement->execute();
    $data=array("id"=>$mbd->lastInsertId(),"libro"=>$libro,"nombre"=>$nombre,"apellido"=>$apellido);


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