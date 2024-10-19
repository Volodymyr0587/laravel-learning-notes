<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ auth()->user()->name }}'s resource types
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div
                class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
                <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white rounded-none bg-clip-border">

                    <x-alerts.alert messageType="success"
                                    messageColor="green"
                                    title="Success!"
                                    class="mb-2" />

                    <div class="flex items-center justify-between gap-8 mb-8">
                        <div>
                            <h5
                                class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                Resource types list
                            </h5>
                            <p
                                class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                                See information about all resource types
                            </p>
                        </div>
                        <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
                            <button
                                class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                view all
                            </button>
                            <a href="{{ route('resource-types.create') }}"
                                class="flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" stroke-width="2" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M13.75 5.00001V2.25001L14.1716 2.25001L14.2516 2.24985C14.5773 2.24891 14.9288 2.2479 15.2555 2.38322C15.5822 2.51854 15.83 2.7678 16.0596 2.99875L16.1161 3.05546L18.9445 5.88389L19.0013 5.94038C19.2322 6.17 19.4815 6.41783 19.6168 6.74452C19.7521 7.07122 19.7511 7.42271 19.7502 7.74838L19.75 7.82843V8.25001H17C16.036 8.25001 15.3884 8.24841 14.9054 8.18347C14.4439 8.12143 14.2464 8.01421 14.1161 7.88389C13.9858 7.75357 13.8786 7.55608 13.8165 7.09462C13.7516 6.61158 13.75 5.96402 13.75 5.00001Z" fill="#FFFFFF"></path> <path d="M12.25 5.05201L12.25 2.25001L8.948 2.25001C8.04953 2.24998 7.30031 2.24995 6.70552 2.32992C6.07773 2.41432 5.51093 2.59999 5.05546 3.05546C4.59999 3.51093 4.41432 4.07773 4.32992 4.70553C4.24995 5.30029 4.24997 6.04956 4.25 6.94801V16.75H4.75V16C4.75 14.7574 5.75736 13.75 7 13.75C8.24264 13.75 9.25 14.7574 9.25 16V16.75H10C11.2426 16.75 12.25 17.7574 12.25 19C12.25 20.2426 11.2426 21.25 10 21.25H9.25V21.75H15.052C15.9505 21.75 16.6997 21.7501 17.2945 21.6701C17.9223 21.5857 18.4891 21.4 18.9445 20.9446C19.4 20.4891 19.5857 19.9223 19.6701 19.2945C19.7501 18.6997 19.75 17.9505 19.75 17.052L19.75 9.75001L16.948 9.75001C16.0495 9.75004 15.3003 9.75006 14.7055 9.6701C14.0777 9.58569 13.5109 9.40002 13.0555 8.94455C12.6 8.48908 12.4143 7.92228 12.3299 7.29449C12.2499 6.69971 12.25 5.95049 12.25 5.05201Z" fill="#FFFFFF"></path> <path d="M8 16C8 15.4477 7.55228 15 7 15C6.44772 15 6 15.4477 6 16V18H4C3.44772 18 3 18.4477 3 19C3 19.5523 3.44772 20 4 20H6V22C6 22.5523 6.44772 23 7 23C7.55228 23 8 22.5523 8 22V20H10C10.5523 20 11 19.5523 11 19C11 18.4477 10.5523 18 10 18H8V16Z" fill="#FFFFFF"></path> </g></svg>
                                Add resource type
                            </a>
                        </div>
                    </div>
                    <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
                        <div class="block w-full overflow-hidden md:w-max">
                            <nav>
                                <ul role="tablist"
                                    class="relative flex flex-row p-1 rounded-lg bg-blue-gray-50 bg-opacity-60">
                                    <li role="tab"
                                        class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                                        data-value="all">
                                        <div class="z-20 text-inherit">
                                            &nbsp;&nbsp;All&nbsp;&nbsp;
                                        </div>
                                        <div class="absolute inset-0 z-10 h-full bg-white rounded-md shadow">
                                        </div>
                                    </li>
                                    <li role="tab"
                                        class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                                        data-value="monitored">
                                        <div class="z-20 text-inherit">
                                            &nbsp;&nbsp;Monitored&nbsp;&nbsp;
                                        </div>
                                    </li>
                                    <li role="tab"
                                        class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                                        data-value="unmonitored">
                                        <div class="z-20 text-inherit">
                                            &nbsp;&nbsp;Unmonitored&nbsp;&nbsp;
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="w-full md:w-72">
                            <div class="relative h-10 w-full min-w-[200px]">
                                <div
                                    class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-blue-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                        </path>
                                    </svg>
                                </div>
                                <input
                                    class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                                    placeholder=" " />
                                <label
                                    class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                    Search
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- TABLE --}}
                <div class="p-6 px-0">
                    <table class="w-full mt-4 text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        ID
                                    </p>
                                </th>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Name
                                    </p>
                                </th>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Updated at
                                    </p>
                                </th>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Manage
                                    </p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($resourceTypes as $resourceType)
                            <tr>
                                <td class="p-4 border-b border-blue-gray-50">
                                    {{ $resourceType->id }}
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    {{ $resourceType->name }}
                                </td>

                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $resourceType->updated_at->format('d-m-Y H:i') }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <a href="{{ route('resource-types.edit', $resourceType) }}">
                                    <button
                                        class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                        type="button">
                                        <span
                                            class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" aria-hidden="true" class="w-4 h-4">
                                                <path
                                                    d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z">
                                                </path>
                                            </svg>
                                        </span>
                                    </button>
                                </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="p-4">
                                    <span class="font-bold">No data.</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- END TABLE --}}
                {{-- PAGINATION --}}
                <div class="flex items-center justify-between pb-6 px-4">
                    {{-- Previous Page Button --}}
                    @if ($resourceTypes->onFirstPage())
                        <button
                            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            disabled>
                            Previous
                        </button>
                    @else
                        <a href="{{ $resourceTypes->previousPageUrl() }}"
                            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75">
                            Previous
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    <div class="flex items-center gap-2">
                        @foreach(range(1, $resourceTypes->lastPage()) as $page)
                            @if ($page == $resourceTypes->currentPage())
                                <button
                                    class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg border border-gray-900 text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    disabled>
                                    <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                        {{ $page }}
                                    </span>
                                </button>
                            @else
                                <a href="{{ $resourceTypes->url($page) }}"
                                    class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10">
                                    <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                        {{ $page }}
                                    </span>
                                </a>
                            @endif
                        @endforeach
                    </div>

                    {{-- Next Page Button --}}
                    @if ($resourceTypes->hasMorePages())
                        <a href="{{ $resourceTypes->nextPageUrl() }}"
                            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75">
                            Next
                        </a>
                    @else
                        <button
                            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            disabled>
                            Next
                        </button>
                    @endif
                </div>
                {{-- END PAGINATION --}}
            </div>
        </div>
    </div>
</x-app-layout>
