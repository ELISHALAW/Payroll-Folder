<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-bold text-blue-600 tracking-tight">Pay<span
                            class="text-gray-900">Flow</span></span>
                </div>

                <div class="hidden md:ml-8 md:flex md:space-x-8">
                    <a href="#"
                        class="border-blue-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Dashboard
                    </a>
                    <a href="#"
                        class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Run Payroll
                    </a>
                    <a href="#"
                        class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Employees
                    </a>
                    <a href="#"
                        class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Reports
                    </a>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <button class="p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none hidden sm:block">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                @guest

                    <a href="{{ route('login') }}"
                        class="text-sm font-semibold text-gray-700 hover:text-blue-600 px-3 py-2 transition-colors">
                        Log in
                    </a>
                    <a href="{{ route('register') }}"
                        class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-semibold rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                        Register
                    </a>
                @endguest


                @auth
                    <div class="flex items-center space-x-4">
                        <span class="text-sm font-medium text-gray-700">
                            {{ Auth::user()->name }}
                        </span>


                    </div>
                @endauth
                <div class="flex items-center md:hidden">
                    <button
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>
    </div>
</nav>
