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
                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach

        </table>
    </div>
</x-app-layout>