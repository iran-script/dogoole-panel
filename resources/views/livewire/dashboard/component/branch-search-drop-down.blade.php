<div class="relative p-2">
    <input
        type="text"
        class="form-control form-control-solid"
        placeholder="{{__('index.Search Branch...')}}"
        wire:model.live.debounce.500ms="search" wire:change="refreshData()"
    />

    <div wire:loading class="absolute w-1/3 bg-white rounded-lg shadow w-100 searching-select-box">
        <ul class="divide-y-2 divide-gray-100">
            <li class="p-2 hover:bg-blue-600 hover:text-blue-200 ">
                {{__('index.Searching...')}}
            </li>
        </ul>
    </div>

    @if(!empty($search))
        <div class="w-1/3 bg-white rounded-lg shadow searching-select-box">
            @if(!empty($branches))
                <ul class="divide-y-2 divide-gray-100 p-0 mb-0">
                    <select class="form-control form-control-solid" wire:model="$parent.branchId">
                        <option class="p-2 hover:bg-blue-600 hover:text-blue-200" value="null">{{__('index.select')}}</option>
                        @foreach($branches as $i => $branch)
                            <option value="{{$branch['id']}}" class="p-2 hover:bg-blue-600 hover:text-blue-200">
                                {{$branch['title']}}
                            </option>
                        @endforeach
                    </select>

                </ul>
            @else
                <div class="list-item">No results!</div>
            @endif
        </div>
    @endif
</div>
