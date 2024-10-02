<div>
    @section('title-b',__('index.list settlement'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card card-flush">
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                            <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-50px">{{ __('index.id') }}</th>
                                <th class="min-w-100px">{{ __('index.chef') }}</th>
                                <th class="min-w-70px">{{ __('index.count') }}</th>
                                <th class="min-w-70px">{{ __('index.action') }}</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @if($settlements)
                                @forelse($settlements as $settlement)
                                    <tr>
                                        <td>
                                            {{$settlement['id']}}
                                        </td>
                                        <td>
                                            {{$settlement['branch']['title']?? '- '  }}
                                        </td>
                                        <td>
                                            {{ number_format($settlement['transactions'][0]['total_amount']). ' تومان'  ?? '- '  }}
                                        </td>
                                        <td class="text-end">
                                            <a onclick="fishPay({{$settlement['id']}},{{$settlement['transactions'][0]['total_amount']}})"
                                               class="btn btn-success btn-bg-light  me-1">
                                                پرداخت شد
                                            </a>
                                        </td>
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
                            @endif
                            </tbody>
                        </table>
                    </div>
                    {{$settlements->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function fishPay(userId, amount) {
        var a = Swal.fire({
            title: "اطلاعات پرداخت را با دقت وارد کنید",
            html: `
             <div class="mb-10 fv-row col-12 p-1 float-start">
                                <label class="required form-label">{{ __('index.amount pay') }}</label>
                                <input  type="number" dir="ltr" id='amount' value=` + amount + `  class="form-control fs-3 mb-2 text-left "/>
                            </div>
             <div class="mb-10 fv-row col-12 p-1 float-start">
                                <label class="required form-label">{{ __('index.description pay') }}</label>
                                <textarea id="description" type="text"
                                          class="form-control fs-3 mb-2"></textarea>
                            </div>
                            `,
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ثبت پرداخت!",
            cancelButtonText: "لغو",
            preConfirm: () => {
                var description = document.getElementById("description").value;
                var amount = document.getElementById("amount").value;
                Livewire.dispatch('saveSettlement', {userId: userId, amount: amount, description: description});
            }
        });
    }
</script>
