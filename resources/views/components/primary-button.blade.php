@props(['href' => null])

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition duration-300 hover:scale-105 hover:shadow-xl hover:shadow-gray-900/30 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition duration-300 hover:scale-105 hover:shadow-xl hover:shadow-gray-900/30 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none']) }}>
        {{ $slot }}
    </button>
@endif
