<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Learning Note') }} - {{ $note->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('notes.update', $note) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-12">

                            <div class="border-b border-gray-900/10 pb-12">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Note Information</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">Create a note about your future project
                                    or tutorial.</p>

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                    <div class="col-span-full">
                                        <label for="title"
                                            class="block text-sm font-medium leading-6 text-gray-900">Title
                                        </label>
                                        <div class="mt-2">
                                            <input type="text" name="title" id="title"
                                                value="{{ old('title', $note->title) }}" autocomplete="title"
                                                placeholder="Laravel Livewire Crash Course | Livewire 3 Tutorial for Beginners in 1.5 Hours"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('title')
                                            <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-full">
                                        <label for="link_to_tutorial"
                                            class="block text-sm font-medium leading-6 text-gray-900">Link to the
                                            tutorial</label>
                                        <div class="mt-2">
                                            <input type="text" name="link_to_tutorial" id="link_to_tutorial"
                                                value="{{ old('link_to_tutorial', $note->link_to_tutorial) }}"
                                                autocomplete="link_to_tutorial"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('link_to_tutorial')
                                            <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-full">
                                        <label for="link_to_resource"
                                            class="block text-sm font-medium leading-6 text-gray-900">Link to the
                                            resource [website, youtube channel etc.] (optional)</label>
                                        <div class="mt-2">
                                            <input type="text" name="link_to_resource" id="link_to_resource"
                                                value="{{ old('link_to_resource', $note->link_to_resource) }}"
                                                autocomplete="link_to_resource"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('link_to_resource')
                                            <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-full">
                                        <label for="resource_name"
                                            class="block text-sm font-medium leading-6 text-gray-900">Resource name
                                            (optional)</label>
                                        <div class="mt-2">
                                            <input type="text" name="resource_name" id="resource_name"
                                                value="{{ old('resource_name', $note->resource_name) }}"
                                                autocomplete="resource_name"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('resource_name')
                                            <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="resource_type"
                                            class="block text-sm font-medium leading-6 text-gray-900">Resource
                                            type</label>
                                        <div class="mt-2">
                                            <select id="resource_type_id" name="resource_type_id" autocomplete="resource_type"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                <option value="">No resource type</option>
                                                @foreach ($resourceTypes as $resourceType)
                                                    <option value="{{ $resourceType->id }}" {{ old('resource_type_id', $note->resource_type_id ?? '') == $resourceType->id ? 'selected' : '' }}>
                                                        {{ $resourceType->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="categories"
                                            class="block text-sm font-medium leading-6 text-gray-900">Categories</label>
                                        <div class="mt-2">
                                            <select id="categories" name="categories[]" multiple
                                                autocomplete="categories"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ in_array($category->id,
                                                    old('categories', $note->categories->pluck('id')->toArray() ?? []))
                                                    ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-span-full">
                                        <label for="description"
                                            class="block text-sm font-medium leading-6 text-gray-900">Description (optional)</label>
                                        <div class="mt-2">
                                            <textarea id="description" name="description" rows="3" placeholder="Write a description"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description', $note->description) }}</textarea>
                                        </div>
                                        @error('description')
                                            <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="project_folder"
                                            class="block text-sm font-medium leading-6 text-gray-900">Project folder
                                            (optional)</label>
                                        <div class="mt-2">
                                            <input type="text" name="project_folder" id="project_folder"
                                                value="{{ old('project_folder', $note->project_folder) }}"
                                                autocomplete="project_folder"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('project_folder')
                                            <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="sm:col-span-3">
                                        <label for="database_name"
                                            class="block text-sm font-medium leading-6 text-gray-900">Database name
                                            (sqlite by default)</label>
                                        <div class="mt-2">
                                            <input type="text" name="database_name" id="database_name"
                                                value="{{ old('database_name', $note->database_name) }}"
                                                autocomplete="database_name"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('database_name')
                                            <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="col-span-full">
                                        <label for="link_to_github_repo"
                                            class="block text-sm font-medium leading-6 text-gray-900">Link to your
                                            github repository (optional)
                                        </label>
                                        <div class="mt-2">
                                            <input type="text" name="link_to_github_repo" id="link_to_github_repo"
                                                value="{{ old('link_to_github_repo', $note->link_to_github_repo) }}"
                                                autocomplete="link_to_github_repo"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('link_to_github_repo')
                                            <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-full">
                                        <label for="link_to_source_code"
                                            class="block text-sm font-medium leading-6 text-gray-900">Link to source
                                            code (optional)
                                        </label>
                                        <div class="mt-2">
                                            <input type="text" name="link_to_source_code" id="link_to_source_code"
                                                value="{{ old('link_to_source_code', $note->link_to_source_code) }}"
                                                autocomplete="link_to_source_code"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('link_to_source_code')
                                            <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-full">
                                        <label for="link_to_source_materials"
                                            class="block text-sm font-medium leading-6 text-gray-900">Link to source
                                            materials (optional)
                                        </label>
                                        <div class="mt-2">
                                            <input type="text" name="link_to_source_materials"
                                                value="{{ old('link_to_source_materials', $note->link_to_source_materials) }}"
                                                id="link_to_source_materials" autocomplete="link_to_source_materials"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                        @error('link_to_source_materials')
                                            <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="border-b border-gray-900/10 pb-12">

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                                    <div class="col-span-full">
                                        <label for="photo"
                                            class="block text-sm font-medium leading-6 text-gray-900">Cover
                                            photo</label>
                                        <div class="mt-2 flex items-center gap-x-3">
                                            <input type="file" name="image" id="image"
                                                class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" />
                                        </div>
                                        @error('image')
                                            <span class="text-sm font-bold text-red-500 mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="border-b border-gray-900/10 pb-12">
                                <fieldset>
                                    <div class="mt-3 space-y-6">
                                        <div class="relative flex gap-x-3">
                                            <div class="flex h-6 items-center">
                                                <input id="completed" name="completed" type="checkbox" value="1"
                                                    @checked(old('completed', $note->completed))
                                                    class="h-4 w-4 rounded border-gray-500 text-indigo-600 focus:ring-indigo-600">
                                            </div>
                                            <div class="text-sm leading-6">
                                                <label for="completed"
                                                    class="font-medium text-gray-900">Completed</label>
                                                <p class="text-gray-500">If you have completed this task, course,
                                                    project, then mark the checkbox</p>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end ">
                            <div class="flex items-center gap-x-6">
                                <a href="{{ route('notes.index') }}"
                                class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                type="button">
                                Cancel
                                </a>
                                <button type="submit"
                                    class="flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                    >
                                    Update note
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="-mt-8">
                        <form action="{{ route('notes.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?');"
                                class="flex select-none items-center gap-3 rounded-lg bg-red-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-900/10 transition-all hover:shadow-lg hover:shadow-red-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                >
                                Delete note
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
