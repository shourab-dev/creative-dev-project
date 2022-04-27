<div class="p-3">

    <x-intro info="File Upload" />

    <input type="file" wire:model="files" class="file:mr-4 file:py-2 file:px-4  file:rounded-full file:border-0
        file:text-sm file:font-semibold file:bg-violet-50 file:text-blue-700 my-4 hover:file:bg-blue-100 w-full "
        multiple id="upload{{ $iteration }}">
    @error('files.*')
    <span class=" text-danger mb-3 block">{{ $message }}</span>
    @enderror
    <button wire:click="save" class="btn btn-primary w-full ">Upload File</button>
</div>