<div class="px-3 py-1">
    <div class="flex justify-between mb-2">
        <x-intro info="Edit Facility" />
        <button class="btn btn-primary btn-sm intro-x" wire:click="updateFaciity">Update</button>
    </div>
    <hr>

    <div class="form">
        <div>
            <img src="{{ $editImage }}" alt="" class="h-32">
            <x-file-input label="Facility Image"
                wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'image']) }})" />
        </div>
        <x-input placeholder="Facility Tite" wire:model.lazy="editTitle" />
        <x-input placeholder="Facility Detail" wire:model.lazy="editDetail" />
    </div>
</div>