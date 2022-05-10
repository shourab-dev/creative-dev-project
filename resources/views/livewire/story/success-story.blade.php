<div>
    @if (session()->has('message'))

    <span class="block bg-green-300 text-green-700 py-3 px-2">
        {{ session('message') }}
    </span>
    @endif
    <div class="flex justify-between my-3">
        <x-intro info="Success Story" />
        <button class="btn btn-primary" wire:click="$emit('openModal', 'story.success-form')">Add Success Story
            +</button>
    </div>
    <hr>
    {{-- Page Description --}}
    <label class="my-2 block">
        <span class="text-gray-600 font-medium">Page Description</span>
        <textarea class="text-gray-600 block w-full my-2 rounded h-[15rem] resize-y shadow"
            wire:model.lazy="detail"></textarea>
        <button class="btn btn-primary float-right" wire:click="updateDescription">Update Description</button>
    </label>

    {{-- all success stories --}}
    <div class="mt-[60px]">
        <x-intro info="All Success Stories" />
        <hr class="mb-[20px]">
        <div class="grid grid-cols-3 gap-5 grid-flow-row">
            @forelse ($stories as $story)
            <div class="group card rounded-md shadow-md relative">
                <div>
                    <img src="https://img.youtube.com/vi/{{ $story->iframe_img }}/0.jpg" alt="{{ $story->iframe }}"
                        class="object-cover aspect-video rounded-md">
                </div>
                <div
                    class="flex justify-center absolute items-center h-full  inset-0 bg-gray-500/75 scale-0 group-hover:scale-100 transition-all duration-300">
                    <button class="btn-primary py-2 px-3 mr-2 rounded"
                        wire:click="$emit('openModal', 'story.success-form', {{ json_encode(['storyId'=> $story->id]) }})">Edit</button>
                    <button class="btn-danger py-2 px-3 mr-2 rounded"
                        wire:click="confirmDelete({{ $story->id }})">Delete</button>
                </div>
            </div>
            @empty
            No stories Found!
            @endforelse

        </div>
        <div class="md:w-[20%] mt-5 mx-auto">
            {{ $stories->links() }}</div>
    </div>

    @push('js')
    <script src="{{ asset('backend/js/sweetalert2@11.js') }}">
    </script>
    <script>
        window.addEventListener('confirmDelete', event=> {
    Swal.fire({
    title: event.detail.title,
    text: event.detail.text,
    icon: event.detail.type,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
    if (result.isConfirmed) {
    window.livewire.emit('deleteSuccessStory', event.detail.storyId);

    }
    })
    });
    </script>
    @endpush
</div>