<div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            @if(session('role_id')!=5)
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-sm-6 col-xl-2 mb-5">
                            <div class="card h-lg-100">
                                <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($countAll)}}</span>
                                        <div class="m-0 mt-2">
                                            <span class="fw-semibold fs-6 text-gray-500">{{__('index.countAll')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-xl-2 mb-5">
                            <div class="card h-lg-100">
                                <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($sumPriceAll)}}</span>
                                        <div class="m-0 mt-2">
                                            <span
                                                class="fw-semibold fs-6 text-gray-500">{{__('index.sumPriceAll')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-xl-2 mb-5">
                            <div class="card h-lg-100">
                                <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($sumDelivery)}}</span>
                                        <div class="m-0 mt-2">
                                            <span
                                                class="fw-semibold fs-6 text-gray-500">{{__('index.sumDelivery')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-xl-2 mb-5">
                            <div class="card h-lg-100">
                                <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($sumTax)}}</span>
                                        <div class="m-0 mt-2">
                                            <span class="fw-semibold fs-6 text-gray-500">{{__('index.sumTax')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-xl-2 mb-5">
                            <div class="card h-lg-100">
                                <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($sumDiscount)}}</span>
                                        <div class="m-0 mt-2">
                                            <span
                                                class="fw-semibold fs-6 text-gray-500">{{__('index.sumDiscount')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-7">
                    <div class="card-body">
                        <h3 class="mb-5 mt-5">{{ __('index.filter') }}</h3>
                        <div class="row">
                            @if ($this->user['role_id']==1)
                                <div class="col-md-3 p-2 float-start">
                                    <label class="form-label">{{ __('index.driver select') }}</label>
                                    @livewire("dashboard.component.driver-search-drop-down",['var'=>'driverId'])
                                </div>
                                <div class="col-md-3 p-2 float-start">
                                    <label class="form-label">{{ __('index.user select') }}</label>
                                    @livewire("dashboard.component.user-search-drop-down",['var'=>'userId'])
                                </div>
                                <div class="col-md-3 p-2 float-start">
                                    <label class="form-label">{{ __('index.branch select') }}</label>
                                    @livewire("dashboard.component.branch-search-drop-down",['var'=>'branchId'])
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-4 p-2 float-start">
                                @livewire("dashboard.component.datepicker")
                            </div>
                            <div class="col-md-3 p-2 float-start">
                                <label class=" form-label">{{ __('index.payment status') }}</label>
                                <select class="form-select mb-2" wire:model="paymentStatus">
                                    <option value="null">{{__('index.select')}}</option>
                                    <option value="true">{{__('index.successful')}}</option>
                                    <option value="false">{{__('index.unsuccessful')}}</option>
                                </select>
                            </div>
                            <div class="col-md-3 p-2 float-start">
                                <label class=" form-label">{{ __('index.order status') }}</label>
                                <select class="form-select mb-2" wire:model="orderStatus">
                                    <option value="null">{{__('index.select')}}</option>
                                    <option value="wating_payment">{{__('index.wating_payment')}}</option>
                                    <option
                                        value="awaiting_restaurant_approval">{{__('index.awaiting_restaurant_approval')}}</option>
                                    <option value="preparing">{{__('index.preparing')}}</option>
                                    <option value="ready_to_send">{{__('index.ready_to_send')}}</option>
                                    <option value="sending">{{__('index.sending')}}</option>
                                    <option value="delivered">{{__('index.delivered')}}</option>
                                    <option value="returned">{{__('index.returned')}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 float-start">
                            <button type="button" wire:click="refreshData"
                                    class="btn btn-primary float-end">{{ __('index.search') }}</button>
                            @if(session('role_id')==1 || session('role_id')==6)

                                <button type="button" wire:click="refreshData(1)"
                                        class="btn btn-primary float-end me-2">{{ __('index.export') }}</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            <div class="card card-flush">
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
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
                                <th class="min-w-100px">{{ __('index.order delivery time') }}</th>
                                <th class="min-w-100px">{{ __('index.change_status') }}</th>
                                <th class="min-w-20px">{{ __('index.action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-900">
                            @forelse($orders as $order)
                                <tr>
                                    <td>
                                        {{ $order['id'] ?? '' }}
                                    </td>
                                    @if(session('role_id')==1 || session('role_id')==6)
                                        <td>
                                            <div class="fv-row">
                                                <a href="{{route('admin.orders.show',$order['id'])}}"
                                                   class="text-gray-900">
                                                    <div
                                                        class="fw-bold fs-6 mr-4">{{ $order['branch']['title'] ?? '' }}</div>
                                                </a>
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
                                        {{($order['payment_type']==null ? '-' : $order['payment_type'])}}
                                    </td>
                                    <td>
                                        @if($order['order_price']!=0)
                                            {{number_format($order['order_price']) ?? ''}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        {{jdate($order['created_at']) ?? ''}}
                                    </td>
                                    <td>
                                        {{($order['delivery_time']==null)?'-':$order['delivery_time']}}
                                    </td>
                                    <td>
                                        {{($order['address']!=null and $order['address']!="null") ? json_decode($order['address'],true)['address'] : '-'}}
                                    </td>
                                    <td>
                                        @if($order['preparation_time']!=null)
                                            <livewire:dashboard.component.countdown-timer
                                                targetDate="{{$order['preparation_time']}}"
                                                wire:key="{{rand(1000,15000)}}"/>
                                        @endif
                                    </td>
                                    <td>
                                        @livewire('dashboard.component.order-status',['orderPrice'=>$order['order_price'],'orderStatus'=>$order['order_status'],'orderId'=>$order['id'],'times'=>$times], key($order['id']))
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
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
