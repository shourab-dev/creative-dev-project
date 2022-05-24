<x-app-layout>
    <x-intro info="Role Management" />
    <hr class="my-3">
    <form action="{{ route('user.role.management.store') }}" method="POST">
        @csrf
        <div class="flex items-center">

            <div class="w-[80%]">
                <x-input placeholder="Role Name" name="role" />
            </div>
            <button class="w-[20%] py-3 bg-blue-700 text-white rounded">Submit</button>
        </div>
    </form>
    @if (session()->has('success'))
    <span class="text-green-700 bg-green-200 px-2 py-3 my-2 w-full block">{{ session('success') }}</span>
    @endif


    <div class="roles grid grid-cols-4 gap-4 my-10">
        @forelse ($roles as $role)
        <div class="card rounded-md shadow-md p-3 bg-white">
            <h3 class="text-lg">{{ str()->headline($role->name) }}</h3>
            <br>
            <a href="{{ route('user.role.management.update', $role->id) }}"
                class="px-2 bg-blue-700 text-white py-1 rounded">Edit</a>
            <a href="#" class="mx-2 bg-green-200 text-green-800 px-2 py-1 rounded">
                Active
            </a>
        </div>
        @empty

        @endforelse
    </div>
</x-app-layout>