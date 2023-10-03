<?php
    $id = "";
	$nome = "";
	$preco = "";

    $arq = fopen("produtos.txt", "r") or die("erro ao abrir arquivo");
    $x = 0;
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
            </tr>
        <?php
            while (!feof($arq)) {
			    $linhas[] = fgets($arq);
			    $colunaDados = explode(";", $linhas[$x]);

			    $id = $colunaDados[0];
			    $nome = $colunaDados[1];
			    $preco = $colunaDados[2];
                
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $nome . "</td>";
                echo "<td>" . $preco . "</td>";
                echo "<td> <form action ='adicionarCarrinho.php' method='POST'>
                <input type='hidden' name='id' value='$id'>
                <input type='hidden' name='nome' value='$nome'>
                <input type='hidden' name='preco' value='$preco'>
                <input type='number' name='quantidade' value='$quantidade'>
                <input type='submit' value='Adicionar'></button> <br>
                </form> </td>";
                echo "</tr>";

              $x++;  
            }
            fclose($arq);
        ?>
        </tr>
        </table>
    </body>
</html>