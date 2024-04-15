<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel con Bootstrap</title>
  <!-- Incluir Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Personaliza el estilo del panel izquierdo */
    .left-panel {
      background-color: #f4f4f4;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    /* Personaliza el estilo del panel derecho */
    .right-panel {
      background-color: #f4f4f4;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    /* Personaliza el estilo del título */
    .card-title {
      color: #333;
      font-weight: bold;
    }

    /* Personaliza el estilo del texto */
    .card-text {
      color: #666;
    }

    /* Personaliza el espacio entre los paneles */
    .panel-container {
      display: flex;
      justify-content: space-around;
    }

    /* Personaliza el tamaño de los paneles en dispositivos pequeños */
    @media (max-width: 768px) {
      .left-panel, .right-panel {
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container-fluid mt-5 pt-4">
    <div class="panel-container">
      <!-- Panel izquierdo -->
      <div class="left-panel col-md-5">
        <h5 class="card-title">Información del Panel Izquierdo</h5>
        <p class="card-text">Aquí puedes colocar cualquier información que desees mostrar en el panel izquierdo.</p>
      </div>
      <!-- Panel derecho -->
      <div class="right-panel col-md-5">
        <h5 class="card-title">Gráfico de Ventas Mensuales</h5>
        <canvas id="monthlySalesChart" width="400" height="200"></canvas>
      </div>
    </div>
  </div>

  <!-- Incluir Bootstrap JS (opcional, solo si necesitas componentes de JavaScript de Bootstrap) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Incluir Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Datos de ejemplo (ventas mensuales)
    const salesData = {
      labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
      datasets: [{
        label: 'Ventas mensuales',
        data: [1200, 1500, 1700, 1400, 1600, 1800],
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    };

    // Configuración del gráfico
    const chartOptions = {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    };

    // Obtener el contexto del canvas
    const ctx = document.getElementById('monthlySalesChart').getContext('2d');

    // Crear el gráfico de barras
    const salesChart = new Chart(ctx, {
      type: 'bar',
      data: salesData,
      options: chartOptions
    });
  </script>
</body>
</html>
