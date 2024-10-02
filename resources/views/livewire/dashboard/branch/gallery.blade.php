<div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                <div class="card card-flush py-4">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>{{ __('index.gallery') }}</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="fv-row col-12 col-md-2 p-1 m-2 float-start">
                            <div class="card card-flush  text-center">
                                <div class="image-input-wrapper w-100 h-auto m-auto">
                                @if ($images[0]['path'])
                                    <img class="img-fluid border-1 border-gray-400 p-3 shadow-gray-500/20" src="{{ $images[0]['path']->temporaryUrl() }}">
                                @else
                                    @if(isset($beforeImages[0]['path']))
                                        <img class="img-fluid border-1 border-gray-400 p-3 shadow-gray-500/20" src="{{$beforeImages[0]['path']}}">
                                    @else
                                        <img class="img-fluid border-1 border-gray-400 p-3"
                                             src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                    @endif
                                @endif
                            </div>
                                <div class="error m-1"> @error('images.0.path') {{ $message }} @enderror</div>
                                <label type="button" class="btn btn-primary m-3 btn-sm" for="image_1">
                                <span class="indicator-label">{{__('index.select image')}}</span>
                                <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </label>
                                <input type="file" class="d-none opacity-0" wire:model="images.0.path" id="image_1"/>
                            </div>
                        </div>











                        <div class="fv-row col-12 col-md-2 p-1  m-2 float-start">
                            <div class="card card-flush  text-center">
                                <div class="image-input-wrapper w-100 h-auto m-auto">
                                    @if ($images[1]['path'])
                                        <img class="img-fluid border-1 border-gray-400 p-3 shadow-gray-500/20" src="{{ $images[1]['path']->temporaryUrl() }}">
                                    @else
                                        @if(isset($beforeImages[1]['path']))
                                            <img class="img-fluid border-1 border-gray-400 p-3 shadow-gray-500/20" src="{{$beforeImages[1]['path']}}">
                                        @else
                                            <img class="img-fluid border-1 border-gray-400 p-3"
                                                 src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                        @endif
                                    @endif
                                </div>
                                <div class="error m-1"> @error('images.1.path') {{ $message }} @enderror</div>
                                <label type="button" class="btn btn-primary m-3 btn-sm" for="image_2">
                                    <span class="indicator-label">{{__('index.select image')}}</span>
                                    <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </label>
                                <input type="file" class="d-none opacity-0" wire:model="images.1.path" id="image_2"/>
                            </div>
                        </div>
                        <div class="fv-row col-12 col-md-2 p-1  m-2 float-start">
                            <div class="card card-flush  text-center">
                                <div class="image-input-wrapper w-100 h-auto m-auto">
                                    @if ($images[2]['path'])
                                        <img class="img-fluid border-1 border-gray-400 p-3 shadow-gray-500/20" src="{{ $images[2]['path']->temporaryUrl() }}">
                                    @else
                                        @if(isset($beforeImages[2]['path']))
                                            <img class="img-fluid border-1 border-gray-400 p-3 shadow-gray-500/20" src="{{$beforeImages[2]['path']}}">
                                        @else
                                            <img class="img-fluid border-1 border-gray-400 p-3"
                                                 src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                        @endif
                                    @endif
                                </div>
                                <div class="error m-1"> @error('images.2.path') {{ $message }} @enderror</div>
                                <label type="button" class="btn btn-primary m-3 btn-sm" for="image_3">
                                    <span class="indicator-label">{{__('index.select image')}}</span>
                                    <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </label>
                                <input type="file" class="d-none opacity-0" wire:model="images.2.path" id="image_3"/>
                            </div>
                        </div>
                        <div class="fv-row col-12 col-md-2 p-1 m-2 float-start">
                            <div class="card card-flush  text-center">
                                <div class="image-input-wrapper w-100 h-auto m-auto">
                                    @if ($images[3]['path'])
                                        <img class="img-fluid border-1 border-gray-400 p-3 shadow-gray-500/20" src="{{ $images[3]['path']->temporaryUrl() }}">
                                    @else
                                        @if(isset($beforeImages[3]['path']))
                                            <img class="img-fluid border-1 border-gray-400 p-3 shadow-gray-500/20" src="{{$beforeImages[3]['path']}}">
                                        @else
                                            <img class="img-fluid border-1 border-gray-400 p-3"
                                                 src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                        @endif
                                    @endif
                                </div>
                                <div class="error m-1"> @error('images.3.path') {{ $message }} @enderror</div>
                                <label type="button" class="btn btn-primary m-3 btn-sm" for="image_4">
                                    <span class="indicator-label">{{__('index.select image')}}</span>
                                    <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </label>
                                <input type="file" class="d-none opacity-0" wire:model="images.3.path" id="image_4"/>
                            </div>
                        </div>
                        <div class="fv-row col-12 col-md-12 p-1 float-start">
                            <button type="button" wire:click="setGallery()" class="btn btn-primary float-end">
                                <span class="indicator-label">{{__('index.save changes')}}</span>
                                <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
