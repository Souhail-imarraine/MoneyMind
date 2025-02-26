<aside class="w-64 bg-[#1a1f37] text-white hidden lg:block">
    <!-- Logo Section -->
    <div class="p-6 border-b border-white/10">
        <div class="flex items-center space-x-3">
            <div class="bg-money-secondary p-2 rounded-lg">
                <i class="fas fa-coins text-[#1a1f37] text-xl"></i>
            </div>
            <span class="text-xl font-bold">MoneyMind</span>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="mt-6 px-4">
        <div class="space-y-4">
            <!-- Menu Principal -->
            <div class="text-gray-400 text-xs uppercase font-semibold">Menu</div>

            <a href="{{ route('dashboard') }}"
                class="flex items-center space-x-3 p-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-white/10' : 'hover:bg-white/10' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('transactions') }}"
                class="flex items-center space-x-3 p-3 rounded-lg {{ request()->routeIs('transactions') ? 'bg-white/10' : 'hover:bg-white/10' }}">
                <i class="fas fa-exchange-alt"></i>
                <span>Transactions</span>
            </a>

            <!-- Gestion Section -->
            <div class="text-gray-400 text-xs uppercase font-semibold mt-8">Gestion</div>

            <a href="{{ route('savings') }}"
                class="flex items-center space-x-3 p-3 rounded-lg {{ request()->routeIs('savings') ? 'bg-white/10' : 'hover:bg-white/10' }}">
                <i class="fas fa-piggy-bank"></i>
                <span>Épargne</span>
            </a>

            <a href="{{ route('goals') }}"
                class="flex items-center space-x-3 p-3 rounded-lg {{ request()->routeIs('goals') ? 'bg-white/10' : 'hover:bg-white/10' }}">
                <i class="fas fa-bullseye"></i>
                <span>Objectifs</span>
            </a>

            <!-- Paramètres Section -->
            <div class="text-gray-400 text-xs uppercase font-semibold mt-8">Paramètres</div>

            <a href="{{ route('profile') }}"
                class="flex items-center space-x-3 p-3 rounded-lg {{ request()->routeIs('profile') ? 'bg-white/10' : 'hover:bg-white/10' }}">
                <i class="fas fa-user"></i>
                <span>Profil</span>
            </a>

            <a href="{{ route('settings') }}"
                class="flex items-center space-x-3 p-3 rounded-lg {{ request()->routeIs('settings') ? 'bg-white/10' : 'hover:bg-white/10' }}">
                <i class="fas fa-cog"></i>
                <span>Réglages</span>
            </a>
        </div>
    </nav>
</aside>