<div class="relative p-2">
    <input
        type="text"
        class="form-control form-control-solid"
        placeholder="{{__('index.Search User...')}}"
        wire:model.live="search" wire:change="refreshData()"
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
            @if(!empty($users))
                <ul class="divide-y-2 divide-gray-100 p-0 mb-0">
                    <select class="form-control form-control-solid  " wire:model="$parent.userId">
                        <option class="p-2 hover:bg-blue-600 hover:text-blue-200" value="null">{{__('index.select')}}</option>
                        @foreach($users as $i => $user)
                            <option value="{{$user['id']}}" class="p-2 hover:bg-blue-600 hover:text-blue-200">
                                {{ $user['name'] }}
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
