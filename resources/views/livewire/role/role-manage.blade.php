<div>
    <div class="flex justify-between my-3">
        <x-intro info="Roles Managements" />
        <button class="btn btn-primary" wire:click="$emit('openModal', 'role.add-roles')">Add New Role +</button>
    </div>
    <div wire:offline class="text-center text-red-600">
        <p>You are offline</p>
    </div>
    <hr>
    @if (session()->has('message'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{{ session('message') }}</span>
    @endif


    <div class="parent flex  mt-10  mb-5">
        <div class="w-[100%]">
            <div class="accordion" id="accordionExample">
                @foreach ($roles as $role)
                <div class="accordion-item  {{ $role->status == 0 ? " bg-red-200" : "bg-white" }} px-3 my-3 rounded-md
                    shadow-md relative">
                    <div class="inline-flex rounded-md overflow-hidden shadow-sm absolute z-50 top-2 right-5"
                        role="group">
                        <button wire:click="changeStatus({{ $role->id }})" type="button"
                            class="py-2 px-2 text-sm font-medium text-blue-900 bg-white rounded-l-lg border border-blue-200  hover:text-blue-700 ">
                            {{ $role->status == 0 ? "De-activated" : "Activated" }}
                        </button>
                        {{-- <button type="button" class="py-2 px-2 text-sm font-medium btn-primary"
                            wire:click="$emit('openModal', 'seminars.seminar-form', {{ json_encode(['seminarId'=> $seminar->id ]) }})">
                            Edit Seminar
                        </button> --}}

                    </div>
                    <h2 class="accordion-header" id="seminar{{ $role->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#seminar__{{ $role->id }}" aria-expanded="true" aria-controls="collapseOne">
                            {{ $role->name }}
                        </button>
                    </h2>
                    <div id="seminar__{{ $role->id }}" class="accordion-collapse max-h-[30rem] collapse overflow-auto "
                        aria-labelledby="headingOne" data-bs-parent="#seminar{{ $role->id }}">
                        <div class="accordion-body text-center">
                            @foreach ($permissions as $permission)

                            <label>
                                <input type="checkbox">
                                {{ $permission->name }}
                            </label>

                            @endforeach


                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

    @push('js')
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    @endpush
</div>