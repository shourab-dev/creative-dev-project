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
    </div>
</div>