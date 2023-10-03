<?php
    $id = "";
	$nome = "";
	$preco = "";
    $quantidade = "";

    $arq = fopen("carrinho.txt", "r") or die("erro ao abrir arquivo");
    $x = 0;
    $mult = 0;
    $total = 0;
	$linhas[] = fgets($arq);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Produtos</title>
    </head>
    <body>
        <h1>Lista de Produtos</h1>
        <table>
            <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            </tr>
        <?php

            while (!feof($arq)) {
			    $linhas[] = fgets($arq);
			    $colunaDados = explode(";", $linhas[$x]);

			    $id = $colunaDados[0];
			    $nome = $colunaDados[1];
			    $preco = $colunaDados[2];
                $quantidade = $colunaDados[3];
      
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $nome . "</td>";
                echo "<td>" . $preco . "</td>";
                echo "<td>" . $quantidade . "</td>";
                echo "<td> <form action ='removerCarrinho.php' method='POST'>
                <input type='hidden' name='id' value='$id'>
                <input type='hidden' name='nome' value='$nome'>
                <input type='hidden' name='preco' value='$preco'>
                <input type='hidden' name='quantidade' value='$quantidade'>
                <input type='submit' value='Remover'></button> <br>
                </form> </td>";
                echo "</tr>";
            
                $mult = $preco * $quatidade;
                $total += $mult; 

              $x++;  
            }

            echo $total;
            fclose($arq);
        ?>
        </tr>
        </table>
    </body>
</html>