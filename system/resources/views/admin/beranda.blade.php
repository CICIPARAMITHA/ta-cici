@extends('admin.template.base')
@section('content')
<div class="mdl-grid mdl-grid--no-spacing dashboard">

    <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">

     <!-- Weather widget-->
     <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
        <div class="mdl-card mdl-shadow--2dp weather">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Temperatue Tanah </h2>

            </div>
            <div class="mdl-card__supporting-text mdl-card--expand">
                <p class="weather-temperature" id="soil">{{$nilai->soil}} pH <br> {{number_format($persen_soil,0)}} %</p>

                
            </div>
        </div>
    </div>
    <!-- Trending widget-->



    <!-- Weather widget-->
    <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
        <div class="mdl-card mdl-shadow--2dp weather">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Temperatue Ruangan</h2>

            </div>
            <div class="mdl-card__supporting-text mdl-card--expand">
                <p class="weather-temperature" id="temperatur">{{$nilai->temperatur}}<sup>&deg;</sup>C</p>

                
            </div>
        </div>
    </div>
    <!-- Trending widget-->

    <!-- Weather widget-->
    <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
        <div class="mdl-card mdl-shadow--2dp weather">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">Kelembaban Ruangan</h2>

                
            </div>
            <div class="mdl-card__supporting-text mdl-card--expand">
                <p class="weather-temperature" id="humidity">{{$nilai->humidity}} RH</p>
            </div>
        </div>
    </div>
    <!-- Trending widget-->



    <!-- Cotoneaster card-->
    <div class="mdl-cell mdl-cell--5-col-desktop mdl-cell--5-col-tablet mdl-cell--2-col-phone">
        <div class="mdl-card mdl-shadow--2dp cotoneaster">
           <iframe src="http://{{Auth::user()->ip}}" style="margin-top: 20px;">
            Your browser doesn't support iframes
        </iframe>
    </div>
</div>



<!-- TULISAN TEMPERATUR RUANGAN -->
<div class="mdl-cell mdl-cell--7-col-desktop mdl-cell--7-col-tablet mdl-cell--4-col-phone">
    <div class="mdl-card mdl-shadow--2dp line-chart">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Temperatur Ruangan</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <canvas id="realtime-chart-1" height="100px"></canvas>

        </div>
    </div>
</div>


</div>



<!-- TULISAN TEMPERATUR TANAH -->
<div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
    <div class="mdl-card mdl-shadow--2dp line-chart">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Temperatur Tanah</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <canvas id="realtime-chart-2" height="100px"></canvas>

        </div>
    </div>
</div>


<!-- TULISAN KELEMBABAN RUANGAN -->
<div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
    <div class="mdl-card mdl-shadow--2dp line-chart">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Kelembaban Ruangan</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <canvas id="realtime-chart-3" height="100px"></canvas>

        </div>
    </div>
</div>
<!-- Table-->


</div>
</div>






<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">

// KAMAR 1 ===================
    function soil(){
        $('#soil').load("{{url('admin/beranda')}}" + ' #soil');
    }

    function temperatur(){
        $('#temperatur').load("{{url('admin/beranda')}}" + ' #temperatur');
    }

    function humidity(){
        $('#humidity').load("{{url('admin/beranda')}}" + ' #humidity');
    }


    setInterval( ()=>{
        soil();
        temperatur();
        humidity();
    }, 2000);

    




</script>





<script>
 const ctx1 = document.getElementById('realtime-chart-1').getContext('2d');
 const chart1 = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Suhu Ruangan',
            data: [],
            borderWidth: 4,
            borderColor: 'rgba(0, 255, 254)',
            tension: 0.4,
            fill: false
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                max: 40   ,
                ticks: {
                    stepSize: 10
                }
            }
        }
    }
});

 function fetchData1() {
    $.ajax({
        url: '{{url("load")}}',
        type: 'GET',
        success: function(data) {
            var waktu = new Date(data.created_at);
            var jam = waktu.getUTCHours().toString().padStart(2, '0');
            var menit = waktu.getUTCMinutes().toString().padStart(2, '0');
            var detik = waktu.getUTCSeconds().toString().padStart(2, '0');
            chart1.data.labels.push(jam + ':' + menit + ':' + detik);
            if (chart1.data.labels.length > 12) {
                chart1.data.labels = chart1.data.labels.slice(-12);
            }

            chart1.data.datasets[0].data.push(data.temperatur);
            if (chart1.data.datasets[0].data.length > 12) {
                chart1.data.datasets[0].data = chart1.data.datasets[0].data.slice(-12);
            }
            chart1.update();
        }
    });
}

fetchData1();
setInterval(fetchData1, 5000);


</script>



<script>
 const ctx2 = document.getElementById('realtime-chart-2').getContext('2d');
 const chart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Nilai Temperatur Tanah',
            data: [],
            borderWidth: 4,
            borderColor: 'rgba(249, 241, 13, 0.8)',
            tension: 0.4,
            fill: false
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                max: 1000,
                ticks: {
                    stepSize: 10
                }
            }
        }
    }
});

 function fetchData2() {
    $.ajax({
        url: '{{url("load")}}',
        type: 'GET',
        success: function(data) {
            var waktu = new Date(data.created_at);
            var jam = waktu.getUTCHours().toString().padStart(2, '0');
            var menit = waktu.getUTCMinutes().toString().padStart(2, '0');
            var detik = waktu.getUTCSeconds().toString().padStart(2, '0');
            chart2.data.labels.push(jam + ':' + menit + ':' + detik);
            if (chart2.data.labels.length > 12) {
                chart2.data.labels = chart2.data.labels.slice(-12);
            }

            chart2.data.datasets[0].data.push(data.soil);
            if (chart2.data.datasets[0].data.length > 12) {
                chart2.data.datasets[0].data = chart2.data.datasets[0].data.slice(-12);
            }
            chart2.update();
        }
    });
}

fetchData2();
setInterval(fetchData2, 5000);


</script>




<!-- 3 disini -->
<script>
 const ctx3 = document.getElementById('realtime-chart-3').getContext('2d');
 const chart3 = new Chart(ctx3, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: 'Nilai Kelembaban Ruangan',
            data: [],
            borderWidth: 4,
            borderColor: 'rgba(242, 125, 230, 0.8)',
            tension: 0.4,
            fill: false
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                max: 120,
                ticks: {
                    stepSize: 10
                }
            }
        }
    }
});

 function fetchData3() {
    $.ajax({
        url: '{{url("load")}}',
        type: 'GET',
        success: function(data) {
            var waktu = new Date(data.created_at);
            var jam = waktu.getUTCHours().toString().padStart(2, '0');
            var menit = waktu.getUTCMinutes().toString().padStart(2, '0');
            var detik = waktu.getUTCSeconds().toString().padStart(2, '0');
            chart3.data.labels.push(jam + ':' + menit + ':' + detik);
            if (chart3.data.labels.length > 12) {
                chart3.data.labels = chart3.data.labels.slice(-12);
            }

            chart3.data.datasets[0].data.push(data.humidity);
            if (chart3.data.datasets[0].data.length > 12) {
                chart3.data.datasets[0].data = chart3.data.datasets[0].data.slice(-12);
            }
            chart3.update();
        }
    });
}

fetchData3();
setInterval(fetchData3, 5000);


</script>



@endsection