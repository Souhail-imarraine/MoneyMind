@extends('layouts.app')

@section('title', 'Notifications')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-6">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-brand-dark">Notifications</h2>
                <p class="text-gray-600 mt-1">Gérez vos notifications et alertes</p>
            </div>
            
            <div class="flex items-center space-x-3">
                <button class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-brand-primary hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-check-double mr-2"></i>
                    Tout marquer comme lu
                </button>
                <button class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-brand-primary hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-cog mr-2"></i>
                    Paramètres
                </button>
            </div>
        </div>

        <!-- Breadcrumbs -->
        <div class="mt-4 flex items-center text-sm text-gray-500">
            <a href="#" class="hover:text-brand-primary">Accueil</a>
            <i class="fas fa-chevron-right text-xs mx-2"></i>
            <span class="text-brand-primary">Notifications</span>
        </div>
    </div>

    <!-- Notifications Container -->
    <div class="bg-white rounded-xl shadow-sm">
        <!-- Filters -->
        <div class="p-4 border-b border-gray-200">
            <div class="flex items-center space-x-4">
                <button class="px-4 py-2 text-sm font-medium text-brand-primary bg-brand-primary/10 rounded-lg">
                    Toutes (12)
                </button>
                <button class="px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg">
                    Non lues (3)
                </button>
                <button class="px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg">
                    Importantes (2)
                </button>
            </div>
        </div>

        <!-- Notifications List -->
        <div class="divide-y divide-gray-200">
            <!-- Unread Notification -->
            <div class="p-4 bg-blue-50/50 hover:bg-gray-50 transition-colors">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <span class="w-2 h-2 bg-brand-primary rounded-full block"></span>
                    </div>
                    <div class="ml-4 flex-1">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-brand-dark">Dépassement de budget</p>
                            <span class="text-xs text-gray-500">Il y a 2 heures</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">
                            Vous avez dépassé votre budget "Alimentation" de 150 DH ce mois-ci.
                        </p>
                        <div class="mt-3 flex items-center space-x-4">
                            <button class="text-xs text-brand-primary font-medium hover:text-brand-primary/80">
                                Voir les détails
                            </button>
                            <button class="text-xs text-gray-600 font-medium hover:text-gray-800">
                                Marquer comme lu
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Read Notification -->
            <div class="p-4 hover:bg-gray-50 transition-colors">
                <div class="flex">
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Objectif atteint</p>
                            <span class="text-xs text-gray-500">Hier</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">
                            Félicitations ! Vous avez atteint votre objectif d'épargne mensuel.
                        </p>
                        <div class="mt-3">
                            <button class="text-xs text-brand-primary font-medium hover:text-brand-primary/80">
                                Voir les détails
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Important Notification -->
            <div class="p-4 hover:bg-gray-50 transition-colors">
                <div class="flex">
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">
                                <i class="fas fa-star text-yellow-400 mr-2"></i>
                                Nouvelle fonctionnalité disponible
                            </p>
                            <span class="text-xs text-gray-500">Il y a 2 jours</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">
                            Découvrez notre nouvelle fonctionnalité d'analyse prédictive des dépenses.
                        </p>
                        <div class="mt-3">
                            <button class="text-xs text-brand-primary font-medium hover:text-brand-primary/80">
                                En savoir plus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-600">
                    Affichage de 1 à 3 sur 12 notifications
                </p>
                <div class="flex items-center space-x-2">
                    <button class="px-3 py-1 border rounded-lg text-sm text-gray-600 hover:bg-gray-50">
                        Précédent
                    </button>
                    <button class="px-3 py-1 border rounded-lg text-sm text-gray-600 hover:bg-gray-50">
                        Suivant
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 