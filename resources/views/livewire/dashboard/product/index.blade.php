<div>
    @section('title-b',__('index.list products'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-7">
                <div class="card-body">
                    <div class="row">
                    </div>
                    <h3 class="mb-5 mt-5">{{ __('index.filter') }}</h3>
                    <div class="row">
                        <div class="col-md-4 p-2 float-start">
                            <label class=" form-label">{{ __('index.search') }}</label>
                            <input type="text" class="form-control form-control-solid me-2" name="search"
                                   wire:model="search" placeholder="{{__('index.search placeholder')}}"/>
                        </div>
                        @if(session('role_id')==1 || session('role_id')==6)
                            <div class="col-md-3 p-2 float-start">
                                <label class=" form-label">{{ __('index.product status') }}</label>
                                <select class="form-select mb-2" wire:model="productStatus">
                                    <option value="null">{{__('index.select')}}</option>
                                    <option value="active">{{__('index.active')}}</option>
                                    <option value="awaiting_approval">{{__('index.awaiting_approval')}}</option>
                                    <option value="disable">{{__('index.disable')}}</option>
                                </select>
                            </div>
                        @endif
                    </div>
                    <div class="col-12 float-start">
                        <button type="button" wire:click="refreshData"
                                class="btn btn-primary float-end">{{ __('index.search') }}</button>
                        @if(session('role_id')==3)
                            <div class=" align-items-center float-end ">
                                <a href="{{route('admin.product.create')}}"
                                   class="btn btn-primary me-5">{{ __('index.create new food') }}</a>
                            </div>
                        @endif
                        @if(session('role_id')==1 || session('role_id')==6)
                            <button type="button" wire:click="refreshData(1)"
                                    class="btn btn-info float-end me-2">{{ __('index.export') }}</button>
                        @endif
                    </div>
                </div>
            </div>
            {{--            <div class="card mb-7">
                            <div class="card-body">
                                <div class="d-flex align-items-center ">
                                    <div class="d-flex flex-start align-items-center">
                                        <div class="col-md-8 p-2">
                                            <input type="text" class="form-control form-control-solid" name="search"
                                                   wire:model="search" placeholder="{{__('index.search placeholder')}}"/>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <button type="button" wire:click="refreshData"
                                                    class="btn btn-primary me-5">{{ __('index.search') }}</button>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center align-bottom">
                                        <button type="button" wire:click="refreshData(1)"
                                                class="btn btn-info float-end me-2">{{ __('index.export') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
            <div class="d-flex flex-wrap ">
                @if($products)
                    @forelse($products as $product)
                        <div class="col-md-6 p-2">
                            <div class="card card-flush py-4">
                                <div class="card-body pt-0">
                                    <div class="fv-row col-md-2 col-12  p-1 float-start">
                                        <img src="{{$product['image']}}" class="w-100 img-fluid card-img">
                                    </div>
                                    <div class="fv-row d-flex col-md-10 col-12  p-3 ps-5 float-start">
                                        <div class="col-9">
                                            <h3>
                                                <a href="{{route('admin.product.edit',$product['id'])}}">
                                                    {{$product['title']}}
                                                </a>
                                            </h3>
                                            <ul class="list-unstyled list-group-item">
                                                @if(session('role_id')==1 || session('role_id')==6)
                                                    <li>
                                                        {{ __('index.chef') }}
                                                        : {{ $product['branch']['title']?? '- '  }}
                                                    </li>
                                                @endif

                                                <li class="ki-size">
                                                    {{ __('index.category') }}
                                                    : {{ $product['category']['title']?? '- '  }}
                                                </li>
                                                <li>
                                                    {{ __('index.product status') }}
                                                    : {{ __('index.' . $product['status'] ??'') }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-3 text-end">
                                            <a href="{{route('admin.product.edit',$product['id'])}}"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 m-1">
                                                <i class="ki-duotone ki-pencil fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                            <a onclick="destroy({{$product['id']}})"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm m-1">
                                                <i class="ki-duotone ki-trash fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="fv-row col-md-12 col-12 mt-2 float-start">

                                        @if(isset($product['varieties']) and  !empty($product['varieties']))
                                            <table class="col-md-12 table table-striped table-row-dashed">
                                                <thead>
                                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                </tr>
                                                <tbody class="fw-semibold text-gray-800">
                                                @foreach($product['varieties'] as $variety)
                                                    <tr>
                                                        <td class="ps-2">
                                                            {{$variety['title']}} |

                                                            {{$variety['price']}}
                                                        </td>
                                                        <td class="text-end pe-2">
                                                            @if($variety['count']>0)
                                                                <button class="btn btn-sm border border-danger btn-outline-danger min-w-50px"
                                                                        wire:click="updateVarietyCount({{$variety['id']}},0)">
                                                                    ناموجود شد
                                                                </button>
                                                            @else
                                                                <button class="btn btn-sm border border-success btn-outline-success min-w-50px"
                                                                        wire:click="updateVarietyCount({{$variety['id']}},100)">
                                                                    موجود شد
                                                                </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12 p-2">
                            <p class="fw-bold align-middle fs-3qx text-center pt-10">{{ __('index.no data to show') }}</p>
                            <div class="text-center pb-15 px-5">
                                <img src="{{asset('panel/assets/media/illustrations/sketchy-1/2.png')}}"
                                     alt=""
                                     class="mw-100 h-200px h-sm-325px">
                            </div>
                        </div>
                    @endforelse
                @endif
            </div>
            {{$products->links()}}
        </div>
    </div>
</div>
