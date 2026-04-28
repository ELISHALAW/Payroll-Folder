<div class="flex flex-col w-64 h-screen bg-white border-r border-gray-200">
    <div class="p-6 border-b border-gray-100 bg-gray-50/50">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-cyan-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-cyan-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-500 uppercase font-bold tracking-wider">Account</p>
                <p class="text-sm font-semibold text-gray-700">My Account</p>
            </div>
        </div>
    </div>

    <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">

        <a href="{{ route('settings.user', ['id' => Auth::id()]) }}"
            class="flex items-center justify-between w-full px-3 py-2 text-sm transition-colors rounded-md group
            {{ request()->routeIs('settings.user') ? 'bg-cyan-50 text-cyan-600 font-bold' : 'text-gray-600 hover:bg-gray-100' }}">
            <span class="flex items-center">
                <i class="bi bi-person-gear me-3"></i> My Account
            </span>
            @if (request()->routeIs('settings.user'))
                <div class="w-1 h-4 bg-cyan-500 rounded-full"></div>
            @endif
        </a>

        <a href=""
            class="flex items-center justify-between w-full px-3 py-2 text-sm transition-colors rounded-md group">
            <span class="flex items-center">
                <i class="bi bi-cash-stack me-3"></i> Payroll Settings
            </span>

        </a>

        <div class="space-y-1">
            <button onclick="toggleSidebarMenu('companyDropdown', 'companyArrow')"
                class="flex items-center justify-between w-full px-3 py-2 text-sm transition-colors rounded-md group
        {{ Request::is('company*') ? 'bg-cyan-50 text-cyan-600 font-bold' : 'text-gray-600 hover:bg-gray-100' }}">

                <span class="flex items-center">
                    <i class="bi bi-buildings me-3"></i> Company Settings
                </span>

                <i id="companyArrow"
                    class="bi bi-chevron-down text-xs transition-transform duration-200 {{ Request::is('company*') ? 'rotate-180' : '' }}"></i>
            </button>

            <div id="companyDropdown"
                class="{{ Request::is('company*') ? '' : 'hidden' }} overflow-hidden transition-all duration-300">

                <div class="h-[2px] bg-[#36a3b7] w-full mb-1 ml-9"></div>

                <div class="pl-9 space-y-1">
                    <a href="{{ route('settings.company.basic', ['id' => Auth::id()]) }}"
                        class="relative block px-4 py-2 text-sm transition-all rounded-md
                        {{ Request::routeIs('settings.company.basic')
                            ? 'bg-cyan-50 text-cyan-600 font-bold border-r-4 border-cyan-500'
                            : 'text-gray-600 hover:bg-gray-50 hover:text-cyan-600' }}">
                        Basic Details
                    </a>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-cyan-600 transition-colors rounded-md">
                        Bank Account Details
                    </a>
                    <a href="#"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-cyan-600 transition-colors rounded-md">
                        Other Details
                    </a>
                </div>
            </div>
        </div>

        <a href="#"
            class="flex items-center justify-between w-full px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100 transition-colors">
            <span class="flex items-center">
                <i class="bi bi-calendar-event me-3"></i> Leave Settings
            </span>
        </a>

        <a href="#"
            class="flex items-center justify-between w-full px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100 transition-colors">
            <span class="flex items-center">
                <i class="bi bi-wallet2 me-3"></i> Claims Settings
            </span>
        </a>

        <a href="#"
            class="flex items-center justify-between w-full px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100 transition-colors">
            <span class="flex items-center">
                <i class="bi bi-clock-history me-3"></i> Hadir Settings
            </span>
        </a>

        <a href="#"
            class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100 transition-colors">
            <i class="bi bi-people me-3"></i> Manage Admins
        </a>

    </nav>
</div>
<script>
    function toggleSidebarMenu(menuId, arrowId) {
        const menu = document.getElementById(menuId);
        const arrow = document.getElementById(arrowId);

        // Toggle visibility
        menu.classList.toggle('hidden');

        // Toggle arrow rotation
        arrow.classList.toggle('rotate-180');
    }
</script>
