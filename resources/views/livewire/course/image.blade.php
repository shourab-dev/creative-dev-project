<div class="px-3 py-4">
    <div class="flex justify-between my-3">
        <x-intro info="Select an Image" />
        @if ($type == 'thumbnail')
        <div class="btn btn-primary" wire:click="setThumbNail">Select</div>
        @elseif ($type == 'image')
        <div class="btn btn-primary" wire:click="setImage">Select</div>
        @elseif ($type == 'featureImg')
        <div class="btn btn-primary" wire:click="setFeatureImage">Select fea</div>
        @endif
    </div>
    <hr class="mb-4">

    <div class="files grid grid-cols-5 grid-flow-row gap-1">
        @forelse ($files as $file)
        <div class="relative">
            <input type="radio" id="file{{ $file->id }}" class="absolute top-2 " value="{{ $file->link }}"
                wire:model="img" name="file">
            <label for="file{{ $file->id }}">
                <img src="{{ $file->link}}" alt="{{ $file->name }}" class="w-[5rem] h-[5rem] object-cover">
            </label>
        </div>
        @empty
        <p class="col-span-5 text-center">No Images Found!</p>
        @endforelse

    </div>
</div>