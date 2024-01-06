@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#D6A7A7] focus:ring-[#D6A7A7] rounded-md shadow-sm']) !!}>
