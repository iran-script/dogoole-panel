<div>
    @section('title-b',__('index.create categories'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                        <div class="card card-flush py-4 mb-5">
                            <div class="d-flex mb-4 ps-7 pt-3"></div>
                            <div class="card-body">
                                <div class="mb-10 fv-row col-md-6 p-1 float-start">
                                    <label class="required form-label">{{ __('index.ticket subject') }}</label>
                                    <input wire:model="subject" type="text" class="form-control fs-3 mb-2"/>
                                    <div class="error mt-4"> @error('subject') {{ $message }} @enderror</div>
                                </div>
                                <div class="mb-10 fv-row col-6 p-1 float-start text-start">
                                    <label class="required form-label">{{ __('index.category') }}</label>
                                    <select class="form-select mb-2" wire:model="category_id">
                                        <option value="">{{__('index.select')}}</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category['id']}}">{{$category['title']}}</option>
                                        @endforeach
                                    </select>
                                    <div class="error mt-4"> @error('category_id') {{ $message }} @enderror</div>
                                </div>
                                <div class="mb-10 fv-row col-md-6 p-1 float-start">
                                </div>
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

                                <div class="mb-7 fv-row col-12 col-md-12 p-1 float-start">
                                    <button type="button" wire:click="setChange()" class="btn btn-primary float-end">
                                        <span class="indicator-label">{{__('index.save changes')}}</span>
                                        <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
