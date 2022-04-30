<x-app-layout>
    @push('css')
    <link rel="stylesheet" href="{{ asset('backend/css/summernote-lite.css') }}">
    @endpush
  

    @livewire('course.create-course')


</x-app-layout>