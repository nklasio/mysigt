<div class="bg-white p-6 rounded-lg shadow-lg overflow-x-scroll">
    <span class="text-3xl font-bold">Users</span>
    <div class="flex flex-row mb-4 justify-between mt-4">
        <div class="flex justify-between ">
            Per Page: &nbsp;
            <select wire:model="perPage" class="form-control">
                <option>10</option>
                <option>15</option>
                <option>25</option>
            </select>
        </div>

        <div class="">
            <input wire:model="search" class="bg-gray-200 p-2 rounded-lg shadow-xs" type="text" placeholder="Search Contacts...">
        </div>
    </div>

    <div class="">
        <table class="w-full" >
            <thead>
                <tr>
                    <th>
                        <div class="flex flex-row">
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
                            #Devices / #Backups
                        </div>
                    </th>
                    <th>
                        <div class="flex flex-row">
                            Role
                        </div>
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="hover:bg-blue-200 rounded-lg ">
                    <td class="p-2">{{ $user->name }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">{{ count($user->devices) }} / {{ count($user->backups)}}</td>
                    <td class="p-2 text-right">
                        @if (count($user->roles) > 0)
                        {{ $user->roles[0]->name }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col">
            {{ $users->links() }}
        </div>

        <div class="col text-right text-muted">
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} out of {{ $users->total() }} results
        </div>
    </div>
</div>
