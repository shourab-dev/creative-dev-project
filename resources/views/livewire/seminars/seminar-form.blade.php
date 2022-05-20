<div class="px-2 py-3">
    <div class="flex justify-between mb-2">
        <x-intro info="{{ $seminarId ? 'Seminar Edit' : 'Seminar' }}" />
        <button wire:click="saveOrUpdate" class="px-3 rounded btn-primary btn-sm intro-x">
            {{ $seminarId ? 'Update' : 'Save' }}
        </button>
    </div>
    <hr>

    <div class="form">
        <x-input wire:model="name" placeholder="Seminar Title" />
        @error('name')
        <span class="text-red-500 block">{{ $message }}</span>
        @enderror
        <label>
            Seminar Date
            <x-input wire:model="date" type="date" />
            @error('date')
            <span class="text-red-500 block">{{ $message }}</span>
            @enderror
        </label>
        <label>
            Seminar Time
            <x-input wire:model="time" type="time" />
            @error('time')
            <span class="text-red-500 block">{{ $message }}</span>
            @enderror
        </label>
    </div>
</div>