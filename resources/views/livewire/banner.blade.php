<div>
    @if (session()->has('message'))
    <span class="w-full block py-3 px-2 bg-green-300 mb-3 text-green-700">{{ session('message') }}</span>
    @endif
    @can('add banner')

    <div class="flex justify-end  md:mb-10 sm:mb-5">
        <button class="btn btn-primary" wire:click="$emit('openModal', 'banner-form')">Add Banner Items
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-plus w-4 h-4 ml-2">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
        </button>
    </div>
    @endcan


    <hr>

    {{-- all Banner Items --}}
    <div class="overflow-x-auto">
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th class="text-nowrap">#</th>
                    <th class="text-nowrap">Banner Image</th>
                    <th class="text-nowrap">Banner Title</th>
                    <th class="text-nowrap">Username</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($banners as $banner)
                <tr>
                    <td class="w-[5%]">{{ ++$loop->index }}</td>
                    <td class="w-[40%]">
                        <img src="{{ $banner->image }}" alt=""
                            class="w-full  h-[15rem] object-cover object-center rounded-xl" title="Banner">
                    </td>
                    <td class="w-[10%]">{{ $banner->title }}</td>
                    <td class="w-[5%]">
                        {{ $banner->added_by }}
                        <br>
                        <span>{{ Carbon\Carbon::parse($banner->created_at)->format('d/m/y') }}</span>
                    </td>
                    <td class="w-[5%]">
                        @can('edit banner')
                        <x-status-button status="{{ $banner->status }}" wire:click="updateStatus({{ $banner->id }})" />
                        @endcan
                    </td>
                    <td class="w-[20%]">
                        <div class="grid grid-cols-2">
                            @can('edit banner')
                            <a wire:click.prevent="$emit('openModal', 'banner-edit-form' , {{ json_encode(['banner_id'=> $banner->id]) }})"
                                class="text-purple-600 flex align-items-center me-3" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-check-square w-4 h-4 me-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                </svg> Edit
                            </a>
                            @endcan
                            @can('delete banner')
                            <a wire:click.prevent="confirmDelete({{ $banner->id }})"
                                class="text-red-600 flex align-items-center text-theme-6" href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 me-1">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path
                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                    </path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg> Delete
                            </a>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-md text-gray-600">No Banners Uploaded Yet!</td>
                </tr>
                @endforelse


            </tbody>
        </table>
        <span>{{ $banners->links() }}</span>
    </div>

</div>