<div>
    <link href="{{asset('panel/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('panel/assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>

    <div>
        <div id="kt_apexcharts_1" class="min-h-auto h-350px h-sm-400px h-lg-450px"></div>
    </div>


    @section('scripts')
        <script src="{{asset('panel/assets/plugins/global/plugins.bundle.js')}}"></script>

        <script>
            var element = document.getElementById('kt_apexcharts_1');

            var options = {
                chart: {
                    type: 'bar',
                    height: 400,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: '30%',
                        borderRadius: 4,
                    }
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                        return val + "";
                    },
                },
                fill: {
                    type: "solid",
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: 'rgba(255,255,255,0)'
                },
                series: [{
                    name: 'ثبت نام جدید',
                    data: {!! $clientnumber !!}
                }],
                xaxis: {
                    labels: {
                        rotate: -45
                    },
                    categories: {!! $registerdate !!}
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#e9e9e9',
                            fontSize: '12px'
                        }
                    }
                },
                states: {
                    normal: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    },
                    hover: {
                        filter: {
                            type: 'none',
                            value: 0
                        }
                    }
                },
                tooltip: {
                    style: {
                        fontSize: '12px'
                    },
                    y: {
                        formatter: function (val) {
                            return + val + ' نفر '
                        }
                    }
                },
                colors: ['#3356fa', '#664fef'],
                grid: {
                    borderColor: '#f8f8f8',
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true
                        }
                    }
                },
                responsive: [{
                    breakpoint: 1000,
                    options: {
                        chart: {
                            height: 340,
                            toolbar: {
                                show: false
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '80%',
                            }
                        }
                    }
                }
                ]
            };

            var chart = new ApexCharts(element, options);
            chart.render();
        </script>
    @endsection
</div>
