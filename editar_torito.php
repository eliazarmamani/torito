<?php
require_once __DIR__ . '/includes/functions.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}
$torito = obtenerToritoPorId($_GET['id']);

if (!$torito) {
    header("Location: index.php?mensaje=Torito no encontrado");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarTorito($_GET['id'], $_POST['usuario'], $_POST['modelo'], $_POST['color'], $_POST['placa']);
    if ($count > 0) {
        header("Location: index.php?mensaje=Torito actualizado con éxito");
        exit;
    } else {
        $error = "No se pudo actualizar el torito.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Torito</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Actualizar Torito</h1>

        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form method="POST">
            <label>Usuario: <input type="text" name="usuario" value="<?php echo htmlspecialchars($torito['usuario']); ?>" required></label>
            <label>Modelo: <input type="text" name="modelo" value="<?php echo htmlspecialchars($torito['modelo']); ?>" required></label>
            <label>Color: <input type="text" name="color" value="<?php echo htmlspecialchars($torito['color']); ?>" required></label>
            <label>Placa: <input type="text" name="placa" value="<?php echo htmlspecialchars($torito['placa']); ?>" required></label>
            <input type="submit" value="Actualizar Torito">
        </form>

        <a href="index.php" class="button">Volver a la lista de toritos</a>
    </div>
</body>
</html>
