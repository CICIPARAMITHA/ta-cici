<!DOCTYPE html>
<html>
<head>
  <title>Laravel ChartJS Chart Example - ItSolutionStuff.com</title>
</head>

<body>
  <h1>Laravel ChartJS Chart Example - ItSolutionStuff.com</h1>
  <div id="humidity">
    <canvas id="realtime-chart" height="100px"></canvas>
  </div>


   <div id="humidity">
    <canvas id="realtime-chart-1" height="100px"></canvas>
  </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script>



<script>
        const ctx = document.getElementById('realtime-chart').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'SOIL',
                    data: [],
                    borderWidth: 4,
                    borderColor: 'rgba(153, 0, 153)',
                    tension: 0.4,
                    fill: false
                }]
            },
            options: {
                maintainAspectRatio: false, // Nonaktifkan perbandingan aspek agar dapat mengatur tinggi secara bebas
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 50,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        });

        function fetchData() {
            $.ajax({
                url: '{{url("load")}}',
                type: 'GET',
                success: function(data) {
                    var waktu = new Date(data.created_at);
                    var jam = waktu.getUTCHours().toString().padStart(2, '0');
                    var menit = waktu.getUTCMinutes().toString().padStart(2, '0');
                    var detik = waktu.getUTCSeconds().toString().padStart(2, '0');
                    chart.data.labels.push(jam + ':' + menit + ':' + detik);
                    if (chart.data.labels.length > 12) {
                        chart.data.labels = chart.data.labels.slice(-12);
                    }

                    // push data suhu
                    chart.data.datasets[0].data.push(data.suhu);
                    if (chart.data.datasets[0].data.length > 12) {
                        chart.data.datasets[0].data = chart.data.datasets[0].data.slice(-12);
                    }
                    chart.update();
                }
            });
        }


        // Memanggil fetchData pertama kali untuk menampilkan data pertama
        fetchData();

        setInterval(fetchData, 5000);
    </script>
</html>