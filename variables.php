<?php
$char = [
    'alph' => 'abcdefghijlmnopqrstuvwyxz',
    'num' => '01234456789',
    'symb' => '$%&@#+*-_.:,;!?=',
];
$charKeys = (isset($_POST['charKeys'])) ? ($_POST['charKeys']) : '';
$password = '';

?>