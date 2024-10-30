<?php
require_once __DIR__ . '/includes/functions.php';

$titulos = "Gestión de Toritos de Urubamba";
$titulos = "Gestión de Toritos de Urubamba";

if (isset($_GET['accion']) && isset($_GET['id'])) {
    switch ($_GET['accion']) {
        case 'eliminar':
            $count = eliminarTorito($_GET['id']);
            $mensaje = $count > 0 ? "Torito eliminado con éxito." : "No se pudo eliminar el torito.";
            break;
    }
}

$toritos = obtenerToritos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulos; ?></title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $titulos; ?></h1>

        <?php if (isset($mensaje)): ?>
            <div class="<?php echo strpos($mensaje, 'éxito') !== false ? 'success' : 'error'; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <a href="agregar_torito.php" class="button">Agregar Nuevo Torito</a>

        <h2>Lista de Toritos asociados</h2>
        <table>
            <tr>
                <th>Código</th>
                <th>Usuario</th>
                <th>Modelo</th>
                <th>Color</th>
                <th>Placa</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($toritos as $torito): ?>
            <tr>
                <td><?php echo htmlspecialchars($torito['codigo']); ?></td>
                <td><?php echo htmlspecialchars($torito['usuario']); ?></td>
                <td><?php echo htmlspecialchars($torito['modelo']); ?></td>
                <td><?php echo htmlspecialchars($torito['color']); ?></td>
                <td><?php echo htmlspecialchars($torito['placa']); ?></td>
                <td class="actions">
                    <a href="editar_torito.php?id=<?php echo $torito['_id']; ?>" class="button">Editar</a>
                    <a href="index.php?accion=eliminar&id=<?php echo $torito['_id']; ?>" class="button"
                       onclick="return confirm('¿Estás seguro de que quieres eliminar este torito?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
