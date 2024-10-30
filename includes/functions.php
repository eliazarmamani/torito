<?php
require_once __DIR__ . '/../config/database.php';

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

function crearTorito($usuario, $modelo, $color, $placa) {
    global $tasksCollection;

    // Obtener el último torito para determinar el nuevo código
    $ultimoTorito = $tasksCollection->find([], ['sort' => ['codigo' => -1], 'limit' => 1])->toArray();
    $nuevoCodigo = count($ultimoTorito) > 0 ? $ultimoTorito[0]['codigo'] + 1 : 1; // Generar nuevo código

    $resultado = $tasksCollection->insertOne([
        'codigo' => $nuevoCodigo, // Agregamos el nuevo código aquí
        'usuario' => sanitizeInput($usuario),
        'modelo' => sanitizeInput($modelo),
        'color' => sanitizeInput($color),
        'placa' => sanitizeInput($placa)
    ]);
    return $resultado->getInsertedId();
}

function obtenerToritos() {
    global $tasksCollection;
    return $tasksCollection->find()->toArray();
}

function obtenerToritoPorId($id) {
    global $tasksCollection;
    return $tasksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

function actualizarTorito($id, $usuario, $modelo, $color, $placa) {
    global $tasksCollection;
    $resultado = $tasksCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'usuario' => sanitizeInput($usuario),
            'modelo' => sanitizeInput($modelo),
            'color' => sanitizeInput($color),
            'placa' => sanitizeInput($placa)
        ]]
    );
    return $resultado->getModifiedCount();
}

function eliminarTorito($id) {
    global $tasksCollection;
    $resultado = $tasksCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    return $resultado->getDeletedCount();
}
