<div>
    <div class="flex justify-between align-middle my-3">
        <x-intro info="Edit {{ $course->title }} Course" />
        <div>
            <button class="btn btn-primary"
                wire:click="$emit('openModal', 'course.add-features', {{ json_encode(['courseId' => $course->id]) }})">Add
                Features
                +</button>
            <button class="btn btn-primary intro-y" wire:click="editCourse">Save Course</button>
        </div>
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

    <div class="grid md:grid-cols-3 gap-4">
        <div class="basic">
            <x-input placeholder="Prerequisites" wire:model.lazy="basic" />
            @error('basic')
            <span class="text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="marketplace my-4">
            <div class="grid grid-cols-6 my-2">
                @foreach (json_decode($selectMarketPlace)->marketPlace as $marketPlace)
                <img src="{{ $marketPlace }}" alt="">
                @endforeach
            </div>
            <button class="btn btn-primary" wire:click="$emit('openModal', 'course.market-place')">Add Market Places
                +</button>
            @error('selectMarketPlace')
            <span class="text-red-600">{{ $message }}</span>
            @enderror



        </div>
        <div class="software my-4">
            <div class="grid grid-cols-6 my-2">
                @foreach (json_decode($selectSoftware)->software as $software)
                <img src="{{ $software }}" alt="">
                @endforeach
            </div>
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



    {{-- feature part --}}
    <hr class="mt-5">
    <x-intro info="Feature Part" />
    <hr>
    <div class="grid md:grid-cols-2  sm:gap-2 md:gap-[5rem] mt-10">
        @foreach ($course->features as $feature)
        <div class="feature">

            <form method="POST" action="{{ route('course.feature.update', $feature->id) }}">
                @csrf
                @method('PUT')
                @if ($feature->feature_image)
                <img src="{{ $feature->feature_image }}" alt="" class="mx-auto">
                @endif

                <x-file-input label="Feature Image" wire:model="feature_img"
                    wire:click.prevent="$emit('openModal', 'course.image', {{ json_encode(['name' => 'featureImg']) }})" />
                <x-input type="hidden" value="{{ $feature_img ? $feature_img :  $feature->feature_image }}"
                    name="feature_img" />
                <x-input name="feature_title" placeholder="Feature Title" value="{{ $feature->title }}" />
                @error('feature_title')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
                <div wire:ignore><textarea name="feature_detail" class="summernote">{{ $feature->details }}</textarea>
                </div>
                @error('feature_detail')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
                <div class="mt-3">

                    <div class="mt-2">
                        <div class="form-check form-switch">
                            <input id="status{{ $feature->id }}" class="form-check-input" type="checkbox" name="status"
                                {{ $feature->status == true ? 'checked' : '' }}>
                            <label class="form-check-label p-2 text-lg" for="status{{ $feature->id }}">Status</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary float-right my-3">Save Changes</button>
            </form>

        </div>
        @endforeach
    </div>



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


        $('.summernote').summernote({
            height: 250,
            focus:true,
            dialogsInBody: true,
        });

        
       
</script>
@endpush