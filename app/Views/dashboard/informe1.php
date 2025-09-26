<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>informe 1</title>
</head>

<body>
  <h1>Informe 1</h1>

  <div class="container">
    <canvas id="lienzo"></canvas>
    <hr>
    <canvas id="lienzo2"></canvas>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const lienzo = document.getElementById('lienzo');
      const lienzo2 = document.getElementById('lienzo2');

      const grafico = new Chart(lienzo, {
        type: 'bar',
        data: {
          labels: ['Rock', 'Baladas', 'Metal'],
          datasets: [{
            label: 'tendencia musical',
            data: [12, 20, 34],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(26, 58, 238, 0.2)',
              'rgba(39, 240, 116, 0.2)',
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(75, 192, 192)',
            ],
            borderWidth: 3, // ancho de borde
            borderRadius: 30,
            barPercentage: .6, //grosor de las barras
          }]
        }
      });

      const data = [
        { year: 2010, total: 420 },
        { year: 2011, total: 492 },
        { year: 2012, total: 470 },
        { year: 2013, total: 510 },
        { year: 2014, total: 450 },
        { year: 2015, total: 500 },
      ]

      const grafico2 = new Chart(lienzo2, {
        type: 'line',
        data: {
          labels: data.map(d => d.year),
          datasets: [{
            label: 'Ingresados de ingenieria de software',
            data: data.map(d => d.total),
          }]
        }
      });
    });

  </script>
</body>

</html>