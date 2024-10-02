<div>
    @section('title-b',__('index.list material'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-7">
                <div class="card-body">
                    <div class="align-items-center ">
                        <div class="align-items-center">
                            <div class="col-12 col-md-4 p-2  float-md-start">
                                <input type="text" class="form-control form-control-solid" name="search"
                                       wire:model="search" placeholder="{{__('index.search placeholder')}}"/>
                            </div>
                            <div class="col-12 col-md-4 p-2 float-md-start">
                                <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="انتخاب کنید" wire:model="category_id">
                                    <option value="0">{{__('index.select')}}</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category['id']}}">{{$category['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" align-items-center">
                                @if(session('role_id')==1 || session('role_id')==6)
                                    <button type="button" wire:click="refreshData(1)"
                                            class="btn btn-info float-end me-2">{{ __('index.export') }}</button>
                                @endif
                                <button type="button" wire:click="refreshData"
                                        class="btn btn-primary float-end me-5">{{ __('index.search') }}</button>
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
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                            <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-150px">نام مواد اولیه</th>
                                <th class="min-w-100px">دسته بندی</th>
                                <th class="min-w-70px">واحد</th>
                                <th class="min-w-80px">قیمت به ازای هر واحد</th>
                                <th class="min-w-80px">کالری به ازای هر واحد</th>
                                <th class="min-w-100px">عملیات</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">

                            @forelse($materials as $material)
                                <tr>
                                    <td>
                                        {{$material['title']}}

                                    </td>
                                    <td>
                                        <div
                                            class="badge badge-light-success">{{$material['category']['title']??__('index.public')}}</div>
                                    </td>
                                    <td>
                                        {{$material['unit']['title']??''}}
                                    </td>
                                    <td>
                                        {{$material['price_per_unit']}}
                                    </td>
                                    <td>
                                        {{$material['calorie_per_unit']}}
                                    </td>
                                    <td class="text-end">

                                        <a href="{{route('admin.material.edit',$material['id'])}}"
                                           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                            <i class="ki-duotone ki-pencil fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                        <a onclick="destroy({{$material['id']}})"
                                           class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
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
                                    <td colspan="6">
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
                    {{$materials->links()}}

                </div>
            </div>
        </div>
    </div>
</div>

