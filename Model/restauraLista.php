<?php
require_once('../Controller/banco.php');

$restaurar = $_POST['restaurar'];

if ($restaurar  == "" || $restaurar  == null) {
  echo "<script language='javascript' type='text/javascript'>alert('Erro ao fazer GET no id');
    window.location.href='/lista/View/admin.php';</script>";
} else {
  $query = "UPDATE listagira SET STATUS = 0 WHERE id = $restaurar";
  $insert = mysqli_query($link, $query);

  if ($insert) {
    echo "<script language='javascript' type='text/javascript'>alert('Restaurado com sucesso!');
          window.location.href='/lista/View/admin.php'</script>";
  } else {
    echo "<script language='javascript' type='text/javascript'>alert('Não foi possível restaurar!');
          window.location.href='/lista/View/admin.php'</script>";
  }
}
