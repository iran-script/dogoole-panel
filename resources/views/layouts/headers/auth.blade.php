@php
    $user=json_decode(session('user'),true);
@endphp

<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}"
     data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '0'}"
     data-kt-sticky-animation="false">
    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
         id="kt_app_header_container">
        <!--begin::Sidebar mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
        </div>
        <!--end::Sidebar mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">

            @php
                $logo=getSettingWithName(['logoPanel']);
            @endphp
            <a href="/" class="d-lg-none">
                <img alt="Logo" src="{{$logo['logoPanel']??''}}" class="h-30px"/>
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <!--begin::Menu wrapper-->
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                 data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                 data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
                 data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                 data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                 data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <!--begin::Menu-->
                <div
                    class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                    id="kt_app_header_menu" data-kt-menu="true">

                </div>
            </div>

            <div class="app-navbar flex-shrink-0">

                <div class="app-navbar-item ms-1 ms-md-4">
                    <div
                        class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end" id="kt_menu_item_wow">

                    </div>
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true"
                         id="kt_menu_notifications">
                        <div class="d-flex flex-column bgi-no-repeat rounded-top"
                             style="background-image:url("{{asset('panel/assets/media/misc/menu-header-bg.jpg')}}")>

                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade" id="kt_topbar_notifications_1" role="tabpanel">
                            <div class="scroll-y mh-325px my-5 px-8">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-navbar-item ms-1 ms-md-4">
                <a href="#"
                   class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px"
                   data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                   data-kt-menu-placement="bottom-end">
                    <i class="ki-duotone ki-night-day theme-light-show fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                        <span class="path6"></span>
                        <span class="path7"></span>
                        <span class="path8"></span>
                        <span class="path9"></span>
                        <span class="path10"></span>
                    </i>
                    <i class="ki-duotone ki-moon theme-dark-show fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </a>
                <div
                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                    data-kt-menu="true" data-kt-element="theme-mode-menu">
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-night-day fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
														<span class="path5"></span>
														<span class="path6"></span>
														<span class="path7"></span>
														<span class="path8"></span>
														<span class="path9"></span>
														<span class="path10"></span>
													</i>
												</span>
                            <span class="menu-title">{{__('index.light')}}</span>
                        </a>
                    </div>
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-moon fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span>
                            <span class="menu-title">{{__('index.dark')}}</span>
                        </a>
                    </div>
                    <div class="menu-item px-3 my-0">
                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-screen fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
													</i>
												</span>
                            <span class="menu-title">{{__('index.system')}}</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                <div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                     data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                    <img src="{{asset('panel/assets/media/avatars/300-3.jpg')}}" class="rounded-3" alt="user"/>
                </div>
                <div
                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                    data-kt-menu="true">
                    <div class="menu-item px-3">
                        <div class="menu-content d-flex align-items-center px-3">
                            <div class="symbol symbol-50px me-5">
                                <img alt="Logo" src="{{asset('panel/assets/media/avatars/300-3.jpg')}}"/>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="fw-bold d-flex align-items-center fs-5">
                                    {{$user['name']??" "}}{{$user['family']??" "}}
                                    <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">
                                        @if($user['role_id']==1)
                                            {{__('index.management')}}
                                        @elseif($user['role_id']==3)
                                            {{__('index.chef')}}
                                        @endif
                                    </span>
                                </div>
                                <div class="fw-semibold d-flex align-items-center fs-6 mt-2 text-gray-500">
                                    {{$user['mobile']??" "}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item px-5">
                        @if($user['role_id']==3)
                            <a href="{{route('admin.branch.edit',$user['id'])}}" class="menu-link px-5">{{__('index.profile')}}</a>
                        @elseif($user['role_id']==1)
                        @endif
                        <a href="{{route('logout')}}" class="menu-link px-5">{{__('index.logout')}}</a>
                    </div>
                </div>
            </div>
{{--            <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">--}}
{{--                <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px"--}}
{{--                     id="kt_app_header_menu_toggle">--}}
{{--                    <i class="ki-duotone ki-element-4 fs-1">--}}
{{--                        <span class="path1"></span>--}}
{{--                        <span class="path2"></span>--}}
{{--                    </i>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
