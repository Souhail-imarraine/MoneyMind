    <!-- Mobile Bottom Navigation -->
    <nav class="md:hidden fixed bottom-0 inset-x-0 bg-white border-t border-gray-200 z-50">
        <div class="grid grid-cols-4 gap-1">
            <!-- Home -->
            <a href="#" class="flex flex-col items-center py-3 text-brand-primary">
                <i class="fas fa-home text-lg"></i>
                <span class="text-xs mt-1">Accueil</span>
            </a>

            <!-- Stats -->
            <a href="#" class="flex flex-col items-center py-3 text-gray-600">
                <i class="fas fa-chart-line text-lg"></i>
                <span class="text-xs mt-1">Stats</span>
            </a>

            <!-- Goals -->
            <a href="#" class="flex flex-col items-center py-3 text-gray-600">
                <i class="fas fa-bullseye text-lg"></i>
                <span class="text-xs mt-1">Objectifs</span>
            </a>

            <!-- Profile/Menu Button (Opens Menu) -->
            <button 
                onclick="toggleMobileMenu()" 
                class="flex flex-col items-center py-3 text-gray-600">
                <i class="fas fa-bars text-lg"></i>
                <span class="text-xs mt-1">Menu</span>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu Overlay (Hidden by default) -->
    <div id="mobileMenu" class="md:hidden fixed inset-0 bg-black/50 z-50 hidden">
        <div class="absolute right-0 top-0 bottom-0 w-64 bg-white shadow-xl transition-transform">
            <!-- User Profile Section -->
            <div class="p-4 bg-gray-50 border-b border-gray-200">
                <div class="flex items-center space-x-3">
                    <img src="https://ui-avatars.com/api/?name=John+Doe" class="w-12 h-12 rounded-full">
                    <div>
                        <h3 class="font-medium text-gray-900">John Doe</h3>
                        <p class="text-sm text-gray-500">john@example.com</p>
                    </div>
                </div>
            </div>

            <!-- Menu Items -->
            <div class="py-2">
                <!-- Account Settings -->
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50">
                    <i class="fas fa-user-cog w-6"></i>
                    <span>Paramètres du compte</span>
                </a>

                <!-- Notifications -->
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50">
                    <i class="fas fa-bell w-6"></i>
                    <span>Notifications</span>
                    <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">3</span>
                </a>

                <!-- Help -->
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50">
                    <i class="fas fa-question-circle w-6"></i>
                    <span>Aide & Support</span>
                </a>

                <!-- Divider -->
                <div class="my-2 border-t border-gray-200"></div>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                        class="w-full flex items-center px-4 py-3 text-red-600 hover:bg-red-50">
                        <i class="fas fa-sign-out-alt w-6"></i>
                        <span>Déconnexion</span>
                    </button>
                </form>
            </div>

            <!-- Close Button -->
            <button 
                onclick="toggleMobileMenu()" 
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-500">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
    </div>

    <!-- Add this script to your layout or component -->
    @push('scripts')
    <script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        const menuPanel = menu.querySelector('div');
        
        if (menu.classList.contains('hidden')) {
            // Open menu
            menu.classList.remove('hidden');
            setTimeout(() => {
                menuPanel.classList.add('translate-x-0');
                menuPanel.classList.remove('translate-x-full');
            }, 10);
        } else {
            // Close menu
            menuPanel.classList.add('translate-x-full');
            menuPanel.classList.remove('translate-x-0');
            setTimeout(() => {
                menu.classList.add('hidden');
            }, 300);
        }
    }

    // Close menu when clicking outside
    document.getElementById('mobileMenu').addEventListener('click', function(e) {
        if (e.target === this) {
            toggleMobileMenu();
        }
    });
    </script>
    @endpush