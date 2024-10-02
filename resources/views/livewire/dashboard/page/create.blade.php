<div>
    @section('title-b',__('index.create page'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.title') }}</label>
                                <input wire:model="title" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('title') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.slug') }}</label>
                                <input wire:model="slug" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('slug') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                     data-kt-image-input="true">
                                    <div class="image-input-wrapper w-150px h-150px">
                                        @if ($cover)
                                            <img class="img-fluid" src="{{ $cover->temporaryUrl() }}">
                                        @else
                                            <img class="img-fluid"
                                                 src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                        @endif
                                    </div>
                                    <div class="error mt-4"> @error('cover') {{ $message }} @enderror</div>
                                    <label type="button" class="btn btn-primary mt-3 btn-sm" for="cover">
                                        <span class="indicator-label">{{__('index.select cover')}}</span>
                                        <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </label>
                                    <input type="file" class="d-none opacity-0" wire:model="cover" id="cover"/>
                                </div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-12 p-1 float-start">
                                @livewire('dashboard.component.editor',['text'=>$text])
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-12 p-1 float-start">
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
