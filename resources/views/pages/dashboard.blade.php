@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-6">
    @include('components.dashboard.header')
    @include('components.dashboard.stats')
    @include('components.dashboard.charts')

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const data = @json($expensesAndGoals);

    // Configuration du graphique
    const ctx = document.getElementById('expensesGoalsChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: data.map(item => item.label),
            datasets: [{
                data: data.map(item => item.amount),
                backgroundColor: data.map(item => item.color),
                borderWidth: 0,
                cutout: '75%'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const value = context.raw;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${context.label}: ${value.toLocaleString()} DH (${percentage}%)`;
                        }
                    }
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    });
});


document.addEventListener('DOMContentLoaded', function() {
    // Données mensuelles
    const monthlyData = @json($monthlyTrends);

    // Configuration du graphique
    const ctx = document.getElementById('expensesChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar', // Changé en graphique à barres
        data: {
            labels: monthlyData.map(item => item.month),
            datasets: [{
                label: 'Dépenses mensuelles',
                data: monthlyData.map(item => item.total),
                backgroundColor: '#2563eb',
                borderRadius: 6,
                barThickness: 20,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.raw.toLocaleString() + ' DH';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f1f5f9'
                    },
                    ticks: {
                        callback: value => value.toLocaleString() + ' DH'
                    }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });
});

document.getElementById('editSalaryButton').addEventListener('click', function() {
    document.getElementById('editSalaryModal').classList.remove('hidden');
    document.getElementById('modalBackground').classList.remove('hidden');
});

document.getElementById('closeModalButton').addEventListener('click', function() {
    document.getElementById('editSalaryModal').classList.add('hidden');
    document.getElementById('modalBackground').classList.add('hidden');
});

</script>
@endpush
@push('modals')
@include('components.modals.update-salary');
@endpush

<style>
    /* Couleurs pour les points de légende */
    .chart-color-0 { background-color: #2563eb; }
    .chart-color-1 { background-color: #16a34a; }
    .chart-color-2 { background-color: #8b5cf6; }
    .chart-color-3 { background-color: #f97316; }
    .chart-color-4 { background-color: #ef4444; }
    .chart-color-5 { background-color: #06b6d4; }
    </style>


