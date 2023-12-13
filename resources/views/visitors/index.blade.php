@component('layouts.app')
    @section('content')
        <div class="container">
            <div class="page-content">
                <div class="visitors-content">
                    <div class="chart-item">
                        <div class="chart-header">
                            <h4 class="card-title">Visitors By Hour</h4>
                        </div>
                        <div class="chart-body" id="visitorsByHourChartContent" data-url="{{ url('api/visitors-by-hours') }}">

                        </div>
                    </div>
                    <div class="chart-item">
                        <div class="chart-header">
                            <h4 class="card-title">Visitors By City</h4>
                        </div>
                        <div class="chart-body" id="visitorsByCityChartContent" data-url="{{ url('api/visitors-by-city') }}">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('js')
        <script type="text/javascript">
            $(document).ready(function () {
                getVisitorsByHour();
                getVisitorsByCity()
            })
            function chartEngine(chartId, type) {
                let chartContent = $('#'+chartId+'Content'),
                    url = chartContent.data('url'),
                    filterDateElement = $('#'+chartId+'Date');

                let data = {};
                if(filterDateElement.length) {
                    data.filterDate = filterDateElement.val();
                }
                chartContent.html('');
                $.ajax({
                    url: url,
                    type: "get",
                    datatype: "html",
                    data: data
                }).done(function(res){
                    chartContent.html('<canvas id="'+chartId+'"></canvas>');
                    var labels =  res.data.labels;
                    var values =  res.data.values;
                    // let backgroundColor = 'rgba(54, 162, 235, 0.5)';
                    // let borderColor = 'rgba(75, 192, 192, 0.5)';
                    //
                    // if(type == 'pie') {
                    //     backgroundColor = [
                    //         'rgba(54, 162, 235, 0.5)',
                    //         'rgba(75, 192, 192, 0.5)'
                    //     ];
                    //     borderColor = [
                    //         'rgba(54, 162, 235, 0.5)',
                    //         'rgba(75, 192, 192, 0.5)'
                    //     ];
                    // }

                    const data = {
                        labels: labels,

                        datasets: [{
                            label: 'Visits',
                            backgroundColor: ["#51e2f5", "#9df9ef", "#ffa8B6", "#a28089", "#e5eaf5", "#00DDFF"],
                            data: values,
                            pointRadius: 1,
                            pointHoverRadius: 1,
                            tension: 0.1,
                            fill: false,
                        }]
                    };

                    console.log(data);

                    const config = {
                        type: type,
                        data: data,
                        options: {
                            responsive: true,
                        }
                    };
                    var chartCanvas = $('#' + chartId).get(0).getContext("2d");
                    new Chart(chartCanvas, config);
                });
            }

            function getVisitorsByHour() {
                chartEngine('visitorsByHourChart', 'bar');
            }

            function getVisitorsByCity() {
                chartEngine('visitorsByCityChart', 'pie');
            }
        </script>
    @endsection
@endcomponent
