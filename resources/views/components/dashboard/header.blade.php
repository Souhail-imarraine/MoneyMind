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
                        <button onclick="toggleNotificationModal()"
                                class="p-2 text-gray-600 hover:text-brand-primary rounded-lg transition-colors">
                            <i class="fas fa-bell"></i>
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                    </div>

                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button class="flex items-center space-x-3 text-gray-600 hover:text-brand-primary">
                            <img src="https://ui-avatars.com/api/?name=John+Doe" class="w-8 h-8 rounded-full">
                            <span class="font-medium">{{$user->name}}</span>
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
                <h2 class="text-2xl font-bold text-brand-dark">Bonjour, {{ $user->name }} 👋</h2>
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

    <!-- IA Insights Section -->
    <div class="border-b border-gray-200 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-4">
            <div class="flex items-start space-x-4">
                <!-- AI Icon -->
                <div class="flex-shrink-0 w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center">
                    <i class="fas fa-robot text-gray-600"></i>
                </div>

                <!-- Insights Content -->
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-medium text-gray-900">
                            Insights IA
                        </h3>
                        <button class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <!-- Insights List -->
                    <div class="space-y-4">
                        <!-- Insight 1 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-3">
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-chart-line text-gray-400 mt-1"></i>
                                <div>
                                    <p class="text-sm text-gray-600">
                                        <span class="font-medium text-gray-900">Dépenses inhabituelles :</span>
                                        Vos dépenses en restauration ont augmenté de 45% ce mois-ci.
                                    </p>
                                    <div class="mt-2">
                                        <button class="text-sm text-blue-600 hover:text-blue-800">
                                            Voir détails
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Insight 2 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-3">
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-piggy-bank text-gray-400 mt-1"></i>
                                <div>
                                    <p class="text-sm text-gray-600">
                                        <span class="font-medium text-gray-900">Conseil d'épargne :</span>
                                        Potentiel d'économie de 200 DH ce mois-ci.
                                    </p>
                                    <div class="mt-2">
                                        <button class="text-sm text-blue-600 hover:text-blue-800">
                                            Voir suggestions
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Simple Pagination -->
                    <div class="flex justify-center mt-3 space-x-1">
                        <div class="w-2 h-2 rounded-full bg-gray-800"></div>
                        <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Notification Modal -->
<div id="notificationModal"
     class="hidden fixed inset-0 z-50 overflow-y-auto"
     aria-labelledby="notification-modal"
     role="dialog"
     aria-modal="true">

    <!-- Background overlay -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <!-- Modal position -->
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 sm:items-center sm:p-0">
            <!-- Modal panel -->
            <div class="relative transform overflow-hidden rounded-xl bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <!-- Modal header -->
                <div class="border-b border-gray-200 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-brand-dark">Notifications</h3>
                        <button onclick="toggleNotificationModal()" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Notification filters -->
                <div class="border-b border-gray-200 px-6 py-2">
                    <div class="flex items-center space-x-4">
                        <button class="px-3 py-2 text-sm font-medium text-brand-primary border-b-2 border-brand-primary">
                            Toutes (5)
                        </button>
                        <button class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700">
                            Non lues (3)
                        </button>
                    </div>
                </div>

                <!-- Notifications list -->
                <div class="max-h-[400px] overflow-y-auto">
                    <!-- Unread notification -->
                    <div class="px-6 py-4 bg-blue-50/50 border-b border-gray-100 hover:bg-gray-50">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 mt-1">
                                <span class="w-2 h-2 bg-brand-primary rounded-full block"></span>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-start justify-between">
                                    <p class="text-sm font-medium text-brand-dark">Dépassement de budget</p>
                                    <span class="text-xs text-gray-500">Il y a 2h</span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">
                                    Vous avez dépassé votre budget "Alimentation" de 150 DH.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Read notification -->
                    <div class="px-6 py-4 border-b border-gray-100 hover:bg-gray-50">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-green-500 text-sm"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-start justify-between">
                                    <p class="text-sm font-medium text-brand-dark">Objectif atteint</p>
                                    <span class="text-xs text-gray-500">Hier</span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">
                                    Félicitations ! Vous avez atteint votre objectif d'épargne mensuel.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- System notification -->
                    <div class="px-6 py-4 border-b border-gray-100 hover:bg-gray-50">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-info text-blue-500 text-sm"></i>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-start justify-between">
                                    <p class="text-sm font-medium text-brand-dark">Mise à jour système</p>
                                    <span class="text-xs text-gray-500">2 jours</span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">
                                    Nouvelles fonctionnalités disponibles ! Découvrez les dernières mises à jour.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="border-t border-gray-200 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <button class="text-sm text-brand-primary font-medium hover:text-brand-primary/80">
                            Marquer tout comme lu
                        </button>
                        <button class="text-sm text-gray-500 hover:text-gray-700">
                            Voir toutes les notifications
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function toggleNotificationModal() {
    const modal = document.getElementById('notificationModal');
    if (modal.classList.contains('hidden')) {
        // Show modal
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    } else {
        // Hide modal
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Restore scrolling
    }
}

// Close modal when clicking outside
document.getElementById('notificationModal').addEventListener('click', function(e) {
    if (e.target === this) {
        toggleNotificationModal();
    }
});
</script>
@endpush
