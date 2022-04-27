<div class="py-2 px-3">
    <x-intro info="Add New Banner" />
    <hr>
    {{-- <div class="Banner_inputs">
        <input type="text" class="w-full border-gray-300 rounded" placeholder="Banner Title">
    </div> --}}
    <x-input placeholder="Banner Title" wire:model.lazy="bannerTitle" />
    <x-input placeholder="Banner Detail" wire:model.lazy="bannerDetail" />
    <x-input placeholder="Banner Button" wire:model.lazy="bannerButton" />
    <x-input placeholder="Banner Link" wire:model.lazy="bannerLink" />
    @error('bannerImage')
    <span class="block text-danger">{{ $message }}</span>
    @enderror
    <span>Choose An Image</span>
    <div class="grid grid-cols-4 relative gap-2 max-h-[15rem] overflow-y-auto">
        @forelse ($files as $file)

        <div class="image col-span-1 my-2 relative">
            <label>
                <input type="radio" value="{{ $file->link }}" class="absolute top-2 left-1" wire:model="bannerImage"
                    name="bannerImg">
                <img src="{{ $file->link }}" alt="" class="h-[5rem] object-cover">
            </label>
        </div>
        @empty
        <p class="col-span-4 my-2">No Images found in file Manager</p>
        @endforelse
    </div>


    <button class="w-full bg-blue-700 py-3 text-white rounded shadow" wire:click="store">Add Banner</button>

</div>