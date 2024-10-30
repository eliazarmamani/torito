<?php
require_once __DIR__ . '/../vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb+srv://dsi4:PnYCeNJbOq45B5CG@dsi4.i4wtx.mongodb.net/?retryWrites=true&w=majority&appName=dsi4");
$database = $mongoClient->selectDatabase('escuela');
$tasksCollection = $database->tareas;

