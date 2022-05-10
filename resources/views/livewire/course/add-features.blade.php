<div class="px-3 py-2">
    @if ($feature_img)
    <img src="{{ $feature_img }}" alt="" class="w-[20%] mx-auto">
    @endif
    <x-file-input label="Feature Image" wire:model="feature_img"
        wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'featureImg']) }})" />
    <x-input placeholder="Feature Title" wire:model.lazy="feature_title" />
    <textarea class="w-full " wire:model.lazy="featureDetail"></textarea>
    <button class="btn btn-primary w-full mt-3" wire:click="saveFeatureItem">Add Feature Items</button>

</div>