<div class="bg-white p-6 rounded-lg shadow-lg shadow-indigo-300">
    <span class="text-3xl font-bold">Users</span>
    <div class="flex flex-row mb-4 justify-between mt-4">
        <div class="flex justify-between items-baseline">
            <span>Per Page: &nbsp;</span>
            <select wire:model="perPage" class="form-control">
                <option>10</option>
                <option>15</option>
                <option>25</option>
            </select>
        </div>

        <div class="">
            <input wire:model="search" class="bg-indigo-100 p-2 rounded-lg shadow-xs shadow-indigo-300" type="text"
                   placeholder="Search users...">
        </div>
    </div>

    <div class="">
        <table class="table-fixed w-full">
            <thead>
            <tr>
                <th>
                    <div class="flex flex-row justify-between">
                        <a wire:click.prevent="sortBy('name')" role="button" href="#">
                            Name
                        </a>
                        @include('partials._sort-icon', ['field' => 'name'])

                    </div>
                </th>
                <th>
                    <div class="flex flex-row">
                        <a wire:click.prevent="sortBy('email')" role="button" href="#">
                            Email
                        </a>
                        @include('partials._sort-icon', ['field' => 'email'])
                    </div>
                </th>
                <th>
                    <div class="flex flex-row">
                        Devices / Backups
                    </div>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr class="hover:bg-indigo-200 border-indigo-300 border-b-2">
                    <td class="p-2 ">{!! $user->name !!}</td>
                    <td class="p-2">{!! $user->email !!}</td>
                    <td class="p-2">{{ count($user->devices) }} / {{ count($user->backups)}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex items-baseline mt-4 justify-between">
        <div class="">
            {{ $users->links() }}
        </div>

        <div class="right-0 text-gray-600 ">
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} out of {{ $users->total() }} results
        </div>
    </div>
</div>
