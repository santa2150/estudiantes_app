<?php

require_once dirname(_DIR_) . '/estudiantes_app/db/conexion_db.php';
require_once dirname(_DIR_) . '/estudiantes_app/controllers/i_controlller.php';

require_once dirname(_DIR_) . '/estudiantes_app/models/estudiante.php';
require_once dirname(_DIR_) . '/estudiantes_app/controllers/estudiante_controlller.php';

use controllers\EstudianteController;
use models\Estudiante;

$estudianteController = new EstudianteController();


$estudiante = new Estudiante();
$estudiante->set('codigo', $_POST['codigoInput']);
$estudiante->set('nombres', $_POST['nombresInput']);
$estudiante->set('apellidos', $_POST['apellidosInput']);
$estudiante->set('edad', $_POST['edadInput']);
$estudiante->set('id', $_POST['idInput']);

$resultado = $estudianteController->update($_POST['idInput'], $estudiante);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>

<body>
    <h1>Resultado de la operación</h1>
    <?php
    if ($resultado) {
        echo '<p>Actualización exitosa</p>';
        echo '<br>';
        echo '<a href="index.php">Volver a la lista</a>';
    } else {
        echo '<p>Se presentó un error al guardar los datos. Vuelve a intentar.</p>';
        echo '<br>';
        echo '<a href="from_estudiantes.php?idEe=' . $estudiante->get('id') . '">Volver</a>';
    }
    ?>
</body>

</html>