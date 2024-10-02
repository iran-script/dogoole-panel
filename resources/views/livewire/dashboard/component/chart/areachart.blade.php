<div>
    <link href="{{asset('panel/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('panel/assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>

    <div>
        <div id="kt_apexcharts_3" class="min-h-auto h-350px h-sm-400px h-lg-450px"></div>
    </div>


        <script src="{{asset('panel/assets/plugins/global/plugins.bundle.js')}}"></script>

        <script>
            // alert("d");
            $(document).ready(function() {

                var element = document.getElementById('kt_apexcharts_3');
                var options = {
                    chart: {
                        type: 'area',
                        height: 400,
                        toolbar: {
                            show: false
                        }
                    },
                    plotOptions: {},
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.7,
                        }
                    },
                    stroke: {
                        curve: 'smooth',
                        show: true,
                        width: 3,
                    },
                    series: [{
                        name: " تعداد سفارشات ",
                        data: {!! $data !!},
                    }],

                    xaxis: {
                        categories: {!! $categories !!},
                        formatter: function (val) {
                            return val + "";
                        },
                        tickPlacement: 'on',
                        tooltip: {
                            enabled: true,
                            formatter: undefined,
                            offsetY: 0,
                            style: {
                                fontSize: '12px'
                            }
                        }
                    },
                    tooltip: {
                        style: {
                            fontSize: '12px'
                        },
                        y: {
                            formatter: function (val) {
                                return +val + ' سفارش '
                            }
                        }
                    },
                    grid: {
                        borderColor: '#e3e3e3',
                        strokeDashArray: 4,
                        yaxis: {
                            lines: {
                                show: true
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
                        },
                        active: {
                            allowMultipleDataPointsSelection: false,
                            filter: {
                                type: 'none',
                                value: 0
                            }
                        }
                    },
                    markers: {
                        strokeColor: '#f8f8f8',
                        strokeWidth: 3
                    },
                    responsive: [{
                        breakpoint: 1000,
                        options: {
                            chart: {
                                height: 340,
                                toolbar: {
                                    show: false
                                }
                            }
                        }
                    }
                    ]
                };
                var chart = new ApexCharts(element, options);
                chart.render();
            });
        </script>
</div>
