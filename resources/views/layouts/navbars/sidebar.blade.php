<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="/">
            @php
              $logo=getSettingWithName(['logoPanel']);
            @endphp
            <img alt="Logo" src="{{$logo['logoPanel']??''}}"
                 class="h-100px app-sidebar-logo-default w-75"/>
            <img alt="Logo" src="{{$logo['logoPanel']??''}}"
                 class="h-45px app-sidebar-logo-minimize w-75"/></a>
        <div id="kt_app_sidebar_toggle"
             class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <div id="kt_app_sidebar_menu_wrapper" class="hover-scroll-y my-5" data-kt-scroll="true"
                 data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                 data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                 data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" style="height: 304px;">
                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
                     data-kt-menu="true" data-kt-menu-expand="false">

                    @foreach(config('config.sidebar.'.session('role_id')) as $item)
                        @if(empty($item['child']))
                            <div class="menu-item">
                                <a class="menu-link" href="{!!  route($item['routName'],$item['parameters'] ??[]) !!}">
                                    <span class="menu-icon">
                                        @if(isset($item['icon']))
                                            <span class="menu-icon">
                                                <i class="{!! $item['icon'] !!}"></i>
                                            </span>
                                        @endif
                                    </span>
                                    <span class="menu-title">{{ __('index.' . $item['title']) }}</span>
                                </a>
                            </div>
                        @else
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            @if(isset($item['icon']))
                                                <span class="menu-icon">
                                                    <i class="{!! $item['icon'] !!}"></i>
                                                </span>
                                            @endif
                                        </span>
                                        <span class="menu-title">{{ __('index.' . $item['title']) }}</span>
                                        <span class="menu-arrow"></span>
                                    </span>
                                <div class="menu-sub menu-sub-accordion">
                                    @foreach($item['child'] as $childItem)
                                        <div class="menu-item">
                                            {{--                                            <a class="menu-link" href="{{ eval($childItem['routName']) ? route($childItem['routName']) : '' }}">--}}
                                            {{--<a class="menu-link" href="{{ route($childItem['routName']['name']['parameters']) }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                            <span class="menu-title">{{ __('index.' . $childItem['title']) }}</span>
                                        </a>--}}
                                            <a class="menu-link"
                                               href="{{ route($childItem['routName'], $childItem['parameters'] ??[])}}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                <span class="menu-title">{{ __('index.' . $childItem['title']) }}</span>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
