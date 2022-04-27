<div class="truncate mr-5">

    @if (session()->has('message'))
    <span class="text-green-800 w-100 block rounded p-3 mb-3 bg-green-200">{{ session('message') }}</span>
    @endif

    <div class="g-col-12 g-col-lg-9 g-col-xxl-10">
        <!-- BEGIN: File Manager Filter -->
        <div class="intro-y flex justify-end">
            <button onclick="Livewire.emit('openModal', 'file-upload-form')"
                class="btn btn-primary flex mr-2 shadow-md me-2 mb-2">Upload New Files
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-plus w-4 h-4 ml-2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </button>

            <button class="btn btn-danger flex  shadow-md me-2 mb-2" wire:click="Delete">Delete Files
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-trash w-5 h-5 ml-2">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                </svg>
            </button>
        </div>
        <!-- END: File Manager Filter -->
        <!-- BEGIN: Directory & Files -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 grid-flow-row gap-3 p-2 mt-5">

            @forelse ($files as $key=>$file)
            <label for="file{{ $key }}">
                <div class="intro-y relative shadow-md">
                    <div class="file box rounded-2 px-5 pt-8 pb-5  px-sm-5 position-relative zoom-in">
                        <div class="absolute start-0 top-0 mt-3 ms-3">
                            <input class="form-check-input border border-gray-500 mt-0" type="checkbox"
                                id="file{{ $key }}" wire:model="images" value="{{ $file->id }}">
                        </div>
                        <a class="w-4/5 file__icon file__icon--image mx-auto">
                            <div class="file__icon--image__preview image-fit">
                                <img alt="{{ $file->name }}" src="{{ $file->link }}" class="object-contain">
                            </div>
                        </a>


                    </div>
                </div>
            </label>
            @empty
            <p class="  col-span-4 text-center text-gray-400 text-xl">Nothing is stored now!</p>
            @endforelse


        </div>
        {{ $files->links() }}
        <!-- END: Directory & Files -->

    </div>

</div>