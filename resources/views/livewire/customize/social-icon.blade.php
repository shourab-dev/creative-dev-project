<div>
    @push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    @endpush


    <div class="my-3 flex justify-between">
        <x-intro info="Customize Social Icons" />
        <button class="btn btn-primary" wire:click="$emit('openModal', 'customize.add-social-icon')">Add Social Link
            +</button>
    </div>
    @if (session()->has('message'))
    <span class="text-green-700 bg-green-200 py-3 px-2 block w-full">{!! session('message') !!}</span>
    @endif
    <hr>


    <div class="my-8">
        <div id="faq-accordion-1" class="accordion">
            @forelse ($socialIcons as $index=>$icon)
            <div class="accordion-item " wire:key="{{ $loop->index }}">

                <div id="icon-parent-{{ $icon['id'] }}" class="accordion-header my-3 rounded-md ">
                    <button class="shadow px-5 accordion-button flex text-gray-500 bg-white" type="button"
                        data-bs-toggle="collapse" data-bs-target="#social{{ $icon['id'] }}" aria-expanded="true"
                        aria-controls="faq-accordion-collapse-1">
                        <div class="w-[10%]">
                            <i class="{{ $icon['icon'] }}"></i>
                        </div>
                        <div class="w-[90%] flex justify-between">
                            {{ $icon['link'] }}
                            <span class="btn btn-sm {{ $icon['status'] == 1 ? 'btn-primary' : 'btn-danger' }}">
                                {{ $icon['status'] == 1 ? 'Active' : 'De-active' }}</span>
                        </div>

                    </button>
                </div>
                <div id="social{{ $icon['id'] }}" class="accordion-collapse collapse"
                    aria-labelledby="faq-accordion-content-1" data-bs-parent="#icon-parent-{{ $icon['id'] }}">
                    <div class="accordion-body bg-gray-200 p-3 grid md:grid-cols-3 items-center">
                        <x-input placeholder="Social Icon" wire:model.defer="socialIcons.{{ $index }}.icon" />
                        <x-input placeholder="Social Link" wire:model.defer="socialIcons.{{ $index }}.link" />
                        <div class="flex justify-center">
                            <button class="btn btn-primary btn-sm mx-2"
                                wire:click="updateSocial({{ $index }})">Update</button>
                            <button class="btn btn-dark btn-sm mx-2" wire:click="updateStatus({{ $icon['id'] }})">Change
                                Status</button>
                            <button class="btn btn-danger btn-sm mx-2"
                                wire:click="deleteIcon({{ $icon['id'] }})">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            @empty
        </div>
        <p>No social links has been added. You can Add Link from the right top <button
                class="btn btn-primary btn-sm">Add Social Link
                +</button> </p>
        @endforelse

    </div>

    @push('js')
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    @endpush


</div>