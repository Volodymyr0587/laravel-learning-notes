@if (session()->has($messageType))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 10000)"
         x-show="show"
         class="bg-{{ $alertType }}-100 border border-{{ $alertType }}-400 text-{{ $alertType }}-700 px-4 py-3 rounded relative"
         role="alert">
        <strong class="font-bold">{{ $title }}</strong>
        <span class="block sm:inline">{{ session($messageType) }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg @click="show = false" class="fill-current h-6 w-6 text-{{ $alertType }}-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 5.652a1 1 0 10-1.415-1.415L10 7.171 7.068 4.237a1 1 0 10-1.415 1.415l2.932 2.932-2.932 2.932a1 1 0 001.415 1.415l2.932-2.932 2.932 2.932a1 1 0 001.415-1.415l-2.932-2.932 2.932-2.932z"/>
            </svg>
        </span>
    </div>
@endif
