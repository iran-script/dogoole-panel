<div>
{{--    @section('title-b',__('index.setting general'))--}}
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">

                <div class="d-flex flex-column flex-row-fluid col-md-12">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('index.general branch') }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">

                            <div class="mb-10 fv-row col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.settlementPeriod') }}</label>
                                <input wire:model="settlementPeriod" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('settlementPeriod') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.foodInBreakfast') }}</label>
                                <input wire:model="foodInBreakfast" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('foodInBreakfast') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.foodInLunch') }}</label>
                                <input wire:model="foodInLunch" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('foodInLunch') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.foodInDinner') }}</label>
                                <input wire:model="foodInDinner" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('foodInDinner') {{ $message }} @enderror</div>
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
