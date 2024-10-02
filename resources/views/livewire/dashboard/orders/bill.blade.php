<div>
<div class="d-flex flex-wrap flex-start mb-7 mt-7">
    <a onclick="printDiv('bill-print')" class="btn btn-success btn-light btn-sm"
       id="order-invoice-print">{{ __('index.print invoice') }}</a>
</div>
    <div id="bill-print" class="card">
        <div class="card-body">
            <div class="mb-4 pt-2">
                <h1 class="tittle-chil">{{trans('index.name site')}} </h1>
                <h4 class="f16" style="text-align: center">سفارش آنلاین</h4>
            </div>
            <div class="row mb-3 mt-3 pt-2">
                <div class="col-12">
                    <h6 class="mb-2 t-cill-bill-tittles">نام مشترک:
                        <strong class="ms-2">{{ $userName}} {{ $userFamily}}</strong>
                    </h6>
                    @if(session('role_id')!=3)
                        <div>
                            <p class="t-cill-bill-tittles">شماره موبایل :
                                <strong class="ms-2">{{ $userMobile}}</strong>
                            </p>
                        </div>
                        <div>
                            <p class="t-cill-bill-tittles">تلفن تماس :
                                <strong class="ms-2">
                                    {{ $userTel}}</strong>
                            </p>
                        </div>
                    @endif
                    <div>
                        <p class="t-cill-bill-tittles">آدرس تحویل:
                            <strong class="ms-2">{{$addressFull}}
                            </strong>
                        </p>
                    </div>
                    <div>
                        <p>
                            <span class="t-cill-bill-tittles"> پلاک:<strong
                                    class="ms-1 me-3">{{$addressPlaque}}</strong></span>
                            <span class="t-cill-bill-tittles"> واحد:<strong class="ms-1 me-3">{{$addressUnit}}</strong></span>
                            <span class="t-cill-bill-tittles"> کد پستی:<strong
                                    class="ms-1 me-3">{{$addressPostalCode}}</strong></span>
                        </p>
                    </div>
                    <div>
                        <p class="mb-1 small d-inline t-cill-bill-tittles">زمان:
                            <strong class="t12-small-text">{{jdate($createdTime)}}</strong>
                        </p>
                    </div>
                </div>
            </div>
            <div class="pt-3 pb-3 ps-3 box-back-gry">
                <p class="font-order-num-16 d-inline">شماره سفارش:
                    <strong class="font-order-num-16">{{ $orderId}}</strong>
                </p>
            </div>
            <div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="tittle-bill-ord-table text-center">نام غذا</th>
                        <th class="tbord-num tittle-bill-ord-table text-center ps-0 pe-0">قیمت</th>
                        <th class="tbord-num tittle-bill-ord-table text-center ps-0 pe-0">تعداد</th>
                        <th class="tbord-num tittle-bill-ord-table text-center ps-0 pe-0">مجموع قیمت</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--@foreach($order->items as $key=>$item)
                            <?php
                            $theItemPrice = ($item->pivot->variant_price ? $item->pivot->variant_price : $item->price);
                            ?>
                        @if ( $item->pivot->qty>0)

                            <tr>
                                <td class="text-center small">1</td>
                                <td class="left t-item-bill-ord-table">{{$item->name}} :</td>
                                <td class="text-center">{{$item->pivot->qty}}</td>
                                <td class="text-center">@money( $item->pivot->qty*$theItemPrice, $currency,true)</td>
                            </tr>
                        @endif
                    @endforeach--}}
                    @forelse($orderCarts as $cart)
                        <tr>
                            <td class="text-center small">-</td>
                            <td>
                                <h5 class="text-gray-900 text-hover-primary">{{ $cart['variety']['title'] ?? '' }}</h5>
                            </td>
                            <td class="text-center">{{ $cart['count'] ?? '' }}</td>
                            <td class="text-center">{{ number_format($cart['variety']['price']) ?? '' }}</td>
                            <td class="text-end">{{ number_format($cart['price']) ?? '' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <p class="fw-bold align-middle fs-3qx text-center pt-10">{{ __('index.no data to show') }}</p>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="extra-discription-box">
            <div class="d-flex-center client-pay-status bg-white">
                <div class="tittle-extra">
                    <p class="app-bill-tittle">{{__('index.order delivery time')}}:</p>
                </div>
                <div class="discription-extra">
                    <strong class="chil-dx">{{$orderDeliveryTime}}</strong>
                </div>
            </div>
            <div class="d-flex-center client-pay-status bg-white">
                <div class="tittle-extra">
                    <p class="app-bill-tittle">{{ __('index.order delivery price')}}:</p>
                </div>
                <div class="discription-extra">
                    <strong class="chil-dx">{{number_format($DeliveryPrice)}}</strong><span
                        class="ms-1 fs-6">تومان</span>
                </div>
            </div>
            <div class="d-flex-center client-pay-status bg-white">
                <div class="tittle-extra">
                    <p class="app-bill-tittle">{{ __('index.order discount price')}}:</p>
                </div>
                <div class="discription-extra">
                    <strong class="chil-dx">{{number_format($orderdiscountPrice)}}</strong><span
                        class="ms-1 fs-6">تومان</span>
                </div>
            </div>
            <div class="d-flex-center client-pay-status bg-white">
                <div class="tittle-extra">
                    <p class="app-bill-tittle">{{__('index.tax price')}}:</p>
                </div>
                <div class="discription-extra">
                    <strong class="chil-dx">{{$orderTaxPrice}}</strong><span class="ms-1 fs-6">تومان</span>
                </div>
            </div>
            <div class="d-flex-center client-pay-status bg-white">
                <div class="tittle-extra">
                    <p class="app-bill-tittle fs-2x">جمع کل:</p>
                </div>
                <div class="discription-extra">
                    <strong class="chil-dx fs-2hx">{{number_format($orderPrice)}}</strong><span
                        class="ms-1 fs-1">تومان</span>
                </div>
            </div>
        </div>
        <div class="total text-right p-2">
            <p class="bill-chil-extra-notes">
                <strong>توضیحات سفارش:</strong>
                {{$description}}
            </p>
            <br>
        </div>
    </div>
</div>
@section('scripts')
@endsection
