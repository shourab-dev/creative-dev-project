<div>

    <div class="flex justify-between my-3">
        <x-intro info="Seminar & Workshop" />
        <button class="btn btn-primary" wire:click="$emit('openModal', 'seminars.seminar-form')">
            Add Semimar/Workshop +
        </button>
    </div>
    <hr>
    @if (session()->has('message'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{{ session('message') }}</span>
    @endif

    {{-- accordian part --}}
    <div class="parent flex  mt-10  mb-5">
        <div class="w-[100%]">
            <div class="accordion" id="accordionExample">
                @foreach ($seminars as $seminar)
                <div class="accordion-item  {{ $seminar->status == 0 ? " bg-red-200" : "bg-white" }} px-3 my-3
                    rounded-md shadow-md relative">
                    <div class="inline-flex rounded-md overflow-hidden shadow-sm absolute z-50 top-2 right-5"
                        role="group">
                        <button wire:click="changeStatus({{ $seminar->id }})" type="button"
                            class="py-2 px-2 text-sm font-medium text-blue-900 bg-white rounded-l-lg border border-blue-200  hover:text-blue-700 ">
                            {{ $seminar->status == 0 ? "De-activated" : "Activated" }}
                        </button>
                        <button type="button" class="py-2 px-2 text-sm font-medium btn-primary"
                            wire:click="$emit('openModal', 'seminars.seminar-form', {{ json_encode(['seminarId'=> $seminar->id ]) }})">
                            Edit Seminar
                        </button>
                        @can('delete seminar')

                        <button wire:click="downloadBackUpLeeds({{ $seminar->id }}, '{{ $seminar->name }}')"
                            type="button" class="py-2 px-2 text-sm font-medium btn-danger">
                            Delete Seminar
                        </button>
                        @endcan

                    </div>
                    <h2 class="accordion-header" id="seminar{{ $seminar->id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#seminar__{{ $seminar->id }}" aria-expanded="true"
                            aria-controls="collapseOne">
                            {{ $seminar->name }} &nbsp; &nbsp; &nbsp; {{
                            Carbon\Carbon::parse($seminar->date)->format('d/m/Y - M') }}
                            &nbsp; &nbsp; &nbsp; Total Leeds: {{ count($seminar->leeds) }}
                        </button>
                    </h2>
                    <div id="seminar__{{ $seminar->id }}"
                        class="accordion-collapse max-h-[30rem] collapse overflow-auto " aria-labelledby="headingOne"
                        data-bs-parent="#seminar{{ $seminar->id }}">
                        <div class="accordion-body text-center">

                            <table class="table  mt-5 relative">
                                <tr class="bg-blue-800 text-white">
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address
                                        <a href="#"
                                            wire:click.prevent="exportLeeds({{ $seminar->id }},'{{ $seminar->name }}')"
                                            title="Download"
                                            class="absolute right-2 p-1 bg-white text-blue-800 top-2 rounded-md"><svg
                                                class="ml-auto" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-corner-right-down d-block mx-auto">
                                                <polyline points="10 15 15 20 20 15"></polyline>
                                                <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                            </svg></a>
                                    </th>
                                </tr>
                                @forelse ($seminar->leeds as $key=>$leed)
                                <tr>
                                    <td>
                                        {{ ++$key }}

                                    </td>
                                    <td>
                                        {{ $leed->name }}
                                    </td>
                                    <td>
                                        {{ $leed->phone }}
                                    </td>
                                    <td>{{ $leed->email }}</td>
                                    <td>
                                        {{ $leed->address }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center font-semibold">No Data Found</td>
                                </tr>
                                @endforelse
                            </table>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    {{ $seminars->links() }}

    {{-- accordian part --}}




    @push('js')
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    @push('js')
    <script src="{{ asset('backend/js/sweetalert2@11.js') }}"></script>
    <script>
        window.addEventListener('swal:confirm', event=> {
                Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                showCloseButton: true,
                confirmButtonColor: '#1E40AF',
                confirmButtonText: 'Backup Leeds',
                showDenyButton: true,
                denyButtonText:"Delete without Backup",
                denyButtonColor: '#E02626',
                }).then((result) => {
                if (result.isConfirmed) {
                 window.livewire.emit('exportLeeds', event.detail.id, event.detail.name);
                } else if(result.isDenied){
                    window.livewire.emit('confirmDelete', event.detail.id);
                }
                })
            });
    </script>

    @endpush
    @endpush
</div>