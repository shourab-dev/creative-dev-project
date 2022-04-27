{{-- all Banner trashed Items --}}

<div class="overflow-x-auto">
    @if (session()->has('message'))
    <span class="w-full block py-3 px-2 bg-green-300 mb-3 text-green-700">{{ session('message') }}</span>
    @endif
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th class="text-nowrap">#</th>
                <th class="text-nowrap">Banner Image</th>
                <th class="text-nowrap">Banner Title</th>
                <th class="text-nowrap">Username</th>
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
                <td class="w-[5%]">Shourab
                    <br>
                    <span>{{ Carbon\Carbon::parse($banner->created_at)->format('d/m/y') }}</span>
                </td>

                <td class="w-[15%]">
                    <div class="grid grid-cols-2">
                        <a wire:click="restoreBanner({{ $banner->id }})"
                            class="text-green-600 flex align-items-center me-3" href="javascript:;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" icon-name="rotate-ccw" data-lucide="rotate-ccw"
                                class="lucide lucide-rotate-ccw ">
                                <path d="M3 2v6h6"></path>
                                <path d="M3 13a9 9 0 103-7.7L3 8"></path>
                            </svg> Restore
                        </a>
                        <a wire:click="confirmForceDelete({{ $banner->id }})"
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
                            </svg> Permanent Delete
                        </a>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-md text-gray-600">No Banners in trash!</td>
            </tr>
            @endforelse


        </tbody>
    </table>
    <span>{{ $banners->links() }}</span>
</div>