<x-app-layout>
    <x-intro info="All Users Tab" />
    <hr class="my-3">
    @if (session()->has('success'))
    <span class="w-full block px-2 py-3 bg-green-200 text-green-800">{{ session('success') }}</span>
    @endif
    <div class="grid md:grid-cols-4 gap-4 mt-16">
        @foreach ($users as $user)
        <div class="card px-4 py-2 bg-white shadow-md rounded-md">
            <form action="{{ route('user.update.role') }}" method="POST">
                @csrf
                <h2 class="text-lg capitalize my-3">{{ $user->name }}</h2>
                <input type="hidden" value="{{ $user->id }}" name="userId">
                <label>
                    Current Role
                    <select name="roleId" class="w-full my-2">
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->roles[0]->id == $role->id ? 'selected' : '' }}
                            >{{ str()->headline($role->name) }}</option>
                        @endforeach
                    </select>
                </label>
                <button class="btn btn-primary btn-sm float-right my-3">Update Role</button>
            </form>
        </div>
        @endforeach
    </div>
    <span>{{ $users->links() }}</span>

</x-app-layout>