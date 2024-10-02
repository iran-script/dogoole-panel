<div>
    @section('title-b',__('index.show comment'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <div class="card card-flush">
                        <div class="card-body pt-0">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                                    <tbody class="fw-semibold text-gray-600">
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-user fs-2 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>{{ __('index.user')}}</div>
                                        </td>
                                        <td class="fw-bold text-end">
                                            {{$comment['user']['name']??" "}}
                                            - {{$comment['user']['family']??" "}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-calendar fs-2 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>{{ __('index.create time')}}</div>
                                        </td>
                                        <td class="fw-bold text-end">
                                            {{jdate($comment['created_at'])}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-dots-square fs-2 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>{{ __('index.products')}}</div>
                                        </td>
                                        <td class="fw-bold text-end">
                                            @php
                                                $products=json_decode($comment['products'],true);
                                            @endphp
                                            @foreach($products as $product)
                                                <div class="badge
                                                @if($product['rate'] and $product['rate']>4)
                                                badge-light-success
                                                @elseif($product['rate'] and $product['rate']>2)
                                                badge-light-warning
                                                @else
                                                badge-light-danger
                                                @endif
                                                ">
                                                    {{$product['name']}} - {{$product['rate']}}
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-text fs-2 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>{{__('index.text')}}</div>
                                        </td>
                                        <td class="fw-bold text-end">{{$comment['text']}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-shop fs-2 me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>{{__('index.branch')}}</div>
                                        </td>
                                        <td class="fw-bold text-end">{{$comment['branch']['title']??" "}}</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        @if(count($comment)>0)
                            <div class="card-body bg-gray-100 mt-4 mb-5">
                                <h4 class="mb-4">{{__('index.answers')}}</h4>
                                @foreach($comment['child'] as $item)
                                    <div class="row">
                                        {{$item['text']}}
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="card-body pt-0">
                            <div class="mb-3 fv-row col-12 p-1 float-start">
                                <label class="required form-label">{{ __('index.answer text') }}</label>
                                <textarea wire:model="text" class="form-control fs-3 mb-2"></textarea>
                                <div class="error mt-4"> @error('text') {{ $message }} @enderror</div>
                            </div>
                            <div class="fv-row col-md-12 p-1 float-start">
                                <button type="button" wire:click="answer()" class="btn btn-primary float-end">
                                    <span class="indicator-label">{{__('index.answer')}}</span>
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
</div>
