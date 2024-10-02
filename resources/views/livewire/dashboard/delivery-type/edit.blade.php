<div>
    @section('title-b',__('index.edit shipment type'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.shipping cost calculation') }}</label>
                                <select class="form-select mb-2" wire:model="isCost">
                                    <option value="null">{{__('index.select')}}</option>
                                    <option value="1">{{__('index.yes')}}</option>
                                    <option value="0">{{__('index.no')}}</option>
                                </select>
                                <div class="error mt-4"> @error('isCost') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.description required') }}</label>
                                <select class="form-select mb-2" wire:model="descriptionRequired">
                                    <option value="null">{{__('index.select')}}</option>
                                    <option value="1">{{__('index.yes')}}</option>
                                    <option value="0">{{__('index.no')}}</option>
                                </select>
                                <div class="error mt-4"> @error('descriptionRequired') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.is active') }}</label>
                                <select class="form-select mb-2" wire:model="isActive">
                                    <option value="null">{{__('index.select')}}</option>
                                    <option value="1">{{__('index.yes')}}</option>
                                    <option value="0">{{__('index.no')}}</option>
                                </select>
                                <div class="error mt-4"> @error('isActive') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.is address') }}</label>
                                <select class="form-select mb-2" wire:model="isAddress">
                                    <option value="null">{{__('index.select')}}</option>
                                    <option value="1">{{__('index.yes')}}</option>
                                    <option value="0">{{__('index.no')}}</option>
                                </select>
                                <div class="error mt-4"> @error('isAddress') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.title') }}</label>
                                <input wire:model="title" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('title') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.description text') }}</label>
                                <input wire:model="descriptionText" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('descriptionText') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.description error text') }}</label>
                                <input wire:model="descriptionErrorText" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('descriptionErrorText') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.message') }}</label>
                                <input wire:model="message" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('message') {{ $message }} @enderror</div>
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
            </form>
        </div>
    </div>
</div>
