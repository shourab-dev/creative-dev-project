<x-app-layout>
    @push('css')
    <link rel="stylesheet" href="{{ asset('backend/css/summernote-lite.css') }}">
    @endpush
    @livewire('course.course-edit', ['course' => $course])
</x-app-layout>