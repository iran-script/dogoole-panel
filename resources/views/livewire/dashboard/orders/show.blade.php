<div>
    @section('title-b',__('index.show order Details'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="d-flex flex-wrap flex-start gap-7 gap-lg-10 mb-7">
                <a href="{{route('admin.orders.index')}}" class="btn btn-icon-success btn-light-success btn-sm ms-auto">
                    <span>{{ __('index.back to order list') }}</span>
                    <i class="ki-duotone ki-left fs-2"></i>
                </a>
                <a href="{{route('admin.orders.bill',[$orderId])}}" class="btn btn-success btn-sm"
                   id="order-invoice-print">{{ __('index.show invoice') }}</a>
            </div>
            <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10 mb-7">
                <div class="card card-flush py-4 flex-row-fluid">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{ __('index.Order Details')}} (#{{ $orderId}})</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                <tbody class="fw-semibold text-gray-600">
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-calendar fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>{{ __('index.order Code Gateway')}}</div>
                                    </td>
                                    <td class="fw-bold text-end">
                                        {{$orderCodeGateway}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-calendar fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>{{ __('index.Order create time')}}</div>
                                    </td>
                                    <td class="fw-bold text-end">
                                        {{jdate($createdTime)}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-wallet fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>{{ __('index.Order Payment Method')}}</div>
                                    </td>
                                    <td class="fw-bold text-end">{{$paymentType}}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-truck fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>{{__('index.order delivery time')}}</div>
                                    </td>
                                    <td class="fw-bold text-end">{{$orderDeliveryTime}}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-truck fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>{{__('index.order delivery type')}}</div>
                                    </td>
                                    <td class="fw-bold text-end">{{($delivery_type!=null)?$delivery_type['title']:'-'}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <div class="card card-flush py-4 flex-row-fluid">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{ __('index.Customer Details')}}</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                <tbody class="fw-semibold text-gray-600">
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-profile-circle fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>{{ __('index.customer name and family')}}</div>
                                    </td>
                                    <td class="fw-bold text-end">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <p class="text-gray-600 text-hover-primary">{{ $userName}} {{ $userFamily}}</p>
                                        </div>
                                    </td>
                                </tr>
                                @if(session('role_id')==1 || session('role_id')==6)
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-phone fs-2 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>{{ __('index.mobile')}}</div>
                                        </td>
                                        <td class="fw-bold text-end">{{ $userMobile}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-phone fs-2 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>{{ __('index.tel')}}</div>
                                        </td>
                                        <td class="fw-bold text-end">{{ $userTel}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-sms fs-2 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>{{ __('index.email')}}</div>
                                        </td>
                                        <td class="fw-bold text-end">{{ $userEmail}}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                </div>
                <div class="card card-flush py-4 flex-row-fluid">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{ __('index.delivery data')}}</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                <tbody class="fw-semibold text-gray-600">
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-truck fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>{{ __('index.order delivery price')}}
                                    </td>
                                    <td class="fw-bold text-end">
                                        <span
                                                class="text-gray-600 text-hover-primary">{{number_format($DeliveryPrice)}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-truck fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>{{ __('index.order price')}}
                                    </td>
                                    <td class="fw-bold text-end">
                                        <span
                                                class="text-gray-600 text-hover-primary">{{number_format($orderPrice)}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-truck fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>{{ __('index.order discount price')}}
                                    </td>
                                    <td class="fw-bold text-end">
                                        <span
                                                class="text-gray-600 text-hover-primary">{{number_format($orderdiscountPrice)}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-truck fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>{{__('index.tax price')}}</div>
                                    </td>
                                    <td class="fw-bold text-end">{{$orderTaxPrice}}</td>
                                </tr>


                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-status fs-2 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>{{__('index.order status')}}</div>
                                    </td>
                                    <td class="fw-bold text-end">
                                        {{__('index.'.$orderStatus)}}
                                        @livewire('dashboard.component.order-status',['orderPrice'=>$orderPrice,'orderStatus'=>$orderStatus,'orderId'=>$orderId,'times'=>$times])
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10 mb-7">
                <div class="card card-flush py-4 flex-row-fluid position-relative">
                    <div class="position-absolute top-0 end-0 bottom-0 opacity-10 d-flex align-items-center me-5">
                        <i class="ki-solid ki-delivery" style="font-size: 13em"></i>
                    </div>
                    <div class="card-header">
                        <div class="card-title">
                            <h2 class="fw-bolder fs-lg-2x">{{ __('index.customer address')}}</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <span class="d-inline-block fw-semibold fs-lg3"> عنوان آدرس: </span>
                        <p class="d-inline-block fw-bold fs-lg-3">
                            {{$addressTitle}}</p>
                        <br/>
                        <span class="d-inline-block fw-semibold fs-lg3"> واحد: </span>
                        <p class="d-inline-block fw-bold fs-lg-3">
                            {{$addressUnit}}</p>
                        <br/>
                        <span class="d-inline-block fw-semibold fs-lg3"> پلاک: </span>
                        <p class="d-inline-block fw-bold fs-lg-3">
                            {{$addressPlaque}}</p>
                        <br/>
                        <span class="d-inline-block fw-semibold fs-lg3"> کد پستی: </span>
                        <p class="d-inline-block fw-bold fs-lg-3">
                            {{$addressPostalCode}}</p>
                        <br/>
                        <span class="d-inline-block fw-semibold fs-lg3"> آدرس کامل: </span>
                        <p class="d-inline-block fw-bold fs-lg-3">
                            {{$addressFull}}</p>
                        <br/>
                        <span class="d-inline-block fw-semibold fs-lg3"> توضیحات: </span>
                        <p class="d-inline-block fw-bold fs-lg-3">
                            {{$description}}</p>
                    </div>
                </div>
            </div>
            <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                            <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-150px">نام غذا</th>
                                <th class="min-w-100px text-end">تعداد سفارش</th>
                                <th class="min-w-100px text-end">قیمت واحد</th>
                                <th class="min-w-100px text-end">مجموع قیمت</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @forelse($orderCarts as $cart)
                                <tr>
                                    <td>
                                        <h5 class="fw-bold text-gray-600 text-hover-primary">{{ $cart['variety']['title'] ?? '' }}</h5>
                                    </td>
                                    <td class="text-end">{{ $cart['count'] ?? '' }}</td>
                                    <td class="text-end">{{ number_format($cart['variety']['price']) ?? '' }}</td>
                                    <td class="text-end">{{ number_format($cart['price']) ?? '' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <p class="fw-bold align-middle fs-3qx text-center pt-10">{{ __('index.no data to show') }}</p>
                                        <div class="text-center pb-15 px-5">
                                            <img src="{{asset('panel/assets/media/illustrations/sketchy-1/2.png')}}"
                                                 alt=""
                                                 class="mw-100 h-200px h-sm-325px">
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
