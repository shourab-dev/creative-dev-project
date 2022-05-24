<x-app-layout>
    <x-intro info="Edit Role & Permission" />
    <hr class="my-3">

    <form action="{{ route('user.role.management.updated',$role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="flex items-center">

            <div class="w-[80%]">
                <x-input placeholder="Role Name" name="role" value="{{ $role->name }}" />
            </div>
            <button class="w-[20%] py-3 bg-blue-700 text-white rounded">Update</button>
        </div>


        <div class="bg-white p-3 grid md:grid-cols-5 gap-5">
            @foreach ($permissions as $permission)
            <label class="mb-3">
                <input type="checkbox" value="{{ $permission->id }}" @foreach ($role->permissions as $oldPermission)
                {{ $oldPermission->id == $permission->id ? 'checked' : '' }}
                @endforeach

                name="permission[]">
                {{ $permission->name }}
            </label>
            @endforeach

        </div>
    </form>

</x-app-layout>