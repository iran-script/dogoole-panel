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
                            <th class="min-w-50px">آیدی</th>
                            <th class="min-w-200px">تاریخ</th>
                            <th class="min-w-100px">{{ __('index.chef') }}</th>
                            <th class="min-w-70px">قیمت</th>
                            <th class="min-w-80px">وضعیت</th>
                            <th class="min-w-70px">عملیات</th>
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
                                        {{jdate($settlement['created_at'])}}
                                    </td>
                                    <td>
                                        {{ $settlement['branch']['title']?? '- '  }}
                                    </td>
                                    <td>
                                        {{ $settlement['amount']?? '- '  }}
                                    </td>
                                    <td>
                                        @if($settlement['status']=="success")
                                            <span
                                                class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2 ">{{__('index.'.$settlement['status'])??" "}} </span>
                                        @else
                                            <span
                                                class="badge badge-light-danger fw-bold fs-8 px-2 py-1 ms-2 ">{{__('index.'.$settlement['status'])??" "}}</span>
                                        @endif

                                    </td>
                                    <td class="text-end">
                                        @if($settlement['status']!="success")

                                            <a  onclick="changeStatus({{$settlement['id']}})"
                                               class="btn btn-success btn-bg-light  me-1">
                                                پرداخت شد
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <p class="fw-bold align-middle fs-3qx text-center pt-10">{{ __('index.no data to show') }}</p>
                                        <div class="text-center pb-15 px-5">
                                            <img src="{{asset('panel/assets/media/illustrations/sketchy-1/2.png')}}" alt=""
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
