<div>

    <div class="flex justify-between my-3">
        <x-intro info="Customize Header" />
        <button class="btn btn-primary intro-x" wire:click="updateHeader">Update Header</button>
    </div>
    @if (session()->has('message'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{{ session('message') }}</span>
    @endif
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
        <x-input placeholder="Header Phone Number" wire:model.lazy="headerPhone" />
    </div>
    <div class="header_email">

        <x-intro info="Header Email Address" />
        <x-input placeholder="Header Email Address" wire:model.lazy="headerEmail" />
    </div>




</div>