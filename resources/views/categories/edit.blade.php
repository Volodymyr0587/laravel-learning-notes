<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }} - {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <x-alerts.alert messageType="delete-category-type-error"
                                    messageColor="red"
                                    title="Error!"
                                    class="mb-2" />

                    <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-12">

                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Category Information</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">Edit a category that will be associated with the learning note.</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                    <div class="col-span-full">
                                        <label for="name"
                                            class="block text-sm font-medium leading-6 text-gray-900">Name
                                        </label>
                                        <div class="mt-2">
                                            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                                                autocomplete="name" placeholder="Laravel"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('name')
                                            <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('categories.index') }}"
                                class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                Cancel
                            </a>
                            <button type="submit"
                                class="flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                >
                                Update category
                            </button>
                        </div>
                    </form>

                    <div class="-mt-8">
                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?');"
                                class="flex select-none items-center gap-3 rounded-lg bg-red-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-900/10 transition-all hover:shadow-lg hover:shadow-red-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                >
                                Delete Category
                            </button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="mt-10 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Notes in the {{  strtoupper($category->name) }} category</h2>
                    {{-- TABLE --}}
                <div class="p-6 px-0 ">
                    <table class="w-full mt-4 text-left table-auto min-w-max">
                        <thead>
                            <tr>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Image and title
                                    </p>
                                </th>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Link
                                    </p>
                                </th>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Type
                                    </p>
                                </th>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Categories
                                    </p>
                                </th>
                                <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                        Status
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
                            @forelse ($relatedNotes as $note)
                            <tr>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $note->image ? asset('storage/' . $note->image) : asset('images/default.jpg') }}"
                                            alt="{{ $note->title }}"
                                            class="relative inline-block h-20 w-20 !rounded-md object-cover object-center" />
                                        <div class="flex flex-col">
                                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                                {{ Str::limit($note->title, 30) }}
                                            </p>
                                            <a href="{{ route('notes.show', $note) }}" class="block font-sans text-sm antialiased font-normal leading-normal text-blue-500 hover:text-blue-900 opacity-70">
                                                View
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="flex flex-col">
                                        <a href="{{ $note->link_to_tutorial }}" target="_blank"
                                            class="block font-sans text-sm antialiased font-normal leading-normal text-blue-500 hover:text-blue-900 opacity-70">
                                            {{ Str::limit($note->link_to_tutorial, 10) }}
                                        </a>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="w-max">
                                        <div
                                            class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-blue-900 bg-blue-500/20 uppercase rounded-md select-none whitespace-nowrap ">
                                            @if ($note->resourceType)
                                            <a href="{{ route('notes.index', ['resource_type_id' => $note->resourceType->id]) }}" class="">{{ $note->resourceType->name }}</a>
                                            @else
                                            <span>No resource type</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="w-max grid grid-cols-2 items-center">
                                        @forelse ($note->categories as $category)
                                        <a href="{{ route('notes.index', ['category_id' => $category->id]) }}"
                                            class="relative grid items-center px-2 py-1 mx-1 my-1 font-sans text-xs font-bold text-purple-900 bg-purple-500/20 uppercase rounded-md select-none whitespace-nowrap ">
                                            <span class="">{{ $category->name }}</span>
                                        </a>
                                        @empty
                                        <div
                                            class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-purple-900 bg-purple-500/20 uppercase rounded-md select-none whitespace-nowrap ">
                                            <span class="">No categories</span>
                                        </div>
                                        @endforelse
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <div class="w-max">
                                        <a href="{{ route('notes.index', ['completed' => $note->completed]) }}"
                                            class="relative grid items-center px-2 py-1 font-sans text-xs font-bold {{ $note->completed ? 'text-green-900 bg-green-500/20' : 'text-yellow-900 bg-yellow-500/20' }} uppercase rounded-md select-none whitespace-nowrap ">
                                            <span class="">{{ $note->completed ? 'completed' : 'in progress' }}</span>
                                        </a>
                                    </div>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $note->updated_at->format('d-m-Y H:i') }}
                                    </p>
                                </td>
                                <td class="p-4 border-b border-blue-gray-50">
                                    <a href="{{ route('notes.edit', $note) }}">
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
                    @if ($relatedNotes->onFirstPage())
                        <button
                            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            disabled>
                            Previous
                        </button>
                    @else
                        <a href="{{ $relatedNotes->previousPageUrl() }}"
                            class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75">
                            Previous
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    <div class="flex items-center gap-2">
                        @foreach(range(1, $relatedNotes->lastPage()) as $page)
                            @if ($page == $relatedNotes->currentPage())
                                <button
                                    class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg border border-gray-900 text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    disabled>
                                    <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                        {{ $page }}
                                    </span>
                                </button>
                            @else
                                <a href="{{ $relatedNotes->url($page) }}"
                                    class="relative h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10">
                                    <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                        {{ $page }}
                                    </span>
                                </a>
                            @endif
                        @endforeach
                    </div>

                    {{-- Next Page Button --}}
                    @if ($relatedNotes->hasMorePages())
                        <a href="{{ $relatedNotes->nextPageUrl() }}"
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
    </div>
</x-app-layout>
