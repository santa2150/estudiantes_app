<?
require_once dirname(__DIR__) . '/estudiantes_app/db/conexion_db.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/i_controller.php';

require_once dirname(__DIR__) . '/estudiantes_app/models/estudiante.php';
require_once dirname(__DIR__) . '/estudiantes_app/controllers/estudiante_controller.php';

use controllers\EstudianteController;

$estudianteController = new EstudianteController();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTD.8">
    <title>Estudiantes</title>
</head>

<body>
    <h1>Lista de estudiantes</h1>
    <a href="form_estudiantes.php">Resgistrar nuevo estudiante</a>
    <table>
        <thead>
            <tr>
                <th>Código</th>
            </tr>
            <tr>
                <th>Estudiante</th>
            </tr>
            <tr>
                <th>Edad</th>
            </tr>
            <tr>
                <th>Modificar</th>
            </tr>
            <tr>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?
            $estudiantes = $estudianteController->list();
            if (count($estudiantes) > 0) {
                foreach ($estudiantes as $estudiantes) {
                    echo '<tr>';
                    echo '<td>' . $estudiantes->get('codigo') . '</td>';
                    echo '<td>' . $estudiantes->get('nombres') . '' . $estudiante->get('apellidos') . '</td>';
                    echo '<td>' . $estudiantes->get('edad') . '</td>';
                    echo '<td>';
                    echo '<a href="form_estudiantes.php?ideE=' . $estudiante->get('id') . '">Modificar</a>';
                    echo ' /td>';
                    echo '<td>';
                    echo '<a href="eliminar.php?ideE=' . $estudiante->get('id') . '">Eliminar</a>';
                    echo ' /td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="3"> No hay registros</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>