<x-layout>

    <x-slot:title>
        Blogs
    </x-slot:title>

    <x-slot:heading>
        Blogs
    </x-slot:heading>

    <br />

    <div class="space-y-4">
        @foreach ($blogs as $blog)
            <a href="/blogs/{{$blog['id']}}" class="block px-4 py-4 border border-black-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">
                    {{ $blog->user->name }}
                </div>

                <div class="mt-5">
                    <h1 class="italic font-bold"> {{$blog['blog_title']}} </h3>
                    <p> {{$blog['blog_description']}} </p>
                </div>
            </a>
        @endforeach
    </div>

</x-layout>
