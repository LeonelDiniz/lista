<?php
require_once('../Controller/banco.php');

$remover = $_POST['remover'];

if ($remover == "" || $remover == null) {
  echo "<script language='javascript' type='text/javascript'>alert('Erro ao fazer GET no id');
    window.location.href='/lista/View/admin.php';</script>";
} else {
  $query = "UPDATE listagira SET STATUS = 1 WHERE id = $remover";
  $insert = mysqli_query($link, $query);

  if ($insert) {
    echo "<script language='javascript' type='text/javascript'>alert('Removido com sucesso!');
          window.location.href='/lista/View/admin.php'</script>";
  } else {
    echo "<script language='javascript' type='text/javascript'>alert('Não foi possível remover!');
          window.location.href='/lista/View/admin.php'</script>";
  }
}
