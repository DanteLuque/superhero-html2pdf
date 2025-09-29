<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tarea 06</title>
</head>

<body>

    <div class="container mt-3 bg-light p-4 rounded radius shadow">
        <!-- Ejercicio 1: Generar PDF con filtros -->
        <form method="POST" action="<?= base_url('tarea06/ejercicio01') ?>">
            <h4>Ejercicio 1: Generar PDF con filtros</h4>

            <!-- Título Reporte -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título Reporte</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ingrese el título del reporte" required>
            </div>

            <!-- Géneros -->
            <div class="mb-3">
                <label class="form-label d-block">Géneros</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="generoMasculino" name="generos[]" value="Male">
                    <label class="form-check-label" for="generoMasculino">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="generoFemenino" name="generos[]" value="Female">
                    <label class="form-check-label" for="generoFemenino">Femenino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="generoNA" name="generos[]" value="N/A">
                    <label class="form-check-label" for="generoNA">N/A</label>
                </div>
            </div>

            <!-- Número entero -->
            <div class="mb-3">
                <label for="numero" class="form-label">Número (10 - 200)</label>
                <input type="number" class="form-control" id="numero" name="numero" min="10" max="200" step="1" required>
            </div>

            <!-- Botón -->
            <div class="input-group">
                <button type="submit" class="btn btn-success">Generar</button>
            </div>
        </form>
    </div>

    <div class="container mt-3 bg-light p-4 rounded radius shadow">
        <!-- Ejercicio 2: Generar Grafico dinamico con checkbox -->
        <form method="POST" action="<?= base_url('reportes/show-heroes') ?>">
            <h4>Ejercicio 2: Generar Grafico dinamico con checkbox</h4>
            <!-- Géneros -->
            <div class="mb-3">
                <label class="form-label d-block">Géneros</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="generoMasculino" name="generos[]" value="Masculino">
                    <label class="form-check-label" for="generoMasculino">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="generoFemenino" name="generos[]" value="Femenino">
                    <label class="form-check-label" for="generoFemenino">Femenino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="generoNA" name="generos[]" value="N/A">
                    <label class="form-check-label" for="generoNA">N/A</label>
                </div>
            </div>

            <!-- Botón -->
            <div class="input-group">
                <button type="submit" class="btn btn-success">Generar</button>
            </div>
        </form>
    </div>

    <div class="container mt-3 bg-light p-4 rounded radius shadow">
        <h4>Ejercicio 3: Grafico del promediado de los pesos de heroes filtrado por publisher, ordenado de mayor a menor </h4>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
```