<?php
require_once('../Controller/banco.php');
// seleciona a base de dados em que vamos trabalhar
mysqli_select_db($link, $dbase);

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT * FROM listagira where status = 0 LIMIT 16 ");
$query1 = sprintf("SELECT id, nomecompleto FROM `listagira` WHERE status = 0 limit 16, 100");

// executa a query
$dados = mysqli_query($link, $query);
$dados1 = mysqli_query($link, $query1);

// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
$linha1 = mysqli_fetch_assoc($dados1);

// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
$total1 = mysqli_num_rows($dados1);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Gira TEPC</title>
    <meta charset="utf-8">
</head>

<body>
    <h2 align="center">Tenda Espírita Pai Clemente: Gira Pública</h1>

        <h5 align="center">Para participar da Gira você precisa se cadastrar abaixo:</h5>

        <form align="center" method="post" name="form1" id="form1" action="../Model/insereLista.php">
            <label for="fname"><strong>Informe seu nome completo:</strong></label>
            <input type="text" id="fname" name="fname" placeholder="Nome completo">
            <button type="submit" id="cadastrar" name="cadastrar">Cadastrar</button>
        </form>
        <!-Lista principal–>
            <h2 align="center">Lista Principal</h2>
            <table width="300" border="1" align="center">
                <tr>
                    <th align="center">Nome Completo</th>
                    <th align="center">Status</th>
                </tr>
                <?php if ($total > 0) { ?>
                    <?php do { ?>
                        <tr>
                            <td width="65%" align="center"><?php echo $linha['nomecompleto'] ?></td>
                            <td width="35%" align="center">
                                <font color="green"><strong>Confirmado</strong></font>
                            </td>
                            <?php } while ($linha = mysqli_fetch_assoc($dados));

                        // tira o resultado da busca da memória
                        mysqli_free_result($dados);
                    } ?>;
                        </tr>
            </table>
            <!-Lista Espera–>
                <h2 align="center">Lista de Espera</h2>
                <table width="300" border="1" align="center">
                    <tr>
                        <th align="center">Nome Completo</th>
                        <th align="center">Status</th>
                        <?php if ($total1 > 0) { ?>
                            <?php do { ?>
                    <tr>
                        <td width="65%" align="center"><?php echo $linha1['nomecompleto'] ?></td>
                        <td width="35%" align="center">
                            <font color="blue"><strong>Aguardando</strong></font>
                        </td>
                        <?php } while ($linha1 = mysqli_fetch_assoc($dados1));
                        } ?>;
                        <?php
                        // tira o resultado da busca da memória
                        mysqli_free_result($dados1);
                        // fecha a conexão com o banco
                        mysqli_close($link); ?>
                    </tr>
                </table>
</body>

</html>