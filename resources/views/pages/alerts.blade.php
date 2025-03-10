@extends('layouts.app')

@section('title', 'Alertes de Dépenses')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Card principale -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <!-- En-tête -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-900">
                Alertes de Dépenses
            </h2>
            <button onclick="openModal()"
                    class="bg-brand-primary text-white px-4 py-2 rounded-lg hover:bg-brand-primary/90 transition">
                <i class="fas fa-plus mr-2"></i>
                Nouvelle Alerte
            </button>
        </div>

        <!-- Liste des alertes -->
        <div class="space-y-4">
            @forelse($alerts as $alert)
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-100">
                    <div>
                        <h3 class="font-medium text-gray-900">{{ $alert->name }}</h3>
                        <p class="text-sm text-gray-600">
                            Seuil d'alerte: {{ $alert->threshold_percentage }}% du revenu mensuel
                        </p>
                        <span class="text-xs text-gray-500">
                            Créée le {{ $alert->created_at->format('d/m/Y') }}
                        </span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <!-- Status -->
                        <span class="px-3 py-1 text-xs rounded-full {{ $alert->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $alert->is_active ? 'Active' : 'Inactive' }}
                        </span>

                        <!-- Actions -->
                        <div class="flex items-center space-x-2">
                            <form action="{{ route('alerts.destroy', $alert) }}" method="POST"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette alerte ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50 transition">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12">
                    <div class="text-gray-400 mb-4">
                        <i class="fas fa-bell-slash text-4xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">
                        Aucune alerte configurée
                    </h3>
                    <p class="text-gray-500 mb-4">
                        Créez votre première alerte pour être notifié quand vos dépenses dépassent un certain seuil.
                    </p>
                    <button onclick="openModal()"
                            class="text-brand-primary hover:text-brand-primary/90 font-medium">
                        <i class="fas fa-plus mr-2"></i>
                        Créer une alerte
                    </button>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Modal pour nouvelle alerte -->
<div id="alertModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-gray-900">
                    Nouvelle Alerte
                </h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="{{ route('alerts.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Nom de l'alerte
                        </label>
                        <input type="text" name="name" required
                               class="w-full rounded-lg border-gray-300">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Type d'alerte
                        </label>
                        <select name="alert_type" id="alertType"
                                class="w-full rounded-lg border-gray-300"
                                onchange="toggleCategorySelect()">
                            <option value="total">Dépenses totales</option>
                            <option value="category">Par catégorie</option>
                        </select>
                    </div>

                    <div id="categorySelect" class="hidden">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Catégorie
                        </label>
                        <select name="category_id"
                                class="w-full rounded-lg border-gray-300">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Seuil d'alerte (pourcentage)
                        </label>
                        <div class="relative">
                            <input type="number" name="threshold_percentage" required
                                   min="1" max="100"
                                   class="w-full rounded-lg border-gray-300">
                            <span class="absolute right-3 top-2">%</span>
                        </div>
                    </div>

                    <button type="submit"
                            class="w-full bg-blue-600 text-white rounded-lg py-2">
                        Créer l'alerte
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@if(session('success'))
    <div id="successAlert"
         class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
        {{ session('success') }}
    </div>
@endif

@push('scripts')
<script>
function openModal() {
    document.getElementById('alertModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('alertModal').classList.add('hidden');
}

// Fermer le message de succès après 3 secondes
document.addEventListener('DOMContentLoaded', function() {
    const successAlert = document.getElementById('successAlert');
    if (successAlert) {
        setTimeout(() => {
            successAlert.remove();
        }, 3000);
    }
});

function toggleCategorySelect() {
    const alertType = document.getElementById('alertType').value;
    const categorySelect = document.getElementById('categorySelect');

    if (alertType === 'category') {
        categorySelect.classList.remove('hidden');
    } else {
        categorySelect.classList.add('hidden');
    }
}
</script>
@endpush
@endsection
