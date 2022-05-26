<div class="p-2 py-3">
    <div class="flex justify-between align-middle">
        <x-intro info="Category" />

        <button class=" btn btn-primary" wire:click="departmentUpdate()">Save</button>
    </div>
    <hr class="my-2 block">

    <x-input placeholder="Blog Category Name" wire:model.lazy="dp_name" />

</div>