<?php
session_start();

$data = $_POST['data'];

// Pegando dia e mês enviados pelo formulário
$diaInformado = explode("-", $data)[2];
$mesInformado = explode("-", $data)[1];

// Transformando arquivo XML em Objeto
$xml = simplexml_load_file('xml.xml');

// Percorre todos os signos e obtém a informação do selecionado
$dataInicio;
$dataFim;
$nomeDoSigno;
$descricao;

foreach($xml->signo as $signo):

  $diaInicioSigno = explode("/", $signo->dataInicio)[0];
  $mesInicioSigno = explode("/", $signo->dataInicio)[1];

  $diaFimSigno = explode("/", $signo->dataFim)[0];
  $mesFimSigno = explode("/", $signo->dataFim)[1];

  if ($diaInformado >= $diaInicioSigno && $mesInformado == $mesInicioSigno
      || $diaInformado <= $diaFimSigno && $mesInformado == $mesFimSigno) {
    $dataInicio = $signo->dataInicio;
    $dataFim = $signo->dataFim;
    $nomeDoSigno = $signo->signoNome;
    $descricao = $signo->descricao;
    break;
  } 
endforeach;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signos 2</title>
    <link rel="stylesheet" href="css.css">
  </head>

  <body>
    <h1 style="color: blue"> Seu Signo é:</h1>

    <div class="signo_2">
      <?php
        echo 'Data Início: ' . $dataInicio . '<br>';
	      echo 'Data Fim: ' . $dataFim . '<br>';
	      echo 'Nome do signo: ' . $nomeDoSigno . '<br>';
        echo 'Descrição do Signo: ' . $descricao . '<br>';
      ?>
    </div>

  </body>
</html>
