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

        $data = $_POST;

        $borda = $data['borda'];
        $massa = $data['massa'];
        $sabores = $data['sabores'];

        // Validação de sabores (máximo 3)
        if (count($sabores) > 3) {
            
            $_SESSION['msg'] = "Selecione no máximo 3 sabores";
            $_SESSION['status'] = "warning";

        }else {
            echo "Pedido enviado com sucesso";
            exit;
        }

        // Retorna para a página inicial
        header('Location: ..');

    }
?>