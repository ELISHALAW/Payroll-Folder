@extends('output.layout')
@section('content')
    <div class="min-h-screen bg-gray-50 flex">

        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-24 bg-white">
            <div class="mx-auto w-full max-w-sm lg:w-96">

                <div class="mb-10">
                    <h2 class="text-3xl font-extrabold text-gray-900">
                        <span class="text-blue-600">360 </span>Interactive
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Welcome back. Please login to your account.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="mt-8">
                    <form action="{{ route('login.authenticate') }}" method="POST" class="space-x-y-6 space-y-5">
                        @csrf
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input id="email" type="email" name="email" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-3 border">
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <a href="#" class="text-xs font-semibold text-blue-600 hover:text-blue-500">Forgot
                                    password?</a>
                            </div>
                            <input id="password" type="password" name="password" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm p-3 border">
                        </div>

                        <div class="flex items-center">
                            <input id="remember-me" type="checkbox"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                                Log In
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-500">Sign up
                                here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden lg:block relative w-0 flex-1 bg-blue-600">
            <div class="absolute inset-0 flex flex-col justify-center items-center text-white px-20 text-center">
                <h2 class="text-4xl font-bold mb-4">The #1 HR Platform in Malaysia</h2>
                <p class="text-blue-100 text-lg">Trusted by 20,000+ companies to handle Payroll, Leave, Claims, and Benefits
                    automatically.</p>

                <div class="mt-12 flex space-x-8 opacity-80">
                    <span class="text-xs font-bold border border-white p-2 rounded">LHDN COMPLIANT</span>
                    <span class="text-xs font-bold border border-white p-2 rounded">KWSP/SOCSO</span>
                    <span class="text-xs font-bold border border-white p-2 rounded">PDPA SECURE</span>
                </div>
            </div>
        </div>
    </div>
@endsection
