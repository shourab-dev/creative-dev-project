<div class="courseDescription">

    <div class="flex justify-between align-middle my-3">
        <x-intro info="Add Course" />
        <button class="btn btn-primary intro-y" wire:click="saveCourse">Save Course</button>
    </div>
    <hr>
    @if (session()->has('message'))
    <span class="bg-green-200 text-green-700 block py-3 px-2">
        {{ session('message') }}
    </span>
    @endif
    <div class="grid md:grid-cols-3 gap-4">
        <div>
            <x-input wire:model.debounce.300ms="title" placeholder="Course Title" />
            @error('title')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <x-input wire:model="slug" placeholder="Slug" />


        <div>
            <select class="h-[3rem] my-3 w-[100%]" wire:model="department_id">
                <option value="" selected>Select Department --- </option>
                @forelse ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
                @empty
                <option disabled selected>No Department Found!</option>
                @endforelse
            </select>
            @error('department_id')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

    </div>


    <div class="grid md:grid-cols-4 gap-4">
        <x-input placeholder="Moto" wire:model="moto" />
        <x-input placeholder="Class Duration" wire:model="duration" />
        <x-input placeholder="Total Lectures" wire:model="totalClass" />
        <x-input placeholder="Total Projects" wire:model="project" />
    </div>

    <div class="grid md:grid-cols-2 mt-3 gap-2">
        <div>
            @if ($thumbnail)
            <img src="{{ $thumbnail }}" alt="" class="w-2/5 object-cover rounded">
            @endif
            <x-file-input label="Thumbnail Image" wire:model="thumbnail"
                wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'thumbnail']) }})" />
            @error('thumbnail')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div>
            @if ($image)
            <img src="{{ $image }}" alt="" class="w-2/5 rounded">
            @endif
            <x-file-input label="Course Image" wire:model="image"
                wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'image']) }})" />
            @error('image')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>

    </div>

    <x-input wire:model.lazy="iframe" placeholder="Iframe Link (Not Required!)" />



    <label for="detail" wire:ignore>
        Course Detail
        <textarea name="detail" id="detail" class="summernote">{{ $detail }}</textarea>
        @error('detail')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </label>

    <label class="my-3 block">
        <span class="block mb-2">Course Demand</span>
        <textarea wire:model="demand" class="block w-full h-[200px]" placeholder="Course Demand"></textarea></label>


    <div class="grid md:grid-cols-3 gap-4">
        <div class="basic">
            <x-input placeholder="Prerequisites" wire:model.lazy="basic" />
            @error('basic')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="marketplace my-4">
            @if ($selectMarketPlace)
            <div class="grid grid-cols-6 my-2">
                @foreach (json_decode($selectMarketPlace)->marketPlace as $marketPlace)
                <img src="{{ $marketPlace }}" alt="">
                @endforeach
            </div>
            @endif
            <button class="btn btn-primary" wire:click="$emit('openModal', 'course.market-place')">Add Market Places
                +</button>
            @error('selectMarketPlace')
            <span class="text-red-600">{{ $message }}</span>
            @enderror

        </div>
        <div class="software my-4">
            @if ($selectSoftware)
            <div class="grid grid-cols-6 my-2">
                @foreach (json_decode($selectSoftware)->software as $software)
                <img src="{{ $software }}" alt="">
                @endforeach
            </div>
            @endif
            <button class="btn btn-primary" wire:click="$emit('openModal', 'course.softwares')">Add SoftWares
                +</button>
            @error('selectSoftware')
            <span class="text-red-600">{{ $message }}</span>
            @enderror

        </div>
    </div>


    <label for="detail" wire:ignore>
        Course Oppurtunity
        <textarea name="opportunity" id="opportunity" class="opportunity">{{ $opportunity }}</textarea>
        @error('opportunity')
        <span class="text-red-600">{{ $message }}</span>
        @enderror
    </label>



    <hr class="mt-10 mb-4">
    <x-intro info="Add Feature" />
    <hr class="my-4">
    <div class="grid lg:grid-cols-2 gap-4">
        <div>
            <x-input placeholder="Feature Title" wire:model.lazy="featureTitle" />
        </div>
        <div>
            @if ($featureImg)
            <img src="{{ $featureImg }}" alt="" class="w-2/5 rounded">
            @endif
            <x-file-input label="Feature Image"
                wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'featureImg']) }})" />
        </div>
    </div>

    <label for="detail" wire:ignore>
        Feature Details
        <textarea name="featureDetail" id="featureDetail" class="featureDetail">{{ $featureDetail }}</textarea>
        @error('featureDetail')
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
    $('#opportunity').summernote({
        height: 250,
        focus:true,
        dialogsInBody: true,
        callbacks: {
        onChange: function(contents) {
        // console.log('onChange:', contents);
        @this.set('opportunity', contents);
        }
        }
        });
    $('#featureDetail').summernote({
        height: 250,
        focus:true,
        dialogsInBody: true,
        callbacks: {
        onChange: function(contents) {
        // console.log('onChange:', contents);
        @this.set('featureDetail', contents);
        }
        }
        });
</script>
@endpush