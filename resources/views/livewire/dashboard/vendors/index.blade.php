<div>
    @section('title-b',__('index.vendor register list'))
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-5 mb-xl-8">
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                            <thead>
                            <tr class="fw-bold text-muted">
                                <th class="min-w-100px">{{ __('index.first-name') }} {{ __('index.and') }} {{ __('index.family') }}</th>
                                <th class="min-w-100px">{{ __('index.phone') }}</th>
                                <th class="min-w-100px">{{ __('index.national_code') }}</th>
                                <th class="min-w-100px">{{ __('index.tel') }}</th>
                                <th class="min-w-100px">{{ __('index.birthday') }}</th>
                                <th class="min-w-100px">{{ __('index.referral code') }}</th>
                                <th class="min-w-100px">{{ __('index.address') }}</th>
                                <th class="min-w-120px text-end">{{ __('index.Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody class="fw-bold text-gray-700 fs-lg-4">
                            @if($vendors)
                                @forelse($vendors as $vendor)
                                    <tr>
                                        <td>
                                            {{$vendor['name']}}   {{$vendor['family']}}
                                        </td>
                                        <td>
                                            {{$vendor['mobile']}}
                                        </td>
                                        <td>
                                            {{$vendor['national_code']}}
                                        </td>
                                        <td>
                                            {{$vendor['tel']}}
                                        </td>
                                        <td>
                                            {{$vendor['birthday']}}
                                        </td>
                                        <td>
                                            {{$vendor['referral_code']}}
                                        </td>
                                        <td>
                                            {{$vendor['address']}}
                                        </td>
                                        <td class="text-end">
                                            @if($vendor['socials'])
                                                @foreach(json_decode($vendor['socials'],true) as $item)
                                                    <a href="{{$item['link']??""}}" title="{{$item['name']??""}}"
                                                       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm m-1">
                                                        <i class="ki-duotone ki-fasten fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </a>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">
                                            <p class="fw-bold align-middle fs-3qx text-center pt-10">{{ __('index.no data to show') }}</p>
                                            <div class="text-center pb-15 px-5">
                                                <img src="{{asset('panel/assets/media/illustrations/sketchy-1/2.png')}}" alt=""
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

