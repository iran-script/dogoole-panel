<div>
    @section('title-b',__('index.edit area'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row col-12 col-md-6  p-1 float-start">
                                <label class="required form-label">{{ __('index.title') }}</label>
                                <input wire:model="title" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('title') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.slug') }}</label>
                                <input wire:model="areaSlug" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('areaSlug') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="form-label">{{ __('index.location lat') }}</label>
                                <input wire:model="areaLat" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('areaLat') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="form-label">{{ __('index.location lang') }}</label>
                                <input wire:model="areaLang" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('areaLang') {{ $message }} @enderror</div>
                            </div>
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
