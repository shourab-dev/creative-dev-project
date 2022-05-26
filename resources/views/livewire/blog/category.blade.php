<div>
    
    <div class="flex justify-between my-2">
        <x-intro info="Blog Category" />
        <button wire:click="$emit('openModal', 'blog.add-category')" class="btn btn-primary">Add Category +</button>
    </div>


    {{-- department table --}}
    <div class="overflow-x-auto">
        @if (session()->has('message'))
        <div class="bg-green-200 text-green-700 px-2 py-4">
            {{ session('message') }}
        </div>
        @endif

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
                        <div class="flex">
                            <a wire:click.prevent="$emit('openModal', 'blog.add-category', {{ json_encode(['dp_id'=> $department->id]) }})"
                                class="group text-blue-600 flex align-items-center justify-center" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-check-square w-4 h-4 mr-2 transition-all transform group-hover:scale-150">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                </svg> Edit
                            </a>
                            <a href="#" class="mx-2 text-red-600"
                                wire:click.prevent="confirmDelete({{ $department->id }})">
                                Delete
                            </a>
                        </div>
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

    @push('js')
    <script src="{{ asset('backend/js/sweetalert2@11.js') }}"></script>
    <script>
        window.addEventListener('swal:confirm', event=> {
                Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                 window.livewire.emit('deleteCategory', event.detail.categoryId);
              
                }
                })
            });
    </script>
    @endpush
</div>