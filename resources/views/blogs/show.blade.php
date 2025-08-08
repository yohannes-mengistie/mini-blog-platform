<x-layout>

    <x-slot:title>
        Blog
    </x-slot:title>

    <x-slot:heading>
        {{ $blog->blog_title }} <p class="font-semibold italic"> {{ $blog->blog_description }} </p>
    </x-slot:heading>

    <p class="m-10 whitespace-pre-line max-w-full overflow-x-auto bg-white p-4 border-l-2 border-r-2 border-gray-300"> {{ $blog->blog_content }} </p>

    <a href="/blogs/{{ $blog->id }}/edit"
       class="mt-6 relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800"
       > Edit Blog </a>

</x-layout>
