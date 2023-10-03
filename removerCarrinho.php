<?php

  $arq = fopen("carrinho.txt","r") or die("erro ao abrir arquivo");
  $arqaux = fopen("arquivoAux.txt","w") or die("erro ao criar arquivo");

  $x = 0;
  $linhas[] = fgets($arq);

  if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
    $id2 = $_POST["id"];
    $id = "";
    $nome = "";
    $preco = "";
    $quantidade = "";

    while (!feof($arq)){
      
        $linhas[] = fgets($arq);
	    $colunaDados = explode(";", $linhas[$x]);
      
      $id = $colunaDados[0];
      $nome = $colunaDados[1];
      $preco = $colunaDados[2];
      $quantidade = $colunaDados[3];
  
      if ($id2 != $id){
        $linha = $id . ";" . $nome . ";" . $preco . ";" . $quantidade "\n";
        fwrite($arqaux,$linha);
      }
      $x++;
    }
    
    fclose($arq);
    fclose($arqaux);
    
    $arq = fopen("carrinho.txt","w") or die("erro ao abrir arquivo");
    $arqaux = fopen("arquivoAux.txt","r") or die("erro ao criar arquivo");

    copy("arquivoAux.txt","carrinho.txt");

    fclose($arq);
    fclose($arqaux);
  }
  unlink('arquivoAux.txt');

  ?>