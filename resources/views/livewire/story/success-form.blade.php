<div class="px-2 py-3">
    <x-intro info="Add Success Story" />
    <hr class="my-2">

    <x-input wire:model="iframe" placeholder="Iframe Link" />
    <button class="btn btn-primary w-full rounded-none" wire:click="saveStory">Save Success Stories</button>
</div>