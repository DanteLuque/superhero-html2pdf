<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>informe 4</title>
</head>

<body>
  <h1>Informe 4</h1>

  <div class="container">
    <h4>Generos</h4>
    <button class="btn btn-outline-primary" id="obtener-datos-gender" type="button">Obtener datos</button>
    <span id="aviso-genero" class="d-none">Por favor espere...</span>
    <canvas id="lienzo"></canvas>
    <hr>
  </div>

  <div class="container">
    <h4>Editoriales</h4>
    <button class="btn btn-outline-primary" id="obtener-datos-publisher" type="button">Obtener datos</button>
    <span id="aviso-publisher" class="d-none">Por favor espere...</span>
    <canvas id="lienzo2"></canvas>
    <hr>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const lienzo = document.getElementById('lienzo');
      const btnDatosGender = document.getElementById('obtener-datos-gender');
      const avisoGenero = document.getElementById('aviso-genero');

      const lienzo2 = document.getElementById('lienzo2');
      const btnDatosPublisher = document.getElementById('obtener-datos-publisher');
      const avisoPublisher = document.getElementById('aviso-publisher');
      let grafico = null;
      let grafico2 = null;

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

        grafico2 = new Chart(lienzo2, {
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

      btnDatosGender.addEventListener("click", async () => {
        try {
          avisoGenero.classList.remove("d-none");
          const response = await fetch('/public/api/getdatainforme4gendercache');
          if (!response.ok) throw new Error('No se pudo lograr comunicación');
          const data = await response.json();
          console.log(data)
          avisoGenero.classList.add("d-none");
          if (data.success) {
            grafico.data.labels = data.resumen.map(d => d.gender);
            grafico.data.datasets[0].label = data.message;
            grafico.data.datasets[0].data = data.resumen.map(d => d.total);
            grafico.data.datasets[0].backgroundColor = [
              'rgba(255, 99, 132, 0.2)',
              'rgba(26, 58, 238, 0.2)',
              'rgba(39, 240, 116, 0.2)',
            ];
            grafico.data.datasets[0].borderColor = [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(75, 192, 192)',
            ];
            grafico.data.datasets[0].borderWidth = 3;
            grafico.data.datasets[0].barPercentage = .6;

            const options = {
              responsive: true,
              scales: {
                y: { beginAtZero: true }
              }
            }

            grafico.update();
          }
        } catch (error) {
          console.log(error);
        }

      });

      btnDatosPublisher.addEventListener("click", async () => {
        try {
          avisoPublisher.classList.remove("d-none");
          const response = await fetch('/public/api/getdatainforme4publishercache');
          if (!response.ok) throw new Error('No se pudo lograr comunicación');
          const data = await response.json();
          console.log(data)
          avisoPublisher.classList.add("d-none");
          if (data.success) {
            grafico2.data.labels = data.resumen.map(d => d.publisher_name);
            grafico2.data.datasets[0].label = data.message;
            grafico2.data.datasets[0].data = data.resumen.map(d => d.total);
            grafico2.data.datasets[0].backgroundColor = [
              'rgba(255, 99, 132, 0.2)',
              'rgba(26, 58, 238, 0.2)',
              'rgba(39, 240, 116, 0.2)',
              'rgba(196, 240, 39, 0.2)',
              'rgba(240, 39, 196, 0.2)',
            ];
            grafico2.data.datasets[0].borderColor = [
               'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(75, 192, 192)',
              'rgba(190, 192, 75, 1)',
              'rgba(192, 75, 182, 1)',
            ];
            grafico2.data.datasets[0].borderWidth = 3;
            grafico2.data.datasets[0].barPercentage = .6;

            const options = {
              responsive: true,
              scales: {
                y: { beginAtZero: true }
              }
            }

            grafico2.update();
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