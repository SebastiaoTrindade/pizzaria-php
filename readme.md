# 🍕 Pizzaria - Sistema de Pedidos em PHP

Este é um projeto simples de uma pizzaria desenvolvido em **PHP** com **MySQL** para gerenciamento de pedidos.

## 🚀 Tecnologias Utilizadas
- PHP
- MySQL
- HTML, CSS e JavaScript
- Bootstrap (para estilização)

## 📌 Funcionalidades
- Cadastro de pizzas 
- Cadastro de massas e bordas
- Registro e gerenciamento de pedidos
- Interface responsiva com Bootstrap
- Listagem de pedidos e status

## ⚙️ Requisitos
- PHP 8
- MySQL
- Servidor Apache (XAMPP, WAMP ou LAMP)

## 📥 Instalação e Configuração
1. Clone o repositório:
   ```bash
   git clone https://github.com/sebastiaotrindade/pizzaria-php.git
   ```
2. Acesse o diretório do projeto:
   ```bash
   cd pizzaria-php
   ```
3. Importe o banco de dados no MySQL:
   - Acesse o **phpMyAdmin** ou use o terminal para importar o arquivo `pizzaria.sql`:
     ```bash
     mysql -u root -p < pizzaria.sql
     ```
4. Configure a conexão com o banco de dados:
   - Edite o arquivo `config.php` e adicione as credenciais do MySQL:
     ```php
     <?php
     $host = 'localhost';
     $dbname = 'pizzaria';
     $usuario = 'root';
     $senha = '';
     $conn = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $senha);
     ?>
     ```
5. Inicie o servidor local:
   ```bash
   php -S localhost:8000
   ```
6. Acesse no navegador:
   ```
   http://localhost:8000
   ```

## 📷 Capturas de Tela
*(Adicione capturas de tela do sistema aqui)*

## 📝 Licença
Este projeto está sob a licença MIT. Sinta-se livre para usá-lo e modificá-lo!

---

Desenvolvido com ❤️ por [SebastiaoTrindade]

