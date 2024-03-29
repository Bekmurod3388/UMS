@extends('admin.master')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6"><img src="http://192.168.1.93:8081" width="500px" alt="">
                    </div>
                    <div class="col-6">
                        <div class="chart-container">
                            <div class="chartjs-size-monitor"
                                 style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                <div class="chartjs-size-monitor-expand"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                     style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <canvas id="multipleLineChart" width="890" height="600" class="chartjs-render-monitor"
                                    style="display: block; height: 300px; width: 445px;"></canvas>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center w-100 m-5">
                     <img id="animate" src="{{asset('animate.gif')}}" class="mt-3" width="500px"/>
                    </div>
                </div>
                <hr>

            </div>

        </div>
    </div>




@endsection
@section('script')

    <script src="{{asset('/assets/js/plugin/chart.js/chart.min.js')}}"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="{{asset('/assets/js/setting-demo2.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.0/socket.io.min.js"></script>
    <script>
        const temperature = []
        const humidity = []
        let motion = 0;

        const socket = io('http://127.0.0.1:3000');
        socket.on('data', function (data) {
            let model = JSON.parse(data)
            temperature.push(model.temperature)
            humidity.push(model.humidity)
            motion = model.motion;
            if(motion){
                document.getElementById("animate").style.display="block";
            }
            else{
                document.getElementById("animate").style.display="none";
            }


            drawChart()
            if(humidity.length>9){
                temperature.shift()
                humidity.shift()
            }
        })


        var multipleLineChart = document.getElementById('multipleLineChart').getContext('2d');
        var reports = @json($reports);
        var created = [];
        // for (let i = 0; i < reports.length; i++) {
        //     temperature[i] = reports[i].temperature;
        //     humidity[i] = reports[i].humidity
        // }

        drawChart()

        function drawChart() {
            new Chart(multipleLineChart, {
                type: 'line',
                data: {
                    labels: reports.filter((e, i) => i > reports.length - 10)
                        .map(item => new Date(item.created_at).getSeconds()),
                    datasets: [{
                        label: "Namlik",
                        borderColor: "#1d7af3",
                        pointBorderColor: "#FFF",
                        pointBackgroundColor: "#1d7af3",
                        pointBorderWidth: 2,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 1,
                        pointRadius: 4,
                        backgroundColor: 'transparent',
                        fill: true,
                        borderWidth: 2,
                        data: humidity,
                    }, {
                        label: "Harorat",
                        borderColor: "#f3545d",
                        pointBorderColor: "#FFF",
                        pointBackgroundColor: "#f3545d",
                        pointBorderWidth: 2,
                        pointHoverRadius: 4,
                        pointHoverBorderWidth: 1,
                        pointRadius: 4,
                        backgroundColor: 'transparent',
                        fill: true,
                        borderWidth: 2,
                        data: temperature,
                    }]
                },
                options: {
                    responsive: true,
                    animation: false,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'top',
                    },
                    tooltips: {
                        bodySpacing: 4,
                        mode: "nearest",
                        intersect: 0,
                        position: "nearest",
                        xPadding: 10,
                        yPadding: 10,
                        caretPadding: 10
                    },
                    layout: {
                        padding: {left: 15, right: 15, top: 15, bottom: 15}
                    }
                }
            });
        }
    </script>

@stop



