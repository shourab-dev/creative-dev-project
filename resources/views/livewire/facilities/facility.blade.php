<div>
    <x-intro info="Our Facilities" />
    <hr class="my-1">
    <div class="grid  md:grid-cols-2">
        <div class="col-span-1">
            @if ($facilityImage)
            <img src="{{ asset($facilityImage) }}" alt="Facility Image">
            @endif
            <x-file-input label="Facility Image"
                wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'image']) }})" />
        </div>
        <div>
            <x-input placeholder="Facility Title" />
            <textarea class="w-full rounded min-h-[10rem]" placeholder="Facility Detail"></textarea>
            <button class="btn btn-primary mt-3">Save Facility</button>
        </div>
    </div>
</div>