<x-app-layout :title="$note->title . ' - ' . config('app.name')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $note->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:overflow-visible lg:px-0">
                    <div class="absolute inset-0 -z-10 overflow-hidden">
                        <svg class="absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]"
                            aria-hidden="true">
                            <defs>
                                <pattern id="e813992c-7d03-4cc4-a2bd-151760b470a0" width="200" height="200" x="50%"
                                    y="-1" patternUnits="userSpaceOnUse">
                                    <path d="M100 200V.5M.5 .5H200" fill="none" />
                                </pattern>
                            </defs>
                            <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                                <path
                                    d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z"
                                    stroke-width="0" />
                            </svg>
                            <rect width="100%" height="100%" stroke-width="0"
                                fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)" />
                        </svg>
                    </div>
                    <div
                        class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-10">
                        <div
                            class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                            <div class="lg:pr-4">
                                <div class="lg:max-w-lg">
                                    @if ($note->resourceType?->name)
                                    <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">
                                        {{ $note->resourceType->name }}
                                    </span>
                                    @endif
                                    <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium {{ $note->completed ? 'bg-green-50 text-green-700 ring-green-600/20' : 'bg-yellow-50 text-yellow-700 ring-yellow-600/20' }} ring-1 ring-inset">{{ $note->completed ? 'completed' : 'in progress' }}</span>
                                    <a class="inline-flex items-center h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        href="{{ route('notes.edit', $note) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor" aria-hidden="true" class="w-4 h-4 ml-3">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="inline-flex items-center h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        href="{{ route('notes.export', $note) }}">
                                        <svg fill="currentColor" aria-hidden="true" class="w-4 h-4 ml-3" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 367 367" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="XMLID_221_"> <path id="XMLID_222_" d="M175,252.501c-8.285,0-15-6.716-15-15c0-8.284,6.716-15,15-15l65,0.001h30v-16V158.5h-30h-21.213H145 c-8.283,0-15-6.716-15-15V69.713V48.5v-30H15c-8.283,0-15,6.716-15,15v300c0,8.284,6.717,15,15,15h240c8.285,0,15-6.716,15-15 v-50.332v-30.666h-30L175,252.501z"></path> <path id="XMLID_223_" d="M366.925,236.023c-0.022-0.225-0.064-0.442-0.096-0.664c-0.038-0.263-0.068-0.526-0.12-0.786 c-0.051-0.254-0.119-0.499-0.182-0.747c-0.058-0.226-0.107-0.453-0.175-0.677c-0.073-0.242-0.164-0.477-0.249-0.713 c-0.081-0.225-0.155-0.452-0.246-0.674c-0.092-0.221-0.199-0.432-0.301-0.646c-0.107-0.23-0.209-0.46-0.329-0.684 c-0.11-0.205-0.235-0.4-0.355-0.6c-0.132-0.221-0.257-0.443-0.4-0.658c-0.146-0.219-0.31-0.425-0.467-0.635 c-0.136-0.182-0.262-0.368-0.406-0.544c-0.3-0.365-0.616-0.714-0.948-1.049c-0.016-0.016-0.028-0.033-0.045-0.05l-37.499-37.501 c-5.857-5.857-15.355-5.857-21.213,0c-5.858,5.857-5.858,15.355-0.001,21.213l11.893,11.895h-19.641H270v30h12.813h32.974 l-11.893,11.893c-5.858,5.858-5.858,15.355,0,21.213c2.928,2.93,6.768,4.394,10.606,4.394c3.84,0,7.678-1.464,10.607-4.394 l37.498-37.499c0.008-0.008,0.014-0.017,0.022-0.023c0.342-0.343,0.665-0.701,0.972-1.075c0.146-0.177,0.272-0.364,0.409-0.547 c0.156-0.209,0.318-0.414,0.465-0.632c0.145-0.216,0.27-0.441,0.402-0.662c0.117-0.198,0.242-0.392,0.352-0.596 c0.121-0.225,0.223-0.458,0.332-0.688c0.101-0.213,0.207-0.423,0.298-0.643c0.093-0.223,0.167-0.451,0.248-0.678 c0.085-0.234,0.175-0.467,0.247-0.708c0.068-0.225,0.119-0.454,0.176-0.683c0.063-0.246,0.132-0.49,0.182-0.741 c0.052-0.261,0.082-0.524,0.12-0.788c0.032-0.221,0.073-0.438,0.096-0.663c0.048-0.485,0.073-0.973,0.073-1.46 c0-0.007,0.002-0.014,0.002-0.02c0-0.008-0.002-0.017-0.002-0.025C366.998,236.991,366.973,236.506,366.925,236.023z"></path> <polygon id="XMLID_224_" points="261.214,128.5 160,27.287 160,69.713 160,128.5 218.787,128.5 "></polygon> </g> </g></svg>

                                    </a>
                                    <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $note->title }}</h1>
                                </div>
                            </div>
                        </div>
                        <div
                            class="-ml-12 -mt-12 p-12 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">
                            <img class="w-[48rem] max-w-none rounded-xl bg-gray-900 shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem]"
                                src="{{ $note->image ? asset('storage/' . $note->image) : asset('images/default.jpg') }}"
                                alt="">
                        </div>
                        <div
                            class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                            <div class="lg:pr-4">
                                <div class="max-w-xl text-base leading-7 text-gray-700 lg:max-w-lg">

                                    <ul role="list" class="mt-8 space-y-8 text-gray-600">
                                        <li class="flex gap-x-3">
                                            <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M5.5 17a4.5 4.5 0 0 1-1.44-8.765 4.5 4.5 0 0 1 8.302-3.046 3.5 3.5 0 0 1 4.504 4.272A4 4 0 0 1 15 17H5.5Zm3.75-2.75a.75.75 0 0 0 1.5 0V9.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0l-3.25 3.5a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span><strong class="font-semibold text-gray-900">Link to tutorial: </strong>
                                                <a class="text-blue-500 hover:text-blue-900" href="{{ $note->link_to_tutorial }}" target="_blank">{{  $note->link_to_tutorial }}</a>
                                            </span>
                                        </li>

                                        <li class="flex gap-x-3">
                                            <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M5.5 17a4.5 4.5 0 0 1-1.44-8.765 4.5 4.5 0 0 1 8.302-3.046 3.5 3.5 0 0 1 4.504 4.272A4 4 0 0 1 15 17H5.5Zm3.75-2.75a.75.75 0 0 0 1.5 0V9.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0l-3.25 3.5a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span><strong class="font-semibold text-gray-900">Link to resource: </strong>
                                                <a class="text-blue-500 hover:text-blue-900" href="{{ $note->link_to_resource }}" target="_blank">{{  $note->link_to_resource }}</a>
                                            </span>
                                        </li>


                                        <li class="flex gap-x-3">
                                            <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M4.632 3.533A2 2 0 0 1 6.577 2h6.846a2 2 0 0 1 1.945 1.533l1.976 8.234A3.489 3.489 0 0 0 16 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234Z" />
                                                <path fill-rule="evenodd"
                                                    d="M4 13a2 2 0 1 0 0 4h12a2 2 0 1 0 0-4H4Zm11.24 2a.75.75 0 0 1 .75-.75H16a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75h-.01a.75.75 0 0 1-.75-.75V15Zm-2.25-.75a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75h-.01Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span><strong class="font-semibold text-gray-900">Resource name: </strong>
                                                {{ $note->resource_name }}</span>
                                        </li>
                                        <li class="flex gap-x-3">
                                            <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M4.632 3.533A2 2 0 0 1 6.577 2h6.846a2 2 0 0 1 1.945 1.533l1.976 8.234A3.489 3.489 0 0 0 16 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234Z" />
                                                <path fill-rule="evenodd"
                                                    d="M4 13a2 2 0 1 0 0 4h12a2 2 0 1 0 0-4H4Zm11.24 2a.75.75 0 0 1 .75-.75H16a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75h-.01a.75.75 0 0 1-.75-.75V15Zm-2.25-.75a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75h-.01Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span><strong class="font-semibold text-gray-900">Project folder: </strong>
                                                {{ $note->project_folder }}</span>
                                        </li>
                                        <li class="flex gap-x-3">
                                            <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path
                                                    d="M4.632 3.533A2 2 0 0 1 6.577 2h6.846a2 2 0 0 1 1.945 1.533l1.976 8.234A3.489 3.489 0 0 0 16 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234Z" />
                                                <path fill-rule="evenodd"
                                                    d="M4 13a2 2 0 1 0 0 4h12a2 2 0 1 0 0-4H4Zm11.24 2a.75.75 0 0 1 .75-.75H16a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75h-.01a.75.75 0 0 1-.75-.75V15Zm-2.25-.75a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75h-.01Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span><strong class="font-semibold text-gray-900">Database: </strong>
                                                {{ $note->database_name }}</span>
                                        </li>
                                        <li class="flex gap-x-3">
                                            <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M5.5 17a4.5 4.5 0 0 1-1.44-8.765 4.5 4.5 0 0 1 8.302-3.046 3.5 3.5 0 0 1 4.504 4.272A4 4 0 0 1 15 17H5.5Zm3.75-2.75a.75.75 0 0 0 1.5 0V9.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0l-3.25 3.5a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span><strong class="font-semibold text-gray-900">Link to github: </strong>
                                                <a class="text-blue-500 hover:text-blue-900" href="{{ $note->link_to_github_repo }}" target="_blank">{{  $note->link_to_github_repo }}</a>
                                            </span>
                                        </li>
                                        <li class="flex gap-x-3">
                                            <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M5.5 17a4.5 4.5 0 0 1-1.44-8.765 4.5 4.5 0 0 1 8.302-3.046 3.5 3.5 0 0 1 4.504 4.272A4 4 0 0 1 15 17H5.5Zm3.75-2.75a.75.75 0 0 0 1.5 0V9.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0l-3.25 3.5a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span><strong class="font-semibold text-gray-900">Link to source code: </strong>
                                                <a class="text-blue-500 hover:text-blue-900" href="{{ $note->link_to_source_code }}" target="_blank">{{  $note->link_to_source_code }}</a>
                                            </span>
                                        </li>
                                        <li class="flex gap-x-3">
                                            <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M5.5 17a4.5 4.5 0 0 1-1.44-8.765 4.5 4.5 0 0 1 8.302-3.046 3.5 3.5 0 0 1 4.504 4.272A4 4 0 0 1 15 17H5.5Zm3.75-2.75a.75.75 0 0 0 1.5 0V9.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0l-3.25 3.5a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span><strong class="font-semibold text-gray-900">Link to source materials: </strong>
                                                <a class="text-blue-500 hover:text-blue-900" href="{{ $note->link_to_source_materials }}" target="_blank">{{  $note->link_to_source_materials }}</a>
                                            </span>
                                        </li>
                                    </ul>

                                    <h2 class="mt-16 text-2xl font-bold tracking-tight text-gray-900">Description</h2>
                                    {{-- <p class="mt-6">{{ $note->description }}</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="font-inconsolata m-8 p-6 rounded-2xl border-2 border-gary-100 indent-8 tracking-wider text-gray-900 bg-gray-50">
                        {{ $note->description }}
                    </div>

                    {{-- Images slider --}}
                    <div id="default-carousel" class="relative w-full px-8" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            @forelse ($note->images as $image)
                             <!-- Item -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('storage/' . $image->path) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                            @empty
                            <!-- Item -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('images/default.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                            @endforelse
                        </div>
                        @if ($note->images)
                            <!-- Slider indicators -->
                            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                @for ($i = 0; $i < $note->images->count(); $i++)
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{ $i }}" data-carousel-slide-to="{{ $i }}"></button>
                                @endfor
                            </div>
                            <!-- Slider controls -->
                            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-12 cursor-pointer group focus:outline-none" data-carousel-prev>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-12 cursor-pointer group focus:outline-none" data-carousel-next>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        @endif
                    </div>
                    {{-- End Images slider --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
