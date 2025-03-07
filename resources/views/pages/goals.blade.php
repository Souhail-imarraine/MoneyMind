@extends('layouts.app')

@section('title', 'Objectifs')

@section('content')
@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
    <span class="block sm:inline">{{ session('success') }}</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20">
            <title>Close</title>
            <path
                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
        </svg>
    </span>
</div>
@endif
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-6">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-brand-dark">Objectifs d'Épargne</h2>
                <p class="text-gray-600 mt-1">Suivez et atteignez vos objectifs financiers</p>
            </div>

            <button onclick="openNewGoalModal()"
                class="bg-brand-primary text-white px-4 py-2 rounded-lg hover:bg-brand-primary/90 transition-colors flex items-center space-x-2">
                <i class="fas fa-plus"></i>
                <span>Nouvel Objectif</span>
            </button>
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
                <p class="text-2xl font-bold text-brand-dark mt-2">{{$goals->sum('current_amount')}} DH</p>
                <div class="mt-4 flex items-center text-sm text-green-600">
                    <i class="fas fa-arrow-up mr-1 text-xs"></i>
                    <span>+12.5% ce mois</span>
                </div>
            </div>

            <!-- Target Amount -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-purple-500/10 p-3 rounded-xl">
                        <i class="fas fa-bullseye text-purple-500 text-xl"></i>
                    </div>
                </div>
                <h3 class="text-gray-500 text-sm font-medium">Montant Cible Total</h3>
                <p class="text-2xl font-bold text-brand-dark mt-2">{{$totalTargetAmount}} DH</p>
                <div class="mt-4 flex items-center text-sm text-purple-500">
                    <span>Objectif global</span>
                </div>
            </div>

            <!-- Progress Overview -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-brand-secondary/10 p-3 rounded-xl">
                        <i class="fas fa-chart-line text-brand-secondary text-xl"></i>
                    </div>
                </div>
                <h3 class="text-gray-500 text-sm font-medium">Progression Globale</h3>
                <p class="text-2xl font-bold text-brand-dark mt-2">52%</p>
                <div class="mt-4">
                    <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                        <div class="h-2 bg-brand-secondary rounded-full transition-all duration-500" style="width: 52%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Main Content -->
    <div class="space-y-6">
        <!-- Savings Goals Section -->
        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center space-x-3">
                        <h3 class="text-lg font-semibold text-brand-dark">Mes Objectifs d'Épargne</h3>
                        <span class="bg-brand-primary/10 text-brand-primary text-xs px-2 py-1 rounded-lg font-medium">
                            {{$goals->count()}} actifs
                        </span>
                    </div>
                </div>

                <!-- Goals List -->
                <div class="space-y-6">
                    <!-- Goal Item 1 -->
                    @foreach ($goals as $goal)
                    <div
                        class="p-6 border border-gray-200 rounded-xl hover:border-brand-primary/20 transition-all duration-300 shadow-sm hover:shadow-md">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-4">
                                <div class="bg-brand-primary/10 p-3.5 rounded-xl">
                                    <i class="fas fa-piggy-bank text-brand-primary text-lg"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-brand-dark text-lg">{{$goal->name}}</h4>
                                    <p class="text-sm text-gray-600">Montant Cible: {{$goal->goal_amount}} DH</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span
                                    class="bg-green-100 text-green-700 text-xs px-3 py-1.5 rounded-lg font-medium flex items-center">
                                    <i class="fas fa-check-circle mr-1.5"></i>
                                    En bonne voie
                                </span>
                                <div class="flex space-x-2">
                                    <form action="{{ route('goals.destroy', ['id' => $goal->id]) }}" method="POST"
                                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet objectif?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-gray-500 hover:text-red-500 rounded-lg hover:bg-gray-100 transition-colors">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-medium text-brand-dark">{{$goal->monthly_saving}}DH</span>
                                </div>
                                <span class="text-sm text-gray-500">épargnés sur</span>
                                <span class="text-sm font-medium text-brand-dark">{{$goal->current_amount}} DH</span>
                            </div>
                            @php
                                $percentage = ($goal->current_amount / $goal->goal_amount) * 100;
                                $percentage = round($percentage);
                            @endphp
                            <span class="text-sm font-semibold text-brand-primary bg-brand-primary/10 px-3 py-1 rounded-lg"
                                id="percentage_{{$goal->id}}">{{$percentage}}%</span>
                        </div>
                        <div class="h-2.5 bg-gray-100 rounded-full overflow-hidden">
                            <div id="progress_{{$goal->id}}"
                                class="h-full bg-brand-primary rounded-full transition-all duration-500"
                                style="width: {{$percentage}}%">
                            </div>
                        </div>
                    </div>
                    @endforeach
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
            <form action="{{ route('goals.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom de l'objectif</label>
                        <input type="text" name="name" required
                            class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-brand-primary/20"
                            placeholder="Ex: Épargne Mensuelle">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Montant Cible (DH)</label>
                        <input type="number" name="goal_amount" required
                            class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-brand-primary/20"
                            placeholder="Ex: 300" min="0">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Montant mensuel à épargner
                            (DH)</label>
                        <input type="number" name="monthly_saving" required
                            class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-brand-primary/20"
                            placeholder="Ex: 500" min="0" step="100">
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end space-x-3">
                    <button type="button" onclick="closeNewGoalModal()"
                        class="px-4 py-2 text-gray-600 hover:text-gray-800">
                        Annuler
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-brand-primary text-white rounded-lg hover:bg-brand-primary/90">
                        Créer l'objectif
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const alert = document.querySelector('[role="alert"]');
    if (alert) {
        const closeButton = alert.querySelector('svg[role="button"]');
        closeButton.addEventListener('click', function() {
            alert.style.display = 'none';
        });
    }
});

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

function updateGoalProgress(id, value, total) {
    const percentage = Math.round((value / total) * 100);
    document.getElementById(`percentage_${id}`).textContent = `${percentage}%`;
    document.getElementById(`progress_${id}`).style.width = `${percentage}%`;

    // Make AJAX call to update progress
    fetch(`/goals/${id}/progress`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            amount: value
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Update the progress bar and percentage
            document.getElementById(`percentage_${id}`).textContent = `${data.percentage}%`;
            document.getElementById(`progress_${id}`).style.width = `${data.percentage}%`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
</script>
@endpush
@endsection
