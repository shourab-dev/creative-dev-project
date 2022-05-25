<div>
    <div class="my-3 justify-between flex items-center">
        <x-intro info="Faculty Profile" />
        <div class="flex gap-10">
            <div class="form-check form-switch">
                <input id="checkbox-switch-7" class="form-check-input" type="checkbox" value="true" wire:model="status">
                <label class="form-check-label" for="checkbox-switch-7"> {{ $status == 'true' ? 'Active' : 'De-active'
                    }}</label>
            </div>
            <button class="btn btn-primary" wire:click="saveFaculty">Save My Profile</button>
        </div>
    </div>
    <hr>
    @if (session()->has('message'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{{ session('message') }}</span>
    @endif

    <div class="form_input mt-3">
        @if ($facultyImg)
        <img src="{{ $facultyImg }}" alt="" class=" max-h-[250px]">
        @endif
        <x-file-input label="Faculty Profile Image"
            wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'image']) }})" />

        <x-input placeholder="Name" wire:model.lazy="name" />
        <x-input placeholder="Designation" wire:model.lazy="designation" />

        <div class="bg-white px-2 py-4 my-5">

            <p class="font-semibold">Choose Departments</p>
            <br>
            @foreach ($departments as $dp)
            <label class="mr-4">
                <input type="checkbox" wire:model="departmentsId" value="{{ $dp->id }}" class="mr-2">
                {{ $dp->name }}
            </label>
            @endforeach
        </div>




        <textarea class="w-full h-32" wire:model.lazy="speciality" placeholder="Speacialized Areas"></textarea>
        <textarea class="w-full h-32" wire:model.lazy="education" placeholder="Education"></textarea>

        <div class="marketplace my-4">
            @if ($marketPlace)
            <div class="grid grid-cols-6 my-2">
                @foreach (json_decode($marketPlace)->marketPlace as $marketPlace)
                <img src="{{ $marketPlace }}" alt="">
                @endforeach
            </div>
            @endif
            <x-file-input label="Select Marketplace" wire:click.prevent="$emit('openModal', 'course.market-place')" />
            @error('marketPlace')
            <span class="text-red-600">{{ $message }}</span>
            @enderror



        </div>
    </div>
</div>