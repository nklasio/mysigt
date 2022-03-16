<div class="flex flex-col justify-between p-4 mt-8  ">
    <div class="flex justify-between  items-baseline flex-col md:flex-row">
        <input wire:model="searchQuery"
               class="bg-white px-4 py-2 mb-3  rounded-lg shadow-xs border-b-2 border-indigo-300 w-full md:w-auto"
               type="text"
               placeholder="search backup by name...">
        <div class="flex right-0 items-baseline">
            <span class="pr-1">Sort by: </span>
            <button class="@if($sortAsc) font-semibold @endif" wire:click="setAsc">Asc</button>
            <span class="px-1">·</span>
            <button class="@if(!$sortAsc) font-semibold @endif" wire:click="setDesc">Desc</button>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 mb-8">
        @foreach ($backups as $backup)
            <div class="flex w-full px-4 pt-4 pb-2 rounded-lg border-b-2 border-indigo-300 bg-white shadow-md shadow-indigo-300">
                <div class="flex w-full flex-col">
                    <div class="flex w-full justify-between">
                        <span class="font-semibold text-lg">{!! Str::limit($backup->name, 20) !!}</span>
                    </div>
                    <div>
                        <span><small>{{$backup->created_at}}</small></span>
                    </div>
                    <div class="flex pt-4 w-full justify-between items-center">
                        <a href="#" class="text-gray-700 text-center w-full border-r-2">Info</a>
                        <a href="{{ route('devicebackup.delete', ['device' =>$backup->device->ecid, 'devicebackup' => $backup]) }}"
                           class="text-red-700 text-center w-full">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $backups->links() }}
</div>