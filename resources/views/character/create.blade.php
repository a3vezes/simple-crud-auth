<x-layout.main>

    <x-layout.success_message />

    <h1 class="text-4xl font-black my-4">
        Create Character
    </h1>

    <form action="{{ route('characters.store')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <x-layout.form.form_wrapper >
                <x-layout.form.form_input type="text" name="name" :first=true required/>
                <x-layout.form.form_input type="text" name="nationality" required/>
                <x-layout.form.form_input type="text" name="fight_style" required/>
                <x-layout.form.form_input type="date" name="birthdate" required/>
                <x-layout.form.form_input type="file" name="image"/>
            <button class="w-full py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold mt-4">
                Create
            </button>

        <x-layout.error_messages />

        </x-layout.form.form_wrapper>
    </form>
</x-layout.main>
