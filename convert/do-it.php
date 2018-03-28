<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require __DIR__ . '/Converter.php';
$converter = new Converter();
$converter->magic();
