
<?php
// Cargar las dependencias de Composer
require 'vendor/autoload.php'; // Asegúrate de que el archivo autoload.php esté en la carpeta vendor

// Configurar la cadena de conexión (reemplazar los datos)
$mongoClient = new MongoDB\Client("mongodb+srv://dsi4:<PnYCeNJbOq45B5CG>@dsi4.i4wtx.mongodb.net/?retryWrites=true&w=majority&appName=dsi4");

// Seleccionar la base de datos
$db = $mongoClient->selectDatabase('mi_base_de_datos');

// Seleccionar la colección
$collection = $db->selectCollection('usuarios');

// Insertar un documento
$insertResult = $collection->insertOne([
    'nombre' => 'Juan',
    'email' => 'juan@example.com'
]);

echo "Documento insertado con ID: " . $insertResult->getInsertedId();
?>