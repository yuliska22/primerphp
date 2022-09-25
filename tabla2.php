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

    
    $statement=$mbd->prepare("SELECT * from table2");

    
       $statement->execute();
    $data=$statement->fetchAll(PDO::FETCH_ASSOC);

    for ($i=0; $i < count($data);$i++) { 
        $statement=$mbd->prepare("SELECT * FROM table1 WHERE id_table1= :id LIMIT 1");
        $statement->bindParam(':id', $data[$i]["id_usuario"]); 
        $statement->execute();
        $data[$i]["data_fk"]=$statement->fetchAll(PDO::FETCH_ASSOC)[0];
    }

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