@props(['type' => '', 'message' => ''])

@if($type === 'success')
    @php
        $color_classes = 'text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400'
    @endphp
@endif
@if($type === 'error')
    @php
        $color_classes = 'text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400'
    @endphp
@endif
<div {{ $attributes->merge(['class' => 'mx-4 mb-4 px-6 py-4 rounded-lg ' . $color_classes]) }} role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
    {{ $message }}
</div>
