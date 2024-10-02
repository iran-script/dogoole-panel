<div>
    @section('title-b',__('index.creat settlement user'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">

                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="card card-flush py-4">

                        <div class="card-body pt-0">


                            <div class="mb-10 fv-row col-12 col-md-4 p-1 float-start">
                                <label class="form-label">{{ __('index.user select') }}</label>
                                @livewire("dashboard.component.user-search-drop-down",['var'=>'userId'])
                                <div class="error mt-4"> @error('userId') {{ $message }} @enderror</div>
                            </div>


                            <div class="mb-10 fv-row col-12 col-md-4 p-1 float-start">
                                <label class="required form-label">{{ __('index.amount') }}</label>
                                <input wire:model="amount" type="number" dir="ltr"  class="form-control fs-3 mb-2 text-left "/>
                                <div class="error mt-4"> @error('amount') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 fv-row col-12 col-md-4 p-1 float-start">
                                <label class="required form-label">{{ __('index.description') }}</label>
                                <textarea wire:model="description" type="text"
                                          class="form-control fs-3 mb-2"></textarea>
                                <div class="error mt-4"> @error('amount') {{ $message }} @enderror</div>
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
