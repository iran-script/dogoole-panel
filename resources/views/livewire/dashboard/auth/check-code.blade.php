<div>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <div
                class="d-flex flex-column-fluid flex-lg-column-fluid justify-content-center justify-content-lg-center p-12 p-lg-20">
                <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
                    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">

                        <div class="text-center mb-10">
                            <img alt="Logo" class="mh-125px"
                                 src="{{asset('panel/assets/media/svg/misc/smartphone-2.svg')}}"/>
                        </div>
                        <div class="text-center mb-10">
                            <h1 class="text-gray-900 mb-3">تایید شماره موبایل</h1>
                            <div class="text-muted fw-semibold fs-5 mb-5">کد ارسالی به شماره موبایل زیر ارسال شده
                            </div>
                            <div class="fw-bold text-gray-900 fs-3">{{$mobile}}</div>
                        </div>
                        <form wire:submit="checkCode">
                        <div class="fv-row mb-10">
                            <div class="otp-form fv-row mb-8">
                                <div class="text-gray-500 fw-semibold fs-5 mb-2">{{ __('index.right sms code number') }}</div>
                                <input wire:model="code" type="number" maxlength="4"
                                       class="otp-form-codecheck form-control form-control-lg form-control-solid"/>
                                <div class="error mt-4"> @error('code') {{ $message }} @enderror</div>
                            </div>
                            <div class="d-grid">
                                <button type="button" wire:click="checkCode" id="kt_sing_in_two_factor_submit"
                                        class="btn btn-lg btn-primary fw-bold">
                                    <span class="indicator-label"
                                          wire:loading.class="d-none">{{ __('messages.submit and go') }}</span>
                                    <span class="indicator-progress" wire:loading>در حال بررسی...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <div class="text-center my-sm-3 fw-normal fs-5 mt-3">
                                <a href="{{route('login')}}" class="link-primary fs-5 me-1">{{__('messages.wrong number')}}</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
