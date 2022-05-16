<div>
    <div class="flex justify-between my-3">
        <x-intro info="Customize Footer" />
        <button wire:click="updateFooter" class="btn btn-primary intro-x">Update Footer</button>
    </div>
    @if (session()->has('message'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{{ session('message') }}</span>
    @endif
    <hr>

    <div class="footer_img my-5">
        @if ($footerLogo)
        <img src="{{ asset($footerLogo) }}" alt="img">
        @endif
        <x-file-input label="Footer Logo"
            wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'image']) }})" />
    </div>
    <div class="footerMoto my-4">
        <x-input placeholder="Footer Moto" wire:model.lazy="footerMoto" />
    </div>
    <div class="footerAddress my-4">
        <x-input placeholder="Footer Moto" wire:model.lazy="footerAddress" />
    </div>
    <div class="copyright my-4">
        <x-input placeholder="Footer Moto" wire:model.lazy="copyright" />
    </div>

</div>