<!DOCTYPE html>
<html lang="fa" class="billed">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <title>فاکتور مشتری</title>
    <link href="{{asset('panel/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('panel/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        @font-face {
            font-family: IRANSans;
            font-style: normal;
            font-weight: normal;
            src: url('../fonts/IRANSans(FaNum).ttf');
        url('../fonts/IRANSans(FaNum)_Light.ttf') format('truetype'), /* FF39+,Chrome36+, Opera24+*/
        url('../fonts/IRANSans(FaNum)_Medium.ttf') format('truetype'), /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
        url('../fonts/IRANSans(FaNum)_UltraLight.ttf') format('truetype');
        }
        *{
            /*font-family: IRANSans, "IRANSans", sans-serif;*/
            font-family:YekanBakh,"YekanBakh",Inter,Helvetica,sans-serif,Arial;
        }
        body, html {
            padding: 0;
            text-align: right;
            direction: rtl;
            margin: 0;
            overflow-x: hidden;
        }

        h6, .h6, h5, .h5, h4, .h4, h3, .h3, h2, .h2, h1, .h1, a, p {
            color: #000000;
        }

        .text-center {
            font-size: 0.9rem !important;
        }
        .font-order-num-16 {
            font-size: 20px;
            font-weight: 700;
        }
        .table > :not(caption) > * > *{
            padding: 0.4rem !important;
        }
        .box-back-gry {
            background-color: #f9f9f9;
            padding: 5px;
            border-radius: 4px;
            margin: 5px 0px 5px;
            border: 1px solid #262626;
        }

        .ez-price {
            font-size: 12px;
            font-weight: 500;
        }

        .f16 {
            text-align: right;
            font-size: 18px;
            font-weight: 400;
        }

        .tittle-chil {
            text-align: center;
            font-size: 22px;
            font-weight: 700;
        }

        .d-flex-center {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 6px 10px;
            margin: 7px 0;
            background: #f8f8f8;
            border: 1px solid #262626;
            border-radius: 4px;
        }

        .billed {
            max-width: 450px;
            width: 100%;
            margin: auto;
            background-color: #eee !important;
        }

        .bill-body {
            background-color: #6E6E6E;
            padding: 0px;
            background-color: #eee !important;
        }

        .tbord-num {
            font-size: 12px !important;
            font-weight: 500;
        }

        .t-cill-bill-tittles {
            font-size: 12px;
            font-weight: 400;
        }

        .prices-item-list {
            font-size: 12px;
            font-weight: 500;
        }

        .tittle-bill-ord-table {
            font-size: 12px;
            font-weight: 700;
        }

        .bill-chil-extra-notes {
            font-size: 13px;
            font-weight: 400;
            padding: 8px;
        }

        .tiny-12 {
            font-size: 12px;
            font-weight: 400;
        }

        .t12-small-text {
            font-size: 11px;
        }

        .footer-notic-chil-bill {
            border-top: 1px solid #eee;
            text-align: center;
            padding: 10px;
        }

        .footer-notic-chil-bill > p {
            font-size: 13px;
            font-weight: 600;
        }

        .t-item-bill-ord-table {
            font-size: 12px;
            font-weight: 600;
        }

        .app-bill-tittle {
            font-size: 13px;
            font-weight: 500;
            color: #000000;
            margin-bottom: 0;
        }

        .discription-extra {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 0;
        }

        .extra-discription-box {
            padding: 0 4%;
        }

        .discription-extra {
            padding: 0 10px 0 7px;
        }
    </style>
</head>
<body class="bill-body">
@yield('content')
{{--<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <div class="d-flex flex-column flex-column-fluid">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
--}}{{--                        @include('layouts.headers.second-nav')--}}{{--

                    </div>
                </div>
            </div>
            @include('layouts.footers.auth')
        </div>
    </div>
</div>--}}
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
</body>
</html>


