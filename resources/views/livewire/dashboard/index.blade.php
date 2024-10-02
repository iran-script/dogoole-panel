<div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            @if($user['role_id']==1)

                <div class="row gy-5 g-xl-10">
                    <h3>{{trans('index.quick access')}} </h3>
                    @foreach(config('config.quickAccessItem') as $item)
                        <div class="col-6 col-sm-6  col-xl-2 mb-xl-10 mb-sm-3">
                            <div class="card card-dashed h-lg-100 cursor-pointer">
                                <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                    <a href="{{route($item['routName'],$item['routParams'])}}"><span
                                            class="fw-semibold fs-6 text-gray-500">{{trans($item['title'])}}</span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>

                <div class="row gy-5 g-xl-10">
                    <div class="col-6 col-sm-6  col-xl-2 mb-xl-10 mb-sm-3">
                        <div class="card h-lg-100">
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <div class="m-0">
                                    <i class="ki-duotone ki-compass fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="d-flex flex-column my-7">
                                    <span
                                        class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{$counts['branches']??0}} </span>
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">{{ __('index.chef') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-sm-6  col-xl-2 mb-xl-10 mb-sm-3">
                        <div class="card h-lg-100">
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <div class="m-0">
                                    <i class="ki-duotone ki-chart-simple fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </div>
                                <div class="d-flex flex-column my-7">
                                    <span
                                        class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{$counts['transaction']??0}}</span>
                                    <div class="m-0">
                                        <span
                                            class="fw-semibold fs-6 text-gray-500">{{ __('index.count trans') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6  col-xl-2 mb-xl-10 mb-sm-3">
                        <div class="card h-lg-100">
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <div class="m-0">
                                    <i class="ki-duotone ki-abstract-39 fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="d-flex flex-column my-7">
                                    <span
                                        class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{$counts['orders']['countAll']??0}}</span>
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">{{ __('index.Order') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6  col-xl-2 mb-xl-10 mb-sm-3">
                        <div class="card h-lg-100">
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <div class="m-0">
                                    <i class="ki-duotone ki-map fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </div>
                                <div class="d-flex flex-column my-7">
                                    <span
                                        class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{$counts['users']??0}} </span>
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">{{ __('index.users') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6  col-xl-2 mb-5 mb-xl-10 mb-sm-3">
                        <div class="card h-lg-100">
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <div class="m-0">
                                    <i class="ki-duotone ki-abstract-35 fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="d-flex flex-column my-7">
                                    <span
                                        class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{$counts['province']??0}}</span>
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">{{ __('index.state') }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6  col-xl-2 mb-5 mb-xl-10 mb-sm-3">
                        <div class="card h-lg-100">
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <div class="m-0">
                                    <i class="ki-duotone ki-abstract-26 fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <div class="d-flex flex-column my-7">
                                    <span class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{$counts['city']??0}}</span>
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-500">{{ __('index.county') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row g-5 g-xl-10 mb-5 mb-xl-10 mb-sm-3">
                    <div class="col-xl-12">
                        <div class="card card-flush h-md-100">
                            <div class="card-header pt-5 mb-6">
                                <h3 class="card-title align-items-start flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <span
                                            class="fs-2x fw-bolder text-gray-800 align-self-start me-2">{{__('index.count all user')}} </span>
                                    </div>
                                </h3>
                            </div>
                            <div class="card-body p-5">
                                @livewire('dashboard.component.chart.column-chart',['registerdate'=>$registerdate,'clientnumber'=>$clientnumber])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10 mb-sm-3">
                    <div class="col-xl-12">
                        <div class="card card-flush h-md-100">
                            <!--begin::Header-->
                            <div class="card-header pt-5 mb-6">
                                <h3 class="card-title align-items-start flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="fs-2x fw-bold text-gray-700 align-self-start me-2">{{__('index.count all orders')}}: </span>
                                        <span
                                            class="fs-2x fw-bolder text-gray-900 me-2 lh-1 ls-n2">{{$counts['orders']['countAll']??0}}</span>
                                    </div>
                                </h3>
                            </div>
                            <div class="card-body">
                                @livewire('dashboard.component.chart.area-chart',['categories'=>$categories,'data'=>$data])
                            </div>
                        </div>
                    </div>
                </div>
            @elseif(isset($counts['orders']))
                <div class="row">
                    @if(session('role_id')!=5)
                        <div class="row gy-5 g-xl-10">
                            <h3>دسترسی سریع </h3>
                            @foreach(config('config.quickAccessItem') as $item)
                                <div class="col-6 col-sm-6  col-xl-2 mb-xl-10 mb-sm-3">
                                    <div class="card card-dashed h-lg-100 cursor-pointer">
                                        <div
                                            class="card-body d-flex justify-content-between align-items-start flex-column">
                                            <a href="{{route($item['routName'],$item['routParams'])}}"><span
                                                    class="fw-semibold fs-6 text-gray-500">{{trans($item['title'])}}</span></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="col-6 col-sm-6 col-xl-2 mb-xl-10 mb-2">
                            <div class="card h-lg-100">
                                <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($counts['orders']['countAll']??0)}}</span>
                                        <div class="m-0 mt-2">
                                            <span class="fw-semibold fs-6 text-gray-500">{{__('index.countAll')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-xl-2 mb-xl-10 mb-2">
                            <div class="card h-lg-100">
                                <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($counts['orders']['sumPriceAll']??0)}}</span>
                                        <div class="m-0 mt-2">
                                            <span
                                                class="fw-semibold fs-6 text-gray-500">{{__('index.sumPriceAll')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-xl-2 mb-xl-10 mb-2">
                            <div class="card h-lg-100">
                                <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($counts['orders']['sumDelivery']??0)}}</span>
                                        <div class="m-0 mt-2">
                                            <span
                                                class="fw-semibold fs-6 text-gray-500">{{__('index.sumDelivery')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-xl-2 mb-xl-10 mb-2">
                            <div class="card h-lg-100">
                                <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($counts['orders']['sumTax']??0)}}</span>
                                        <div class="m-0 mt-2">
                                            <span class="fw-semibold fs-6 text-gray-500">{{__('index.sumTax')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-xl-2 mb-xl-10 mb-2">
                            <div class="card h-lg-100">
                                <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($counts['orders']['sumDiscount']??0)}}</span>
                                        <div class="m-0 mt-2">
                                            <span
                                                class="fw-semibold fs-6 text-gray-500">{{__('index.sumDiscount')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <h3 class="mb-5 mt-4">{{ __('index.latest orders') }}
                    <a href="{{route('admin.orders.index')}}" target="_blank"
                       class="float-end small"> {{ __('index.see latest orders') }} </a>
                </h3>
                <div class="card card-flush mb-5">
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5"
                                   id="kt_ecommerce_category_table">
                                <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="minw-80px">{{ __('index.Order id') }}</th>
                                    @if(session('role_id')==1 || session('role_id')==6)
                                        <th class="min-w-100px">{{ __('index.branch name') }}</th>
                                    @endif
                                    <th class="min-w-100px">{{ __('index.order status') }}</th>
                                    <th class="min-w-100px">{{ __('index.guest name') }}</th>
                                    <th class="min-w-80px">{{ __('index.payment type') }}</th>
                                    <th class="min-w-80px">{{ __('index.order price') }}</th>
                                    <th class="min-w-100px">{{ __('index.create time') }}</th>
                                    <th class="min-w-100px">{{ __('index.delivery time') }}</th>
                                    <th class="min-w-100px">{{ __('index.Address') }}</th>
                                    <th class="min-w-20px">{{ __('index.action') }}</th>
                                </tr>

                                </thead>
                                <tbody class="fw-semibold text-gray-900">
                                @forelse($counts['orders']['data']['data'] as $order)
                                    <tr>
                                        <td>
                                            {{ $order['id'] ?? '' }}
                                        </td>
                                        @if(session('role_id')==1 || session('role_id')==6)
                                            <td>
                                                <div class="fv-row">
                                                    <div
                                                        class="fw-bold fs-6 mr-4">{{ $order['branch']['title'] ?? '' }}</div>
                                                </div>
                                            </td>
                                        @endif
                                        <td>
                                            {{ __('index.' . $order['order_status'] ??'') }}
                                        </td>
                                        <td>
                                            <div class="fv-row">
                                                <div
                                                    class="fw-bold fs-6 mb-2">{{ $order['user']['name'] ?? '' }} {{ $order['user']['family'] ?? '' }}</div>
                                                <div class="mb-lg-0">{{ $order['user']['mobile'] ?? '' }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            {{($order['payment_type']==null?'-':$order['payment_type'])}}

                                        </td>
                                        <td>
                                            {{$order['order_price'] ??''}}
                                        </td>
                                        <td>
                                            {{jdate($order['created_at']) ??''}}
                                        </td>
                                        <td>
                                            {{($order['delivery_time']==null)?'-':$order['delivery_time']}}
                                        </td>
                                        <td>
                                            @php
                                                $address=json_decode($order['address'],true)['address']??null;
                                            @endphp
                                            {{($address!=null) ? $address : '-'}}

                                        </td>
                                        <td class="text-end">
                                            <a href="{{route('admin.orders.show',$order['id'])}}"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                <i class="ki-duotone ki-pencil fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">
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

                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="col-xl-12">
                        <div class="card card-flush h-md-100">
                            <div class="card-header pt-5 mb-6">
                                <h3 class="card-title align-items-start flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="fs-2x fw-bold text-gray-700 align-self-start me-2">{{__('index.count all orders')}}: </span>
                                        <span
                                            class="fs-2x fw-bolder text-gray-900 me-2 lh-1 ls-n2">{{$counts['orders']['countAll']??0}}</span>
                                    </div>
                                </h3>
                            </div>
                            <div class="card-body p-5">
                                @livewire('dashboard.component.chart.area-chart',['categories'=>$categories,'data'=>$data])
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
