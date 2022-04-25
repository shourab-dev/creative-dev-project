<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary px-5 mr-1 mb-2']) }}>
    {{ $slot }}
</button>