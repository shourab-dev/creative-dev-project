<div>
    <x-intro info="Promo Modal & Preloaders" />
    <hr class="my-3">
    <div class="grid md:grid-cols-2">
        <div>
            <h3 class="my-3 font-medium text-md">Promo Modals</h3>
            <div class="form-check form-switch">
                <input id="checkbox-switch-7" class="form-check-input" type="checkbox" value="0"
                    wire:model="modalStatus">
                <label class="form-check-label" for="checkbox-switch-7"> {{ $modalStatus == 1 ? 'Active' : 'De-active'
                    }}</label>
            </div>
        </div>
        @if ($modalStatus == 1)

        <div>
            <div class="header_img my-3">
                @if ($modalImg)
                <img src="{{ asset($modalImg) }}" alt="promo modal img" class="m-h-[200px]">
                @endif
                <x-file-input label="Promo Modal Image"
                    wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'image']) }})" />
            </div>

        </div>
        @endif



    </div>
    <div>
        <h3 class="my-3 font-medium text-md">Preloader on Start</h3>
        <div class="form-check form-switch">
            <input id="checkbox-switch-7" class="form-check-input" type="checkbox" value="0" wire:model="preloader">
            <label class="form-check-label" for="checkbox-switch-7"> {{ $preloader == 1 ? 'Active' : 'De-active'
                }}</label>
        </div>
    </div>
</div>