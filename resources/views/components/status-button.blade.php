<span {{ $attributes }} class="p-2 rounded-lg cursor-pointer 
    {{ $status == 0 ? 'text-green-600 bg-green-200' : 'text-red-600 bg-red-200' }}">

    {{ $status == 0 ? 'Active' : 'Inactive' }}
</span>