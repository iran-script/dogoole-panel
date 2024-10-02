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
                        <div class="text-center mb-11">
                            <h1 class="text-gray-900 fw-bolder mb-3">ورود به پنل</h1>
                        </div>
                        <form wire:submit="sendCode">
                        <div class="fv-row mb-8">
                            <div class="text-gray-500 fw-semibold fs-5 mb-2">{{ __('index.tel') }}</div>
                            <input wire:model="mobile" type="tel" maxlength="11"
                                   class="form-control fs-1 form-control-lg form-control-solid" placeholder="0913 --- ----"
                                   value=""/>
                            <div class="error mt-4"> @error('mobile') {{ $message }} @enderror</div>

                            <div class="d-grid mb-10">
                                <button type="submit" wire:click="sendCode" class="btn btn-primary">
                                    <span class="indicator-label" wire:loading.remove>{{ __('messages.login') }}</span>
                                    <span class="indicator-progress" wire:loading>در حال بررسی...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
