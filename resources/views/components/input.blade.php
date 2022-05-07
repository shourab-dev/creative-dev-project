<div class="Banner_inputs my-3">
    <input value="{{ $value }}" name="{{ $name }}" type="{{ $type }}" {{ $attributes }} class="w-full  rounded 
    {{ $error == null ? 'border-gray-300' : 'border-red-500 focus:ring-red-300' }}" placeholder="{{ $placeholder }}">
</div>