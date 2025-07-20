<?php

require_once __DIR__ . '/vendor/autoload.php';

use Internal\Facade\FacadeConverter;

$path = __DIR__ . './exemplo.txt';

$docx = FacadeConverter::convert($path, 'docx');

$file = fopen($docx['path'], 'w');
if ($file) {
    echo fwrite($file, $docx['content']);
    fclose($file);
    echo 'Arquivo salvo com sucesso';
} else {
    echo 'Erro ao abrir o arquivo';
}
fclose($file);

