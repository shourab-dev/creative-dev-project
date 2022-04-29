<div class="p-2 py-3">
    <div class="flex justify-between align-middle">
        <x-intro info="Add Department" />

        <button class=" btn btn-primary" wire:click="departmentstore">Add +</button>
    </div>
    <hr class="my-2 block">

    <x-input placeholder="Department Name" wire:model.lazy="name" />

</div>