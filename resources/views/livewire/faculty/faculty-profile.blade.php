<div>
    <div class="my-3 justify-between flex">
        <x-intro info="Faculty Profile" />
        <button class="btn btn-primary" wire:click="saveFaculty">Save My Profile</button>
    </div>
    <hr>
    <div class="form_input">
        @if ($facultyImg)
        <img src="{{ $facultyImg }}" alt="">
        @endif
        <x-file-input label="Faculty Profile Image"
            wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'image']) }})" />

        <x-input placeholder="Name" wire:model.lazy="name" />
        <x-input placeholder="Designation" wire:model.lazy="designation" />
        <textarea class="w-full h-32" wire:model.lazy="speciality" placeholder="Speacialized Areas"></textarea>
        <textarea class="w-full h-32" wire:model.lazy="education" placeholder="Education"></textarea>

        <div class="marketplace my-4">
            @if ($marketPlace)
            <div class="grid grid-cols-6 my-2">
                @foreach (json_decode($marketPlace)->marketPlace as $marketPlace)
                <img src="{{ $marketPlace }}" alt="">
                @endforeach
            </div>
            @endif
            <x-file-input label="Select Marketplace" wire:click.prevent="$emit('openModal', 'course.market-place')" />
            @error('marketPlace')
            <span class="text-red-600">{{ $message }}</span>
            @enderror



        </div>
    </div>
</div>