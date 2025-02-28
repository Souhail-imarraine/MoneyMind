<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Balance Card -->
    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-brand-primary/10 p-3 rounded-xl">
                <i class="fas fa-wallet text-brand-primary text-xl"></i>
            </div>
            <div class="flex items-center space-x-1 text-brand-secondary">
                <i class="fas fa-arrow-up text-sm"></i>
                <span class="text-sm font-medium">2.5%</span>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">{{$user->salary}}</h3>
        <div class="mt-2 flex items-baseline">
            <p class="text-2xl font-bold text-brand-dark">{{$user->salary}}</p>
            <span class="ml-1 text-gray-500">DH</span>
        </div>
        <div class="mt-4 flex items-center text-sm text-gray-500">
            <span class="flex items-center text-brand-secondary">
                <i class="fas fa-arrow-up mr-1 text-xs"></i>
                +1,234 DH
            </span>
            <span class="ml-2">vs mois dernier</span>
        </div>
    </div>

    <!-- Dépenses Card -->
    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-brand-accent/10 p-3 rounded-xl">
                <i class="fas fa-credit-card text-brand-accent text-xl"></i>
            </div>
            <div class="flex items-center space-x-1 text-red-500">
                <i class="fas fa-arrow-down text-sm"></i>
                <span class="text-sm font-medium">1.8%</span>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Dépenses du Mois</h3>
        <div class="mt-2 flex items-baseline">
            <p class="text-2xl font-bold text-brand-dark">4,890</p>
            <span class="ml-1 text-gray-500">DH</span>
        </div>
        <div class="mt-4 flex items-center text-sm text-gray-500">
            <span class="flex items-center text-red-500">
                <i class="fas fa-arrow-down mr-1 text-xs"></i>
                -320 DH
            </span>
            <span class="ml-2">vs mois dernier</span>
        </div>
    </div>

    <!-- Revenus Card -->
    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-brand-secondary/10 p-3 rounded-xl">
                <i class="fas fa-chart-line text-brand-secondary text-xl"></i>
            </div>
            <div class="flex items-center space-x-1 text-brand-secondary">
                <i class="fas fa-arrow-up text-sm"></i>
                <span class="text-sm font-medium">3.2%</span>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Revenus du Mois</h3>
        <div class="mt-2 flex items-baseline">
            <p class="text-2xl font-bold text-brand-dark">8,750</p>
            <span class="ml-1 text-gray-500">DH</span>
        </div>
        <div class="mt-4 flex items-center text-sm text-gray-500">
            <span class="flex items-center text-brand-secondary">
                <i class="fas fa-arrow-up mr-1 text-xs"></i>
                +550 DH
            </span>
            <span class="ml-2">vs mois dernier</span>
        </div>
    </div>

    <!-- Épargne Card -->
    <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <div class="bg-purple-500/10 p-3 rounded-xl">
                <i class="fas fa-piggy-bank text-purple-500 text-xl"></i>
            </div>
            <div class="flex items-center space-x-1 text-purple-500">
                <i class="fas fa-arrow-up text-sm"></i>
                <span class="text-sm font-medium">5.7%</span>
            </div>
        </div>
        <h3 class="text-gray-500 text-sm font-medium">Total Épargné</h3>
        <div class="mt-2 flex items-baseline">
            <p class="text-2xl font-bold text-brand-dark">15,320</p>
            <span class="ml-1 text-gray-500">DH</span>
        </div>
        <div class="mt-4 flex items-center text-sm text-gray-500">
            <span class="flex items-center text-purple-500">
                <i class="fas fa-arrow-up mr-1 text-xs"></i>
                +1,200 DH
            </span>
            <span class="ml-2">vs mois dernier</span>
        </div>
    </div>
</div>