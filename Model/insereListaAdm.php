
<?php
require_once('../Controller/banco.php');

$fname = $_POST['fname'];

if ($fname == "" || $fname == null) {
  echo "<script language='javascript' type='text/javascript'>alert('Atenção: É preciso informar um nome para participar da Gira!');
    window.location.href='/lista/View/admin.php';</script>";
} else {
  $query = "INSERT INTO listagira (nomecompleto) VALUES ('$fname')";
  $insert = mysqli_query($link, $query);

  if ($insert) {
    echo "<script language='javascript' type='text/javascript'>alert('Cadastrado com sucesso!');
          window.location.href='/lista/View/admin.php'</script>";
  } else {
    echo "<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar!');
          window.location.href='/lista/View/admin.php'</script>";
  }
}

?>
