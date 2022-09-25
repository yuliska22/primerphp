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
    
     
    $id   = $_GET['id'];
   
    $statement=$mbd->prepare("SELECT * FROM table1 WHERE id_table1= :id LIMIT 1");

    $statement->bindParam(':id', $id); 
   
    $statement->execute();
    $data=$statement->fetchAll(PDO::FETCH_ASSOC);


    header('Content-type:application/json;charset=utf-8');    
    echo json_encode( $data[0]);

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