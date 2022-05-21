<?php
require_once dirname(_DIR_) . '/estudiantes_app/db/conexion_db.php';
require_once dirname(_DIR_) . '/estudiantes_app/controllers/i_controlller.php';
require_once dirname(_DIR_) . '/estudiantes_app/models/estudiante.php';
require_once dirname(_DIR_) . '/estudiantes_app/controllers/estudiante_controlller.php';

use controllers\EstudianteController;

$estudianteController = new EstudianteController();
$id = empty($_GET['idE']) ? 0 : $_GET['idE'];
$resultado = $estudianteController->delete($id);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>

<body>
    <h1>Resultados de la operacion</h1>
    <?php
    if ($resultado) {
        echo '<p>Se eliminó el registro.</p>';
    } else {
        echo '<p>Se presentó un error al guardar los datos. Vuelve a intentar.</p>';
    }
    echo '<br>';
    echo '<a href="index.php">Volver a la lista</a>';
    ?>
</body>

</html>