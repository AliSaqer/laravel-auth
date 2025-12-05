<x-layout>

    <form action="{{ route('register') }}" method="post">
        @csrf

        <h2>Register for an Account</h2>

        <label for="name">Name:</label>
        <input type="text" name="name" required value="{{ old('name') }}">

        <label for="email">Email:</label>
        <input type="email" name="email" required value="{{ old('email') }}">

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="password_confirmation">confirm Password:</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit" class="btn mt-4">Register</button>

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
