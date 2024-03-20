<div class="py-2 px-4">
    <div class="justify-between flex my-2">
        <x-intro info="Facebook Review Sections" />
        <button wire:click="saveReview" class="btn btn-primary"
            wire:click="$emit('openModal', 'customize.facebook-review')">
            Add Facebook +
        </button>
    </div>
    <hr>
    <textarea name="review" class="my-2 w-full max-h-20" placeholder="Embeded Link" wire:model.lazy="iframe"></textarea>
</div>