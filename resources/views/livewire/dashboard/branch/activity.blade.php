<div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ __('index.activity') }}</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">

                        @if($beforeActivity)
                            @forelse($beforeActivity as $key=>$activity)
                                @if($activity)
                                    <h5>{{ __('index.'.$key) }}</h5>
                                    <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">


                                        <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-250px">از ساعت</th>
                                            <th class="min-w-150px">تا ساعت</th>
                                            <th class="min-w-70px">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($activity as $item)
                                            <tr>
                                                <td>
                                                    {{$item['from_time']}}
                                                </td>
                                                <td>
                                                    {{$item['to_time']}}
                                                </td>
                                                <td class="text-end">
                                                    <a onclick="destroy({{$item['id']}})"
                                                       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                                        <i class="ki-duotone ki-trash fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                            <span class="path4"></span>
                                                            <span class="path5"></span>
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">
                                                    <p class="fw-bold align-middle fs-3qx text-center pt-10">{{ __('index.no data to show') }}</p>
                                                    <div class="text-center pb-15 px-5">
                                                        <img
                                                            src="{{asset('panel/assets/media/illustrations/sketchy-1/2.png')}}"
                                                            alt=""
                                                            class="mw-100 h-200px h-sm-325px">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                @endif
                            @empty
                                هیچ زمانی ثبت نشده است
                            @endforelse
                        @else
                            هیچ زمانی ثبت نشده است
                        @endif
                    </div>
                </div>
            </div>
            <div class="card card-flush py-4 mt-5">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ __('index.new activity') }}</h2>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="mb-10 col-12 col-md-4 float-start p-2">
                        <label class="required form-label">{{ __('index.weekDay') }}</label>
                        <select class="form-select mb-2" wire:model="day">
                            <option value="0">{{__('index.select')}}</option>
                            @foreach($weekDay as $key=>$item)
                                <option value="{{$key}}">{{$item}}</option>
                            @endforeach
                        </select>
                        <div class="error mt-4"> @error('day') {{ $message }} @enderror</div>
                    </div>
                    <div class="mb-10 col-12 col-md-4 float-start p-2">
                        <label class="required form-label">{{ __('index.from') }}</label>
                        <input wire:model="from" type="time" class="form-control fs-3 mb-2"/>
                        <div class="mt-4"> pm : (12 ظهر تا 12 شب) / am : (12 شب تا 12 ظهر)</div>
                        <div class="error mt-4"> @error('from') {{ $message }} @enderror</div>
                    </div>
                    <div class="mb-10 col-12 col-md-4 float-start p-2">
                        <label class="required form-label">{{ __('index.to') }}</label>
                        <input wire:model="to" type="time" class="form-control fs-3 mb-2"/>
                        <div class="mt-4"> pm : (12 ظهر تا 12 شب) / am : (12 شب تا 12 ظهر)</div>
                        <div class="error mt-4"> @error('to') {{ $message }} @enderror</div>
                    </div>

                    <div class="fv-row col-md-12 p-1 float-start">
                        <button type="button" wire:click="save()" class="btn btn-primary float-end">
                            <span class="indicator-label">{{__('index.save')}}</span>
                            <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
