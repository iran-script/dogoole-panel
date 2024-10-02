<div>
    @section('title-b',__('index.edit client user'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-12">
                <div class="card card-flush py-4">
                    <div class="card-body">
                        <div class="filnum mb-0 fv-row col-12 col-md-3 p-4 float-start">
                            <label class="required form-label">{{ __('index.user type') }}</label>
                            <select class="form-select mb-2" wire:model="userType">
                                <option value="0">{{__('index.select')}}</option>
                                <option value="1">{{__('index.admin')}}</option>
                                <option value="5">{{__('index.driver')}}</option>
                                <option value="4">{{__('index.client')}}</option>
                            </select>
                            <div class="error mt-4"> @error('userType') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-0 fv-row col-12 col-md-3 p-4 float-start">
                            <label class="required form-label">{{ __('index.first-name') }}</label>
                            <input wire:model="name" type="text" class="form-control fs-3 mb-2"/>
                            <div class="error mt-4"> @error('name') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-0 fv-row col-12 col-md-3 p-4 float-start">
                            <label class="required form-label">{{ __('index.family') }}</label>
                            <input wire:model="family" type="text" class="form-control fs-3 mb-2"/>
                            <div class="error mt-4"> @error('family') {{ $message }} @enderror</div>
                        </div>
                        <div class="mb-0 fv-row col-12 col-md-3 p-4 float-start">
                            <label class="required form-label">{{ __('index.tel') }}</label>
                            <input wire:model="mobile" type="tel" maxlength="11"
                                   class="form-control fs-3 mb-2"/>
                            <div class="error mt-4"> @error('mobile') {{ $message }} @enderror</div>
                        </div>
                        <div class="fv-row col-12 col-md-6">
                            <div class="col-12">
                                <label class="required form-label">{{ __('index.birthday') }}</label>
                            </div>
                            <div class="filnum mb-5 fv-row col-4 col-md-2 p-1 float-start">
                                <label class="required form-label">{{ __('index.birth day') }}</label>
                                <select class="form-select mb-2" wire:model="day">
                                    <option value="0">{{__('index.birth day')}}</option>
                                    @foreach($days as $day)
                                        <option value="{{ $day }}">{{ $day }}</option>
                                    @endforeach
                                </select>
                                <div class="error mt-4"> @error('day') {{ $message }} @enderror</div>
                            </div>
                            <div class="filnum mb-5 fv-row col-4 col-md-2 p-1 float-start">
                                <label class="required form-label">{{ __('index.birth month') }}</label>
                                <select class="form-select mb-2" wire:model="month">
                                    <option value="0">{{__('index.birth month')}}</option>
                                    @foreach($months as $month)
                                        <option value="{{ $month }}">{{ $month }}</option>
                                    @endforeach
                                </select>
                                <div class="error mt-4"> @error('month') {{ $message }} @enderror</div>
                            </div>
                            <div class="filnum mb-5 fv-row col-4 col-md-2 p-1 float-start">
                                <label class="required form-label">{{ __('index.birth year') }}</label>
                                <select class="form-select mb-2" wire:model="year">
                                    <option value="0">{{__('index.birth year')}}</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                <div class="error mt-4"> @error('year') {{ $message }} @enderror</div>
                            </div>
                        </div>


                        <div class="fv-row col-12 col-md-12 p-1 float-end">
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
