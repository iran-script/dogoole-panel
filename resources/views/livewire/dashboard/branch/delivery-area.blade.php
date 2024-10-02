<div>
    @section('title-b',__('index.list areas'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-7">
                <div class="card-body">
                    <div class="align-items-center ">
                        <div class="flex-start align-items-center">


                            <div class="col-12 col-md-4 p-2 float-start">
                                <label class=" form-label">{{ __('index.create shipment areas') }}</label>
                                <select class="form-select mb-2" wire:model="areaIdSelected"
                                        wire:change="changeArea($event.target.value)">
                                    <option value="null" disabled selected>{{__('index.select')}}</option>
                                    @foreach($areas as $area)
                                        <option value="{{$area['id']}}">{{$area['title']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($areasLevel2)
                                <div class="col-12 col-md-4 p-2 float-start">
                                    <label class=" form-label">{{ __('index.areas level 2') }}</label>
                                    <select class="form-select mb-2" wire:model="areaLevel2Selected">
                                        <option value="null" disabled selected>{{__('index.select')}}</option>
                                        @foreach($areasLevel2 as $area)
                                            <option value="{{$area['id']}}">{{$area['title']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif


                            <div class="col-12 col-md-6 p-2 float-start">
                                <label class=" form-label">.</label>

                                <div class="align-items-center">
                                    <a wire:click="addArea"
                                       class="btn btn-primary me-5 float-start">{{ __('index.create') }}</a>
                                </div>
                            </div>
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
                                <th class="min-w-80px">{{ __('index.title') }}</th>
                                <th class="min-w-80px">{{ __('index.price') }}</th>
                                <th class="min-w-70px">عملیات</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                            @if($areasSelected)
                                @forelse($areasSelected as $key=>$area)
                                    <tr>
                                        <td>
                                            {{$area['title']}}
                                        </td>
                                        <td>
                                            <input
                                                type="text"
                                                class="form-control form-control-solid"
                                                name="search"
                                                wire:model="areasSelected.{{$key}}.shipment_price"
                                                placeholder="{{__('index.price')}}"
                                            />
                                        </td>

                                        <td class="text-end">

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

                        <div class="mb-10  fv-row col-12 p-1 float-start">
                            <button type="button" wire:click="setChange()" class="btn btn-primary float-end">
                                <span class="indicator-label">{{__('index.save changes')}}</span>
                                <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
