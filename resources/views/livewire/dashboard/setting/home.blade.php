<div>
    @section('title-b',__('index.setting general'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                <div class="d-flex flex-column flex-row-fluid col-md-12">
{{--                    <div class="card card-flush py-4">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="card-title">--}}
{{--                                <h2>{{ __('index.home_fixed_image') }}</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body pt-0">--}}
{{--                            @foreach($home_fixed_image as $key=>$item)--}}
{{--                                <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">--}}
{{--                                    <div--}}
{{--                                        class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"--}}
{{--                                        data-kt-image-input="true">--}}
{{--                                        <div class="image-input-wrapper w-150px h-150px">--}}
{{--                                            @if ($home_fixed_image[$key]['image'] instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)--}}
{{--                                                <img class="img-fluid"--}}
{{--                                                     src="{{ $home_fixed_image[$key]['image']->temporaryUrl() }}">--}}
{{--                                            @elseif ($home_fixed_image[$key]['image'])--}}
{{--                                                <img class="img-fluid" src="{{ $home_fixed_image[$key]['image'] }}">--}}
{{--                                            @else--}}
{{--                                                <img class="img-fluid"--}}
{{--                                                     src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                        <div--}}
{{--                                            class="error mt-4"> @error('home_fixed_image.'.$key.'image') {{ $message }} @enderror</div>--}}
{{--                                        <label type="button" class="btn btn-primary mt-3 btn-sm"--}}
{{--                                               for="home_fixed_image_{{$key}}">--}}
{{--                                            <span class="indicator-label">{{__('index.select image')}}</span>--}}
{{--                                            <span class="indicator-progress">{{__('index.please wait...')}}--}}
{{--									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>--}}
{{--                                        </label>--}}
{{--                                        <input type="file" class="d-none opacity-0"--}}
{{--                                               wire:model="home_fixed_image.{{$key}}.image"--}}
{{--                                               id="home_fixed_image_{{$key}}"/>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <label class="required form-label">{{ __('index.title') }}</label>--}}
{{--                                        <input wire:model="home_fixed_image.{{$key}}.title"--}}
{{--                                               class="form-control fs-3 mb-2"/>--}}
{{--                                        <div--}}
{{--                                            class="error mt-4"> @error('home_fixed_image.'.$key.'.title') {{ $message }} @enderror</div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <label class="required form-label">{{ __('index.link') }}</label>--}}
{{--                                        <input wire:model="home_fixed_image.{{$key}}.link" type="url"--}}
{{--                                               class="form-control fs-3 mb-2"/>--}}
{{--                                        <div--}}
{{--                                            class="error mt-4"> @error('home_fixed_image.'.$key.'.link') {{ $message }} @enderror</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="card card-flush py-4 my-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('index.home_discount_section') }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <div
                                    class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <div class="image-input-wrapper w-150px h-150px">
                                        @if ($home_discount_section['image'] instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
                                            <img class="img-fluid"
                                                 src="{{$home_discount_section['image']->temporaryUrl() }}">
                                        @elseif ($home_discount_section['image'])
                                            <img class="img-fluid" src="{{ $home_discount_section['image'] }}">
                                        @else
                                            <img class="img-fluid"
                                                 src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                        @endif
                                    </div>

                                    <div
                                        class="error mt-4"> @error('home_discount_section_image.image') {{ $message }} @enderror</div>


                                    <label type="button" class="btn btn-primary mt-3 btn-sm"
                                           for="home_discount_section_image">
                                        <span class="indicator-label">{{__('index.select image')}}</span>
                                        <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </label>


                                    <input type="file" class="d-none opacity-0"
                                           wire:model="home_discount_section.image"
                                           id="home_discount_section_image"/>
                                </div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.title') }}</label>
                                <input wire:model="home_discount_section.title"
                                       class="form-control fs-3 mb-2"/>
                                <div
                                    class="error mt-4"> @error('home_discount_section.title') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.link') }}</label>
                                <input wire:model="home_discount_section.link" type="url"
                                       class="form-control fs-3 mb-2"/>
                                <div
                                    class="error mt-4"> @error('home_discount_section.link') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.background-color') }}</label>
                                <input wire:model="home_discount_section.background-color" type="color"
                                       class="form-control fs-3 mb-2"/>
                                <div
                                    class="error mt-4"> @error('home_discount_section.background-color') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.btn_text') }}</label>
                                <input wire:model="home_discount_section.btn_text" type="text"
                                       class="form-control fs-3 mb-2"/>
                                <div
                                    class="error mt-4"> @error('home_discount_section.btn_text') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="card card-flush py-4 my-5">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="card-title">--}}
{{--                                <h2>{{ __('index.home_vendor_section') }}</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body pt-0">--}}

{{--                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">--}}
{{--                                <label class="required form-label">{{ __('index.title') }}</label>--}}
{{--                                <input wire:model="home_vendor_section.title" type="text"--}}
{{--                                       class="form-control fs-3 mb-2"/>--}}
{{--                                <div--}}
{{--                                    class="error mt-4"> @error('home_vendor_section.title') {{ $message }} @enderror</div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">--}}
{{--                                <label class="required form-label">{{ __('index.link') }}</label>--}}
{{--                                <input wire:model="home_vendor_section.link" type="url"--}}
{{--                                       class="form-control fs-3 mb-2"/>--}}
{{--                                <div--}}
{{--                                    class="error mt-4"> @error('home_vendor_section.link') {{ $message }} @enderror</div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">--}}
{{--                                <label class="required form-label">{{ __('index.btn_text') }}</label>--}}
{{--                                <input wire:model="home_vendor_section.btn_text" type="text"--}}
{{--                                       class="form-control fs-3 mb-2"/>--}}
{{--                                <div--}}
{{--                                    class="error mt-4"> @error('home_vendor_section.btn_text') {{ $message }} @enderror</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card card-flush py-4 my-5">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="card-title">--}}
{{--                                <h2>{{ __('index.home_food_section') }}</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body pt-0">--}}
{{--                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">--}}
{{--                                <label class="required form-label">{{ __('index.title') }}</label>--}}
{{--                                <input wire:model="home_food_section.title" type="text"--}}
{{--                                       class="form-control fs-3 mb-2"/>--}}
{{--                                <div--}}
{{--                                    class="error mt-4"> @error('home_food_section.title') {{ $message }} @enderror</div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">--}}
{{--                                <label class="required form-label">{{ __('index.link') }}</label>--}}
{{--                                <input wire:model="home_food_section.link" type="url"--}}
{{--                                       class="form-control fs-3 mb-2"/>--}}
{{--                                <div class="error mt-4"> @error('home_food_section.link') {{ $message }} @enderror</div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">--}}
{{--                                <label class="required form-label">{{ __('index.btn_text') }}</label>--}}
{{--                                <input wire:model="home_food_section.btn_text" type="text"--}}
{{--                                       class="form-control fs-3 mb-2"/>--}}
{{--                                <div--}}
{{--                                    class="error mt-4"> @error('home_food_section.btn_text') {{ $message }} @enderror</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card card-flush py-4 my-5">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="card-title">--}}
{{--                                <h2>{{ __('index.home_about_section') }}</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body pt-0">--}}
{{--                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">--}}
{{--                                <div--}}
{{--                                    class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"--}}
{{--                                    data-kt-image-input="true">--}}
{{--                                    <div class="image-input-wrapper w-150px h-150px">--}}
{{--                                        @if ($home_about_section['image'] instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)--}}
{{--                                            <img class="img-fluid"--}}
{{--                                                 src="{{$home_about_section['image']->temporaryUrl() }}">--}}
{{--                                        @elseif ($home_about_section['image'])--}}
{{--                                            <img class="img-fluid" src="{{ $home_about_section['image'] }}">--}}
{{--                                        @else--}}
{{--                                            <img class="img-fluid"--}}
{{--                                                 src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    <div--}}
{{--                                        class="error mt-4"> @error('home_about_section.image') {{ $message }} @enderror</div>--}}
{{--                                    <label type="button" class="btn btn-primary mt-3 btn-sm"--}}
{{--                                           for="home_about_section_image">--}}
{{--                                        <span class="indicator-label">{{__('index.select image')}}</span>--}}
{{--                                        <span class="indicator-progress">{{__('index.please wait...')}}--}}
{{--									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>--}}
{{--                                    </label>--}}
{{--                                    <input type="file" class="d-none opacity-0"--}}
{{--                                           wire:model="home_about_section.image"--}}
{{--                                           id="home_about_section_image"/>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">--}}
{{--                                <div--}}
{{--                                    class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"--}}
{{--                                    data-kt-image-input="true">--}}
{{--                                    <div class="image-input-wrapper w-150px h-150px">--}}
{{--                                        @if ($home_about_section['background'] instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)--}}
{{--                                            <img class="img-fluid"--}}
{{--                                                 src="{{$home_about_section['background']->temporaryUrl() }}">--}}
{{--                                        @elseif ($home_about_section['background'])--}}
{{--                                            <img class="img-fluid" src="{{ $home_about_section['background'] }}">--}}
{{--                                        @else--}}
{{--                                            <img class="img-fluid"--}}
{{--                                                 src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    <div--}}
{{--                                        class="error mt-4"> @error('home_about_section.background') {{ $message }} @enderror</div>--}}
{{--                                    <label type="button" class="btn btn-primary mt-3 btn-sm"--}}
{{--                                           for="home_about_section_background">--}}
{{--                                        <span class="indicator-label">{{__('index.select image')}}</span>--}}
{{--                                        <span class="indicator-progress">{{__('index.please wait...')}}--}}
{{--                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>--}}
{{--                                    </label>--}}
{{--                                    <input type="file" class="d-none opacity-0"--}}
{{--                                           wire:model="home_about_section.background"--}}
{{--                                           id="home_about_section_background"/>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">--}}
{{--                                <label class="required form-label">{{ __('index.title') }}</label>--}}
{{--                                <input wire:model="home_about_section.title" type="text"--}}
{{--                                       class="form-control fs-3 mb-2"/>--}}
{{--                                <div--}}
{{--                                    class="error mt-4"> @error('home_about_section.title') {{ $message }} @enderror</div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">--}}
{{--                                <label class="required form-label">{{ __('index.title') }}</label>--}}
{{--                                <textarea wire:model="home_about_section.text" type="text"--}}
{{--                                          class="form-control fs-3 mb-2"></textarea>--}}
{{--                                <div--}}
{{--                                    class="error mt-4"> @error('home_about_section.text') {{ $message }} @enderror</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="card card-flush py-4 my-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('index.home_register_vendor_section') }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <div
                                    class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                    data-kt-image-input="true">
                                    <div class="image-input-wrapper w-150px h-150px">
                                        @if ($home_register_vendor_section['image'] instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
                                            <img class="img-fluid"
                                                 src="{{$home_register_vendor_section['image']->temporaryUrl() }}">
                                        @elseif ($home_register_vendor_section['image'])
                                            <img class="img-fluid" src="{{ $home_register_vendor_section['image'] }}">
                                        @else
                                            <img class="img-fluid"
                                                 src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                        @endif
                                    </div>

                                    <div
                                        class="error mt-4"> @error('home_register_vendor_section.image') {{ $message }} @enderror</div>


                                    <label type="button" class="btn btn-primary mt-3 btn-sm"
                                           for="home_register_vendor_section_image">
                                        <span class="indicator-label">{{__('index.select image')}}</span>
                                        <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </label>
                                    <input type="file" class="d-none opacity-0"
                                           wire:model="home_register_vendor_section.image"
                                           id="home_register_vendor_section_image"/>
                                </div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.title') }}</label>
                                <input wire:model="home_register_vendor_section.title" type="text"
                                       class="form-control fs-3 mb-2"/>
                                <div
                                    class="error mt-4"> @error('home_register_vendor_section.title') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.btn_title') }}</label>
                                <input wire:model="home_register_vendor_section.btn_title" type="text"
                                       class="form-control fs-3 mb-2"/>
                                <div
                                    class="error mt-4"> @error('home_register_vendor_section.btn_title') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.description') }}</label>
                                <textarea wire:model="home_register_vendor_section.text" type="text"
                                          class="form-control fs-3 mb-2"></textarea>
                                <div
                                    class="error mt-4"> @error('home_register_vendor_section.text') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="card card-flush py-4 my-5">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="card-title">--}}
{{--                                <h2>{{ __('index.home_steps_section') }}</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body pt-0">--}}
{{--                            @foreach($home_steps_section as $key=>$item)--}}
{{--                                <div class="mb-10 fv-row col-12 col-12 col-md-6 p-1 float-start">--}}
{{--                                    <div--}}
{{--                                        class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"--}}
{{--                                        data-kt-image-input="true">--}}
{{--                                        <div class="image-input-wrapper w-150px h-150px">--}}
{{--                                            @if ($home_steps_section[$key]['image'] instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)--}}
{{--                                                <img class="img-fluid"--}}
{{--                                                     src="{{ $home_steps_section[$key]['image']->temporaryUrl() }}">--}}
{{--                                            @elseif ($home_steps_section[$key]['image'])--}}
{{--                                                <img class="img-fluid" src="{{ $home_steps_section[$key]['image'] }}">--}}
{{--                                            @else--}}
{{--                                                <img class="img-fluid"--}}
{{--                                                     src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}

{{--                                        <div--}}
{{--                                            class="error mt-4"> @error('home_steps_section.'.$key.'image') {{ $message }} @enderror</div>--}}


{{--                                        <label type="button" class="btn btn-primary mt-3 btn-sm"--}}
{{--                                               for="home_steps_section_{{$key}}">--}}
{{--                                            <span class="indicator-label">{{__('index.select image')}}</span>--}}
{{--                                            <span class="indicator-progress">{{__('index.please wait...')}}--}}
{{--									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>--}}
{{--                                        </label>--}}


{{--                                        <input type="file" class="d-none opacity-0"--}}
{{--                                               wire:model="home_steps_section.{{$key}}.image"--}}
{{--                                               id="home_steps_section_{{$key}}"/>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <label class="required form-label">{{ __('index.title') }}</label>--}}
{{--                                        <input wire:model="home_steps_section.{{$key}}.title"--}}
{{--                                               class="form-control fs-3 mb-2"/>--}}
{{--                                        <div--}}
{{--                                            class="error mt-4"> @error('home_steps_section.'.$key.'.title') {{ $message }} @enderror</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card card-flush py-4 my-5">--}}
{{--                        <div class="card-header">--}}
{{--                            <div class="card-title">--}}
{{--                                <h2>{{ __('index.home_features_section') }}</h2>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body pt-0">--}}
{{--                            <div class="mb-10 fv-row col-md-12 p-1 float-start">--}}
{{--                                <label class="required form-label">{{ __('index.title') }}</label>--}}
{{--                                <input wire:model="home_features_section.title" type="text"--}}
{{--                                       class="form-control fs-3 mb-2"/>--}}
{{--                                <div--}}
{{--                                    class="error mt-4"> @error('home_features_section.title') {{ $message }} @enderror</div>--}}
{{--                            </div>--}}
{{--                            @foreach($home_features_section['items'] as $key=>$item)--}}
{{--                                <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">--}}
{{--                                    <div--}}
{{--                                        class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"--}}
{{--                                        data-kt-image-input="true">--}}
{{--                                        <div class="image-input-wrapper w-150px h-150px">--}}
{{--                                            @if ($home_features_section['items'][$key]['image'] instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)--}}
{{--                                                <img class="img-fluid"--}}
{{--                                                     src="{{ $home_features_section['items'][$key]['image']->temporaryUrl() }}">--}}
{{--                                            @elseif ($home_features_section['items'][$key]['image'])--}}
{{--                                                <img class="img-fluid"--}}
{{--                                                     src="{{ $home_features_section['items'][$key]['image'] }}">--}}
{{--                                            @else--}}
{{--                                                <img class="img-fluid"--}}
{{--                                                     src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}

{{--                                        <div--}}
{{--                                            class="error mt-4"> @error('home_features_section.items'.$key.'image') {{ $message }} @enderror</div>--}}


{{--                                        <label type="button" class="btn btn-primary mt-3 btn-sm"--}}
{{--                                               for="home_features_section_{{$key}}">--}}
{{--                                            <span class="indicator-label">{{__('index.select image')}}</span>--}}
{{--                                            <span class="indicator-progress">{{__('index.please wait...')}}--}}
{{--									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>--}}
{{--                                        </label>--}}
{{--                                        <input type="file" class="d-none opacity-0"--}}
{{--                                               wire:model="home_features_section.items.{{$key}}.image"--}}
{{--                                               id="home_features_section_{{$key}}"/>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <label class="required form-label">{{ __('index.title') }}</label>--}}
{{--                                        <input wire:model="home_features_section.items.{{$key}}.title"--}}
{{--                                               class="form-control fs-3 mb-2"/>--}}
{{--                                        <div--}}
{{--                                            class="error mt-4"> @error('home_features_section.items.'.$key.'.title') {{ $message }} @enderror</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
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
