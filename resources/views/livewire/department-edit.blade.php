<div class="p-2 py-3">
    <div class="flex justify-between align-middle">
        <x-intro info="Edit Department" />

        <button class=" btn btn-primary" wire:click="departmentUpdate({{ $dp_id }})">Save</button>
    </div>
    <hr class="my-2 block">

    <x-input placeholder="Department Name" wire:model.lazy="dp_name" />

</div>