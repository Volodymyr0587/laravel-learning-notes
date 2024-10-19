<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ auth()->user()->name }}'s trashed notes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div
                class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
                <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white rounded-none bg-clip-border">

                    <x-alerts.alert messageType="success" messageColor="green" title="Success!" class="mb-2" />

                    <div class="flex items-center justify-between gap-8 mb-8">
                        <div>
                            <h5
                                class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                Trashed Notes list
                            </h5>
                            <p
                                class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                                See information about trashed notes (restore if needed)
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <form  action="{{ route('notes.restore-all') }}" method="POST">
                                @csrf
                                <button
                                    class="flex select-none items-center gap-3 rounded-lg bg-green-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-900/10 transition-all hover:shadow-lg hover:shadow-green-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="submit">
                                    Restore All
                                </button>
                            </form>
                            <form  action="{{ route('notes.forceDeleteAll') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure you want to delete ALL records from the trash? It will not be possible to cancel!');"
                                    class="flex select-none items-center gap-3 rounded-lg bg-red-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-900/10 transition-all hover:shadow-lg hover:shadow-red-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    type="submit">
                                    Delete All
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            {{-- TABLE --}}
            <div class="p-6 px-0 overflow-scroll">
                <table class="w-full mt-4 text-left table-auto min-w-max">
                    <thead>
                        <tr>
                            <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    Title
                                </p>
                            </th>

                            <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                    Deleted at
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
                        @forelse ($notes as $note)
                        <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex items-center gap-3">

                                    <div class="flex flex-col">
                                        <p
                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                            {{ Str::limit($note->title, 40) }}
                                        </p>

                                    </div>
                                </div>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    {{ $note->deleted_at->format('d-m-Y H:i') }}
                                </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex items-center space-x-4">
                                    <form  action="{{ route('notes.restore', $note) }}" method="POST">
                                        @csrf
                                        <button
                                            class="flex select-none items-center gap-3 rounded-lg bg-green-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-900/10 transition-all hover:shadow-lg hover:shadow-green-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="submit">
                                            Restore
                                        </button>
                                    </form>
                                    <form  action="{{ route('notes.force-delete', $note) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete record from the trash? It will not be possible to cancel!');"
                                            class="flex select-none items-center gap-3 rounded-lg bg-red-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-900/10 transition-all hover:shadow-lg hover:shadow-red-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                            type="submit">
                                            Delete permanently
                                        </button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                                <span class="font-bold">No data.</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{-- END TABLE --}}
            {{-- PAGINATION --}}
            <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
                {{-- Previous Page Button --}}
                @if ($notes->onFirstPage())
                <button
                    class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    disabled>
                    Previous
                </button>
                @else
                <a href="{{ $notes->previousPageUrl() }}"
                    class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75">
                    Previous
                </a>
                @endif

                {{-- Page Numbers --}}
                <div class="flex items-center gap-2">
                    @foreach(range(1, $notes->lastPage()) as $page)
                    @if ($page == $notes->currentPage())
                    <button
                        class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg border border-gray-900 text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        disabled>
                        <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            {{ $page }}
                        </span>
                    </button>
                    @else
                    <a href="{{ $notes->url($page) }}"
                        class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10">
                        <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            {{ $page }}
                        </span>
                    </a>
                    @endif
                    @endforeach
                </div>

                {{-- Next Page Button --}}
                @if ($notes->hasMorePages())
                <a href="{{ $notes->nextPageUrl() }}"
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
