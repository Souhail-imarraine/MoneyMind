@extends('layouts.app')

@section('title', 'Transactions')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-6">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-brand-dark">Transactions</h2>
                <p class="text-gray-600 mt-1">Gérez et suivez vos transactions</p>
            </div>

            <!-- Header Actions -->
            <div class="flex items-center space-x-3">
                <button
                    class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-brand-primary hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-filter mr-2"></i>
                    Filtres
                </button>
                <button
                    class="flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-brand-primary hover:bg-gray-50 rounded-lg transition-colors">
                    <i class="fas fa-download mr-2"></i>
                    Exporter
                </button>
            </div>
        </div>

        <!-- Breadcrumbs -->
        <div class="mt-4 flex items-center text-sm text-gray-500">
            <a href="#" class="hover:text-brand-primary">Accueil</a>
            <i class="fas fa-chevron-right text-xs mx-2"></i>
            <span class="text-brand-primary">Transactions</span>
        </div>
    </div>

    <!-- Transaction Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Transactions -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-brand-primary/10 p-3 rounded-xl">
                    <i class="fas fa-exchange-alt text-brand-primary text-xl"></i>
                </div>
                <span class="text-brand-primary text-sm font-medium">Ce mois</span>
            </div>
            <h3 class="text-gray-500 text-sm font-medium">Total Transactions</h3>
            <p class="text-2xl font-bold text-brand-dark mt-2">127</p>
            <div class="mt-4 flex items-center text-sm text-brand-secondary">
                <i class="fas fa-arrow-up mr-1 text-xs"></i>
                <span>+12.5% vs mois dernier</span>
            </div>
        </div>

        <!-- Total Dépenses -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-red-500/10 p-3 rounded-xl">
                    <i class="fas fa-arrow-up text-red-500 text-xl"></i>
                </div>
                <span class="text-brand-primary text-sm font-medium">Ce mois</span>
            </div>
            <h3 class="text-gray-500 text-sm font-medium">Total Dépenses</h3>
            <p class="text-2xl font-bold text-brand-dark mt-2">4,890 DH</p>
            <div class="mt-4 flex items-center text-sm text-red-500">
                <i class="fas fa-arrow-up mr-1 text-xs"></i>
                <span>+8.2% vs mois dernier</span>
            </div>
        </div>

        <!-- Total Revenus -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-green-500/10 p-3 rounded-xl">
                    <i class="fas fa-arrow-down text-green-500 text-xl"></i>
                </div>
                <span class="text-brand-primary text-sm font-medium">Ce mois</span>
            </div>
            <h3 class="text-gray-500 text-sm font-medium">Total Revenus</h3>
            <p class="text-2xl font-bold text-brand-dark mt-2">8,750 DH</p>
            <div class="mt-4 flex items-center text-sm text-green-500">
                <i class="fas fa-arrow-up mr-1 text-xs"></i>
                <span>+15.3% vs mois dernier</span>
            </div>
        </div>
    </div>
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 space-y-4 sm:space-y-0">
        <h2 class="text-xl font-semibold text-brand-dark">Transactions</h2>
        <button onclick="openAddTransactionModal()"
            class="w-full sm:w-auto bg-brand-primary text-white px-4 py-2.5 rounded-lg hover:bg-brand-primary/90 transition-colors flex items-center justify-center space-x-2">
            <i class="fas fa-plus"></i>
            <span>Nouvelle Transaction</span>
        </button>
    </div>

    <!-- Transactions Table Section -->
    <div class="bg-white rounded-xl shadow-sm">
        <!-- Table Header with Filters -->
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                <!-- Search -->
                <div class="relative w-full md:w-64">
                    <input type="text" placeholder="Rechercher une transaction..."
                        class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary text-sm">
                    <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
                </div>

                <!-- Filters -->
                <div class="flex items-center space-x-4">
                    <select
                        class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary">
                        <option>Tous les types</option>
                        <option>Dépenses</option>
                        <option>Revenus</option>
                    </select>
                    <select
                        class="bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 text-sm focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary">
                        <option>Ce mois</option>
                        <option>3 derniers mois</option>
                        <option>Cette année</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Catégorie</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Montant</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Transaction Row -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            20 Mars 2024
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            Courses Supermarché
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Alimentation
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">
                            <span class="inline-flex items-center text-red-600">
                                <i class="fas fa-arrow-up mr-1 text-xs"></i>
                                Dépense
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-red-600">
                            -350 DH
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                            <button class="text-gray-400 hover:text-brand-primary mx-1">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-400 hover:text-red-600 mx-1">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Add more transaction rows here -->
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-600">
                    Affichage de 1 à 10 sur 127 transactions
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

    <!-- New Transaction Modal -->
    <div id="addTransactionModal" 
         class="hidden fixed inset-0 z-50 overflow-y-auto"
         aria-labelledby="transaction-modal"
         role="dialog"
         aria-modal="true">
        
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <!-- Modal position -->
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4">
                <!-- Modal panel -->
                <div class="relative transform overflow-hidden rounded-xl bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-brand-dark">Nouvelle Transaction</h3>
                            <button onclick="closeAddTransactionModal()" class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <form class="p-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                                <select class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-brand-primary/20">
                                    <option>Dépense</option>
                                    <option>Revenu</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Montant (DH)</label>
                                <input type="number" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-brand-primary/20">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                                <select class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-brand-primary/20">
                                    <option>Alimentation</option>
                                    <option>Transport</option>
                                    <option>Factures</option>
                                    <option>Loisirs</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                                <input type="date" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-brand-primary/20">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Note</label>
                                <textarea class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-brand-primary/20" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end space-x-3">
                            <button type="button" onclick="closeAddTransactionModal()" 
                                class="px-4 py-2 text-gray-600 hover:text-gray-800">
                                Annuler
                            </button>
                            <button type="submit" 
                                class="px-4 py-2 bg-brand-primary text-white rounded-lg hover:bg-brand-primary/90">
                                Ajouter la transaction
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function openAddTransactionModal() {
    document.getElementById('addTransactionModal').classList.remove('hidden');
}

function closeAddTransactionModal() {
    document.getElementById('addTransactionModal').classList.add('hidden');
}

// Close modal when clicking outside
document.getElementById('addTransactionModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAddTransactionModal();
    }
});
</script>
@endpush
@endsection