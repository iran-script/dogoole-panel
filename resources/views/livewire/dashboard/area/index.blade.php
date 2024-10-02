<div>
    @section('title-b',__('index.list areas'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-7">
                <div class="card-body">
                    <div class="align-items-center ">
                        <div class="flex-start align-items-center">
                            <div class="col-12 col-md-6 p-2">
                                <input type="text" class="form-control form-control-solid" name="search"
                                       wire:model="search" placeholder="{{__('index.search placeholder')}}"/>
                            </div>
                            <div class="col-12 col-md-6 p-2">
                                <div class="align-items-center">
                                    <button type="button" wire:click="refreshData"
                                            class="btn btn-primary me-5 float-start">{{ __('index.search') }}</button>
                                </div>
                                <div class="align-items-center">
                                    <a href="{{route('admin.area.create',$parentId)}}"
                                       class="btn btn-primary me-5 float-start">{{ __('index.create') }}</a>
                                </div>
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
                    <a href="{{ route('admin.area.index',0) }}" class="btn btn-success me-5 ms-4 mb-5">
                        {{ __('index.back to main area page') }}</a>
                </div>
                <br>
            @endif
            @php
                $systemMode=getSystemMode()??null;
            @endphp
            <div class="card card-flush">
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                            <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-80px">{{ __('index.title') }}</th>
                                @if($systemMode!="single")

                                    <th class="min-w-100px">لینک</th>

                                    <th class="min-w-50px">زیرمجموعه</th>
                                @endif
                                <th class="min-w-70px">عملیات</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @if($areas)
                                @forelse($areas as $area)
                                    <tr>
                                        <td>
                                            {{$area['title']}}
                                        </td>
                                        @if($systemMode!="single")

                                            <td>
                                                {{$area['slug']}}
                                            </td>
                                            <td>
                                                {{($area['parent_id']==0?'اصلی':$area['parent_id'])}}
                                            </td>
                                        @endif

                                        <td class="text-end">
                                            <a href="{{route('admin.area.edit',$area['id'])}}"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm  m-1">
                                                <i class="ki-duotone ki-pencil fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                            @if($parentId==0 and $systemMode!="single")
                                                <a href="{{route('admin.area.index',$area['id'])}}"
                                                   class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm  m-1">
                                                    <i class="ki-duotone ki-setting-3 fs-3">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                        <span class="path5"></span>
                                                    </i>
                                                </a>
                                            @endif
                                            <a onclick="destroy({{$area['id']}})"
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
                </div>
            </div>
        </div>
    </div>
</div>
