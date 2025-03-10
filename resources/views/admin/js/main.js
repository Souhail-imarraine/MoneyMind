// Toggle sidebar on mobile
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('openSidebar')) {
        document.getElementById('openSidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('hidden');
        });
    }

    if (document.getElementById('closeSidebar')) {
        document.getElementById('closeSidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.add('hidden');
        });
    }

    // Highlight active menu item
    const currentPage = window.location.pathname.split('/').pop();
    const menuItems = document.querySelectorAll('.sidebar-menu-item');

    menuItems.forEach(item => {
        const link = item.querySelector('a').getAttribute('href');
        if (link === currentPage || (currentPage === '' && link === 'index.html')) {
            item.classList.add('bg-blue-600');
            item.classList.remove('hover:bg-gray-700');
        } else {
            item.classList.remove('bg-blue-600');
            item.classList.add('hover:bg-gray-700');
        }
    });
});

