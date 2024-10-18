<x-app-layout>
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
                                    <span class="inline-flex items-center rounded-md bg-purple-50 px-2 py-1 text-xs font-medium text-purple-700 ring-1 ring-inset ring-purple-700/10">{{ $note->resource_type }}</span>
                                    <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium {{ $note->completed ? 'bg-green-50 text-green-700 ring-green-600/20' : 'bg-yellow-50 text-yellow-700 ring-yellow-600/20' }} ring-1 ring-inset">{{ $note->completed ? 'completed' : 'in progress' }}</span>
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
                                    <p class="mt-6">{{ $note->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>