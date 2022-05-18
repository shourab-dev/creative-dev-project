<div>
    <x-intro info="Our Facilities" />
    <hr class="my-1">
    @if (session()->has('message'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{{ session('message') }}</span>
    @endif
    <div class="grid  md:grid-cols-2">
        <div class="col-span-1">
            @if ($facilityImage)
            <img src="{{ asset($facilityImage) }}" alt="Facility Image">
            @endif
            <x-file-input label="Facility Image"
                wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'image']) }})" />
        </div>
        <div>
            <x-input placeholder="Facility Title" wire:model.lazy="facilityTitle" />
            <textarea class="w-full rounded min-h-[10rem]" placeholder="Facility Detail"
                wire:model.lazy="facilityDetail"></textarea>
            <button class="btn btn-primary mt-3" wire:click="saveFacility">Save Facility</button>
        </div>
    </div>


    <x-intro info="All Facilities" />
    <hr>
    <div class="mt-8 grid gap-4 md:grid-cols-3 grid-flow-row">
        @foreach ($facilities as $facility)
        <div class=" rounded px-3 py-2 border-2 border-blue-200 relative group">
            <img src="{{ $facility->image }}" alt="{{ $facility->title }}">
            <h4 class="my-3">{{ $facility->title }}</h4>
            <p>{{ $facility->detail }}</p>
            <div
                class="overlay grid rounded place-items-center bg-gray-800/80 absolute inset-0 scale-0 group-hover:scale-100 transition-all">
                <div class="overlay_cnt">
                    <button
                        wire:click="$emit('openModal', 'facilities.edit-facility', {{ json_encode(['facilityId' => $facility->id]) }})"
                        class="px-3 py-1 bg-blue-600 text-white rounded shadow">Edit</button>
                    <button wire:click="deleteFacility({{ $facility->id }})"
                        class="px-3 py-1 bg-red-600 text-white rounded shadow mx-2">Delete</button>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>