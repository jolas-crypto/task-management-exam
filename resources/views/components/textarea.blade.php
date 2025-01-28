@props([
    'label' => '',
    'placeholder' => '',
    'name' => ''
])

<div>
    <label 
        for="{{ $attributes->whereStartsWith('wire:model')->first() }}"
        class="label">
        {{ $label }}
    </label>
    <div class="mt-2">
        <textarea 
            {{ $attributes->whereStartsWith('wire:model') }}
            id="{{ $attributes->whereStartsWith('wire:model')->first() }}" 
            name="{{ $name }}" 
            rows="3"
            placeholder="{{ $placeholder }}"
            @error($attributes->whereStartsWith('wire:model')->first())
            class="block w-full rounded-md border-0 py-1.5 px-2 pr-10 text-red-900 ring-1 ring-inset ring-red-300 placeholder:text-red-300 focus:ring-2 focus:ring-inset focus:ring-red-500 sm:text-sm sm:leading-6" 
            @else
            class="textarea-class"
            @endif></textarea>
    </div>
</div>