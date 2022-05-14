<?

namespace controllers;

use controllers\IController;
use db\conexionDB;
use models\Estudiante;

use function PHPSTORM_META\sql_injection_subst;

class EstudianteController implements IController
{

    public function list()
    {
        $sql = "select * from estudiantes";
        $conexionDB = new conexionDB();
        $resultQuery = $conexionDB->getResultQuery($sql);
        $estudiantes = [];
        if ($resultQuery->num_rows > 0) {
            while ($row = $resultQuery->fetch_assoc()) {
                $estudiante = new Estudiante();
                $estudiante->set('id', $row['id']);
                $estudiante->set('codigo', $row['codigo']);
                $estudiante->set('nombres', $row['nombres']);
                $estudiante->set('apellidos', $row['apellidos']);
                $estudiante->set('edad', $row['edad']);

                array_push($estudiantes, $estudiante);
            }
        }
        $conexionDB->close();
        return $estudiantes;
    }

    public function detail($id)
    {
        $sql = "SELECT * from estudiantes where id=" . $id;
        $conexionDB = new ConexionDB();
        $resultQuery = $conexionDB->getResultQuery($sql);
        $estudiante = null;
        if ($resultQuery->num_rows > 0) {
            while ($row = $resultQuery->fetch_assoc()) {
                $estudiante = new Estudiante();
                $estudiante->set('id', $row['id']);
                $estudiante->set('codigo', $row['codigo']);
                $estudiante->set('nombres', $row['nombres']);
                $estudiante->set('apellidos', $row['apellidos']);
                $estudiante->set('edad', $row['edad']);
            }
        }
        $conexionDB->close();
        return $estudiante;
    }

    public function create($estudianteModel)
    {
        $sql = "insert into estudiantes (codigo, nombres, apellidos, edad)";
        $sql .= " values ('" . $estudianteModel->get('codigo') . "',
    '" . $estudianteModel->get('nombres') . "',
    '" . $estudianteModel->get('apellidos') . "',
    " . $estudianteModel->get('edad') . ")";
        $conexionDB = new conexionDB();
    $resultQuery = $conexionDB->getResultQuery($sql);
    $conexionDB->close();
    return $resultQuery;
    }

    public function update($id, $estudianteModel)
    {
    }

    public function delete($id)
    {
    }
}
