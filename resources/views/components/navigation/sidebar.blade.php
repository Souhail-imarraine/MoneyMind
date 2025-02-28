<aside class="hidden md:flex md:w-72 md:flex-col md:fixed md:inset-y-0 bg-white border-r border-gray-200">
    <div class="flex flex-col flex-grow pt-5 overflow-y-auto">
        <div class="px-6 pb-6">
            <h1 class="flex items-center text-2xl font-bold text-brand-dark">
                <i class="fas fa-wallet text-brand-primary mr-3"></i>
                FinanceFlow
            </h1>
        </div>

        <!-- <div class="px-4 mb-6">
            <button
                onclick="openAddTransactionModal()"
                class="w-full bg-brand-primary text-white px-4 py-3 rounded-xl hover:bg-brand-primary/90 transition-colors flex items-center justify-center space-x-2">
                <i class="fas fa-plus"></i>
                <span class="font-medium">Nouvelle Transaction</span>
            </button>
        </div> -->

        <nav class="flex-1 px-4 space-y-1">
            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-brand-primary bg-brand-primary/10 rounded-xl">
                <i class="fas fa-home w-6"></i>
                <span>Tableau de bord</span>
            </a>
            <a href="{{ route('transactions') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl">
                <i class="fas fa-exchange-alt w-6"></i>
                <span>Transactions</span>
            </a>
            <a href="{{ route('notifications') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl">
                <i class="fas fa-bell w-6"></i>
                <span>Notifications</span>
                <span class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">3</span>
            </a>
            <a href="{{ route('goals') }}" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl">
                <i class="fas fa-bullseye w-6"></i>
                <span>Objectifs</span>
            </a>
        </nav>

        <!-- Logout Section -->
        <div class="px-4 mt-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl w-full">
                    <i class="fas fa-sign-out-alt w-6"></i>
                    <span>Déconnexion</span>
                </button>
            </form>
        </div>

        <div class="p-4 mt-6">
            <div class="bg-brand-primary/5 p-4 rounded-xl">
                <div class="flex items-center mb-3">
                    <i class="fas fa-crown text-brand-primary mr-2"></i>
                    <span class="font-medium text-brand-dark">Premium</span>
                </div>
                <p class="text-sm text-gray-600 mb-3">
                    Débloquez toutes les fonctionnalités avancées
                </p>
                <button class="w-full bg-brand-primary text-white py-2 rounded-lg text-sm hover:bg-brand-primary/90 transition-colors">
                    Upgrade
                </button>
            </div>
        </div>
    </div>
</aside>