<div>
    @push('css')
    <link rel="stylesheet" href="{{ asset('backend/css/summernote-lite.css') }}">
    @endpush

    <div class="flex justify-between my-3">
        <x-intro info="Add Blog" />
        <button class="intro-x btn btn-primary" wire:click="saveBlog">Add Post +</button>
    </div>
    <hr>
    @if (session()->has('message'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{{ session('message') }}</span>
    @endif
    <div>
        @if ($thumbnail)
        <img src="{{ $thumbnail }}" alt="" class="max-h-[250px] object-cover rounded">
        @endif
        <x-file-input label="Thumbnail Image" wire:model="thumbnail"
            wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'thumbnail']) }})" />
        @error('thumbnail')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </div>

    <div>
        @if ($featureImg)
        <img src="{{ $featureImg }}" alt="" class="max-h-[300px] rounded">
        @endif
        <x-file-input label="Feature Image"
            wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'featureImg']) }})" />
    </div>

    <h2 class="text-lg ">Select Category</h2>
    <div class="grid md:grid-cols-6 my-4">
        @foreach ($categories as $category)
        <label>
            <input type="checkbox" wire:model="categoryId" value="{{ $category->id }}">
            <span>{{ $category->name }}</span>
        </label>
        @endforeach
    </div>

    @error('featureImg')
    <span class="text-red-600">{{ $message }}</span>
    @enderror
    <x-input placeholder="Blog title" wire:model.lazy="title" />
    @error('title')
    <span class="text-red-600">{{ $message }}</span>
    @enderror
    <x-input placeholder="Blog Keywords (Not Required*)" wire:model.lazy="keywords" />

    <label>
        Short Detail
        <textarea class="w-full rounded border-gray-300" wire:model.lazy="shortDetail"></textarea></label>

    <label for="detail" wire:ignore>
        Blog Detail
        <textarea name="detail" id="detail" class="summernote">{{ $detail }}</textarea>
        @error('detail')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </label>

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
       
    </script>
    @endpush
</div>