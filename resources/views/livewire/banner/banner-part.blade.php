<div>

    <div class="flex justify-between">
        <x-intro info="Banner Part" />
        <button class="btn btn-primary" wire:click="updateBannerPart">Update</button>
    </div>
    @if (session()->has('message'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{{ session('message') }}</span>
    @endif

    <x-input placeholder="Slogan" wire:model="slogan" />
    @error('slogan')
    <span class="w-full block text-red-700">{{ $message }}</span>
    @enderror
    <x-input placeholder="Primary Heading" wire:model="heading" />
    @error('heading')
    <span class="w-full block text-red-700">{{ $message }}</span>
    @enderror
    <x-input placeholder="Secondary Heading" wire:model="secondaryHeading" />
    @error('secondaryHeading')
    <span class="w-full block text-red-700">{{ $message }}</span>
    @enderror
    <x-input placeholder="Iframe Link" wire:model="iframe" />
    @error('iframe')
    <span class="w-full block text-red-700">{{ $message }}</span>
    @enderror
    <textarea class="w-full h-[200px] block" wire:model="detail" placeholder="Details"></textarea>
    @error('detail')
    <span class="w-full block text-red-700">{{ $message }}</span>
    @enderror
</div>