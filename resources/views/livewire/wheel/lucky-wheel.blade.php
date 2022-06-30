<div>
    <div>
        <div class="grid md:grid-cols-4 items-center gap-4">
            <div class="search_lead">
                <label>
                    Search Lead
                    <x-input placeholder="(Name / Phone / Email)" wire:model.debounce.300ms="search" />
                </label>
            </div>
            <div class="from_date">
                <label>
                    From Date
                    <x-input type="date" wire:model="fromDate" />
                </label>
            </div>
            <div class="to_date">
                <label>
                    To Date
                    <x-input type="date" wire:model="toDate" />
                </label>
            </div>
            <div class="download_btn">
                <br>
                <button class="w-full py-3 bg-blue-700 text-white hover:bg-blue-800"
                    wire:click="download">Download</button>
            </div>

        </div>
        <hr>

        <div class="mt-8">
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
                                Number
                            </th>
                            <th scope="col" class="text-sm font-medium  px-6 py-4 text-left">
                                Discount
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{$loop->iteration + $contacts->firstItem() -1}}

                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $contact->name }}
                            </td>
                           
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <span>{{ $contact->discount }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $contacts->links() }}
        </div>
    </div>
</div>