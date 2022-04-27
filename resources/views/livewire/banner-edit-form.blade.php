<div class="py-2 px-3">
  <div class="flex justify-between align-middle ">
    <x-intro info="Edit Banner" />
    <button class="btn btn-primary" wire:click="updateBanner({{ $banner_id }})">Update</button>
  </div>
  <hr class="my-3">
  <input type="text" class="w-full  rounded 
      border-gray-300 mb-3" placeholder="Banner Title" wire:model.lazy="title">
  <input type="text" class="w-full  rounded 
      border-gray-300 mb-3" placeholder="Banner Detail" wire:model.lazy="detail">
  <input type="text" class="w-full  rounded 
      border-gray-300 mb-3" placeholder="Banner Button" wire:model.lazy="button">
  <input type="text" class="w-full  rounded 
      border-gray-300 mb-3" placeholder="Banner Link" wire:model.lazy="link">
  <img src="{{ $bannerImage }}" alt="" class="h-[10rem] w-full object-cover rounded-md">

  <span>Choose An Image</span>
  <div class="grid grid-cols-4 relative gap-2 h-[15rem] overflow-y-auto">
    @foreach ($files as $file)

    <div class="image col-span-1 my-2 relative">
      <label>
        <input type="radio" value="{{ $file->link }}" class="absolute top-2 left-1" wire:model="bannerImage"
          name="bannerImg">
        <img src="{{ $file->link }}" alt="" class="h-[5rem] object-cover">
      </label>
    </div>
    @endforeach
  </div>
</div>