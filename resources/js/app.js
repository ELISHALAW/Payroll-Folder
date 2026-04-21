// Make the function global so onclick can find it
window.switchForm = function (type) {
    const isUser = type === 'user';

    const companySection = document.getElementById('company-section');
    const userSection = document.getElementById('user-section');
    const btnCompany = document.getElementById('btn-company');
    const btnUser = document.getElementById('btn-user');
    const sidebarTitle = document.getElementById('sidebar-title');
    const sidebarDesc = document.getElementById('sidebar-desc');

    if (isUser) {
        companySection.classList.add('hidden');
        userSection.classList.remove('hidden');

        // Tab Styles
        btnUser.classList.add('bg-white', 'text-blue-600', 'shadow-sm');
        btnUser.classList.remove('text-slate-400');
        btnCompany.classList.remove('bg-white', 'text-blue-600', 'shadow-sm');
        btnCompany.classList.add('text-slate-400');

        sidebarTitle.innerText = "Admin Setup";
        sidebarDesc.innerText = "Configure your primary administrative access.";
    } else {
        userSection.classList.add('hidden');
        companySection.classList.remove('hidden');

        btnCompany.classList.add('bg-white', 'text-blue-600', 'shadow-sm');
        btnCompany.classList.remove('text-slate-400');
        btnUser.classList.remove('bg-white', 'text-blue-600', 'shadow-sm');
        btnUser.classList.add('text-slate-400');

        sidebarTitle.innerText = "Company Identity";
        sidebarDesc.innerText = "Please provide your official business details to initialize the system.";
    }
}


window.toggleDropdown = function () {
    const menu = document.getElementById('dropdownMenu');

    if (menu) {
        menu.classList.toggle('hidden');
    }
}

// Close the dropdown if the user clicks anywhere else
document.addEventListener('DOMContentLoaded', function () {
    window.addEventListener('click', function (e) {
        const menu = document.getElementById('dropdownMenu');
        const button = e.target.closest('button');

        // If the click is NOT on the button/menu and menu is open, hide it
        if (!button && !menu.classList.contains('hidden')) {
            menu.classList.add('hidden');
        }
    });
})