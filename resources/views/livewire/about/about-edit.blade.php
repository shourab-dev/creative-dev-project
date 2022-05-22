<div>
    @push('css')
    <link rel="stylesheet" href="{{ asset('backend/css/summernote-lite.css') }}">
    @endpush
    <div class="flex justify-between my-3">
        <x-intro info="About Section" />
        <button class="btn btn-primary" wire:click="update">
            Update About
        </button>
    </div>
    <hr>

    @if (session()->has('message'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{{ session('message') }}</span>
    @endif

    <div class="my-2 grid grid-cols-2">
        <x-file-input label="Header Logo"
            wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'image']) }})" />
        @if ($img)
        <img src="{{ asset($img) }}" alt="About Creative it" class="w-[50%]">
        @endif

    </div>


    <label for="detail" wire:ignore>
        About Detail
        <textarea name="detail" id="detail" class="summernote">{{ $detail }}</textarea>
        @error('detail')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </label>
    <br><br>
    <label for="mission" wire:ignore>
        About Mission
        <textarea name="mission" id="mission" class="summernote">{{ $mission }}</textarea>
        @error('mission')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </label>
    <br><br>
    <label for="vission" wire:ignore>
        About Vission
        <textarea name="vission" id="vission" class="summernote">{{ $vission }}</textarea>
        @error('vission')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </label>
</div>

@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="{{ asset('backend/js/summernote-lite.js') }}"></script>
<script>
    $('#detail').summernote({
        height: 250,
        focus:true,
        dialogsInBody: true,
        callbacks: {
        onChange: function(contents) {
        // console.log('onChange:', contents);
        @this.set('detail', contents);
        }
        }
        });
    $('#mission').summernote({
        height: 250,
        focus:true,
        dialogsInBody: true,
        callbacks: {
        onChange: function(contents) {
        // console.log('onChange:', contents);
        @this.set('mission', contents);
        }
        }
        });
    $('#vission').summernote({
        height: 250,
        focus:true,
        dialogsInBody: true,
        callbacks: {
        onChange: function(contents) {
        // console.log('onChange:', contents);
        @this.set('vission', contents);
        }
        }
        });
</script>
@endpush