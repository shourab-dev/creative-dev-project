<div>
    <h1 class="text-xl mt-3 text-center ">Welcome to {{ str()->headline(config('app.name')) }} <span
            class="text-blue-800">{{ str()->headline(Auth::user()->name) }}</span>
    </h1>
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-6">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">General Report</h2>
                    <a href="" class="ml-auto flex items-center text-primary">
                        <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    @forelse ($seminarList as $seminarData)
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user-plus" class="report-box__icon text-primary"></i>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">{{ $seminarData->leeds_count }} <span
                                        class="text-lg">Leads</span></div>
                                <div class="text-base text-slate-500 mt-1">{{ $seminarData->name }}</div>
                                <div class="text-base text-slate-500 mt-1">{{
                                    \Carbon\Carbon::parse($seminarData->date)->format('d-m-y D') }}</div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="col-span-2">No Seminar Found!</p>
                    @endforelse
                </div>

            </div>
            <!-- END: General Report -->


            <!-- BEGIN: General     Report -->

            <!-- END: General Report -->

        </div>
        @can('manage seminar')

        @if (count($seminars) > 0)
        
        <section class="current mt-20">
            <h2 class="intro-y text-lg font-medium">This Week Seminar's Leeds</h2>


            <div class="parent flex  mt-10  mb-5 intro-y">
                <div class="w-[100%]">
                    <div class="accordion" id="accordionExample">
                        @foreach ($seminars as $seminar)

                        <div class="accordion-item  px-3 my-3 bg-white
                            rounded-md shadow-md relative">

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
                                class="accordion-collapse max-h-[30rem] collapse overflow-auto "
                                aria-labelledby="headingOne" data-bs-parent="#seminar{{ $seminar->id }}">
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
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"
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
        </section>
        @endif
        @endcan
        @can('counciling')

        <section class="mt-20">
            <div class="flex justify-between  items-center">
                <h2 class="text-lg intro-y font-medium">{{ \Carbon\Carbon::now()->monthName }} Month All Contact Leeds
                </h2>
                <div class="download_btn w-[200px] intro-y">
                    <br>
                    <button class="w-full py-3 bg-blue-700 text-white hover:bg-blue-800"
                        wire:click="download">Download</button>
                </div>

            </div>
            <hr>
            {{-- {{ \Carbon\Carbon::now()->endOfWeek() }} --}}

            <div class="mt-8 intro-y">
                <div class="overflow-auto">
                    <table class="min-w-full">
                        <thead class="border-b bg-blue-800 text-white">
                            <tr>
                                <th scope="col" class="text-sm font-medium  px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium  px-6 py-4 text-left">
                                    Name
                                </th>
                                <th scope="col" class="text-sm font-medium  px-6 py-4 text-left">
                                    Email
                                </th>
                                <th scope="col" class="text-sm font-medium  px-6 py-4 text-left">
                                    Number
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($currentContact as $contact)
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ ++$loop->index }}

                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $contact->name }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
        @endcan
    </div>


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