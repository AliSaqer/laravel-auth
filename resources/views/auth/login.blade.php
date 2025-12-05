<x-layout>

    <form action="{{ route('login') }}" method="post">
        @csrf

        <h2>Log In to Your Account</h2>

        <label for="email">Email:</label>
        <input type="email" name="email" required value="{{ old('email') }}">

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn mt-4">Log in</button>

        @if ($errors->any())
            <div class="alert alert-danger mt-4 bg-red-50 text-red-500 p-4">
                <h5 class="alert-heading">⚠️ Please fix the following errors:</h5>
                <hr>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </form>
</x-layout>
