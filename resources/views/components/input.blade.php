@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-yellow-900 focus:border-yellow-700 focus:ring focus:ring-yellow-700 focus:ring-opacity-50']) !!}>
