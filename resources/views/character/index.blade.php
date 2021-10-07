<x-layout.main>

    <x-layout.success_message />

    <header class="flex justify-between">
        <h1 class="text-4xl text-black">Characters</h1>
        <button class="inline-block bg-blue-500 text-white py-2 px-4 hover:bg-blue-700">
            <a href="{{ route('characters.create') }}">Create</a>
        </button>
    </header>
    <div class="grid grid-cols-3 gap-4 mt-6">
        @foreach($characters as $character)
            <article class="overflow-hidden rounded-2xl border-2 shadow bg-white">
                <img src="{{ asset('storage/' . $character->image)  }}" alt="Image" width="150" height="150" class="w-full">
                <header class="space-y-1 p-2">
                    <h2 class="text-2xl text-bold">
                        <a href="{{ route('characters.edit', $character) }}">
                            {{ $character->name }}
                        </a>
                    </h2>
                    <p>Nationality: {{ $character->nationality }}</p>
                    <p>Style: {{ $character->fight_style }}</p>
                    <p>Birthdate: {{ $character->birthdate }}</p>
                </header>
            </article>
        @endforeach
    </div>
</x-layout.main>
