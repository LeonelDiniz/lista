<?php
require_once('../Controller/banco.php');
// seleciona a base de dados em que vamos trabalhar
mysqli_select_db($link, $dbase);

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT * FROM listagira where status = 0 LIMIT 16 ");
$query1 = sprintf("SELECT * FROM `listagira` WHERE status = 0 limit 16, 100");
$query2 = sprintf("SELECT * FROM `listagira` where status = 1");

// executa a query
$dados = mysqli_query($link, $query);
$dados1 = mysqli_query($link, $query1);
$dados2 = mysqli_query($link, $query2);

// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
$linha1 = mysqli_fetch_assoc($dados1);
$linha2 = mysqli_fetch_assoc($dados2);

// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
$total1 = mysqli_num_rows($dados1);
$total2 = mysqli_num_rows($dados2);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Gira TEPC</title>
    <meta charset="utf-8">
</head>

<body>
    <h2 align="center">TEPC | Tenda Espírita Pai Clemente</h1>
        <p align="center"><small>Para participar da gira você precisa se cadastrar abaixo:</small></p>
        <p align="center"><small>Menores de 18 anos somente com a presença de um responável. Mais informações <a href="https://tepc.com.br/atendimento/" target="_blank">clique aqui</a>.</small></p>
        <p align="center">Em caso <strong>desistência</strong> favor informar no <a href="https://chat.whatsapp.com/EnMinN5c1uC57q3m0J6nrU" target="_blank">WhatsApp</a> para retirar no nome da lista e dar o lugar para quem está na lista de espera.</p>
        <p align="center"><small>QS 14 Lote D Loja 05 Riacho Fundo I. Ed Continental Center - Atrás do supermercado Caíque. | Como chegar: <a href="https://waze.com/ul/h6vjve7yps" target="_blank">Waze</a></small></p>
        <br>
        <hr width="90%">
        <br>
        <form align="center" method="post" name="form1" id="form1" action="../Model/insereLista.php">
            <label for="fname">
                <font color="blue"><strong>Informe seu nome completo:</strong></font>
            </label>
            <input type="text" id="fname" name="fname" placeholder="Nome completo">
            <button type="submit" id="cadastrar" name="cadastrar">Cadastrar</button>
        </form>
        <br>
        <!-Lista principal–>
            <h3 align="center">Lista Principal</h3>
            <table width="500" border="1" align="center">
                <tr>
                    <th align="center">Nome Completo</th>
                    <th align="center">Status</th>
                    <th align="center">Ação</th>
                </tr>
                <?php if ($total > 0) { ?>
                    <?php do { ?>
                        <tr>
                            <td width="65%" align="center"><?php echo $linha['nomecompleto'] ?></td>
                            <td width="35%" align="center">
                                <font color="green"><strong>Confirmado</strong></font>
                            </td>

                            <form method="post" name="remover" id="remover" action="../Model/removeLista.php">
                                <td><button type="submit" id="remover" name="remover" value="<?php echo $linha['id'] ?>">Remover</button></td>
                            </form>

                    <?php } while ($linha = mysqli_fetch_assoc($dados));
                } ?>
                        </tr>
            </table>
            <!-Em Espera–>
                <h3 align="center">Em Espera</h3>
                <table width="500" border="1" align="center">
                    <tr>
                        <th align="center">Nome Completo</th>
                        <th align="center">Status</th>
                        <th align="center">Ação</th>
                        <?php if ($total1 > 0) { ?>
                            <?php do { ?>
                    <tr>
                        <td width="65%" align="center"><?php echo $linha1['nomecompleto'] ?></td>
                        <td width="35%" align="center">
                            <font color="blue"><strong>Aguardando</strong></font>
                        </td>

                        <form method="post" name="remover" id="remover" action="../Model/removeLista.php">
                            <td><button type="submit" id="remover" name="remover" value="<?php echo $linha1['id'] ?>">Remover</button></td>
                        </form>
                <?php } while ($linha1 = mysqli_fetch_assoc($dados1));
                        } ?>
                </table>
                <!-Cacelados>
                    <h3 align="center">Agendamento cancelado</h3>
                    <table width="500" border="1" align="center">
                        <tr>
                            <th align="center">Nome Completo</th>
                            <th align="center">Status</th>
                            <th align="center">Ação</th>
                            <?php if ($total2 > 0) { ?>
                                <?php do { ?>
                        <tr>
                            <td width="65%" align="center"><?php echo $linha2['nomecompleto'] ?></td>
                            <td width="35%" align="center">
                                <font color="red"><strong>Cancelado</strong></font>
                            </td>
                            <form method="post" name="restaurar" id="restaurar" action="../Model/restauraLista.php">
                                <td><button type="submit" id="restaurar" name="restaurar" value="<?php echo $linha2['id'] ?>">Restaurar</button></td>
                            </form>
                    <?php } while ($linha2 = mysqli_fetch_assoc($dados2));
                            } ?>
                    </table>
                    <?php
                    // tira o resultado da busca da memória
                    mysqli_free_result($dados1);
                    // fecha a conexão com o banco
                    mysqli_close($link); ?>
                    </tr>
                    <br>
                    <hr width="100%">
                    <p align="center">Endereço: QS 14 Lote D Loja 05 Riacho Fundo I. Ed Continental Center - Atrás do supermercado Caíque. | Como chegar: <a href="https://waze.com/ul/h6vjve7yps" target="_blank">Waze</a></p>
                    <p align="center">Para ficar por dentro dos dias de gira entre no nosso grupo do <a href="https://chat.whatsapp.com/EnMinN5c1uC57q3m0J6nrU" target="_blank">WhatsApp</a>.</p>
                    <p align="center">Instagram: <a href="https://www.instagram.com/tendaespiritapaiclemente/" target="_blank">@tendaespiritapaiclemente</a></p>
                    <p align="center">TEPC | Tenda Espírita Pai Clemente | Site: <a href="https://tepc.com.br" target="_blank">www.tepc.com.br</a></p>
                    <hr width="100%">

</body>

</html>