<div>
    @section('title-b',__('index.list categories'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-7">
                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Compact form-->
                    <div class=" align-items-center ">
                        <div class=" align-items-center">
                            <div class="col-12 col-md-4 p-2 float-md-start">
                                <input type="text" class="form-control form-control-solid" name="search"
                                       wire:model="search" placeholder="{{__('index.search placeholder')}}"/>
                            </div>
                            <div class="col-12 col-md-4 p-2 float-md-start">

                                <button type="button" wire:click="refreshData"
                                        class="btn btn-primary me-5">{{ __('index.search') }}</button>

                                <a href="{{route('admin.category.create',$parentId)}}"
                                   class="btn btn-primary me-5">{{ __('index.create extra') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="collapse show" id="kt_advanced_search_form">
                        <div class="separator separator-dashed mt-9 mb-6"></div>
                        <div class="row g-8 mb-8">
                        </div>
                    </div>
                </div>
            </div>
            @if($parentId==0)
            @else
                <br>
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.category.index',0) }}" class="btn btn-success me-5 ms-4 mb-5">
                        {{ __('index.back to main category page') }}</a>
                </div>
                <br>
            @endif

            <div class="card card-flush">
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                            <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-100px">{{ __('index.title') }}</th>
                                @if(session('role_id')==1)
                                    <th class="min-w-50px">زیرمجموعه</th>
                                @endif
                                <th class="min-w-70px">عملیات</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @if($categories)
                                @forelse($categories as $category)
                                    <tr>
                                        <td>
                                            {{$category['title']}}
                                        </td>
                                        @if(session('role_id')==1)

                                            <td>
                                                {{($category['branch_id']==0?'اصلی':$category['branch_id'])}}
                                            </td>
                                        @endif
                                        <td class="text-start">
                                            <a href="{{route('admin.category.edit',$category['id'])}}"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 m-1">
                                                <i class="ki-duotone ki-pencil fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                            @if($parentId==0)
                                                <a href="{{route('admin.category.index',$category['id'])}}"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 m-1">
                                                    <i class="ki-duotone ki-setting-3 fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                            @endif

                                            <a onclick="destroy({{$category['id']}})"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm m-1">
                                                <i class="ki-duotone ki-trash fs-2">
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
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
