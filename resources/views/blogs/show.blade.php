<x-layout>

    <x-slot:title>
        Blog
    </x-slot:title>

    <x-slot:heading>
        {{ $blog->blog_title }}
    </x-slot:heading>

    <p class="m-10 whitespace-pre-line max-w-full overflow-x-auto bg-white p-4 border-l-2 border-r-2 border-gray-300"> {{ $blog->blog_content }} </p>

    <a href="/blogs/{{ $blog->id }}/edit"
       class='inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition'
       > Edit Blog </a>

</x-layout>
