<?php
    include_once ('conn.php');
    
    $method = $_SERVER['REQUEST_METHOD'];

    // Resgate dos dados e montagem do pedido
    if ($method === 'GET') {

        $bordasQuery = $conn->query("SELECT * FROM bordas");
        $bordas = $bordasQuery->fetchAll(PDO::FETCH_ASSOC);
        

        $massasQuery = $conn->query("SELECT * FROM massas");
        $massas = $massasQuery->fetchAll(PDO::FETCH_ASSOC);

        $saboresQuery = $conn->query("SELECT * FROM sabores");
        $sabores = $saboresQuery->fetchAll(PDO::FETCH_ASSOC);

        

    }else if ($method === 'POST') {

    }
?>