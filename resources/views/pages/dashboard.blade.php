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
    // Spending Trends Chart
    const expensesCtx = document.getElementById('expensesChart').getContext('2d');
    new Chart(expensesCtx, {
        type: 'line',
        data: {
            labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            datasets: [{
                label: 'Dépenses',
                data: [500, 800, 450, 1000, 600, 750, 400],
                borderColor: '#2563eb',
                backgroundColor: '#2563eb10',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: true,
                        drawBorder: false,
                        color: '#f1f5f9'
                    },
                    ticks: {
                        callback: function(value) {
                            return value + ' DH';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Category Donut Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: ['Alimentation', 'Transport', 'Factures', 'Loisirs'],
            datasets: [{
                data: [1250, 850, 1100, 600],
                backgroundColor: [
                    '#2563eb', // brand-primary
                    '#16a34a', // brand-secondary
                    '#8b5cf6', // purple-500
                    '#f97316' // orange-500
                ],
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
                            return `${context.label}: ${value} DH (${percentage}%)`;
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
@include('components.modals.add-transaction');
@include('components.modals.update-salary');
@endpush