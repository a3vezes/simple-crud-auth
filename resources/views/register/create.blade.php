<x-layout.main>
    <x-layout.success_message />

    <h1 class="text-4xl font-black my-4">
        Register
    </h1>

    <form action="{{ route('register.store')}}" method="post" >
        @csrf
        <x-layout.form.form_wrapper >
            <x-layout.form.form_input type="text" name="name" :first=true required/>
            <x-layout.form.form_input type="email" name="email" required/>
            <x-layout.form.form_input type="password" name="password" required/>
            <button class="w-full py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold mt-4">
                Register
            </button>

            <x-layout.error_messages />

        </x-layout.form.form_wrapper>
        <p class="text-sm text-center mt-4">
            Already registered? <span class="text-blue-500"><a href="{{ route('session.create') }}">Log In</a></span>
        </p>
    </form>
</x-layout.main>
