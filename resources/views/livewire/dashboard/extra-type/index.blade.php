<div>
    @section('title-b',__('index.list extra type'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-7">
                <div class="card-body">
                    <div class="d-flex align-items-center ">
                        <div class="d-flex flex-start align-items-center">
                            <div class="col-md-6 p-2">
                                <input type="text" class="form-control form-control-solid" name="search"
                                       wire:model="search" placeholder="{{__('index.search placeholder')}}"/>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="button" wire:click="refreshData"
                                        class="btn btn-primary me-5">{{ __('index.search') }}</button>
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

            <div class="card card-flush">
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                        <thead>
                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-150px">نام گروه</th>
                            <th class="min-w-70px">عملیات</th>
                        </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                        @forelse($extraTypes as $extraType)
                            <tr>
                                <td>
                                    {{$extraType['title']}}
                                </td>
                                <td class="text-end">
                                    <a href="{{route('admin.extraType.edit',$extraType['id'])}}"
                                       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 m-1">
                                        <i class="ki-duotone ki-pencil fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                    <a href="{{route('admin.extra.index',$extraType['id'])}}"
                                       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 m-1"
                                       title="لیست مواد اضافی این گروه">
                                        <i class="ki-duotone ki-add-item fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                    <a onclick="destroy({{$extraType['id']}})"
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
                                <td colspan="2">
                                    <p class="fw-bold align-middle fs-3qx text-center pt-10">{{ __('index.no data to show') }}</p>
                                    <div class="text-center pb-15 px-5">
                                        <img src="{{asset('panel/assets/media/illustrations/sketchy-1/2.png')}}" alt=""
                                             class="mw-100 h-200px h-sm-325px">
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    {{$extraTypes->links()}}

                </div>
            </div>
        </div>
    </div>


</div>

