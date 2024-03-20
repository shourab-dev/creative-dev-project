<div>
    <x-intro info="Home Page Customization" />
    <hr class="my-2">
    @if (session()->has('message'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{{ session('message') }}</span>
    @endif
    <div class="grid md:grid-cols-3 gap-4">

        <label class="my-3 block">
            <span class="text-lg font-medium mb-2  block">
                Choose Banner Style
            </span>
            <select class="w-full" wire:model="bannerStyle">
                <option value="ctg">Sliding Banner</option>
                <option value="dhaka">Static Banner</option>
            </select>
        </label>
        <label class="my-3 block">
            <span class="text-lg font-medium mb-2  block">
                Choose Course Style
            </span>
            <select class="w-full" wire:model="courseStyle">
                <option value="ctg">Filter Course</option>
                <option value="dhaka">Slide Course</option>
            </select>
        </label>
        <label class="my-3 block">
            <span class="text-lg font-medium mb-2  block">
                Choose Seminar Style
            </span>
            <select class="w-full" wire:model="seminarStyle">
                <option value="ctg">Chittagong</option>
                <option value="dhaka">Dhaka</option>
            </select>
        </label>

        <label class="my-3 block">
            <span class="text-lg font-medium mb-2  block">
                Facebook Reviews Status
            </span>
            <select class="w-full" wire:model="facebook">
                <option value="true">Turn On</option>
                <option value="false">Turn Off</option>
            </select>
        </label>




    </div>
    <hr class="my-4">

    @if ($facebook == 'true')
    @if (session()->has('review'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{{ session('review') }}</span>
    @endif
    <div class="py-4">
        <div class="justify-between flex my-2">
            <x-intro info="Facebook Review Sections" />
            <button class="btn btn-primary" wire:click="$emit('openModal', 'customize.facebook-review')">
                Add Facebook +
            </button>
        </div>


        <hr>
        <div class="grid grid-cols-2 gap-4">
            @forelse ($reviews as $review)
            <div class="border">
                {!! $review->iframe !!}
                <button class="btn btn-danger w-full" wire:click="deleteReview({{ $review->id }})">Delete</button>
            </div>
            @empty
            <p>No Review Found</p>
            @endforelse
        </div>
    </div>
    @endif

</div>