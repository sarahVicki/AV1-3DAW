<!DOCTYPE html>
<html>
  <head>
    <title>Alterar Produto</title>
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
    <form action="alterarProduto.php" method="POST">
        <h2>Alterar Produto</h2>
        Id que deseja alterar: <input type="text" name="idOriginal">
        <br><br>
        Novo Id: <input type="text" name="novoId">
        <br><br>
        Novo nome: <input type="text" name="novoNome">
        <br><br>
        Novo valor: <input type="text" name="novoValor">
        <br><br>
        <input type="submit" value="Alterar Produto">
      </form>
      <div>
        <h2>Outras opções</h2>
        <a href="incluirProduto.php">Incluir Produto</a><br>
        <a href="buscarProduto.php">Buscar Produto</a><br>
        <a href="listarProdutos.php">Listar Produtos</a><br>
        <a href="excluirProduto.php">Excluir Produto</a><br>
      </div>
    </section>
  </body>
</html>


<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  $idOriginal = $_POST["idOriginal"];
  $novoId = $_POST["novoId"];
  $novoNome = $_POST["novoNome"];
  $novoValor = $_POST["novoValor"];
  
  $id = "";
  $nome = "";
  $valor = "";

  $arq = fopen("produtos.txt","r") or die("erro ao abrir arquivo");
  $arqAux = fopen("auxiliar.txt","w") or die("erro ao criar arquivo");

  
  $x = 0;  
  $linhas[] = fgets($arq);
    
    while (!feof($arq)) {
			
      $linhas[] = fgets($arq);
			$colunaDados = explode(";", $linhas[$x]);
      
			$id = $colunaDados[0];
			$nome = $colunaDados[1];
			$valor = $colunaDados[2];
    
      if ($idOriginal==$id){
        $id = $novoId;
        $nome = $novoNome;
        $valor = $novoValor;
      }
      
      $linha = $id . ";" . $nome . ";" . $valor . "\n";
      fwrite($arqAux,$linha);

			$x++;
    }  

  fclose($arq);
  fclose($arqAux);

  $arq = fopen("produtos.txt","a") or die("erro ao abrir arquivo");
  $arqAux = fopen("auxiliar.txt","r") or die("erro ao criar arquivo");

  copy("auxiliar.txt", "produtos.txt");
  
  fclose($arq);
  fclose($arqAux);

}
  unlink("auxiliar.txt");

?> 
