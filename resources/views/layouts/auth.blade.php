<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl">
<head>
    @php
        $data=getSettingWithName(['faveIcon','title']);
    @endphp
    <title>{{$data['title']??''}} |ورود به پنل مدیریت</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{$data['faveIcon']??''}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="{{asset('panel/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('panel/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('panel/assets/css/app.css')}}" rel="stylesheet" type="text/css"/>
    @livewireStyles
</head>
<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat"
      data-bs-theme="dark">
<style>body {
        background-image: url('{{asset('panel/assets/media/auth/bg99.jpg')}}');
        /*backdrop-filter: blur(2px);*/

    }

    [data-bs-theme="dark"] body {
        background-image: url('{{asset('panel/assets/media/auth/bg99.jpg')}}');
    }</style>
<script>var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }</script>
@yield('content')
<!--begin::Javascript-->
<script>var hostUrl = "{{asset('panel/assets/')}};"</script>
<script src="{{asset('panel/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('panel/assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('panel/assets/js/custom/authentication/sign-in/general.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
@livewireScripts
<script>
    // $('body').on('notification', function (event, data) {
    //     Toastify({
    //         text: event.detail.message,
    //         duration: 3000,
    //         newWindow: true,
    //         close: true,
    //         gravity: "top", // `top` or `bottom`
    //         position: "right", // `left`, `center` or `right`
    //         stopOnFocus: true,
    //         onClick: function () {
    //         } // Callback after click
    //     }).showToast();
    // });
</script>

@if (session()->has('notification'))
    <script>

        Toastify({
            text: "{{session('notification')}}",
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true,
            style: {
                // background: "linear-gradient(to right, #00b09b, #96c93d)",
            },
            onClick: function () {
            } // Callback after click
        }).showToast();
    </script>
@endif

</body>
</html>
