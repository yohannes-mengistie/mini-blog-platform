<x-layout>
    <x-slot:title>
        Create Blog
    </x-slot:title>

    <x-slot:heading>
        Create Blog
    </x-slot:heading>

    <form method="POST", action="/blogs">
        @csrf

        <div class="space-y-12 ml-10">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create a New Blog</h2>
                <p class="mt-1 text-sm/6 text-gray-600">We just need a handful of details from you.</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="blog_title" class="block text-sm/6 font-medium text-gray-900">Blog title</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input id="blog_title" type="text" name="blog_title" placeholder="Blog Title"
                                    class="block min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 border border-gray-400"
                                    required />
                            </div>

                            @error('blog_title')
                                <p class="mt-1 text-xs text-red-500 font-semibold"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="blog_description" class="block text-sm/6 font-medium text-gray-900">Blog
                            Description</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input id="blog_description" type="text" name="blog_description"
                                    placeholder="Blog Description"
                                    class="block min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 border border-gray-400"
                                    required />
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
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <textarea id="blog_content" type="text" name="blog_content" placeholder="Blog Content"
                                    class="block min-w-0 grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6 border border-gray-400"
                                    required></textarea>
                            </div>

                            @error('blog_content')
                                <p class="mt-1 text-xs text-red-500 font-semibold"> {{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mr-20 mb-9 flex items-center justify-end gap-x-4">
            <!-- Cancel Button -->
            <a href="/blogs"
                class="rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-white
              hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300
              transition-all duration-200 bg-gray-900">
                Cancel
            </a>

            <!-- Save Button -->
            <button type="submit"
                class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white
               shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2
               focus:ring-indigo-500 transition-all duration-200">
                Save
            </button>
        </div>

    </form>
</x-layout>
