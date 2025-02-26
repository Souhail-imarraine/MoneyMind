<div class="bg-white shadow-sm mb-8">
    <!-- Top Header Bar -->
    <div class="border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Left Side -->
                <div class="flex items-center space-x-8">
                    <h1 class="text-xl font-semibold text-brand-dark flex items-center">
                        <i class="fas fa-wallet text-brand-primary mr-2"></i>
                        FinanceFlow
                    </h1>
                </div>

                <!-- Right Side -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <div class="relative">
                        <button class="p-2 text-gray-600 hover:text-brand-primary rounded-lg">
                            <i class="fas fa-bell"></i>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                    </div>

                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button class="flex items-center space-x-3 text-gray-600 hover:text-brand-primary">
                            <img src="https://ui-avatars.com/api/?name=John+Doe" class="w-8 h-8 rounded-full">
                            <span class="font-medium">John Doe</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Welcome Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-6">
        <div class="flex items-center justify-between">
            <!-- Welcome Message -->
            <div>
                <h2 class="text-2xl font-bold text-brand-dark">Bonjour, John 👋</h2>
                <p class="text-gray-600 mt-1">Voici le résumé de vos finances</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center space-x-2">
                <button
                    class="flex items-center px-3 py-1.5 text-sm font-medium text-gray-600 hover:text-brand-primary hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-download mr-2"></i>
                    Exporter
                </button>
                <button
                    class="flex items-center px-3 py-1.5 text-sm font-medium text-gray-600 hover:text-brand-primary hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-cog mr-2"></i>
                    Paramètres
                </button>
            </div>
        </div>

        <!-- Breadcrumbs -->
        <div class="mt-4 flex items-center text-sm text-gray-500">
            <a href="#" class="hover:text-brand-primary">Accueil</a>
            <i class="fas fa-chevron-right text-xs mx-2"></i>
            <span class="text-brand-primary">Dashboard</span>
        </div>
    </div>

    <!-- IA Insights Alert Section -->
    <div class="border-b border-gray-200 bg-gradient-to-r from-brand-primary/5 to-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-4">
            <div class="flex items-start space-x-6">
                <!-- AI Icon -->
                <div class="flex-shrink-0 w-12 h-12 bg-brand-primary/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-robot text-brand-primary text-xl"></i>
                </div>

                <!-- Insights Content -->
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-lg font-semibold text-brand-dark flex items-center">
                            Insights IA
                            <span class="ml-2 text-xs bg-brand-primary/10 text-brand-primary px-2 py-0.5 rounded-full">
                                Nouveau
                            </span>
                        </h3>
                        <button class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <!-- Insights Carousel -->
                    <div class="relative">
                        <div class="overflow-hidden">
                            <div class="flex items-start space-x-4">
                                <!-- Insight Card 1 -->
                                <div
                                    class="flex-shrink-0 w-full max-w-md bg-white rounded-xl border border-gray-100 p-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-chart-line text-yellow-500"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">
                                                <span class="font-medium text-brand-dark">Dépenses inhabituelles
                                                    détectées :</span>
                                                Vos dépenses en restauration ont augmenté de 45% ce mois-ci par rapport
                                                à votre moyenne habituelle.
                                            </p>
                                            <div class="mt-2 flex items-center space-x-3">
                                                <button
                                                    class="text-xs text-brand-primary font-medium hover:text-brand-primary/80">
                                                    Voir l'analyse complète
                                                </button>
                                                <button class="text-xs text-gray-500 hover:text-gray-700">
                                                    Ignorer
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Insight Card 2 -->
                                <div
                                    class="flex-shrink-0 w-full max-w-md bg-white rounded-xl border border-gray-100 p-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0">
                                            <i class="fas fa-piggy-bank text-green-500"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-600">
                                                <span class="font-medium text-brand-dark">Opportunité d'épargne :</span>
                                                Basé sur vos habitudes, vous pourriez économiser 200 DH supplémentaires
                                                ce mois-ci.
                                            </p>
                                            <div class="mt-2 flex items-center space-x-3">
                                                <button
                                                    class="text-xs text-brand-primary font-medium hover:text-brand-primary/80">
                                                    Voir les suggestions
                                                </button>
                                                <button class="text-xs text-gray-500 hover:text-gray-700">
                                                    Plus tard
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Dots -->
                        <div class="flex items-center justify-center mt-4 space-x-2">
                            <button class="w-2 h-2 rounded-full bg-brand-primary"></button>
                            <button class="w-2 h-2 rounded-full bg-gray-300"></button>
                            <button class="w-2 h-2 rounded-full bg-gray-300"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>