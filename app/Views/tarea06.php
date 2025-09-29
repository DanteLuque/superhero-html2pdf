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

            <div class="mb-3">
                <label for="numero" class="form-label">Número (10 - 200)</label>
                <input type="number" class="form-control" id="numero" name="numero" min="10" max="200" step="1" required>
            </div>

            <div class="input-group">
                <button type="submit" class="btn btn-success">Generar</button>
            </div>
        </form>
    </div>

    <div class="container mt-3 bg-light p-4 rounded radius shadow">
        <!-- Ejercicio 2: Generar Grafico dinamico con checkbox -->
        <h4>Ejercicio 2: Generar Gráfico dinámico con checkbox</h4>

        <!-- Publishers -->
        <div class="mb-3">
            <label class="form-label d-block">Publishers</label>
            <?php foreach ($publishers as $publisher): ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox"
                        id="publisher<?= $publisher['id'] ?>"
                        name="publishers[]"
                        value="<?= $publisher['publisher_name'] ?>">
                    <label class="form-check-label" for="publisher<?= $publisher['id'] ?>">
                        <?= $publisher['publisher_name'] ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="container text-center my-4">
            <button class="btn btn-outline-primary mb-3" id="obtener-datos" type="button">Obtener datos</button>
            <span id="aviso" class="d-none">Por favor espere...</span>

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="card shadow-sm p-3">
                        <canvas id="lienzo" style="max-width:100%; max-height:400px;"></canvas>
                    </div>
                </div>
            </div>
            <hr>
        </div>

    </div>

    <div class="container mt-3 bg-light p-4 rounded radius shadow">
        <h4>Ejercicio 3: Grafico del promediado de los pesos de heroes filtrado por publisher, ordenado de mayor a menor </h4>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js"></script>

    <script src="<?= base_url('js/utils/getRamdomColors.js') ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const lienzo = document.getElementById('lienzo');
            const btnDatos = document.getElementById('obtener-datos');
            const aviso = document.getElementById('aviso');

            function renderGraphic() {
                grafico = new Chart(lienzo, {
                    type: 'pie',
                    data: {
                        labels: [],
                        datasets: [{
                            label: '',
                            data: [],
                        }]
                    }
                });
            }

            btnDatos.addEventListener("click", async () => {
                try {
                    aviso.classList.remove("d-none");

                    const publishersSeleccionados = Array.from(document.querySelectorAll('input[name="publishers[]"]:checked'))
                        .map(checkbox => checkbox.value);

                    const response = await fetch('<?= base_url('tarea06/ejercicio02') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            publishers: publishersSeleccionados
                        })
                    });

                    if (!response.ok) throw new Error('No se pudo lograr comunicación');
                    const data = await response.json();
                    console.log(data)
                    aviso.classList.add("d-none");

                    if (data.success) {
                        grafico.data.labels = data.resumen.map(d => d.publisher_name);
                        grafico.data.datasets[0].label = data.message;
                        grafico.data.datasets[0].data = data.resumen.map(d => d.total);

                        const {
                            bgColors,
                            borderColors
                        } = getRandomColors(data.resumen.length);

                        grafico.data.datasets[0].backgroundColor = bgColors;
                        grafico.data.datasets[0].borderColor = borderColors;

                        grafico.data.datasets[0].borderWidth = 1;
                        grafico.data.datasets[0].barPercentage = .6;
                        grafico.update();
                    }
                } catch (error) {
                    console.log(error);
                }
            });

            renderGraphic();
        });
    </script>
</body>

</html>