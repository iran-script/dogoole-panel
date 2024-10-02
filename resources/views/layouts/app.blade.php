<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl">
<head>

    @php
        $data=getSettingWithName(['faveIcon','title']);
    @endphp
    <title>{{$data['title']??''}} | پنل مدیریت</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title"
          content="{{$data['title']??''}} "/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    @yield('style')

    <link href="{{asset('panel/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('panel/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('panel/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('panel/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <link rel="icon" type="image/x-icon" href="{{$data['faveIcon']??''}}">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @livewireStyles
</head>
<body id="kt_app_body dark" data-kt-app-layout="light-sidebar" data-kt-app-header-fixed="true"
      data-kt-app-header-fixed="true"
      data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
      data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
<script>
    var defaultThemeMode = "light";
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
    }
</script>
@include('layouts.navbars.sidebar')
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        @include('layouts.headers.auth')
    </div>
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <div class="d-flex flex-column flex-column-fluid">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        @include('layouts.headers.second-nav')
                        @yield('content')
                    </div>
                </div>
            </div>
            @include('layouts.footers.auth')
        </div>
    </div>
</div>
</div>
<script>var hostUrl = "{{asset('panel/assets/')}}";</script>
<script src="{{asset('panel/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('panel/assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('panel/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{asset('panel/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('panel/assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
<script src="{{asset('panel/assets/js/widgets.bundle.js')}}"></script>
<script src="{{asset('panel/assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('panel/assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('panel/assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('panel/assets/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('panel/assets/js/custom/utilities/modals/new-target.js')}}"></script>
<script src="{{asset('panel/assets/js/custom/utilities/modals/users-search.js')}}"></script>
<script src=""{{asset('panel/assets/js/custom/apps/user-management/users/list/table.js')}}"></script>
<script src=""{{asset('panel/assets/js/custom/apps/user-management/users/list/export-users.js')}}"></script>
<script src=""{{asset('panel/assets/js/custom/apps/user-management/users/list/add.js')}}"></script>
<script src=""{{asset('panel/assets/js/custom/util   ities/modals/upgrade-plan.js')}}"></script>
<script src=""{{asset('panel/assets/js/custom/utilities/modals/create-app.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>

@yield('scripts')
@livewireScripts
<script>
    $('body').on('notification', function (event, data) {
        Toastify({
            text: event.detail.message,
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true,
            onClick: function () {
            } // Callback after click
        }).showToast();
    });
    $('body').on('notification2', function (event, data) {
        Swal.fire({
            icon: "error",
            title: event.detail.message,
            confirmButtonText: "متوجه شدم "
        });
    });
</script>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
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
            }
        }).showToast();
    </script>
@endif
@if (session()->has('notification2'))
    <script>
        alert("csdcdsc");
        Swal.fire({
            icon: "مشکلی پیش آمده است",
            title: "cdscdscsd",
        });
    </script>
@endif
<script>
    function destroy(delete_id) {
        Swal.fire({
            title: "از حذف مطمئنید ؟",
            text: "پس از حذف دیگر قادر به بازگرداندن نیستید!",
            icon: "هشدار",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "بله حذف شود!",
            cancelButtonText: "لغو"
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('destroy', {id: delete_id});
            }
        });
    }
</script>
</body>
</html>
