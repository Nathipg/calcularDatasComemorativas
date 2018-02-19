<?php

require 'config.php';

$data = new Data();

echo $data->getDataPorOcorrenciaMes( 0, 5, 2018, 2 );