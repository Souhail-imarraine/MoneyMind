@extends('layouts.app')

@section('title', 'Objectifs')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-6">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-brand-dark">Objectifs & Souhaits</h2>
                <p class="text-gray-600 mt-1">Suivez vos objectifs d'épargne et votre liste de souhaits</p>
            </div>
            
            <div class="flex items-center space-x-3">
                <button class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-brand-primary hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-filter mr-2"></i>
                    Filtrer
                </button>
                <button onclick="openNewGoalModal()" 
                    class="bg-brand-primary text-white px-4 py-2 rounded-lg hover:bg-brand-primary/90 transition-colors flex items-center space-x-2">
                    <i class="fas fa-plus"></i>
                    <span>Nouvel Objectif</span>
                </button>
            </div>
        </div>

        <!-- Breadcrumbs -->
        <div class="mt-4 flex items-center text-sm text-gray-500">
            <a href="#" class="hover:text-brand-primary">Accueil</a>
            <i class="fas fa-chevron-right text-xs mx-2"></i>
            <span class="text-brand-primary">Objectifs</span>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <!-- Total Savings -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-brand-primary/10 p-3 rounded-xl">
                        <i class="fas fa-piggy-bank text-brand-primary text-xl"></i>
                    </div>
                </div>
                <h3 class="text-gray-500 text-sm font-medium">Total Épargné</h3>
                <p class="text-2xl font-bold text-brand-dark mt-2">7,800 DH</p>
                <div class="mt-4 flex items-center text-sm text-green-600">
                    <i class="fas fa-arrow-up mr-1 text-xs"></i>
                    <span>+12.5% ce mois</span>
                </div>
            </div>

            <!-- Active Goals -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-purple-500/10 p-3 rounded-xl">
                        <i class="fas fa-bullseye text-purple-500 text-xl"></i>
                    </div>
                </div>
                <h3 class="text-gray-500 text-sm font-medium">Objectifs Actifs</h3>
                <p class="text-2xl font-bold text-brand-dark mt-2">5</p>
                <div class="mt-4 flex items-center text-sm text-purple-500">
                    <span>3 en bonne voie</span>
                </div>
            </div>

            <!-- Wishlist Items -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-brand-secondary/10 p-3 rounded-xl">
                        <i class="fas fa-gift text-brand-secondary text-xl"></i>
                    </div>
                </div>
                <h3 class="text-gray-500 text-sm font-medium">Liste de Souhaits</h3>
                <p class="text-2xl font-bold text-brand-dark mt-2">4</p>
                <div class="mt-4 flex items-center text-sm text-brand-secondary">
                    <span>2 priorité haute</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="space-y-6">
        <!-- Savings Goals Section -->
        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-3">
                        <h3 class="text-lg font-semibold text-brand-dark">Objectifs d'Épargne</h3>
                        <span class="bg-brand-primary/10 text-brand-primary text-xs px-2 py-1 rounded-lg font-medium">
                            3 actifs
                        </span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <select class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-sm focus:ring-2 focus:ring-brand-primary/20">
                            <option>Tous les objectifs</option>
                            <option>En cours</option>
                            <option>Complétés</option>
                        </select>
                    </div>
                </div>

                <!-- Goals List -->
                <div class="space-y-6">
                    <!-- Goal Item 1 -->
                    <div class="p-4 border border-gray-100 rounded-xl hover:border-brand-primary/20 transition-colors">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-4">
                                <div class="bg-brand-primary/10 p-3 rounded-xl">
                                    <i class="fas fa-piggy-bank text-brand-primary"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-brand-dark">Épargne Mensuelle</h4>
                                    <p class="text-sm text-gray-600">Échéance: 30 avril 2024</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-lg font-medium">
                                    En bonne voie
                                </span>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center space-x-2">
                                <span class="text-sm font-medium text-brand-dark">200 DH</span>
                                <span class="text-sm text-gray-500">épargnés sur</span>
                                <span class="text-sm font-medium text-brand-dark">300 DH</span>
                            </div>
                            <span class="text-sm font-medium text-brand-primary">66%</span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-2 bg-brand-primary rounded-full transition-all duration-500" style="width: 66%"></div>
                        </div>
                    </div>

                    <!-- Goal Item 2 -->
                    <div class="p-4 border border-gray-100 rounded-xl hover:border-brand-primary/20 transition-colors">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-4">
                                <div class="bg-purple-500/10 p-3 rounded-xl">
                                    <i class="fas fa-shield-alt text-purple-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-brand-dark">Fonds d'Urgence</h4>
                                    <p class="text-sm text-gray-600">Échéance: 31 déc 2024</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="bg-yellow-100 text-yellow-700 text-xs px-2 py-1 rounded-lg font-medium">
                                    En retard
                                </span>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center space-x-2">
                                <span class="text-sm font-medium text-brand-dark">5000 DH</span>
                                <span class="text-sm text-gray-500">épargnés sur</span>
                                <span class="text-sm font-medium text-brand-dark">10000 DH</span>
                            </div>
                            <span class="text-sm font-medium text-brand-primary">50%</span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-2 bg-brand-primary rounded-full transition-all duration-500" style="width: 50%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wishlist Section -->
        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-3">
                        <h3 class="text-lg font-semibold text-brand-dark">Liste de Souhaits</h3>
                        <span class="bg-brand-secondary/10 text-brand-secondary text-xs px-2 py-1 rounded-lg font-medium">
                            4 souhaits
                        </span>
                    </div>
                    <button onclick="openNewWishModal()" 
                        class="text-sm text-brand-primary hover:text-brand-primary/80 flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>Ajouter un souhait</span>
                    </button>
                </div>

                <!-- Wishlist Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Wish Item 1 -->
                    <div class="p-4 border border-gray-100 rounded-xl hover:border-brand-secondary/20 transition-colors">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-headphones text-gray-500 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h4 class="font-medium text-brand-dark">Casque Audio</h4>
                                    <span class="bg-red-100 text-red-700 text-xs px-2 py-1 rounded-lg font-medium">
                                        Priorité Haute
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">Ajouté il y a 2 jours</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center space-x-2">
                                <span class="text-sm font-medium text-brand-dark">600 DH</span>
                                <span class="text-sm text-gray-500">épargnés sur</span>
                                <span class="text-sm font-medium text-brand-dark">1000 DH</span>
                            </div>
                            <span class="text-sm font-medium text-brand-secondary">60%</span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-2 bg-brand-secondary rounded-full transition-all duration-500" style="width: 60%"></div>
                        </div>
                    </div>

                    <!-- Wish Item 2 -->
                    <div class="p-4 border border-gray-100 rounded-xl hover:border-brand-secondary/20 transition-colors">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="w-12 h-12 bg-gray-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-laptop text-gray-500 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h4 class="font-medium text-brand-dark">Ordinateur Portable</h4>
                                    <span class="bg-yellow-100 text-yellow-700 text-xs px-2 py-1 rounded-lg font-medium">
                                        Priorité Moyenne
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">Ajouté il y a 5 jours</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center space-x-2">
                                <span class="text-sm font-medium text-brand-dark">2000 DH</span>
                                <span class="text-sm text-gray-500">épargnés sur</span>
                                <span class="text-sm font-medium text-brand-dark">8000 DH</span>
                            </div>
                            <span class="text-sm font-medium text-brand-secondary">25%</span>
                        </div>
                        <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-2 bg-brand-secondary rounded-full transition-all duration-500" style="width: 25%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Goal Modal Template -->
<div id="newGoalModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-brand-dark mb-4">Nouvel Objectif d'Épargne</h3>
            <form>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom de l'objectif</label>
                        <input type="text" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-brand-primary/20">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Montant Cible (DH)</label>
                        <input type="number" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-brand-primary/20">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Date d'échéance</label>
                        <input type="date" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-brand-primary/20">
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end space-x-3">
                    <button type="button" onclick="closeNewGoalModal()" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                        Annuler
                    </button>
                    <button type="submit" class="px-4 py-2 bg-brand-primary text-white rounded-lg hover:bg-brand-primary/90">
                        Créer l'objectif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function openNewGoalModal() {
    document.getElementById('newGoalModal').classList.remove('hidden');
}

function closeNewGoalModal() {
    document.getElementById('newGoalModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('newGoalModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeNewGoalModal();
    }
});
</script>
@endpush
@endsection 