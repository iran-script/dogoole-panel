<div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card card-flush py-4">
                <div class="card-header">
                    <div class="card-title">
                    </div>
                </div>
                <div class="card-body text-center pt-0">
                    <div class="row gy-5 g-xl-10">
                        @foreach($shipmentTypes as $key=>$shipmentType)
                            <div class="col-6 col-sm-6 col-xl-2 mb-xl-10 mb-sm-3">
                                <div class="card card-dashed h-lg-100 cursor-pointer">
                                    <label for="type-{{$key}}">
                                        <div
                                            class="card-body d-flex justify-content-between align-items-start flex-column">
                                            <input type="checkbox" id="type-{{$key}}" wire:model="typesselected"
                                                   value="{{$shipmentType['id']}}">
                                            <span
                                                class="fw-semibold mt-2 fs-6 text-gray-500">{{$shipmentType['title']}}</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        <div class="error mt-4"> @error('type') {{ $message }} @enderror</div>
                    </div>
                    <div class="mb-10 fv-row col-12 col-md-12 p-1 float-start">
                        <button type="button" wire:click="setChange()" class="btn btn-primary float-end">
                            <span class="indicator-label">{{__('index.save changes')}}</span>
                            <span class="indicator-progress">{{__('index.please wait...')}}
					    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
