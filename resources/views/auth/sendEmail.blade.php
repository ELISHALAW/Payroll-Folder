@extends('output.layout')

@section('content')
<div class="max-w-md mx-auto py-12 px-4">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Reset Password</h2>
            <p class="text-sm text-gray-600">Enter your email to receive a password reset link.</p>
        </div>

        <form action="{{route('password.email')}}" method="POST" class="p-6 space-y-4">
            @csrf

            @if (session('status'))
                <div class="p-3 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" id="email" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    placeholder="example@gmail.com">
                @error('email')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-end pt-2">
                <button type="submit" 
                    class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Send Reset Link
                </button>
            </div>
        </form>

        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 text-center">
            <a href="{{ route('login') }}" class="text-xs text-blue-600 hover:underline">Back to Login</a>
        </div>
    </div>
</div>
@endsection