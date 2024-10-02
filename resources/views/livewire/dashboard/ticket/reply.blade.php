<div>
    @section('title-b',__('index.edit tiket'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                        <div class="card card-flush py-4 mb-5">
                            <div class="d-flex mb-4 ps-7 pt-3"></div>
                            <div class="card-body">
                                <div class="d-flex flex-wrap gap-2 justify-content-between mb-8">
                                    <div>
                                        <h2 class="fw-bolder me-3 my-1 pb-6">{{__('index.ticket subject')}}{{$tickets['subject']}}</h2>
                                        <span class="fw-semibold me-3 my-1 fs-5">{{__('index.ticket id')}}( {{$tickets['id']}} )</span>
                                    </div>
                                    <div class="d-flex flex-column flex-end">
                                        <span
                                            class="fw-semibold text-muted text-end me-3">{{jdate($tickets['created_at'])}}</span>
                                        <span
                                            class="badge badge-light-primary my-1 me-2">{{$tickets['category']['title']}}</span>
                                    </div>
                                </div>
                                <div class="separator my-6"></div>
                                <div data-kt-inbox-message="message_wrapper">
                                    <div class="d-flex flex-wrap gap-2 flex-stack cursor-pointer"
                                         data-kt-inbox-message="header">
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            <span class="fw-bold text-gray-900 ps-5">
                                                <span class="text-muted">{{__('index.ticket user created')}}</span>
                                                {{$tickets['user']['name']??''}}  {{$tickets['user']['family']??''}}</span>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            @if($tickets['child'])
                                                <span
                                                    class="my-1 me-2 fw-bold fs-6"> {{__('index.ticket status')}}</span>
                                                <br>
                                                <span
                                                    class="badge py-3 px-4 fs-7 badge-light-info my-1 me-2 fw-bold">{{__('index.'.$tickets['child'][count($tickets['child']) - 1]['status'])}}</span>
                                            @else
                                                <span
                                                    class="my-1 me-2 fw-bold fs-6"> {{__('index.ticket status')}}</span>
                                                <span
                                                    class="badge py-3 px-4 fs-7 badge-danger my-1 me-2 fw-bolder">{{__('index.'.$tickets['status'])}}</span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="p-5">
                                        <div class="ticket-text fs-3">{!! $tickets['text']?? '' !!}</div>
                                    </div>
                                </div>
                                @if($tickets['file'])
                                    <div class="separator my-6"></div>
                                    <span class="fs-4 p-1">پیوست ها:</span>
                                    <a href="{{$tickets['file']??''}}">دانلود فایل</a>
                                @endif
                            </div>
                        </div>
                        <br>
                        @if($tickets['child'])
                            @forelse($tickets['child'] as $child)
                                <div class="card card-bordered p-5 m-5">
                                    <div class="d-flex flex-wrap gap-2 justify-content-between">
                                                    <span class="fw-bold text-gray-900 ps-5"><span
                                                            class="text-muted">{{__('index.ticket user submited')}}</span>
                                                        {{$child['user']['name']??' '}} {{$child['user']['family']??' '}}
                                                    </span>
                                        <span class="fw-semibold text-muted text-end float-end p-3">( {{jdate($child['created_at'])}} ) </span>
                                    </div>
                                    <div class="ticket-text p-3 fs-2">{!! $child['text'] !!}</div>
                                    @if($child['file']!= null)
                                        <div class="separator my-6"></div>
                                        <span class="fs-4 p-1">پیوست ها:</span>
                                        <a href="{{$child['file']}}">دانلود فایل</a>
                                    @else
                                    @endif
                                </div>

                            @empty
                            @endforelse
                        @endif
                        <div class="card card-flush py-4 m-5">
                            <div class="card-body">
                                <div class="mb-10 fv-row col-12 col-md-12 p-1 float-start">
                                    @livewire('dashboard.component.editor',['text'=>$text])
                                </div>


                                <div class="mb-10 fv-row col-md-3 p-1 float-start">
                                    <label type="button" class="btn btn-warning mt-3 btn-sm" for="fileupload">
                                        <span class="indicator-label">{{__('index.select file')}}</span>
                                    </label>
                                    <input type="file" id="fileupload" class="d-none opacity-0" wire:model="file"/>
                                    <div class="error mt-4">@error('file') {{ $message }} @enderror</div>
                                </div>

                                <div class="mb-7 col-12 fv-row col-md-12 p-1 float-start">
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
            </form>
        </div>
    </div>
</div>
