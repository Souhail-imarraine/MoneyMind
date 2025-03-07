@extends('layouts.app')

@section('title', 'Transactions')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-6">
    <!-- Display Success Message -->
    @if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
        {{ session('error') }}
    </div>
    @endif


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
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Total Transactions -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="bg-brand-primary/10 p-3 rounded-xl">
                    <i class="fas fa-exchange-alt text-brand-primary text-xl"></i>
                </div>
                <span class="text-brand-primary text-sm font-medium">Ce mois</span>
            </div>
            <h3 class="text-gray-500 text-sm font-medium">Total Transactions</h3>
            <p class="text-2xl font-bold text-brand-dark mt-2">{{$totalTransaction}}</p>
            <div class="mt-4 flex items-center text-sm text-brand-secondary">
                <i class="fas fa-arrow-up mr-1 text-xs"></i>
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
            <p class="text-2xl font-bold text-brand-dark mt-2">{{$totalDépenses}} DH</p>
            <div class="mt-4 flex items-center text-sm text-red-500">
                <i class="fas fa-arrow-up mr-1 text-xs"></i>
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Catégorie</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Montant</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Récurrent</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($expenses as $expense)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-900">
                            {{ $expense->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($expense->date)->format('d F Y') }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $expense->category->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-red-600">
                            -{{ number_format($expense->amount, 2) }} DH
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $expense->is_recurring ? 'Oui' : 'Non' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                            <button
                                class="bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 rounded-lg px-2 py-1 mx-1"
                                onclick="openEditModal({{ $expense->id }})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form class="inline-block" action="{{ route('transactions.destroy', $expense->id) }}"
                                method="POST"
                                onsubmit="return confirm('Voulez-vous vraiment supprimer cette transaction?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300 rounded-lg px-2 py-1 mx-1"
                                    type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-600">
                    Affichage de {{ $expenses->firstItem() }} à {{ $expenses->lastItem() }} sur {{ $expenses->total() }}
                    transactions
                </p>
                <div class="flex items-center space-x-2">
                    <div class="flex items-center">
                        <a href="{{ $expenses->previousPageUrl() }}" class="px-4 py-2 text-sm text-gray-600 hover:bg-gray-200 rounded-lg" @if(!$expenses->onFirstPage()) @endif>
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        {{ $expenses->links() }} <!-- Default pagination links -->
                        <a href="{{ $expenses->nextPageUrl() }}" class="px-4 py-2 text-sm text-gray-600 hover:bg-gray-200 rounded-lg" @if(!$expenses->hasMorePages()) disabled @endif>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.modals.add-transaction')
    @include('components.modals.edit-transaction')
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

function closeEditTransactionModal() {
    document.getElementById('editTransactionModal').classList.add('hidden');
}
</script>
@endpush
@endsection
