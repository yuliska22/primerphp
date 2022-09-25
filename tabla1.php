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
    
    $statement=$mbd->prepare("SELECT * from table1");

    $statement->execute();
    $data=$statement->fetchAll(PDO::FETCH_ASSOC);



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