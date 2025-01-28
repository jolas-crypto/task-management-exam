@props([
    'label' => '',
    'items',
    'placeholder' => ''
])

<div>
    <label 
        for="type" 
        class="label">
        {{ $label }}
    </label>
    <select 
        {{ $attributes->whereStartsWith('wire:model') }}
        id="{{ $attributes->whereStartsWith('wire:model')->first() }}"
        name="type" 
        class="select-input"
        placeholder="{{ $placeholder }}" 
        >
        @foreach ($items as $key => $item)
            <option value="{{ $key }}">{{ $item }}</option>
        @endforeach
    </select>
</div>