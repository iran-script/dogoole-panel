<div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            @if(session('role_id')==1 || session('role_id')==6)
                <div class="card mb-7">
                    <div class="card-body">
                        <h3 class="mb-5 mt-5">{{ __('index.filter') }}</h3>
                        <div class="row">
                            <div class="col-md-3 p-1 float-start">
                                <label class="form-label">{{ __('index.user select') }}</label>
                                @livewire("dashboard.component.user-search-drop-down",['var'=>'userId'])
                            </div>
                            <div class="col-md-1 p-1 align-center align-self-end">
                                <button type="button" wire:click="refreshData"
                                        class="btn btn-primary float-end">{{ __('index.search') }}</button>
                            </div>
                            <div class="col-md-8 p-1 mt-5 align-center align-content-end">

                            </div>
                            <div class="col-11 float-end">
                            </div>
                            <div class="col-1 float-end">
                                <a href="{{route('admin.bankAccount.create')}}" class="btn btn-primary">
                                    <span>{{ __('index.create') }}</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endif
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">{{ __('index.bank account list') }}</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                            <thead>
                            <tr class="fw-bold text-muted">
                                <th class="min-w-30px">{{ __('index.id') }}</th>
                                <th class="min-w-100px">{{ __('index.title') }}</th>
                                <th class="min-w-100px">{{ __('index.account holder name') }}</th>
                                <th class="min-w-100px">{{ __('index.bank name') }}</th>
                                <th class="min-w-120px text-end">{{ __('index.Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($bankAccounts)
                                @forelse($bankAccounts as $bankAccount)
                                    <tr>
                                        <td>
                                            {{$bankAccount['id']}}
                                        </td>
                                        <td>
                                            {{$bankAccount['title']}}
                                        </td>
                                        <td>
                                            {{$bankAccount['account_holder_name']}}
                                        </td>
                                        <td>
                                            {{$bankAccount['bank_name']}}
                                        </td>
                                        <td class="text-end">
                                            <a href="{{route('admin.bankAccount.edit',$bankAccount['id'])}}"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 m-1">
                                                <i class="ki-duotone ki-pencil fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>

                                            <a onclick="destroy({{$bankAccount['id']}})"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm m-1">
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

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

