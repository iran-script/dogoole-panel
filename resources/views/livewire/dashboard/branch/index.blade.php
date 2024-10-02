    <div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-7">
                <div class="card-body">
                    <div class="d-flex align-items-center ">
                        <div class="d-flex flex-start align-items-center">
                            <div class="col-md-12 p-2">
                                <input type="text" class="form-control form-control-solid" name="search"
                                       wire:model="search" placeholder="{{__('index.search placeholder')}}"/>
                            </div>
                        </div>
                        <button type="button" wire:click="refreshData"
                                class="btn btn-primary me-5">{{ __('index.search') }}</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        @if(session('role_id')==1 || session('role_id')==6)
                            <button type="button" wire:click="refreshData(1)"
                                    class="btn btn-info float-end me-2">{{ __('index.export') }}</button>
                        @endif
                        <a href="{{route('admin.branch.create')}}" type="button"
                           class="btn btn-primary me-5 float-end ">{{ __('index.branch create') }}</a>
                    </div>
                </div>
            </div>
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">{{ __('index.users branches') }}</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                            <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-100px">{{ __('index.branchs name') }}</th>
                                <th class="min-w-70px">دسته بندی</th>
                                <th class="min-w-70px text-end">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($branches as $branch)
                                <tr>
                                    <td>
                                        {{$branch['title']}}
                                    </td>
                                    <td>
                                        <div
                                            class="badge badge-light-success">{{$branch['category']['title']??__('index.public')}}</div>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{route('admin.branch.edit',$branch['id'])}}"
                                           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <i class="ki-duotone ki-pencil fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                        <a href="{{route('admin.branch.gallery',$branch['id'])}}" title="گالری "
                                           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <i class="ki-duotone ki-picture fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>
                                        </a>
                                        <a href="{{route('admin.branch.activity',$branch['id'])}}"
                                           title="{{__('activity')}}"
                                           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                            <i class="ki-duotone ki-time fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                            </i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">
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
                    {{$branches->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
