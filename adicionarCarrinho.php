<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST')  
  {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];
    
    $arq = fopen("carrinho.txt","a+") or die("erro ao criar arquivo");
    
    $linha = "id;nome;preco;quantidade\n";
    
    $linha = $id . ";" . $nome . ";" . $preco . ";" . $quantidade "\n";
    
    fwrite($arq,$linha);

    fclose($arq);
    
  }
?>