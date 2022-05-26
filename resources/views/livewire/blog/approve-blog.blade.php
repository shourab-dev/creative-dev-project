<div>
    <x-intro info="Approve Post" />
    <hr class="my-2">
    @if (session()->has('message'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{{ session('message') }}</span>
    @endif

    <div class="search">
        <x-input placeholder="Search Here..." wire:model.debounce="search" />
    </div>

    <div class="allBlog">
        @foreach ($blogs as $key=>$blog)

        <div class="w-full bg-white rounded shadow flex py-4">
            <div class="w-[70%] px-4 flex items-center">
                <span class="w-[40px] block text-lg">{{ ++$key }}</span>
                <img src="{{ $blog->thumbnail }}" alt="" class="w-[100px] mr-4 rounded">
                <h3>{{ $blog->title }}</h3>
            </div>
            <div class="w-[30%] flex items-center justify-center">
                <button class="btn btn-primary mx-3" wire:click="approveBlog({{ $blog->id }})">Approve</button>
                <button class="btn btn-danger" wire:click="confirmDelete({{ $blog->id }})">Denied</button>
            </div>
        </div>
        @endforeach
    </div>



    @push('js')
    <script src="{{ asset('backend/js/sweetalert2@11.js') }}"></script>
    <script>
        window.addEventListener('swal:confirm', event=> {
                Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Denied it!'
                }).then((result) => {
                if (result.isConfirmed) {
                 window.livewire.emit('deleteBlog', event.detail.id);
              
                }
                })
            });
    </script>

    @endpush
</div>