<div>
    @section('title-b',__('index.comments list'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    @if(session('role_id')==1)
                        <div class="card mb-7">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 p-2 float-start">
                                        @livewire("dashboard.component.datepicker")
                                    </div>
                                    <div class="col-md-3 p-2 float-start">
                                        <label class="form-label">{{ __('index.user select') }}</label>
                                        @livewire("dashboard.component.user-search-drop-down",['var'=>'userId'])
                                    </div>
                                    <div class="col-md-3 p-2 float-start">
                                        <label class="form-label">{{ __('index.branch select') }}</label>
                                        @livewire("dashboard.component.branch-search-drop-down",['var'=>'branchId'])
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 float-start">
                                        <button type="button" wire:click="refreshData"
                                                class="btn btn-primary float-end">{{ __('index.search') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="card card-flush">
                        <div class="card card-flush">
                            <div class="card-body pt-0">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5"
                                           id="kt_ecommerce_category_table">
                                        <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-150px">کاربر</th>
                                            <th class="min-w-150px">آشپز</th>
                                            <th class="min-w-250px">متن</th>
                                            <th class="min-w-50px">تعداد پاسخ</th>
                                            <th class="min-w-70px">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody class="fw-semibold text-gray-600">
                                        @if($comments)
                                            @forelse($comments as $comment)
                                                <tr>
                                                    <td>
                                                        {{$comment['user']['name']??" "}}
                                                        - {{$comment['user']['family']??" "}}
                                                    </td>
                                                    <td>
                                                        {{$comment['branch']['title']??" "}}
                                                    </td>
                                                    <td>
                                                        {{\Illuminate\Support\Str::limit($comment['text']??"",35," ...")}}
                                                    </td>
                                                    <td>
                                                        {{count($comment['child'])??0}}
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="{{route('admin.comments.show',$comment['id'])}}"
                                                           title="{{__('index.answer')}}"
                                                           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 m-1">
                                                            <i class="ki-duotone ki-pencil fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </a>
                                                        <a href="{{route('admin.orders.show',$comment['order_id'])}}"
                                                           title="{{__('index.orders')}}" target="_blank"
                                                           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 m-1">
                                                            <i class="ki-duotone ki-archive fs-2">
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
                                {{$comments->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
