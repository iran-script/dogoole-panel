<div>
    @section('title-b',__('index.setting seo'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                 data-kt-image-input="true">
                                <div class="mb-10 fv-row col-md-12 p-1 float-start">
                                    <label class="required form-label">{{ __('index.logo') }}</label>
                                    <div class="image-input-wrapper w-150px h-150px m-auto">
                                        @if ($logo)
                                            <img class="img-fluid" src="{{ $logo->temporaryUrl() }}">
                                        @else
                                            @if($beforeLogo)
                                                <img class="img-fluid" src="{{$beforeLogo}}">
                                            @else
                                                <img class="img-fluid"
                                                     src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                            @endif
                                        @endif
                                    </div>
                                    <div class="error mt-4"> @error('logo') {{ $message }} @enderror</div>
                                    <label type="button" class="btn btn-primary mt-3 btn-sm" for="logo">
                                        <span class="indicator-label">{{__('index.select image')}}</span>
                                        <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </label>
                                    <input type="file" class="d-none opacity-0" wire:model="logo" id="logo"/>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                 data-kt-image-input="true">
                                <div class="mb-10 fv-row col-md-12 p-1 float-start">
                                    <label class="required form-label">{{ __('index.faveIcon') }}</label>
                                    <div class="image-input-wrapper w-150px h-150px m-auto">
                                        @if ($faveIcon)
                                            <img class="img-fluid" src="{{ $faveIcon->temporaryUrl() }}">
                                        @else
                                            @if($beforeFaveIcon)
                                                <img class="img-fluid" src="{{$beforeFaveIcon}}">
                                            @else
                                                <img class="img-fluid"
                                                     src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                            @endif
                                        @endif
                                    </div>
                                    <div class="error mt-4"> @error('faveIcon') {{ $message }} @enderror</div>
                                    <label type="button" class="btn btn-primary mt-3 btn-sm" for="faveIcon">
                                        <span class="indicator-label">{{__('index.select image')}}</span>
                                        <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </label>
                                    <input type="file" class="d-none opacity-0" wire:model="faveIcon" id="faveIcon"/>
                                </div>
                            </div>
                        </div>

                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                 data-kt-image-input="true">
                                <div class="mb-10 fv-row col-md-12 p-1 float-start">
                                    <label class="required form-label">{{ __('index.logoPanel') }}</label>
                                    <div class="image-input-wrapper w-150px h-150px m-auto">
                                        @if ($logoPanel)
                                            <img class="img-fluid" src="{{ $logoPanel->temporaryUrl() }}">
                                        @else
                                            @if($beforeLogoPanel)
                                                <img class="img-fluid" src="{{$beforeLogoPanel}}">
                                            @else
                                                <img class="img-fluid"
                                                     src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                            @endif
                                        @endif
                                    </div>
                                    <div class="error mt-4"> @error('logoPanel') {{ $message }} @enderror</div>
                                    <label type="button" class="btn btn-primary mt-3 btn-sm" for="logoPanel">
                                        <span class="indicator-label">{{__('index.select image')}}</span>
                                        <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </label>
                                    <input type="file" class="d-none opacity-0" wire:model="logoPanel" id="logoPanel"/>
                                </div>
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
                                <label class="required form-label">{{ __('index.title') }}</label>
                                <input wire:model="title" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('title') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.enamad code') }}</label>
                                <input wire:model="enamadCode" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('enamadCode') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-12 p-1 float-start">
                                <label class="required form-label">{{ __('index.min description') }}</label>
                                <textarea wire:model="smDescription" class="form-control fs-3 mb-2"></textarea>
                                <div class="error mt-4"> @error('smDescription') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-12 p-1 float-start">
                                <label class="required form-label">{{ __('index.keywords') }}</label>
                                <textarea wire:model="keywords" class="form-control fs-3 mb-2"></textarea>
                                <div class="error mt-4"> @error('keywords') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-12 p-1 float-start">
                                <label class="required form-label">{{ __('index.meta') }}</label>
                                <textarea wire:model="meta" class="form-control fs-3 mb-2"></textarea>
                                <div class="error mt-4"> @error('meta') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-12 p-1 float-start">
                                <label class="required form-label">{{ __('index.scripts') }}</label>
                                <textarea wire:model="scripts" class="form-control fs-3 mb-2"></textarea>
                                <div class="error mt-4"> @error('scripts'){{ $message }}@enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.eata') }}</label>
                                <input wire:model="eata" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('eata') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.sorosh') }}</label>
                                <input wire:model="sorosh" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('sorosh') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.instagram') }}</label>
                                <input wire:model="instagram" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('instagram') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.telegram') }}</label>
                                <input wire:model="telegram" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('telegram') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.whatsapp') }}</label>
                                <input wire:model="whatsapp" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('whatsapp') {{ $message }} @enderror</div>
                            </div>


                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.header telephone support') }}</label>
                                <input wire:model="headerTelephoneSupport" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('headerTelephoneSupport') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.header text support') }}</label>
                                <input wire:model="headerTextSupport" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('headerTextSupport') {{ $message }} @enderror</div>
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
