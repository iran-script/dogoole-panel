<div>
    @section('title-b',__('index.list transactions'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card-body">
                <div class="row">
                    @if(session('role_id')!=5)
                        <div class="col-6 mb-sm-2 col-sm-6 col-xl-2 mb-xl-10">
                            <div class="card h-lg-100">
                                <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($count)}}</span>
                                        <div class="m-0 mt-2">
                                            <span class="fw-semibold fs-6 text-gray-500">{{__('index.countAll')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-sm-2 col-sm-6 col-xl-2 mb-xl-10">
                            <div class="card h-lg-100">
                                <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($allPriceDelivery)}}</span>
                                        <div class="m-0 mt-2">
                                            <span
                                                class="fw-semibold fs-6 text-gray-500">{{__('index.sumDelivery')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-sm-2 col-sm-6 col-xl-2 mb-xl-10">
                            <div class="card h-lg-100">
                                <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                    <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($allPriceOrder)}}</span>
                                        <div class="m-0 mt-2">
                                            <span
                                                class="fw-semibold fs-6 text-gray-500">{{__('index.sumPriceAll')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-6 mb-sm-2 col-sm-6 col-xl-2 mb-xl-10">
                        <div class="card h-lg-100">
                            <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($allProfitSales)}}</span>
                                    <div class="m-0 mt-2">
                                        <span
                                            class="fw-semibold fs-6 text-gray-500">{{__('index.sumSalesProfit')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-sm-2 col-sm-6 col-xl-2 mb-xl-10">
                        <div class="card h-lg-100">
                            <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($allProfitDelivery)}}</span>
                                    <div class="m-0 mt-2">
                                        <span
                                            class="fw-semibold fs-6 text-gray-500">{{__('index.sumDeliveryProfit')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-sm-2 col-sm-6 col-xl-2 mb-xl-10">
                        <div class="card h-lg-100">
                            <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($sumWallet)}}</span>
                                    <div class="m-0 mt-2">
                                            <span
                                                class="fw-semibold fs-6 text-gray-500">{{__('index.sumWallet')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-sm-2 col-sm-6 col-xl-2 mb-xl-10">
                        <div class="card h-lg-100">
                            <div class="d-flex justify-content-between align-items-start flex-column ps-5">
                                <div class="d-flex flex-column my-7">
                                        <span
                                            class="fw-bolder fs-2x text-gray-800 lh-1 ls-n2">{{number_format($allPriceBankDeposit)}}</span>
                                    <div class="m-0 mt-2">
                                            <span
                                                class="fw-semibold fs-6 text-gray-500">{{__('index.allPriceBankDeposit')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-7">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 p-2 float-start">
                            @livewire("dashboard.component.datepicker")
                        </div>
                        @if(session('role_id')==1 || session('role_id')==6)
                            <div class="col-md-3 p-2 float-start">
                                <label class="form-label">{{ __('index.user select') }}</label>
                                @livewire("dashboard.component.user-search-drop-down",['var'=>'userId'])
                            </div>
                        @endif
                        <div class="col-md-3 p-2 float-start">
                            <label class=" form-label">{{ __('index.transaction type') }}</label>
                            <select class="form-select mb-2" wire:model="transactionType">
                                <option value="null">{{__('index.select')}}</option>
                                <option value="charge">{{__('index.charge')}}</option>
                                <option value="pay_order">{{__('index.pay_order')}}</option>
                                <option value="sales">{{__('index.sales')}}</option>
                                <option value="sales_profit">{{__('index.sales_profit')}}</option>
                                <option value="deliver_profit">{{__('index.deliver_profit')}}</option>
                                <option value="deliver">{{__('index.deliver')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
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
            </div>

            <div class="card mb-7">

                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                            <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-250px">تاریخ</th>
                                <th class="min-w-250px">کاربر</th>
                                <th class="min-w-250px">مبلغ</th>
                                <th class="min-w-250px">توضیحات</th>
                                <th class="min-w-250px">نوع تراکنش</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @if($transactions)
                                @forelse($transactions as $tr)
                                    <tr>
                                        <td>
                                            {{jdate($tr['created_at'])}}
                                        </td>
                                        <td>
                                            {{ $tr['user']['name']?? '- '}}{{ $tr['user']['family']?? '- '}}
                                        </td>
                                        <td>
                                            @if( $tr['amount']>0)
                                                <span
                                                    class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2 ">{{number_format($tr['amount'])}} </span>
                                            @else
                                                <span
                                                    class="badge badge-light-danger fw-bold fs-8 px-2 py-1 ms-2 ">{{number_format($tr['amount'])}} </span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ __($tr['description'])}}
                                        </td>
                                        <td>
                                            @if($tr['transaction_type']!=null)
                                                {{ __('index.'.$tr['transaction_type'])}}
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <p class="fw-bold align-middle fs-3qx text-center pt-10">{{ __('index.no data to show') }}</p>
                                            <div class="text-center pb-15 px-5">
                                                <img src="{{asset('panel/assets/media/illustrations/sketchy-1/2.png')}}"
                                                     alt=""
                                                     class="mw-100 h-200px h-sm-325px">
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            @endif
                            </tbody>
                        </table>
                        {{$transactions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
