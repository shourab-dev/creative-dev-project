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
    <x-file-input label="Banner Image *" wire:model.lazy="bannerImage"
        error="{{ $errors->get('bannerImage') ? true : null }}" />

    @error('bannerImage')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    <button class="w-full bg-blue-700 py-3 text-white rounded shadow" wire:click="store">Add Banner</button>

</div>