<?php
require_once('../Controller/banco.php');

$confirmado = $_POST['confirmado'];

if ($confirmado  == "" || $confirmado  == null) {
  echo "<script language='javascript' type='text/javascript'>alert('Erro ao fazer GET no id');
    window.location.href='/lista/View/admin.php';</script>";
} else {
  $query = "UPDATE listagira SET confirmado = CURRENT_TIMESTAMP WHERE id = $confirmado";
  $insert = mysqli_query($link, $query);

  if ($insert) {
    echo "<script language='javascript' type='text/javascript'>alert('Confirmado com sucesso!');
          window.location.href='/lista/View/admin.php'</script>";
  } else {
    echo "<script language='javascript' type='text/javascript'>alert('Não foi possível confirmar!');
          window.location.href='/lista/View/admin.php'</script>";
  }
}
