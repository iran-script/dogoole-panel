<div>
    @section('title-b',__('index.creat product'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                 data-kt-image-input="true">
                                <div class="mb-10 fv-row col-sm-12 p-1 float-start">
                                    <div class="image-input-wrapper w-150px h-150px m-auto">
                                        @if ($image)
                                            <img class="img-fluid" src="{{ $image->temporaryUrl() }}">
                                        @else
                                            <img class="img-fluid"
                                                 src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                        @endif
                                    </div>
                                    <div class="error mt-4"> @error('image') {{ $message }} @enderror</div>
                                    <label type="button" class="btn btn-primary mt-3 btn-sm" for="image">
                                        <span class="indicator-label">{{__('index.select image')}}</span>
                                        <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </label>
                                    <input type="file" class="d-none opacity-0" wire:model="image" id="image"/>
                                </div>

                                @if(session('role_id')==3 ||session('role_id')==6)
                                    <div class="mb-10 fv-row col-12 p-1 float-start text-start">
                                        <label class="required form-label">{{ __('index.menu select') }}</label>
                                        <select class="form-select mb-2" wire:model="menuSelected">
                                            <option value="0">{{__('index.select')}}</option>
                                            @foreach($menuBranchList as $item)
                                                <option value="{{$item['id']}}">{{$item['title']}}</option>
                                            @endforeach
                                        </select>
                                        <div class="error mt-4"> @error('menuSelected') {{ $message }} @enderror</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">

                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row col-12 p-1 float-start">
                                <label class="required form-label">{{ __('index.title main') }}</label>
                                <input wire:model="title" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('title') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 p-1 float-start">
                                <label class="required form-label">{{ __('index.min description') }}</label>
                                <textarea wire:model="minDescription" class="form-control fs-3 mb-2"></textarea>
                                <div class="error mt-4"> @error('minDescription') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 p-1 float-start">
                                <label class="required form-label">{{ __('index.description') }}</label>
                                <textarea wire:model="description" class="form-control fs-3 mb-2"></textarea>
                                <div class="error mt-4"> @error('description') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 p-1 float-start text-start">
                                <label
                                    class="required form-label">{{ __('index.Do you have a product with different prices?') }}</label>
                                <select class="form-select mb-2" wire:model.live="isVariety">
                                    <option value="0">{{__('index.select')}}</option>
                                    <option value="yes">{{__('index.yes')}}</option>
                                    <option value="no">{{__('index.no')}}</option>
                                </select>
                                <div class="error mt-4"> @error('isVariety') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    {{--                    <div class="card card-flush py-4">--}}
                    {{--                        <div class="card-header">--}}
                    {{--                            <div class="card-title">--}}
                    {{--                                <h2>{{ __('index.material') }}</h2>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="mb-10 fv-row col-md-12 p-1 float-start text-start"></div>--}}
                    {{--                        <div class="card-body pt-0">--}}
                    {{--                            <div class="mb-10 fv-row col-sm-6 col-12 p-1 float-start">--}}
                    {{--                                <label class="required form-label">{{ __('index.material') }}</label>--}}
                    {{--                                <select class="form-select mb-2" wire:model="materialIndex">--}}
                    {{--                                    <option value="0">{{__('index.select')}}</option>--}}
                    {{--                                    @foreach($materials as $key=>$item)--}}
                    {{--                                        <option value="{{$key}}">{{$item['title']}}</option>--}}
                    {{--                                    @endforeach--}}
                    {{--                                </select>--}}
                    {{--                                <div class="error mt-4"> @error('categoryId') {{ $message }} @enderror</div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="mb-10 fv-row col-md-3 col-7 p-1 float-start">--}}
                    {{--                                <label--}}
                    {{--                                    class="required form-label">{{ __('index.use material') }}  </label>--}}
                    {{--                                <input wire:model="useMaterial" type="number" class="form-control fs-3 mb-2"/>--}}
                    {{--                                <div class="error mt-4"> @error('useMaterial') {{ $message }} @enderror</div>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="mb-10 fv-row col-md-3 col-5 col-5 p-1 float-start">--}}
                    {{--                                <label class=" form-label">-</label>--}}
                    {{--                                <button type="button" wire:click="addMaterialUsed()"--}}
                    {{--                                        class=" form-control btn btn-success">--}}
                    {{--                                    <span class="indicator-label">{{__('index.add')}}</span>--}}
                    {{--                                </button>--}}
                    {{--                            </div>--}}

                    {{--                            @forelse($materialsUsed as $key=>$item)--}}
                    {{--                                <div class="mb-10 fv-row col-12 p-1 float-start">--}}
                    {{--                                    <div class="mb-10 fv-row col-md-6 p-1 float-start">{{$item['title']}}</div>--}}
                    {{--                                    <div--}}
                    {{--                                        class="mb-10 fv-row col-md-3 col-9 p-1 float-start">{{$item['used']}} {{ __('index.kilogram') }}--}}
                    {{--                                        * {{$item['price']}}  {{ __('index.toman') }}</div>--}}
                    {{--                                    <div class="mb-10 fv-row col-md-3 p-1 float-start">--}}
                    {{--                                        <button type="button" wire:click="removeMaterialUsed({{$key}})"--}}
                    {{--                                                class=" btn btn-danger btn-sm">--}}
                    {{--                                            <span class="indicator-label">{{__('index.delete')}}</span>--}}
                    {{--                                        </button>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            @empty--}}
                    {{--                            @endforelse--}}

                    {{--                        </div>--}}

                    {{--                    </div>--}}
                    @if($isVariety==="yes")
                        @foreach($varieties as $key=>$item)
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('index.price') }} {{ $key +1 }}</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="mb-10 fv-row col-md-2 col-12 p-1 float-start">
                                        <label class="required form-label">{{ __('index.title variety') }}</label>
                                        <input wire:model="varieties.{{$key}}.title" type="text"
                                               class="form-control fs-3 mb-2"/>
                                        <div
                                            class="error mt-4"> @error('varieties.'.$key.'.title') {{ $message }} @enderror</div>
                                    </div>

                                    <div class="mb-10 fv-row col-md-2 col-6 p-1 float-start">
                                        <label class="required form-label">{{ __('index.price') }}</label>
                                        <input wire:model="varieties.{{$key}}.price" type="number" min="1000"
                                               class="form-control fs-3 mb-2"/>
                                        <div
                                            class="error mt-4"> @error('varieties.'.$key.'.price') {{ $message }} @enderror</div>
                                    </div>

                                    <div class="mb-10 fv-row col-md-2 col-6 p-1 float-start">
                                        <label class="required form-label">{{ __('index.pricePaking') }}</label>
                                        <input wire:model="varieties.{{$key}}.price_paking" type="number" min="0"
                                               max="100"
                                               class="form-control fs-3 mb-2"/>
                                        <div
                                            class="error mt-4"> @error('varieties.'.$key.'.price_paking') {{ $message }} @enderror</div>
                                    </div>

                                    <div class="mb-10 fv-row col-md-2 col-6 p-1 float-start">
                                        <label class="required form-label">{{ __('index.discount') }}</label>
                                        <input wire:model="varieties.{{$key}}.discount" type="number" min="0" max="100"
                                               class="form-control fs-3 mb-2"/>
                                        <div
                                            class="error mt-4"> @error('varieties.'.$key.'.discount') {{ $message }} @enderror</div>
                                    </div>

                                    <div class="mb-10 fv-row col-md-2 col-6 p-1 float-start">
                                        <label class="required form-label">{{ __('index.count') }}</label>
                                        <input wire:model="varieties.{{$key}}.count" type="number" min="0" max="100"
                                               class="form-control fs-3 mb-2"/>
                                        <div
                                            class="error mt-4"> @error('varieties.'.$key.'.count') {{ $message }} @enderror</div>
                                    </div>

                                    <div class="mb-10 fv-row col-md-2 col-6 p-1 float-start">
                                        <label class="required form-label">{{ __('index.max order') }}</label>
                                        <input wire:model="varieties.{{$key}}.max_order" type="number" min="1"
                                               class="form-control fs-3 mb-2"/>
                                        <div
                                            class="error mt-4"> @error('varieties.'.$key.'.max_order') {{ $message }} @enderror</div>
                                    </div>
                                    <span wire:click="removeVariety({{$key}})"
                                          class="text-end cursor-pointer pe-2 position-relative float-end border border-1 p-2">
                                      {{trans('index.remove this price')}}

                                </span>
                                </div>
                            </div>
                        @endforeach
                        <div
                            class="border border-dashed border-gray-500  border-2 text-center p-4 border-radius cursor-pointer"
                            wire:click="addVariety">
                            {{trans('index.add variety')}}
                        </div>

                    @elseif($isVariety=="no")
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{ __('index.pricing') }}</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="mb-10 fv-row col-md-6 col-12 p-1 float-start">
                                    <label class="required form-label">{{ __('index.price') }}</label>
                                    <input wire:model="varieties.0.price" type="number" min="1000"
                                           class="form-control fs-3 mb-2"/>
                                    <div
                                        class="error mt-4"> @error('varieties.0.price') {{ $message }} @enderror</div>
                                </div>

                                <div class="mb-10 fv-row col-md-6 col-12 p-1 float-start">
                                    <label class="required form-label">{{ __('index.pricePaking') }}</label>
                                    <input wire:model="varieties.0.price_paking" type="number" min="0"
                                           max="100"
                                           class="form-control fs-3 mb-2"/>
                                    <div
                                        class="error mt-4"> @error('varieties.0.price_paking') {{ $message }} @enderror</div>
                                </div>

                                <div class="mb-10 fv-row col-md-6 col-6 p-1 float-start">
                                    <label class="required form-label">{{ __('index.discount') }}</label>
                                    <input wire:model="varieties.0.discount" type="number" min="0" max="100"
                                           class="form-control fs-3 mb-2"/>
                                    <div
                                        class="error mt-4"> @error('varieties.0.discount') {{ $message }} @enderror</div>
                                </div>

                                <div class="mb-10 fv-row col-md-6 col-6 p-1 float-start">
                                    <label class="required form-label">{{ __('index.count') }}</label>
                                    <input wire:model="varieties.0.count" type="number" min="0" max="100"
                                           class="form-control fs-3 mb-2"/>
                                    <div
                                        class="error mt-4"> @error('varieties.0.count') {{ $message }} @enderror</div>
                                </div>

                                <div class="mb-10 fv-row col-md-6 col-6 p-1 float-start">
                                    <label class="required form-label">{{ __('index.max order') }}</label>
                                    <input wire:model="varieties.0.max_order" type="number" min="1"
                                           class="form-control fs-3 mb-2"/>
                                    <div
                                        class="error mt-4"> @error('varieties.0.max_order') {{ $message }} @enderror</div>
                                </div>
                            </div>

                        </div>
                    @endif


                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('index.gallery') }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row col-md-3 p-1 float-start text-center">
                                <div class="image-input-wrapper w-150px h-150px m-auto">
                                    @if ($image_1)
                                        <img class="img-fluid" src="{{ $image_1->temporaryUrl() }}">

                                    @else
                                        <img class="img-fluid"
                                             src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                    @endif
                                </div>
                                <div class="error mt-4"> @error('image_1') {{ $message }} @enderror</div>
                                <label type="button" class="btn btn-primary mt-3 btn-sm" for="image_1">
                                    <span class="indicator-label">{{__('index.select image')}}</span>
                                    <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </label>
                                <input type="file" class="d-none opacity-0" wire:model="image_1" id="image_1"/>
                            </div>

                            <div class="mb-10 fv-row col-md-3 p-1 float-start text-center">
                                <div class="image-input-wrapper w-150px h-150px m-auto">
                                    @if ($image_2)
                                        <img class="img-fluid" src="{{ $image_2->temporaryUrl() }}">

                                    @else
                                        <img class="img-fluid"
                                             src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                    @endif
                                </div>
                                <div class="error mt-4"> @error('image_2') {{ $message }} @enderror</div>
                                <label type="button" class="btn btn-primary mt-3 btn-sm" for="image_2">
                                    <span class="indicator-label">{{__('index.select image')}}</span>
                                    <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </label>
                                <input type="file" class="d-none opacity-0" wire:model="image_2" id="image_2"/>
                            </div>

                            <div class="mb-10 fv-row col-md-3 p-1 float-start text-center">
                                <div class="image-input-wrapper w-150px h-150px m-auto">
                                    @if ($image_3)
                                        <img class="img-fluid" src="{{ $image_3->temporaryUrl() }}">

                                    @else
                                        <img class="img-fluid"
                                             src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                    @endif
                                </div>
                                <div class="error mt-4"> @error('image_3') {{ $message }} @enderror</div>
                                <label type="button" class="btn btn-primary mt-3 btn-sm" for="image_3">
                                    <span class="indicator-label">{{__('index.select image')}}</span>
                                    <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </label>
                                <input type="file" class="d-none opacity-0" wire:model="image_3" id="image_3"/>
                            </div>

                            <div class="mb-10 fv-row col-md-3 p-1 float-start text-center">
                                <div class="image-input-wrapper w-150px h-150px m-auto">
                                    @if ($image_4)
                                        <img class="img-fluid" src="{{ $image_4->temporaryUrl() }}">

                                    @else
                                        <img class="img-fluid"
                                             src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                    @endif
                                </div>
                                <div class="error mt-4"> @error('image_4') {{ $message }} @enderror</div>
                                <label type="button" class="btn btn-primary mt-3 btn-sm" for="image_4">
                                    <span class="indicator-label">{{__('index.select image')}}</span>
                                    <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </label>
                                <input type="file" class="d-none opacity-0" wire:model="image_4" id="image_4"/>
                            </div>

                        </div>

                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-body pt-0 pb-0">

                            <div class="fv-row col-md-12 p-1 float-start">
                                <button type="button" wire:click="setChange()" class="btn btn-primary float-end">
                                    <span class="indicator-label">{{__('index.save changes')}}</span>
                                    <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </div>

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
