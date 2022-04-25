<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-danger w-32 mr-2 mb-2']) }}>
    {{ $slot }}
</button>