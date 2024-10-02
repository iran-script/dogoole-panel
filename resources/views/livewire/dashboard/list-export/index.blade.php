<div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card card-flush">
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                            <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="minw-80px">{{ __('index.id') }}</th>

                                {{--                                <th class="min-w-100px">{{ __('index.type') }}</th>--}}
                                <th class="min-w-100px">{{ __('index.file') }}</th>
                            </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-900">
                            @forelse($files as $file)
                                <tr>
                                    <td>
                                        {{ $file['id'] ?? '' }}
                                    </td>
                                    {{--                                    <td>--}}
                                    {{--                                        {{ __('index.' . $file['type'] ??'') }}--}}

                                    {{--                                    </td>--}}
                                    <td class="text-start">

                                        <a download="" href="{{$file['file']}}" type="button" class="btn btn-primary">
                                            {{ __('index.download') }}
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">
                                        <p class="fw-bold align-middle fs-3qx text-center pt-10">{{ __('index.no data to show') }}</p>
                                        <div class="text-center pb-15 px-5">
                                            <img src="{{asset('panel/assets/media/illustrations/sketchy-1/2.png')}}"
                                                 alt=""
                                                 class="mw-100 h-200px h-sm-325px">
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{$files->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
