<!DOCTYPE html>
<html>
  <head>
    <title>Incluir Produto</title>
    <style>
      body {
        background-color: rgb(241, 236, 221);
        font-family: Arial, Helvetica, sans-serif;
      }

      section{
        display: flex;
        justify-content: space-around;
        width: 100%;
      }

      form {
        background-color: white;
        margin-top: 20px;
        margin-bottom: 20px;
        padding-top: 5px;
        padding-bottom: 15px;
        padding-left: 20px;
        width: 50%;
        border-radius: 5%;
        box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
      }

      div {
        width: 30%;
        display: grid;
        justify-content: center;
      }
      
      a {
        color: black;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <section>
    <form action="incluirProduto.php" method="POST">
        <h2>Incluir Produto</h2>
        ID: <input type="text" name="id"><br><br>
        Nome: <input type="text" name="nome"><br><br>
        Valor: <input type="text" name="valor"><br><br>
        <input type="submit" value="Incluir Produto">
      </form>
      <div>
        <h2>Outras opções</h2>
        <a href="alterarProduto.php">Alterar Produto</a><br>
        <a href="buscarProduto.php">Buscar Produto</a><br>
        <a href="listarProdutos.php">Listar Produtos</a><br>
        <a href="excluirProduto.php">Excluir Produto</a><br>
      </div>
    </section>

  </body>
</html>


<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $id = $_POST["id"];
  $nome = $_POST["nome"];
  $valor = $_POST["valor"];

  $arq = fopen("produtos.txt","a") or die("erro ao criar arquivo");
    
  $linha = "id;nome;valor\n";
  $linha = $id . ";" . $nome . ";" . $valor . "\n";
    
  fwrite($arq,$linha);
  fclose($arq);
}

?> 
