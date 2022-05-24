<x-app-layout>
    <form action="{{ route('user.new.store') }}" method="POST">
        @csrf
        <div class="flex justify-between my-3">
            <x-intro info="Register New User" />
            <button class="btn btn-primary">
                Register User
            </button>
        </div>
        <hr>
        @if (session()->has('success'))
        <span class="w-full block px-2 py-3 bg-green-200 text-green-800">{{ session('success') }}</span>
        @endif

        <x-input name="name" placeholder="User Name" />
        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <x-input name="email" placeholder="User Email" type="email" />
        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <x-input name="password" placeholder="User Password" type="password" />
        @error('password')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <x-input name="confirm_psk" placeholder="Confirm Password" type="password" />
        @error('confirm_psk')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <label class="my-2 block">Select Role</label>
        <select name="roleId" class="w-full">
            @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>




    </form>
</x-app-layout>