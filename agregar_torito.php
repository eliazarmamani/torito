<?php
require_once __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = crearTorito($_POST['usuario'], $_POST['modelo'], $_POST['color'], $_POST['placa']);
    if ($id) {
        header("Location: index.php");
        exit;
    } else {
        $error = "No se pudo crear el torito.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrar Nuevo Torito</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Registrar Nuevo Torito</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Usuario: <input type="text" name="usuario" required></label>
            <label>Modelo: <input type="text" name="modelo" required></label>
            <label>Color: <input type="text" name="color" required></label>
            <label>Placa: <input type="text" name="placa" required></label>
            <input type="submit" value="registrar Torito">
        </form>

        <a href="index.php" class="button">Volver a la lista de toritos</a>
    </div>
</body>
</html>
