<div>
    @section('title-b',__('index.setting general'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                <div class="d-flex flex-column flex-row-fluid col-md-12">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('index.general') }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.shippingCost') }}</label>
                                <input wire:model="shippingCost" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('shippingCost') {{ $message }} @enderror</div>
                            </div>





                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.taxPercent') }}</label>
                                <input wire:model="taxPercent" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('taxPercent') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.maxDistance') }}</label>
                                <input wire:model="maxDistance" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('maxDistance') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.zarinpal') }}</label>
                                <input wire:model="zarinpal" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('zarinpal') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.fixedShippingCost') }}</label>
                                <input wire:model="fixedShippingCost" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('fixedShippingCost') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.fixedShippingKilometer') }}</label>
                                <input wire:model="fixedShippingKilometer" type="number"
                                       class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('fixedShippingKilometer') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.foodProfit') }}</label>
                                <input wire:model="foodProfit" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('foodProfit') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.deliveryFreeKilometer') }}</label>
                                <input wire:model="deliveryFreeKilometer" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('deliveryFreeKilometer') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.percentage of sales') }}</label>
                                <input wire:model="percentageSales" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('percentageSales') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.percentage of deliver') }}</label>
                                <input wire:model="percentageDeliver" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('percentageDeliver') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.shippingType') }}</label>
                                <select class="form-select mb-2" wire:model="shippingType">
                                    <option value="null">{{__('index.select')}}</option>
                                    <option value="kilometre">{{__('index.based on km')}}</option>
                                    <option value="area">{{__('index.based on areas')}}</option>
                                </select>
                                <div class="error mt-4"> @error('shippingType') {{ $message }} @enderror</div>
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
