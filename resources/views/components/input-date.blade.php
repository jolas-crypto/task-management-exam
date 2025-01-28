@props([
    'type' => "",
    'label' => "",
    'required' => false,
    'placeholder' => ""
])

<div>
    <label 
    for="{{ $attributes->whereStartsWith('wire:model')->first() }}" 
    class="label"
    >
    {{ $label }}
    </label>
    <div class="relative mt-2 rounded-md shadow-sm">
        <input 
        {{ $attributes->whereStartsWith('wire:model') }}
        id="{{ $attributes->whereStartsWith('wire:model')->first() }}"
        type="{{ $type }}" 
        @error($attributes->whereStartsWith('wire:model')->first())
        class="block w-full rounded-md border-0 py-1.5 px-2 pr-10 text-red-900 ring-1 ring-inset ring-red-300 placeholder:text-red-300 focus:ring-2 focus:ring-inset focus:ring-red-500 sm:text-sm sm:leading-6" 
        @else
        class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-300 sm:text-sm sm:leading-6"
        @endif
        placeholder="{{ $placeholder }}" 
        @error($attributes->whereStartsWith('wire:model')->first())
        aria-invalid="true" 
        aria-describedby="email-error"
        @enderror
        >
    </div>
</div>