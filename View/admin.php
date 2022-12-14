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

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista Gira</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TEPC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Site da Tenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dúvidas sobre as giras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Grupo WhatsApp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Localização</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Instagram</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div align="center" class="container">
        <h1>Tenda Espírita Pai Clemente</h1>

        <p>Para participar da gira você precisa se cadastrar abaixo:</p>

        <p>Menores de 18 anos somente com a presença de um responável. Mais informações clique aqui.</p>

        <p>Em caso desistência favor informar no WhatsApp para retirar no nome da lista e dar o lugar para quem está na lista de espera.</p>

        <p>QS 14 Lote D Loja 05 Riacho Fundo I. Ed Continental Center - Atrás do supermercado Caíque. | Como chegar: Waze
        </p>
    </div>
    <hr>

    <br><br>
    <div align="center" class="container">
        <form method="post" name="form1" id="form1" action="../Model/insereLista.php">
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label"><strong>Coloque seu nome abaixo</strong></label>
                <input type="text" class="form-control" maxlength="50" id="fname" name="fname" placeholder="Informe seu nome completo">
                <div id="emailHelp" class="form-text">O 17º entrará para a lista de espera.</div>
            </div>

            <button type="submit" class="btn btn-success">Agendar atendimento</button>
        </form>
        <br><br>
    </div>

    
        <!--Início Lista Principal-->
        <div align="center" class="container">
        <h3>#Lista Principal</h3>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th width="65%">Nome completo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ação</th>
                </tr>
                <tr>
                <!--PHP-->
                    <?php if ($total > 0) { ?>
                        <?php do { ?>
            </thead>
            <tbody>
                <!--PHP-->
                <td><strong><?php echo $linha['nomecompleto'] ?></strong></td>
                <td>
                    <font color="green"><strong>Confirmado</strong></font>
                </td>
                <td>
                    <form method="post" name="remover" id="remover" action="../Model/removeLista.php">
                        <button type="submit" id="remover" name="remover" class="btn btn-danger" value="<?php echo $linha['id'] ?>">Remover</button>
                    </form>
                </td>
                <!--PHP-->
        <?php } while ($linha = mysqli_fetch_assoc($dados));

                        // tira o resultado da busca da memória
                        mysqli_free_result($dados);
                    } ?>
        </tr>
            </tbody>
        </table>
        </div>
        <!--Fim Lista Principal-->
                    <br><br>
        <!--Início Lista de Espera-->
        <div align="center" class="container">
        <h3>#Em espera</h3>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th width="65%">Nome completo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ação</th>
                </tr>
                <tr>
                <!--PHP-->
                    <?php if ($total1 > 0) { ?>
                        <?php do { ?>
            </thead>
            <tbody>
                <!--PHP-->
                <td><strong><?php echo $linha1['nomecompleto'] ?></strong></td>
                <td>
                    <font color="blue"><strong>Aguardando</strong></font>
                </td>
                <td>
                <form method="post" name="remover" id="remover" action="../Model/removeLista.php">
                        <button type="submit" id="remover" name="remover" class="btn btn-danger" value="<?php echo $linha1['id'] ?>">Remover</button>
                    </form>
                </td>
                <!--PHP-->
        <?php } while ($linha1 = mysqli_fetch_assoc($dados1));

                        // tira o resultado da busca da memória
                        mysqli_free_result($dados1);
                    } ?>
        </tr>
            </tbody>
        </table>
        <!--Fim Lista de Espera-->

        <br><br>
        <!--Início Agendamento cancelado-->
        <h3>#Agendamento cancelado</h3>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th width="65%">Nome completo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ação</th>
                </tr>
                <tr>
                <!--PHP-->
                    <?php if ($total2 > 0) { ?>
                        <?php do { ?>
            </thead>
            <tbody>
                <!--PHP-->
                <td><strong><?php echo $linha2['nomecompleto'] ?></strong></td>
                <td>
                    <font color="red"><strong>Cancelado</strong></font>
                </td>
                <td>
                    <form method="post" name="restaurar" id="restaurar" action="../Model/restauraLista.php">
                        <button type="submit" class="btn btn-primary"  id="restaurar" name="restaurar" value="<?php echo $linha2['id'] ?>">Restaurar</button>
                    </form>
                </td>
                <!--PHP-->
        <?php } while ($linha2 = mysqli_fetch_assoc($dados2));

                        // tira o resultado da busca da memória
                        mysqli_free_result($dados2);
                    } ?>
        </tr>
            </tbody>
        </table>
        <!--Fim Agendamento cancelado-->


    </div>
    <br><br><br>
    <hr>
    <div align="center" class="container">
        <i class="fa-solid fa-location-dot"></i>
        <p>Endereço: QS 14 Lote D Loja 05 Riacho Fundo I. Ed Continental Center - Atrás do supermercado Caíque. | Como chegar: Waze</p>

        <p>Para ficar por dentro dos dias de gira entre no nosso grupo do WhatsApp.</p>

        <p>Instagram: @tendaespiritapaiclemente</p>

        <p>TEPC | Tenda Espírita Pai Clemente | Site: www.tepc.com.br</p>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>