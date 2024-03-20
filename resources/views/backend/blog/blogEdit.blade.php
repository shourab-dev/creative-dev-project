<x-app-layout>
    <x-intro info="All Blogs" />
    <hr class="my-2">
    <div class="overflow-auto">
        <table class="table">
            <tr>
                <td>#</td>
                <td>Blog Image</td>
                <td>Blog Title</td>
                <td>Blog Detail</td>
                <td>Actions</td>
            </tr>
            @foreach ($blogs as $blog)
            <tr>
                <td>{{ ++$loop->index }}</td>
                <td>
                    <img src="{{ $blog->thumbnail }}" alt="">
                </td>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->short_detail }}</td>
                <td>
                    <a href="{{ route('blog.edit.item' , $blog->id  ) }}" class="btn btn-sm btn-primary my-1">Edit</a>
                    <a href="{{ route('blog.trending.item', $blog->id) }}" data-id="{{ $blog->id }}"
                        class="btn btn-sm btn-warning  my-1">
                        
                        {{ $blog->trending == 0 ? "Set Trending" : 'Trending' }}
                    </a>
                    <span data-id="{{ $blog->id }}" class="btn btn-sm btn-danger btn__delete my-1">Delete</span>

                    <form action="{{ route('blog.delete.item', $blog->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
    @push('js')
    <script src="{{ asset('backend/js/sweetalert2@11.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        let el = $('.btn__delete');
        el.click(function(){
            // let id = $(this).attr('data-id');
            Swal.fire({
                    title: "Delete",
                    text: "Are you sure",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).next('form').submit();
                    
                    }
                    })
        });
      
    </script>
    @endpush
</x-app-layout>