<div>
    @section('title-b',__('index.add material'))

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('index.image') }}</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                 data-kt-image-input="true">
                                <div class="image-input-wrapper w-150px h-150px">
                                    @if ($image)
                                        <img class="img-fluid" src="{{ $image->temporaryUrl() }}">
                                    @else
                                        <img class="img-fluid" src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
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
                        </div>

                    </div>

                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('index.general') }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.category') }}</label>
                                <select class="form-select mb-2" wire:model="category_id">
                                    <option value="0">{{__('index.select')}}</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category['id']}}">{{$category['title']}}</option>
                                    @endforeach
                                </select>
                                <div class="error mt-4"> @error('category_id') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.unit') }}</label>
                                <select class="form-select mb-2" wire:model="unit_id">
                                    <option value="0">{{__('index.select')}}</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit['id']}}">{{$unit['title']}}</option>
                                    @endforeach
                                </select>
                                <div class="error mt-4"> @error('unit_id') {{ $message }} @enderror</div>

                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.title') }}</label>
                                <input wire:model="title" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('title') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.price per unit') }}</label>
                                <input wire:model="pricePerUnit" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('pricePerUnit') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.calorie per unit') }}</label>
                                <input wire:model="caloriePerUnit" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('caloriePerUnit') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.carbohydrate per unit') }}</label>
                                <input wire:model="carbohydratePerUnit" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('carbohydratePerUnit') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row  col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.fat per unit') }}</label>
                                <input wire:model="fatPerUnit" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('fatPerUnit') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row  col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.protein per unit') }}</label>
                                <input wire:model="proteinPerUnit" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('proteinPerUnit') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row col-md-12 p-1 float-start">
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
