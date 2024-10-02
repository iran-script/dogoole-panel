<div>
    @section('title-b',__('index.create discount code'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="d-flex flex-column flex-lg-row">
                <div class="d-lg-flex flex-column flex-lg-row-auto w-100 w-lg-275px">
                    <div class="card card-flush mb-0">
                        <div class="card-body">
                            <div class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary">
                                <div class="mb-10 fv-row col-sm-12 col-12 p-1 float-start">
                                    <label class="required form-label">{{ __('index.discount type') }}</label>
                                    <select class="form-select mb-2" wire:model="discountType">
                                        <option value="public">{{__('index.public')}}</option>
                                        <option disabled value="count-order">{{__('index.count-order')}}</option>
                                        <option disabled value="after-rate">{{__('index.after-rate')}}</option>
                                        <option disabled value="after-order">{{__('index.after-order')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary">
                                <div class="mb-10 fv-row col-sm-12 col-12 p-1 float-start">
                                    <label class="required form-label">{{ __('index.limit used') }}</label>
                                    <select class="form-select mb-2" wire:model.live="limitUseStatus">
                                        <option value="true">{{__('index.true')}}</option>
                                        <option value="false">{{__('index.false')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary">
                                <div class="mb-10 fv-row col-sm-12 col-md-12 col-12 p-1 float-start">
                                    <label
                                        class="required form-label">{{ __('index.set limit discount code for users') }}</label>
                                    <select disabled class="form-select mb-2" wire:model="limitUserStatus">
                                        <option value="true">{{__('index.true')}}</option>
                                        <option value="false">{{__('index.false')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary">
                                <div class="mb-10 fv-row col-sm-12 col-md-12 col-12 p-1 float-start">
                                    <label
                                        class="required form-label">{{ __('index.set limit discount code for branch') }}</label>
                                    <select disabled class="form-select mb-2" wire:model="limitBranchStatus">
                                        <option value="true">{{__('index.true')}}</option>
                                        <option value="false">{{__('index.false')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="menu menu-column menu-rounded menu-state-bg menu-state-title-primary">
                                <div class="mb-10 fv-row col-sm-12 col-md-12 col-12 p-1 float-start">
                                    <label
                                        class="required form-label">{{ __('index.set limit discount code for city') }}</label>
                                    <select disabled class="form-select mb-2" wire:model="limitBranchStatus">
                                        <option value="true">{{__('index.true')}}</option>
                                        <option value="false">{{__('index.false')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                    <div class="card card-bordered">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('index.discount code setting') }}</h3>
                            <div class="card-toolbar"></div>
                        </div>
                        <div class="card-body">

                            {{--date--}}
                            <div class="mb-10 col-12 p-1 float-md-start">
                                @livewire("dashboard.component.datepicker")
                            </div>

                            <div class="mb-10 col-12 p-1 float-md-start">
                                <label class="required form-label">{{ __('index.title discount') }}</label>
                                <input wire:model="title" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('title') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 col-12 p-1 float-md-start">
                                <label class="required form-label">{{ __('index.discount code') }}</label>
                                <input wire:model="discountCode" type="text" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('discountCode') {{ $message }} @enderror</div>
                            </div>

                            <div class="mb-10 col-12 p-1 float-md-start">
                                <label class="required form-label">{{ __('index.discount percent') }}</label>
                                <input wire:model="discountPercent" type="number" class="form-control fs-3 mb-2"/>
                                <div class="error mt-4"> @error('discountPercent') {{ $message }} @enderror</div>
                            </div>

                            @if($limitUseStatus==="true")
                                <div class="mb-10 col-12 col-sm-6 p-1 float-md-start">
                                    <label class="required form-label">{{ __('index.count limit used') }}</label>
                                    <input wire:model="limitUse" type="number" class="form-control fs-3 mb-2"/>
                                    <div class="error mt-4"> @error('limitUse') {{ $message }} @enderror</div>
                                </div>
                            @endif

                            @if($limitUserStatus=="true")
                                <div class="mb-10 fv-row col-12 p-1 float-md-start">
                                    <label class="required form-label">{{ __('index.Search User...') }}</label>
                                    @livewire("dashboard.component.UserSearchDropDown")
                                </div>
                            @endif

                            @if($limitBranchStatus=="true")
                                <div class="mb-10 fv-row col-12 col-md-6 p-1 float-md-start">
                                    <label class="required form-label">{{ __('index.Search Branch...') }}</label>
                                    @livewire("dashboard.component.BranchSearchDropDown")
                                </div>
                            @endif
                            <div class="col-12 col-md-6 float-md-start">
                                <div class="mb-10 fv-row col-12 col-md-6 p-1 float-md-start">
                                    <label class="required form-label">{{ __('index.min price for discount') }}</label>
                                    <div class="input-group mb-5">
                                        <span class="input-group-text" id="basic-addon1">{{ __('index.toman') }}</span>
                                        <input wire:model="minOrderPrice" type="number" min="1000"
                                               class="form-control"/>
                                    </div>
                                    <div class="error mt-4"> @error('minOrderPrice') {{ $message }} @enderror</div>

                                    <span
                                        class="text-muted fs-7">{{ __('index.min price for set discount,  min price is: 1000T') }}</span>
                                </div>
                                <div class="mb-10 fv-row col-12 col-md-6 col-6 p-1 float-md-start">
                                    <label class="required form-label">{{ __('index.max price for discount') }}</label>
                                    <div class="input-group mb-5">
                                        <span class="input-group-text" id="basic-addon1">{{ __('index.toman') }}</span>
                                        <input wire:model="maxDiscountPrice" type="number" class="form-control"/>
                                    </div>
                                    <div class="error mt-4"> @error('maxDiscountPrice') {{ $message }} @enderror</div>
                                    <span
                                        class="text-muted fs-7">{{ __('index.max price for set discount (max limit price)') }}</span>
                                </div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-md-start">
                                <label class="form-label">{{ __('index.discount used count') }}</label>
                                <div class="input-group mb-5">
                                    <input wire:model="usedCount" type="number" class="form-control"/>
                                </div>
                                <div class="error mt-4"> @error('usedCount') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-md-start">
                                <label class="required form-label">{{ __('index.percent branch') }}</label>
                                <div class="input-group mb-5">
                                    <input wire:model="percentBranch" type="number" class="form-control"/>
                                </div>
                                <div class="error mt-4"> @error('percentBranch') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row col-12 col-md-6 p-1 float-md-start">
                                <label class="required form-label">{{ __('index.percent system') }}</label>
                                <div class="input-group mb-5">
                                    <input wire:model="percentSystem" type="number" class="form-control"/>
                                </div>
                                <div class="error mt-4"> @error('percentSystem') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="fv-row col-md-12 p-1 float-end">
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
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                </div>
            </form>
        </div>
    </div>
</div>
