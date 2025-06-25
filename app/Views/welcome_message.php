<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de IMC</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2 class="text-center mb-0">Calculadora de Índice de Masa Corporal (IMC)</h2>
        </div>
        <div class="card-body">

            <form action="<?= base_url('imc/calcular') ?>" method="post" class="row g-3">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label for="peso" class="form-label">Peso (kg):</label>
                    <input type="number" name="peso" step="0.01" class="form-control" required>
                </div>

                <div class="col-md-3">
                    <label for="estatura" class="form-label">Estatura (m):</label>
                    <input type="number" name="estatura" step="0.01" class="form-control" required>
                </div>

                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success px-5">Calcular</button>
                </div>
            </form>

            <?php if (isset($resultado)): ?>
                <div class="alert alert-info mt-4">
                    <h4 class="alert-heading">Resultado para <?= esc($resultado['nombre']) ?>:</h4>
                    <p><strong>IMC:</strong> <?= esc($resultado['imc']) ?></p>
                    <p><strong>Clasificación:</strong> <?= esc($resultado['clasificacion']) ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS (opcional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>