<div>
    @section('title-b',__('index.list tikets'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <div class="d-flex flex-column flex-lg-row">

                <div class=" d-lg-flex flex-column flex-lg-row-auto w-100 w-lg-275px mb-5">
                    <div class="card card-flush mb-0" data-kt-sticky="true" data-kt-sticky-name="inbox-aside-sticky"
                         data-kt-sticky-offset="{default: false, xl: '100px'}" data-kt-sticky-width="{lg: '275px'}"
                         data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false"
                         data-kt-sticky-zindex="95">
                        <div class="card-body">
                            @if(session('role_id')!=1)
                                <a href="{{route('admin.ticket.create')}}" class="btn btn-primary float-end w-100 mb-4">
                                    <span class="indicator-label">{{__('index.create ticket')}}</span>
                                </a>
                            @endif
                            <div class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary">
                                <div class="menu-item mb-3 {{($status=="waiting_answer")?'bg-gray-200':''}}"
                                     wire:click="setStatus('waiting_answer')">
                                        <span class="menu-link">
																<span class="menu-icon">
																	<i class="ki-duotone ki-abstract-8 fs-5 text-danger me-3 lh-0">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</span>
																<span
                                                                    class="menu-title fw-semibold">{{__('index.waiting_answer')}}</span>
															</span>
                                </div>
                                <div class="menu-item mb-3 {{($status=="answered")?'bg-gray-200':''}}"
                                     wire:click="setStatus('answered')">
                                    <span class="menu-link">
																<span class="menu-icon">
																	<i class="ki-duotone ki-abstract-8 fs-5 text-info me-3 lh-0">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</span>
																<span
                                                                    class="menu-title fw-semibold">{{__('index.answered')}}</span>
															</span>
                                </div>
                                <div class="menu-item mb-3 {{($status=="closed")?'bg-gray-200':''}}"
                                     wire:click="setStatus('closed')">
                                        <span class="menu-link">
																<span class="menu-icon">
																	<i class="ki-duotone ki-abstract-8 fs-5 text-success me-3 lh-0">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</span>
																<span
                                                                    class="menu-title fw-semibold">{{__('index.closed')}}</span>
															</span>
                                    <!--end::Partnership-->
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(session('role_id')==1 || session('role_id')==6)
                        <div class="card card-flush mb-0 mt-3" data-kt-sticky="true"
                             data-kt-sticky-name="inbox-aside-sticky"
                             data-kt-sticky-offset="{default: false, xl: '100px'}" data-kt-sticky-width="{lg: '275px'}"
                             data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-animation="false"
                             data-kt-sticky-zindex="95">
                            <div class="card-body">
                                <div class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary">
                                    @foreach($categories as $category)
                                        <div class="menu-item mb-3 {{($category_id==$category['id'])?'bg-gray-200':''}}"
                                             wire:click="setCategory({{$category['id']}})">
                                            <span class="menu-link"><span
                                                    class="menu-title fw-semibold">{{$category['title']}}</span>
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                    <div class="card card-flush">
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5"
                                       id="kt_ecommerce_category_table">
                                    <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="minw-80px">آیدی</th>
                                        <th class="min-w-200px">موضوغ</th>
                                        <th class="min-w-100px">وضعیت تیکت</th>
                                        <th class="min-w-100px">زمان ثبت</th>
                                        <th class="min-w-70px">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($tickets as $ticket)
                                        <tr>
                                            <td>
                                                <a href="{{route('admin.ticket.reply',$ticket['id'])}}" class="text-gray-600">
                                                {{ $ticket['id'] ?? '' }}
                                                </a>
                                            </td>
                                            <td>
                                                <div class="fv-row">
                                                    <a href="{{route('admin.ticket.reply',$ticket['id'])}}" class="text-gray-800">
                                                    <div class="fw-bold fs-6 mr-4">{{ $ticket['subject'] ?? '' }}</div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                {{ __('index.' . $ticket['status'] ??'') }}
                                            </td>
                                            <td>
                                                {{jdate($ticket['created_at'])->format('H:i:s , Y-m-d  ')??' - '}}
                                            </td>
                                            <td class="text-end">
                                                <a href="{{route('admin.ticket.reply',$ticket['id'])}}"
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
                                            <td colspan="5">
                                                <p class="fw-bold align-middle fs-3qx text-center pt-10">{{ __('index.no data to show') }}</p>
                                                <div class="text-center pb-15 px-5">
                                                    <img
                                                        src="{{asset('panel/assets/media/illustrations/sketchy-1/2.png')}}"
                                                        alt="" class="mw-100 h-200px h-sm-325px">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{$tickets->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

