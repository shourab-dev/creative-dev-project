<div>
    <div class="flex justify-between my-3">
        <x-intro info="Edit Portfolio" />
        <button wire:click="updatePortfolio" class="btn btn-primary intro-x">Update Portfolio</button>
    </div>
    <hr>
    @if (session()->has('message'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{{ session('message') }}</span>
    @endif
    <div class="md:grid md:grid-cols-2 gap-5">
        <x-input placeholder="Credit Text" wire:model.lazy="text" />
        <x-input placeholder="My Portfolio Link" wire:model.lazy="link" />
    </div>
</div>