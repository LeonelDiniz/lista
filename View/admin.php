<?php
require_once('../Controller/banco.php');
// seleciona a base de dados em que vamos trabalhar
mysqli_select_db($link, $dbase);

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT * FROM listagira where status = 0  LIMIT 16");
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
    <title>Lista Gira - Admin</title>
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
                        <a class="nav-link" href="https://tepc.com.br" target="_blank">Site da Tenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://tepc.com.br/atendimento/" target="_blank">Dúvidas sobre as giras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://chat.whatsapp.com/EnMinN5c1uC57q3m0J6nrU" target="_blank">Grupo WhatsApp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.instagram.com/tendaespiritapaiclemente/" target="_blank">Instagram</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://waze.com/ul/h6vjve7yps" target="_blank">Localização</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div align="center" class="container">
        <h1>Tenda Espírita Pai Clemente</h1>
 
        <h2>
            <font color="red">       <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
  <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
</svg> Painel Administrativo</font>
        </h2>
        <p><strong>Para participar da gira você precisa se cadastrar abaixo</strong></p>
        <p>Menores de 18 anos somente com a presença de um responável.</p>
        <p><strong>Em caso desistência favor informar</strong> no <a href="https://chat.whatsapp.com/EnMinN5c1uC57q3m0J6nrU" target="_blank">WhatsApp</a> para retirar no nome da lista e dar o lugar para quem está na lista de espera.</p>
    </div>
    <hr>
    <br><br>
    <div align="center" class="container">
        <form method="post" name="form1" id="form1" action="../Model/insereListaAdm.php">
            <div class="mb-4">
            <label for="exampleInputEmail1" class="form-label"><strong><h3>Coloque seu nome abaixo</h3></strong></label>
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
                    <th scope="col">Hr.Chegada</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Check</th>
                </tr>
                <tr>
                    <!--PHP-->
                    <?php if ($total > 0) { ?>
                        <?php do { ?>
            </thead>
            <tbody>
                <!--PHP-->
                <td class="text-uppercase"><strong><?php echo $linha['nomecompleto'] ?></strong></td>
                <td>
                    <font color="green"><strong><?php echo substr($linha['confirmado'], -8) ?></strong></font>
                </td>
                <td>
                    <form method="post" name="remover" id="remover" action="../Model/removeLista.php">
                        <button type="submit" id="remover" name="remover" class="btn btn-danger" value="<?php echo $linha['id'] ?>">Remover</button>
                    </form>
                </td>
                <td><form method="post" name="confirmado" id="confirmado" action="../Model/confirmaLista.php">
                        <button type="submit" id="confirmado" name="confirmado" class="btn btn-primary" value="<?php echo $linha['id'] ?>">Confirmar</button>
                    </form></td>
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
                <td class="text-uppercase"><strong><?php echo $linha1['nomecompleto'] ?></strong></td>
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
                <td class="text-uppercase"><strong><?php echo $linha2['nomecompleto'] ?></strong></td>
                <td>
                    <font color="red"><strong>Cancelado</strong></font>
                </td>
                <td>
                    <form method="post" name="restaurar" id="restaurar" action="../Model/restauraLista.php">
                        <button type="submit" class="btn btn-primary" id="restaurar" name="restaurar" value="<?php echo $linha2['id'] ?>">Restaurar</button>
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
    <div align="center" class="container">
    <h2>Mais informações</h2>
    <br><br>
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
  <h4>Lista de atendimento</h4>
  <p>Devido ao espaço ser pequeno só é permitido quem estiver com o nome na lista acima.</p>
                    <br>
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-up" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
  <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
</svg>
    <h4>Quem pode receber atendimento?</h4>
  <p>Qualquer pessoa de boa fé pode participar. Menores de 18 anos somente com um responsável.</p>
<br>
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg>
  <h4>Dia e horário</h4>
  <p>A cada dois sábados do mês, incicia-se pontualmente às 20h com 15 minutos de tolerância.</p>
  
  <br>
  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-universal-access-circle" viewBox="0 0 16 16">
  <path d="M8 4.143A1.071 1.071 0 1 0 8 2a1.071 1.071 0 0 0 0 2.143Zm-4.668 1.47 3.24.316v2.5l-.323 4.585A.383.383 0 0 0 7 13.14l.826-4.017c.045-.18.301-.18.346 0L9 13.139a.383.383 0 0 0 .752-.125L9.43 8.43v-2.5l3.239-.316a.38.38 0 0 0-.047-.756H3.379a.38.38 0 0 0-.047.756Z"/>
  <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8Z"/>
</svg>
  <h4>Vestuário</h4>
  <p>Vestir-se adequadamente, não é permitido roupas curtas ou decotadas.</p>

  <br>
  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-prescription2" viewBox="0 0 16 16">
  <path d="M7 6h2v2h2v2H9v2H7v-2H5V8h2V6Z"/>
  <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v10.5a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 14.5V4a1 1 0 0 1-1-1V1Zm2 3v10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V4H4ZM3 3h10V1H3v2Z"/>
</svg>

  <h4>COVID-19</h4>
  <p>Devido a pandemia esteja com suas vacinas em dia.</p>

  <br>
  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
  <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
  <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
</svg>

  <h4>Registro da gira</h4>
  <p>Não é permitido o uso de celular durante a gira, gravar ou registrar, seja por imagem, áudio ou vídeo.</p>

  <br>
  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
  <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
  <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
</svg>
    <h4>Atendimento voluntário</h4>
  <p>Solicitamos aos convidados que tragam um maço de vela branca número 7.</p>

  <br>
  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bank" viewBox="0 0 16 16">
  <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
</svg>
    <h4>Ajude o terreiro</h4>
  <p>Estamos aceitando doações para continuar nosso trabalho com a comunidade.</p>
  <p>Doações através de Pix CPF: <strong>024.788.331-07</strong> - Leonel Jerônimo Diniz</p>
  

  <br>
  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
  <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
</svg>


  <h4>Endereço e localização</h4>
  <p>Endereço: QS 14 Lote D Loja 05 , Riacho Fundo I, Ed. Continental Center.</p> <a class="nav-link" href="https://waze.com/ul/h6vjve7yps" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-fill" viewBox="0 0 16 16">
  <path d="M8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002z"/>
</svg> Clique para abrir no Waze.</a>

  <br>
  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
</svg>


  <h4>Grupo do WhatsApp</h4>
  <p>Acompanhe a agenda através do grupo do WhatsApp.</p><a class="nav-link" href="https://chat.whatsapp.com/EnMinN5c1uC57q3m0J6nrU" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-fill" viewBox="0 0 16 16">
  <path d="M8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002z"/>
</svg> Clique para entrar no grupo </a>

<br>
<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
</svg>


  <h4>Instagram</h4>
  <p>Acompanhe nossa Rede Social.</p><a class="nav-link" href="ttps://www.instagram.com/tendaespiritapaiclemente/" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-fill" viewBox="0 0 16 16">
  <path d="M8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v5.34l-1.2.24a1.5 1.5 0 0 0-1.196 1.636l.345 3.106a2.5 2.5 0 0 0 .405 1.11l1.433 2.15A1.5 1.5 0 0 0 6.035 16h6.385a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5.114 5.114 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.632 2.632 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046l-.048.002z"/>
</svg> Clique aqui ver página </a>



  <br>

    </div>
 
   <!--Rodapé--> 
    <hr>
    <div align="center" class="container">
        <p>Endereço: QS 14 Lote D Loja 05 Riacho Fundo I. Ed Continental Center - Atrás do supermercado Caíque</p>
        <p>Para ficar por dentro dos dias de gira entre no nosso grupo do WhatsApp ou Instagram.</p>
        <p><strong>TEPC | Tenda Espírita Pai Clemente<a class="nav-link" href="https://tepc.com.br" target="_blank">www.tepc.com.br</a></strong></p>
        <br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
</body>

</html>