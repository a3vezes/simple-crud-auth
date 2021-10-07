<x-layout.main>

    <x-layout.success_message />

    <header class="flex justify-between">
        <h1 class="text-4xl font-black my-4">
            Edit Character
        </h1>

        <form action="{{ route('characters.destroy', $character) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="py-2 px-4 mt-4 bg-white font-bold border border-red-500 rounded-2xl hover:bg-red-500 hover:text-white " type="submit">
                Delete
            </button>
        </form>
    </header>

    <form action="{{ route('characters.update', $character)}}" method="post" enctype="multipart/form-data">
        @csrf

        @method('PATCH')

        <x-layout.form.form_wrapper >
            <x-layout.form.form_input type="text" name="name" :value="old('name', $character->name)" required :first=true />
            <x-layout.form.form_input type="text" name="nationality" :value="old('nationality', $character->nationality)" required />
            <x-layout.form.form_input type="text" name="fight_style" :value="old('fight_style', $character->fight_style)" required />
            <x-layout.form.form_input type="date" name="birthdate" :value="old('birthdate', $character->birthdate)" required />

            <div class="flex mt-4">
                <x-layout.form.form_input type="file" name="image" :value="old('image', $character->image)" />
                <img src="{{ asset('storage/' . $character->image) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>


            <button class="w-full py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold mt-4">
                Edit
            </button>

            <x-layout.error_messages />

        </x-layout.form.form_wrapper>
    </form>
</x-layout.main>
