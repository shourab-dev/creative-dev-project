<div class="overflow-x-auto">
    <table class="table text-center border mt-4 intro-y">
        <thead>
            <tr class="bg-blue-600 text-white lg:text-lg">
                <th class="whitespace-nowrap">#</th>
                <th class="whitespace-nowrap">Department Name</th>
                <th class="whitespace-nowrap">Status</th>
                <th class="whitespace-nowrap">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($departments as $department)
            <tr class="{{ $loop->even ? 'bg-gray-200' : '' }}">
                <td>{{ ++$loop->index }}</td>
                <td class="uppercase">{{ $department->name }}</td>
                <td>
                    <x-status-button status="{{ $department->status }}"
                        wire:click="changeStatus({{ $department->id }})" />
                </td>
                <td>
                    <a class="group text-blue-600 flex align-items-center justify-center" href="javascript:;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-check-square w-4 h-4 mr-2 transition-all transform group-hover:scale-150">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg> Edit
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <p class="text-center text-md text-gray-400">No Departments Added Yet!</p>
                </td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>