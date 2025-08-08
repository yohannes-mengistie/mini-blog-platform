<x-layout>
    <x-slot:title>
        Edit Blog
    </x-slot:title>

    <x-slot:heading>
        Edit Blog: {{ $blog->blog_title }}
    </x-slot:heading>

    <form method="POST", action="/blogs/{{ $blog->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="blog_title" class="block text-sm/6 font-medium text-gray-900">Blog Title</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input
                                id="blog_title"
                                type="text"
                                name="blog_title"
                                placeholder="Blog Title"
                                class="block min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 border border-gray-400"
                                value="{{ $blog->blog_title }}"
                                required/>
                            </div>

                            @error('blog_title')
                                <p class="mt-1 text-xs text-red-500 font-semibold"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="blog_description" class="block text-sm/6 font-medium text-gray-900">Blog Description</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input
                                id="blog_description"
                                type="text"
                                name="blog_description"
                                placeholder="Blog Description"
                                class="block min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 border border-gray-400"
                                value="{{ $blog->blog_description }}"
                                required/>
                            </div>

                            @error('blog_description')
                                <p class="mt-1 text-xs text-red-500 font-semibold"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="blog_content" class="block text-sm/6 font-medium text-gray-900">Blog Content</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <textarea
                                id="blog_content"
                                type="text"
                                name="blog_content"
                                placeholder="Blog Content"
                                class="block min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 border border-gray-400"
                                required> {{ old('blog_description', $blog->blog_content) }} </textarea>
                            </div>

                            @error('blog_content')
                                <p class="mt-1 text-xs text-red-500 font-semibold"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">

            <div class="flex items-center">
                <x-button form="delete-form" class="text-red-500 text-sm font-bold hover:bg-red-500 hover:text-white-500">
                    DELETE
                </x-button>
            </div>

            <div class="flex items-center gap-x-6">
                <a href="/blogs/{{ $blog->id }}" class="text-sm/6 font-semibold text-gray-900 hover:rounded-md hover:bg-gray-400 hover:px-1.5 hover:py-1.5">Cancel</a>
                <div>
                    <button
                    type="submit"
                    class='inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'
                    >UPDATE</button>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" action="/blogs/{{ $blog->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
