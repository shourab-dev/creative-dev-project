<div class="py-2 px-2">
    <div class="flex justify-between mb-2">
        <x-intro info="Add Roles" />
        <button class="btn  btn-primary" wire:click="saveRole">Add +</button>
    </div>
    <hr>

    <x-input placeholder="Role Name" wire:model.lazy="name" />
    @error('name')
    <span class="text-danger">
        {{ $message }}
    </span>
    @enderror
</div>