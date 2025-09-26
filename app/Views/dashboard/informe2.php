<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>informe 2</title>
</head>

<body>
  <h1>Informe 1</h1>

  <div class="container">
    <button class="btn btn-outline-primary" id="obtener-datos" type="button">Obtener datos</button>
    <span id="aviso" class="d-none">Por favor espere...</span>
    <div class="row">
      <div class="col-md-7">
        <canvas id="lienzo"></canvas>
      </div>
      <div class="col-md-5">
        <table class="table-primary" id="tabla-resumen">
          <thead>
            <tr></tr>
          </thead>
          <tbody>
            <tr></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const lienzo = document.getElementById('lienzo');
      const btnDatos = document.getElementById('obtener-datos');
      const aviso = document.getElementById('aviso');
      const tabla = document.getElementById('tabla-resumen');
      let grafico = null;

      function renderGraphic() {
        grafico = new Chart(lienzo, {
          type: 'bar',
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
          const response = await fetch('/public/api/getdatainforme2');
          if (!response.ok) throw new Error('No se pudo lograr comunicación');
          const data = await response.json();
          aviso.classList.add("d-none");
          if (data.success) {
            grafico.data.labels = data.resumen.map(d => d.superhero);
            grafico.data.datasets[0].label = 'Popularidad de superheroes';
            grafico.data.datasets[0].data = data.resumen.map(d => d.popularidad);
            grafico.data.datasets[0].backgroundColor = [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(26, 58, 238, 0.2)',
                    'rgba(39, 240, 116, 0.2)',
                    'rgba(196, 240, 39, 0.2)',
                    'rgba(240, 39, 196, 0.2)',
                  ];
            grafico.data.datasets[0].borderColor = [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(75, 192, 192)',
                    'rgba(190, 192, 75, 1)',
                    'rgba(192, 75, 182, 1)',
                  ];
            grafico.data.datasets[0].borderWidth = 3;
            grafico.data.datasets[0].borderRadius = 30;
            grafico.data.datasets[0].barPercentage = .6;

            const options = {
              responsive: true,
              scales: {
                y: { beginAtZero: true }
              }
            }
            
            grafico.update();

            // Generar datos para la tabla-resumen
            data.resumen.forEach(d => {
              document.querySelector("#tabla-resumen thead tr").innerHTML += `<th>${d.superhero}</th>`
              document.querySelector("#tabla-resumen tbody tr").innerHTML += `<td>${d.popularidad}</td>`
            });
          }
        } catch (error) {
          console.log(error);
        }

      });
      renderGraphic();

      // ejercicios con arreglos
      const amigos = [
        { nombre: 'Dante', edad: 23, ciudad: 'Lima'},
        { nombre: 'Juan', edad: 19, ciudad: 'Chincha'},
        { nombre: 'Ariana', edad: 20, ciudad: 'Pisco'},
        { nombre: 'Angie', edad: 19, ciudad: 'Ica'},
      ]
      //recorriendo con map
      let nombres = amigos.map(a => a.nombre);

      //recorriendo con foreach
      let ciudad = [];
      amigos.forEach(a => {
        ciudad.push(a.ciudad);
      })

      console.log(amigos);
      console.log(nombres);
      console.log(ciudad);
    });

  </script>
</body>

</html>