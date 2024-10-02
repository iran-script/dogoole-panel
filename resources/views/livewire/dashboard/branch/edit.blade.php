<div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row">
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('index.set branch logo') }}</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                 data-kt-image-input="true">
                                <div class="image-input-wrapper w-150px h-150px">
                                    @if ($image)
                                        <img class="img-fluid" src="{{ $image->temporaryUrl() }}">
                                    @else
                                        @if($beforeImage)
                                            <img class="img-fluid" src="{{$beforeImage}}">
                                        @else
                                            <img class="img-fluid"
                                                 src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                        @endif
                                    @endif
                                </div>
                                <div class="error mt-4"> @error('image') {{ $message }} @enderror</div>
                                <label type="button" class="btn btn-primary mt-3 btn-sm" for="image">
                                    <span class="indicator-label">{{__('index.select image')}}</span>
                                    <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </label>
                                <input type="file" class="d-none opacity-0" wire:model="image" id="image"/>
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('index.cover') }}</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                 data-kt-image-input="true">
                                <div class="image-input-wrapper w-150px h-150px">
                                    @if ($cover)
                                        <img class="img-fluid" src="{{ $cover->temporaryUrl() }}">
                                    @else
                                        @if($beforeCover)
                                            <img class="img-fluid" src="{{$beforeCover}}">
                                        @else
                                            <img class="img-fluid"
                                                 src="{{ asset('panel/assets/media/svg/files/blank-image.svg')}}">
                                        @endif
                                    @endif
                                </div>
                                <div class="error mt-4"> @error('cover') {{ $message }} @enderror</div>
                                <label type="button" class="btn btn-primary mt-3 btn-sm" for="cover">
                                    <span class="indicator-label">{{__('index.select cover')}}</span>
                                    <span class="indicator-progress">{{__('index.please wait...')}}
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </label>
                                <input type="file" class="d-none opacity-0" wire:model="cover" id="cover"/>
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        @if(session('role_id')==1)
                            <div class="card-body pt-0">
                                <div class="mb-10 fv-rowp-1 col-12 float-start">
                                    <label class="required form-label">{{ __('index.category main') }}</label>
                                    <select class="form-select mb-2" wire:model="categoryIdLevel1"
                                            wire:change="getChildCategory($event.target.value)">
                                        <option value="0">{{__('index.select')}}</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category['id']}}">{{$category['title']}}</option>
                                        @endforeach
                                    </select>
                                    <div class="error mt-4"> @error('categoryId') {{ $message }} @enderror</div>
                                </div>
                            </div>
                            @if($categoryLevel2List)
                                <div class="card-body pt-0">
                                    <div class="mb-10 fv-rowp-1 col-12 float-start">
                                        <label class="required form-label">{{ __('index.category main level 2') }}</label>
                                        <select class="form-select mb-2" wire:model="categoryId">
                                            <option value="0">{{__('index.select')}}</option>
                                            @foreach($categoryLevel2List as $categoryL2)
                                                <option value="{{$categoryL2['id']}}">{{$categoryL2['title']}}</option>
                                            @endforeach
                                        </select>
                                        <div class="error mt-4"> @error('categoryId') {{ $message }} @enderror</div>
                                    </div>
                                </div>
                            @endif
                        @endif
                        @if(session('role_id')!=6)
                            <div class="card-body pt-0">
                                <div class="mb-10 fv-rowp-1 col-12 float-start">
                                    <label class="required form-label">{{ __('index.area ') }}</label>
                                    <select class="form-select mb-2" wire:change="changeArea($event.target.value)"
                                            wire:model="areaId1">
                                        <option value="0">{{__('index.select')}}</option>
                                        @foreach($areas as $area)
                                            <option value="{{$area['id']}}">{{$area['title']}}</option>
                                        @endforeach
                                    </select>
                                    <div class="error mt-4"> @error('areaId') {{ $message }} @enderror</div>
                                </div>
                            </div>
                            @if($areasLevel2)
                                <div class="card-body pt-0">
                                    <div class="mb-10 fv-rowp-1 col-12 float-start">
                                        <label class="required form-label">{{ __('index.area2 ') }}</label>
                                        <select class="form-select mb-2" wire:model="areaId">
                                            <option value="0">{{__('index.select')}}</option>
                                            @foreach($areasLevel2 as $areaItem)
                                                <option value="{{$areaItem['id']}}">{{$areaItem['title']}}</option>
                                            @endforeach
                                        </select>
                                        <div class="error mt-4"> @error('areaId') {{ $message }} @enderror</div>
                                    </div>
                                </div>
                            @endif
                            <div class="error mt-4"> @error('areaId') {{ $message }} @enderror</div>
                        @endif
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-row col-12 p-1 float-start text-start">
                                @php
                                    $user=json_decode(session('user'),true);
                                @endphp
                                @if($user['role_id']==1 || $user['role_id']==6)
                                    <label class="required form-label">{{ __('index.status') }}</label>
                                    <select class="form-select mb-2" wire:model="status">
                                        <option value="">انتخاب کنید</option>
                                        @foreach($branchStatus as $status)
                                            <option value="{{ $status }}">{{ __('index.'.$status) }}</option>
                                        @endforeach
                                        {{--@foreach($productStatus as $status)
                                            <option value="{{$status}}">{{__('index.'.$status)}}</option>
                                        @endforeach--}}
                                    </select>
                                    <div class="error mt-4"> @error('status') {{ $message }} @enderror</div>
                                @endif
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 fv-rowp-1 col-12 float-start">
                                <label class=" form-label">{{ __('index.activities') }}</label>
                                <select class="form-select mb-2" wire:model="activitiesSelect" multiple>
                                    @foreach($activities as $activity)
                                        <option value="{{$activity['id']}}">{{$activity['title']}}</option>
                                    @endforeach
                                </select>
                                <div class="error mt-4"> @error('activitiesSelect') {{ $message }} @enderror</div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-1 fv-row p-1 col-12 float-start">
                                <label class=" form-label">{{ __('index.meal') }}</label>
                                <select class="form-select mb-2" wire:model="mealsSelected" multiple>
                                    @foreach($meals as $meal)
                                        <option value="{{$meal['id']}}">{{__('index.'.$meal['title'])}}</option>
                                    @endforeach
                                </select>
                                <div class="error mt-4"> @error('mealsSelected') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ __('index.general') }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="mb-10 col-md-6 float-start p-2">
                                <label class="required form-label">{{ __('index.branch name') }}</label>
                                <input wire:model="branchName" type="text" class="form-control fs-3 mb-2 "
                                       placeholder="" value=""/>
                                <div class="error mt-4"> @error('branchName') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 col-md-6 float-start p-2">
                                <label class="form-label">{{ __('index.min order') }}</label>
                                <input wire:model="branchMinOrder" type="text" class="form-control fs-3 mb-2 "/>
                                <div class="error mt-4"> @error('branchMinOrder') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10 fv-row">
                                <label class=" form-label">{{ __('index.branch full discription') }}</label>
                                <textarea wire:model="description" type="text"
                                          class="form-control fs-3 mb-2"></textarea>
                                <div class="error mt-4"> @error('description') {{ $message }} @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-body pt-0">
                            <div class="mb-1 fv-row p-1 col-md-4 float-start">
                                <label class=" form-label">{{ __('index.cash back') }}</label>
                                <select class="form-select mb-2" wire:model="cashBackStatus">
                                    <option value="0">{{__('index.no')}}</option>
                                    <option value="1">{{__('index.yes')}}</option>
                                </select>
                                <div class="error mt-4"> @error('cashBackStatus') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-1 fv-row p-1 col-md-4 float-start">
                                <label class=" form-label">{{ __('index.cash back percent') }}</label>
                                <input wire:model="cashBackPercent" type="number" max="100"
                                       class="form-control fs-3 mb-2"/>
                                <span>درصورت وارد کردن صفر اعمال نخواد شد</span>

                                <div class="error mt-4"> @error('cashBackPercent') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-1 fv-row p-1 col-md-4 float-start">
                                <label class=" form-label">{{ __('index.cash back max price') }}</label>
                                <input wire:model="cashBackMaxPrice" type="number" class="form-control fs-3 mb-2"/>
                                <span>درصورت وارد کردن صفر اعمال نخواد شد</span>
                                <div class="error mt-4"> @error('cashBackMaxPrice') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10">
                                <label class="form-label">{{ __('index.branch meta small discription') }}</label>
                                <textarea wire:model="branchMetaSm" id="1" cols="30" rows="4"
                                          class="form-control fs-3 mb-2"
                                          placeholder="{{ __('index.type small discription for your branch') }}"></textarea>
                                <div class="error mt-4"> @error('branchMetaSm') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-10">
                                <label class="form-label">{{ __('index.address') }}</label>
                                <textarea wire:model="branchAddress" cols="30" rows="4"
                                          class="form-control fs-3 mb-2"
                                          placeholder="{{ __('') }}"></textarea>
                                <div class="error mt-4"> @error('branchAddress') {{ $message }} @enderror</div>
                            </div>
                            @livewire("dashboard.component.map",['lat'=>$lat, 'lng'=>$lng])
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" wire:click="setChange()">
                            <span class="indicator-label"
                                  wire:loading.class="d-none">{{ __('index.save changes') }}</span>
                            <span class="indicator-progress" wire:loading>{{__('index.Please wait...')}}
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
