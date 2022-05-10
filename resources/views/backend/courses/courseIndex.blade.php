<x-app-layout>
    <div class="flex justify-between my-3">
        <x-intro info="All Running Courses" />
        <a href="{{ route('courses') }}" class="btn btn-primary">Add Courses +</a>
    </div>
    <hr class="intro-y">


    {{-- all Banner Items --}}
    <div class="overflow-x-auto">
        <table class="table table-bordered table-hover text-center">
            <thead>
                <tr>
                    <th class="text-nowrap">#</th>
                    <th class="text-nowrap">Course Image</th>
                    <th class="text-nowrap">Course Title</th>
                    <th class="text-nowrap">Course Module</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                <tr>
                    <td class="w-[5%]">{{ ++$loop->index }}</td>
                    <td class="w-[40%]">
                        <img src="{{ $course->thumbnail }}" alt=""
                            class="w-full  h-[15rem] object-cover object-center rounded-xl" title="Banner">
                    </td>
                    <td class="w-[10%]">{{ $course->title }}</td>
                    <td class="w-[5%]">
                        {{ $course->features_count }}
                    </td>
                    <td class="w-[5%]">
                        <a href="{{ route('course.status', $course->slug) }}">
                            <x-status-button status="{{ $course->status }}" />
                        </a>
                    </td>
                    <td class="w-[5%]">
                        
                            
                            <a class="text-purple-600 flex my-3 "
                                href="{{ route('course.edit', $course->slug) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-check-square w-4 h-4 me-1">
                                    <polyline points="9 11 12 14 22 4"></polyline>
                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                </svg> Edit
                            </a>
                        
                        
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-md text-gray-600">No Courses Uploaded Yet!</td>
                </tr>
                @endforelse


            </tbody>
        </table>
        {{-- <span>{{ $courses->links() }}</span> --}}
    </div>
</x-app-layout>