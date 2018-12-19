<?php

use League\Csv\Reader;
use League\Csv\Statement;

require 'vendor/autoload.php';

$inputCsv = Reader::createFromPath('data/prenoms.csv');
$inputCsv->addStreamFilter('convert.iconv.ISO-8859-15/UTF-8');

$inputCsv->setDelimiter(';');

$headers = $inputCsv->fetchOne(0);

$inputCsv->setHeaderOffset(0);


$stmt = (new Statement())
    ->offset(10)
    ->limit(15);

$res = $stmt->process($inputCsv);


?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5">

    <title>League\Csv\Reader Dados do CSV</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        

       <h1 class="text-center">Mostrando registros do CSV com PHP</h1>
       
       <table class="table">

        <caption>Mostrando registros do CSV com PHP</caption>
        <thead  class="thead-dark">
            <tr>
                <th><?=implode('</th>'.PHP_EOL.'<th>', $headers), '</th>', PHP_EOL; ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($res as $row) : ?>
            <tr>
                <td><?=implode('</td>'.PHP_EOL.'<td>', $row), '</td>', PHP_EOL; ?>
            </tr>
            <?php
        endforeach;
        ?>
        </tbody>
        </table>
        
        </div>
    
    
    </div>


</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>