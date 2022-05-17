<div class="px-3 py-2">
    <div class="mb-2 flex justify-between">
        <x-intro info="Add Social Link" />
        <button wire:click="addSocial" class="btn btn-primary  intro-x">Save</button>
    </div>
    <x-input placeholder="Bootstrap Icon ex: (facebook)" wire:model.lazy="icon" />
    <x-input placeholder="Social Link" wire:model.lazy="link" />
    <hr>
</div>