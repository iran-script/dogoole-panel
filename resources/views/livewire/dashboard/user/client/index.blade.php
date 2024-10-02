<div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-7">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 p-2 float-start">
                            <label class="form-label">{{ __('index.search') }}</label>
                            <input  type="text" class="form-control form-control-solid ps-10" wire:model="search"
                                   value="" placeholder="{{ __('index.search') }}"/>
                        </div>
                        <div class="col-md-3 p-2 float-start">
                            <label class="form-label">{{ __('index.user type') }}</label>
                            <select class="form-select mb-2" wire:model="roleId">
                                <option value="null">{{__('index.select')}}</option>
                                <option value="1">{{__('index.admin')}}</option>
                                <option value="5">{{__('index.driver')}}</option>
                                <option value="4">{{__('index.client')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 float-start">
                        <button type="button" wire:click="refreshData"
                                class="btn btn-primary float-end">{{ __('index.search') }}</button>
                        @if(session('role_id')==1 || session('role_id')==6)

                            <button type="button" wire:click="refreshData(1)"
                                    class="btn btn-info float-end me-2">{{ __('index.export') }}</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">{{ __('index.users list') }}</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                            <thead>
                            <tr class="fw-bold text-muted">
                                <th class="min-w-100px">{{ __('index.first-name') }} {{ __('index.and') }} {{ __('index.family') }}</th>
                                <th class="min-w-100px">{{ __('index.phone') }}</th>
                                <th class="min-w-120px">{{ __('index.role') }}</th>
                                <th class="min-w-120px text-end">{{ __('index.Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody class="fw-bold text-gray-700 fs-lg-4">
                            @if($clients)
                                @forelse($clients as $client)
                                    <tr>
                                        <td>
                                            {{$client['name']}} {{$client['family']}}
                                        </td>
                                        <td>
                                            {{$client['mobile']}}
                                        </td>
                                        <td>
                                            {{ __('index.role'.$client['role_id']) }}
                                        </td>
                                        <td class="text-end">
                                            <a href="{{route('admin.user.client.edit',$client['id'])}}"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm m-1">
                                                <i class="ki-duotone ki-pencil fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                            <a onclick="destroy({{$client['id']}})"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm m-1">
                                                <i class="ki-duotone ki-trash fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                            </a>
                                            <a href="{{route('admin.transaction.index',['userId'=>$client['id']])}}"
                                               title="{{__('index.transaction')}}"
                                               target="_blank"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm m-1">
                                                <i class="ki-duotone ki-wallet fs-2">
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
                                        <td colspan="4">
                                            <p class="fw-bold align-middle fs-3qx text-center pt-10">{{ __('index.no data to show') }}</p>
                                            <div class="text-center pb-15 px-5">
                                                <img src="{{asset('panel/assets/media/illustrations/sketchy-1/2.png')}}"
                                                     alt=""
                                                     class="mw-100 h-200px h-sm-325px">
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            @endif
                            </tbody>
                        </table>
                        {{$clients->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

