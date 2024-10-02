<div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">{{ __('index.slider list') }}</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                            <thead>
                            <tr class="fw-bold text-muted">
                                <th class="min-w-30px">{{ __('index.id') }}</th>
                                <th class="min-w-100px">{{ __('index.title') }}</th>
                                <th class="min-w-100px">{{ __('index.type') }}</th>
                                <th class="min-w-120px text-end">{{ __('index.Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($sliders)
                                @forelse($sliders as $slider)
                                    <tr>
                                        <td>
                                            {{$slider['id']}}
                                        </td>
                                        <td>
                                            {{$slider['title']}}
                                        </td>
                                        <td>
                                            {{__('index.'.$slider['type'])}}
                                        </td>
                                        <td class="text-end">
                                            <a href="{{route('admin.sliders.edit',$slider['id'])}}"
                                               class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 m-1">
                                                <i class="ki-duotone ki-pencil fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                            <a onclick="destroy({{$slider['id']}})"
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

