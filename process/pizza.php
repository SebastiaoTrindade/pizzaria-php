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

            // Salvando borda e massa na pizza            
            $stmt = $conn->prepare('INSERT INTO pizzas (borda_id, massa_id) VALUES (:borda, :massa)');

            // Filtrando inputs
            $stmt->bindParam(':borda', $borda, PDO::PARAM_INT);
            $stmt->bindParam(':massa', $massa, PDO::PARAM_INT);
            $stmt->execute();

            // Resgata o ID do pedido
            $pizzaId = $conn->lastInsertId();

            $stmt = $conn->prepare("INSERT INTO pizza_sabor(pizza_id, sabor_id) VALUES (:pizza, :sabor)"); 

            // Insere os sabores no banco de dados
            foreach ($sabores as $sabor) {
                // Filtrando inputs
                $stmt->bindParam(':pizza', $pizzaId, PDO::PARAM_INT);
                $stmt->bindParam(':sabor', $sabor, PDO::PARAM_INT);
                $stmt->execute();
                
            }

            // Criar o pedido da pizza            
            $stmt = $conn->prepare('INSERT INTO pedidos (pizza_id, status_id) VALUES (:pizza, :status)');

            // Status sempre inicia com 1 (Em produção)
            $status_id = 1;

            // Filtrando inputs
            $stmt->bindParam(':pizza', $pizzaId);
            $stmt->bindParam(':status', $status_id);
            $stmt->execute();

            // Exibir mensagem de sucesso
            $_SESSION['msg'] = "Pedido realizado com sucesso!";
            $_SESSION['status'] = "success";
        }

        // Retorna para a página inicial
        header('Location: ..');

    }
?>