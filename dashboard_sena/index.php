<?php
// Proteger página con autenticación
require_once __DIR__ . '/auth/check_auth.php';

require_once __DIR__ . '/model/ProgramaModel.php';
require_once __DIR__ . '/model/FichaModel.php';
require_once __DIR__ . '/model/InstructorModel.php';
require_once __DIR__ . '/model/AmbienteModel.php';
require_once __DIR__ . '/model/AsignacionModel.php';

$programaModel = new ProgramaModel();
$fichaModel = new FichaModel();
$instructorModel = new InstructorModel();
$ambienteModel = new AmbienteModel();
$asignacionModel = new AsignacionModel();

$totalProgramas = $programaModel->count();
$totalFichas = $fichaModel->count();
$totalInstructores = $instructorModel->count();
$totalAmbientes = $ambienteModel->count();
$totalAsignaciones = $asignacionModel->count();
$ultimasAsignaciones = $asignacionModel->getRecent(5);

$pageTitle = "Dashboard Principal";
include __DIR__ . '/views/layout/header.php';
include __DIR__ . '/views/layout/sidebar.php';
?>

<div class="main-content">
    <div class="stats-container">
        <div class="stat-card">
            <h3>Total Programas</h3>
            <div class="number"><?php echo $totalProgramas; ?></div>
        </div>
        <div class="stat-card">
            <h3>Total Fichas</h3>
            <div class="number"><?php echo $totalFichas; ?></div>
        </div>
        <div class="stat-card">
            <h3>Total Instructores</h3>
            <div class="number"><?php echo $totalInstructores; ?></div>
        </div>
        <div class="stat-card">
            <h3>Total Ambientes</h3>
            <div class="number"><?php echo $totalAmbientes; ?></div>
        </div>
        <div class="stat-card">
            <h3>Total Asignaciones</h3>
            <div class="number"><?php echo $totalAsignaciones; ?></div>
        </div>
    </div>

    <div class="table-container">
        <div class="table-header">
            <h2>Últimas Asignaciones</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ficha</th>
                    <th>Instructor</th>
                    <th>Ambiente</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ultimasAsignaciones as $asignacion): ?>
                <tr>
                    <td><?php echo $asignacion['id']; ?></td>
                    <td><?php echo $asignacion['ficha_numero']; ?></td>
                    <td><?php echo $asignacion['instructor_nombre']; ?></td>
                    <td><?php echo $asignacion['ambiente_nombre']; ?></td>
                    <td><?php echo $asignacion['fecha_inicio']; ?></td>
                    <td><?php echo $asignacion['fecha_fin']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/views/layout/footer.php'; ?>
