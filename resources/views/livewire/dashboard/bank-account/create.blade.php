<div>
    @section('title-b',__('index.bank account create'))
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
                                <label class="required form-label">{{ __('index.bank name') }}</label>
                                <input wire:model="bankName" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('bankName') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.account holder name') }}</label>
                                <input wire:model="accountHolderName" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('accountHolderName') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.account number') }}</label>
                                <input wire:model="accountNumber" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('accountNumber') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.card number') }}</label>
                                <input wire:model="cardNumber" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('cardNumber') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-start">
                                <label class="required form-label">{{ __('index.shaba number') }}</label>
                                <input wire:model="shabaNumber" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('shabaNumber') {{ $message }} @enderror</div>
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
