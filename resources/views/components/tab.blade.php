@props([
    'active' => false,
    'href' => '#'
])

<li role="tab" class="flex">
    @if ($active)
        <span
            {{ $attributes->merge([
                'class' => 'w-full text-center group relative inline-flex h-12 items-center justify-center overflow-hidden rounded-md border px-6 font-medium transition-all duration-100 
                [box-shadow:0px_0px_rgb(82_82_82)] mt-0.5 bg-gray-900 text-white'
            ]) }}
        >
            {{ $slot }}
        </span>
    @else
        <a
            href="{{ $href }}"
            {{ $attributes->merge([
                'class' => 'w-full text-center group relative inline-flex h-12 items-center justify-center overflow-hidden rounded-md border px-6 font-medium transition-all duration-100 
                border-neutral-200 text-neutral-600 [box-shadow:5px_5px_rgb(82_82_82)] 
                hover:translate-x-[3px] hover:translate-y-[3px] hover:[box-shadow:0px_0px_rgb(82_82_82)]'
            ]) }}
        >
            {{ $slot }}
        </a>
    @endif
</li>
