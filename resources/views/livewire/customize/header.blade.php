<div>
    <div class="flex justify-between my-3">
        <x-intro info="Customize Header" />
        <button class="btn btn-primary intro-x" wire:click="updateHeader">Update Header</button>
    </div>
    <hr>

    {{-- header Image --}}
    <div class="header_img my-3">
        <img src="{{ asset($headerLogo) }}" alt="header logo">
        <x-file-input label="Header Logo"
            wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'image']) }})" />
    </div>
    <hr>
    <div class="header_phone">

        <x-intro info="Header Phone Number" />
        <x-input placeholder="Header Phone Number" wire:model="headerPhone" />
    </div>




</div>