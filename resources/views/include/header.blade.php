<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-bold text-blue-600 tracking-tight">Pay<span
                            class="text-gray-900">Flow</span></span>
                </div>

                <div class="hidden md:ml-8 md:flex md:space-x-8">
                    <a href="{{ route('home') }}"
                        class="border-blue-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Dashboard
                    </a>
                    <a href="#"
                        class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Users
                    </a>
                    <a href="#"
                        class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Leave
                    </a>
                    @auth
                        <a href="{{ route('payroll.payrolls', ['id' => Auth::id()]) }}"
                            class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Payroll
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Payroll
                        </a>
                    @endauth
                    <a href="#"
                        class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Claims
                    </a>
                    <a href="#"
                        class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Benefits
                    </a>
                    <a href="#"
                        class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Insurance
                    </a>
                    <a href="#"
                        class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Investment
                    </a>
                    <a href="#"
                        class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                        Hadir
                    </a>
                </div>
            </div>

            <div class="flex items-center space-x-4">
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
                    <div class="relative inline-block text-left">

                        <button type="button" onclick="toggleDropdown()"
                            class="flex items-center space-x-3 focus:outline-none cursor-pointer">
                            <div class="text-gray-300">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                </svg>
                            </div>

                            <div class="flex items-center space-x-1">
                                <span class="text-sm font-medium text-gray-600">
                                    {{ Auth::user()->name }}
                                </span>
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </button>

                        <div id="dropdownMenu"
                            class="hidden absolute right-0 z-50 mt-2 w-56 origin-top-right bg-white shadow-xl ring-1 ring-black ring-opacity-5 rounded-sm">
                            <div class="h-[3px] bg-[#36a3b7] w-full"></div>

                            <div class="py-1">
                                <a href="#"
                                    class="cursor-pointer block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                    My Profile
                                </a>
                                <a href="#"
                                    class="cursor-pointer block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                    Reset Password
                                </a>

                                <a href="{{ route('settings.user', ['id' => Auth::id()]) }}"
                                    class="cursor-pointer block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                    Settings
                                </a>
                                <a href="#"
                                    class="cursor-pointer block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                    Billing
                                </a>
                                <a href="#"
                                    class="cursor-pointer block px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                    Activity log
                                </a>

                                <div class="my-1 border-t border-gray-100"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="cursor-pointer block w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
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
