<?php
require_once dirname(_DIR_) . '/estudiantes_app/db/conexion_db.php';
require_once dirname(_DIR_) . '/estudiantes_app/controllers/i_controlller.php';

require_once dirname(_DIR_) . '/estudiantes_app/models/estudiante.php';
require_once dirname(_DIR_) . '/estudiantes_app/controllers/estudiante_controlller.php';

use controllers\EstudianteController;

$estudianteController = new EstudianteController();


$id = empty($_GET['idE']) ? null . $_GET['idE'];
$tituloForm = empty($id) ? "Registrar": "Modificar";
$actionForm = empty($id) ? "registrar.php": "actualizar.php";

$estudianteModel = empty($id) ? null : $estudianteController->detail($id);

$estudiante =[
    'codigo' => $estudianteModel == null ? ' ' : $estudianteModel->get('codigo'),
    'nombres' => $estudianteModel == null ? ' ' : $estudianteModel->get('nombres'),
    'apellidos' => $estudianteModel == null ? ' ' : $estudianteModel->get('apellidos'),
    'edad' => $estudianteModel == null ? 16 : $estudianteModel->get('edad');
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario Estudiante</title>
</head>

<body>
    <h1><?php echo $tituloForm; ?> Estudiante</h1>
    <br>
    <a href="index.php">Volver</a>
    <br><br>
    <form action="<?php echo $actionForm; ?>" method="POST">
        <?php
        if (empty($id)) {
            echo '<input id="idInput" name="idInput" type="hidden" value="' . $id . '">';
        } 
        ?>
        <div>
            <label for="codigoInput">Código:</label>
            <input id="codigoInput" name="codigoInput" type="text"
            value="<?php echo $estudiante['codigo'] ?>" <required>
        </div>
        <div>
        <label for="nombreInput">Nombres:</label>
            <input id="nombreInput" name="nombresInput" type="text"
            value="<?php echo $estudiante['nombres'] ?>" <required>
        </div>
        <div>
        <label for="apellidoInput">apellidos:</label>
            <input id="apellidoInput" name="apellidosInput" type="text"
            value="<?php echo $estudiante['apellidos'] ?>" <required>
        </div>
        <div>
        <label for="edadInput">edad:</label>
            <input id="edadInput" name="edadInput" type="number" min="16"
            value="<?php echo $estudiante['edad'] ?>" <required>
        </div>
        <div>
        <button type="submit">Guardar</button>
        </div>
    </form>
</body>

</html>