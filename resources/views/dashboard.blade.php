<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    :root {
        --primary-color: #0C4B36;
        /* Vert foncé financier */
        --secondary-color: #FFD700;
        /* Or */
        --accent-color: #1C8A5E;
        /* Vert émeraude */
        --success-color: #00A86B;
        /* Vert monétaire */
        --warning-color: #FFB347;
        /* Orange pastel */
        --danger-color: #FF6B6B;
        /* Rouge corail */
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #F8FAFC;
    }

    .finance-gradient {
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
    }

    .card-hover:hover {
        transform: translateY(-4px);
        transition: all 0.3s ease;
    }
    </style>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    finance: {
                        primary: '#0C4B36',
                        secondary: '#FFD700',
                        accent: '#1C8A5E',
                        success: '#00A86B',
                        warning: '#FFB347',
                        danger: '#FF6B6B'
                    }
                }
            }
        }
    }
    </script>
</head>

<body class="min-h-screen">
    <div class="flex h-screen">
        <!-- Sidebar - Style mis à jour -->
        <aside class="w-64 bg-finance-primary text-white hidden lg:block">
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center space-x-3">
                    <div class="bg-finance-secondary rounded-lg p-2">
                        <i class="fas fa-coins text-finance-primary text-xl"></i>
                    </div>
                    <span class="text-xl font-bold">MoneyMind</span>
                </div>
            </div>

            <!-- Menu Navigation - Style mis à jour -->
            <nav class="mt-6 px-4">
                <div class="space-y-4">
                    <a href="#"
                        class="flex items-center space-x-3 p-3 rounded-lg bg-white/10 hover:bg-white/20 transition-colors">
                        <i class="fas fa-chart-line"></i>
                        <span>Vue d'ensemble</span>
                    </a>
                    <!-- Autres éléments du menu... -->
                </div>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header - Style mis à jour -->
            <header class="bg-white border-b border-gray-200">
                <div class="flex items-center justify-between p-4">
                    <button class="lg:hidden text-gray-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Rechercher..."
                                class="w-64 px-4 py-2 rounded-lg bg-gray-100 focus:ring-2 focus:ring-finance-accent border-none">
                            <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                        </div>

                        <button class="relative p-2 hover:bg-gray-100 rounded-lg">
                            <i class="fas fa-bell text-gray-600"></i>
                            <span
                                class="absolute -top-1 -right-1 bg-finance-danger text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">
                                3
                            </span>
                        </button>

                        <div class="flex items-center space-x-3">
                            <img src="https://ui-avatars.com/api/?background=0C4B36&color=fff" alt="Profile"
                                class="h-10 w-10 rounded-lg border-2 border-finance-secondary">
                            <div class="hidden md:block">
                                <p class="text-sm font-medium text-gray-700">John Doe</p>
                                <p class="text-xs text-finance-accent">Premium</p>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                <!-- Page Title -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                    <button class="bg-finance-primary text-white px-4 py-2 rounded-lg hover:bg-finance-accent transition-colors flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>Nouvelle Transaction</span>
                    </button>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <!-- Balance Card -->
                    <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 card-hover border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-finance-success/10 p-3 rounded-xl">
                                <i class="fas fa-wallet text-finance-success text-xl"></i>
                            </div>
                            <span class="text-finance-success bg-finance-success/10 px-3 py-1 rounded-full text-sm font-medium">
                                +2.5%
                            </span>
                        </div>
                        <h3 class="text-gray-500 text-sm font-medium">Balance Totale</h3>
                        <p class="text-2xl font-bold text-gray-800 mt-1">25,420 DH</p>
                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <i class="fas fa-arrow-up text-finance-success mr-1"></i>
                            <span>850 DH depuis hier</span>
                        </div>
                    </div>

                    <!-- Revenus Card -->
                    <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 card-hover border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-finance-primary/10 p-3 rounded-xl">
                                <i class="fas fa-arrow-down text-finance-primary text-xl"></i>
                            </div>
                            <span class="text-finance-primary bg-finance-primary/10 px-3 py-1 rounded-full text-sm font-medium">
                                +4.3%
                            </span>
                        </div>
                        <h3 class="text-gray-500 text-sm font-medium">Revenus du Mois</h3>
                        <p class="text-2xl font-bold text-gray-800 mt-1">8,250 DH</p>
                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <i class="fas fa-arrow-up text-finance-primary mr-1"></i>
                            <span>340 DH depuis hier</span>
                        </div>
                    </div>

                    <!-- Dépenses Card -->
                    <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 card-hover border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-finance-danger/10 p-3 rounded-xl">
                                <i class="fas fa-arrow-up text-finance-danger text-xl"></i>
                            </div>
                            <span class="text-finance-danger bg-finance-danger/10 px-3 py-1 rounded-full text-sm font-medium">
                                -2.8%
                            </span>
                        </div>
                        <h3 class="text-gray-500 text-sm font-medium">Dépenses du Mois</h3>
                        <p class="text-2xl font-bold text-gray-800 mt-1">3,180 DH</p>
                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <i class="fas fa-arrow-down text-finance-danger mr-1"></i>
                            <span>90 DH depuis hier</span>
                        </div>
                    </div>

                    <!-- Épargne Card -->
                    <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-lg transition-all duration-300 card-hover border border-gray-100">
                        <div class="flex items-center justify-between mb-4">
                            <div class="bg-finance-accent/10 p-3 rounded-xl">
                                <i class="fas fa-piggy-bank text-finance-accent text-xl"></i>
                            </div>
                            <span class="text-finance-accent bg-finance-accent/10 px-3 py-1 rounded-full text-sm font-medium">
                                42%
                            </span>
                        </div>
                        <h3 class="text-gray-500 text-sm font-medium">Objectif d'Épargne</h3>
                        <p class="text-2xl font-bold text-gray-800 mt-1">5,000 DH</p>
                        <div class="mt-4">
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-finance-accent h-2 rounded-full" style="width: 42%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <!-- Expenses Chart -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 card-hover">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-lg font-semibold text-gray-800">Répartition des Dépenses</h2>
                            <select class="bg-gray-100 rounded-lg px-4 py-2 text-sm border-none focus:ring-2 focus:ring-finance-accent">
                                <option>Ce mois</option>
                                <option>3 mois</option>
                                <option>6 mois</option>
                            </select>
                        </div>
                        <canvas id="expensesChart" height="300"></canvas>
                    </div>

                    <!-- Income/Expenses Trend -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 card-hover">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-lg font-semibold text-gray-800">Évolution Financière</h2>
                            <select class="bg-gray-100 rounded-lg px-4 py-2 text-sm border-none focus:ring-2 focus:ring-finance-accent">
                                <option>6 mois</option>
                                <option>1 an</option>
                            </select>
                        </div>
                        <canvas id="trendChart" height="300"></canvas>
                    </div>
                </div>

                <!-- Recent Transactions & Goals -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Recent Transactions -->
                    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100">
                        <div class="p-6 border-b border-gray-100">
                            <div class="flex justify-between items-center">
                                <h2 class="text-lg font-semibold text-gray-800">Transactions Récentes</h2>
                                <a href="#" class="text-finance-accent hover:text-finance-primary transition-colors">
                                    Voir tout
                                </a>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <!-- Transaction Item 1 -->
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-finance-success/10 p-3 rounded-lg">
                                            <i class="fas fa-shopping-cart text-finance-success"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">Carrefour Market</p>
                                            <p class="text-sm text-gray-500">15 Mars 2024</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-medium text-finance-danger">-450.00 DH</p>
                                        <span class="text-xs bg-finance-success/10 text-finance-success px-2 py-1 rounded-full">
                                            Complété
                                        </span>
                                    </div>
                                </div>

                                <!-- Transaction Item 2 -->
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-finance-primary/10 p-3 rounded-lg">
                                            <i class="fas fa-building text-finance-primary"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">Salaire Mars</p>
                                            <p class="text-sm text-gray-500">14 Mars 2024</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-medium text-finance-success">+8,500.00 DH</p>
                                        <span class="text-xs bg-finance-success/10 text-finance-success px-2 py-1 rounded-full">
                                            Reçu
                                        </span>
                                    </div>
                                </div>

                                <!-- Transaction Item 3 -->
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-finance-warning/10 p-3 rounded-lg">
                                            <i class="fas fa-bolt text-finance-warning"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-800">Facture Électricité</p>
                                            <p class="text-sm text-gray-500">13 Mars 2024</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-medium text-finance-danger">-320.00 DH</p>
                                        <span class="text-xs bg-finance-warning/10 text-finance-warning px-2 py-1 rounded-full">
                                            En attente
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Financial Goals -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                        <h2 class="text-lg font-semibold text-gray-800 mb-6">Objectifs Financiers</h2>
                        <div class="space-y-6">
                            <!-- Goal 1 -->
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-plane text-finance-accent"></i>
                                        <span class="font-medium text-gray-700">Vacances d'été</span>
                                    </div>
                                    <span class="text-sm text-gray-500">5,000 / 10,000 DH</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-finance-accent h-2 rounded-full" style="width: 50%"></div>
                                </div>
                            </div>

                            <!-- Goal 2 -->
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-shield-alt text-finance-primary"></i>
                                        <span class="font-medium text-gray-700">Fond d'Urgence</span>
                                    </div>
                                    <span class="text-sm text-gray-500">15,000 / 20,000 DH</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-finance-primary h-2 rounded-full" style="width: 75%"></div>
                                </div>
                            </div>

                            <!-- Goal 3 -->
                            <div>
                                <div class="flex justify-between items-center mb-2">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-car text-finance-success"></i>
                                        <span class="font-medium text-gray-700">Nouvelle Voiture</span>
                                    </div>
                                    <span class="text-sm text-gray-500">30,000 / 120,000 DH</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-finance-success h-2 rounded-full" style="width: 25%"></div>
                                </div>
                            </div>

                            <!-- Add New Goal Button -->
                            <button class="w-full mt-4 bg-gray-100 text-gray-600 px-4 py-3 rounded-lg hover:bg-gray-200 transition-colors flex items-center justify-center space-x-2">
                                <i class="fas fa-plus"></i>
                                <span>Ajouter un objectif</span>
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const sidebar = document.querySelector('aside');
        const overlay = document.getElementById('mobile-menu-overlay');

        mobileMenuButton.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('hidden');
            overlay.classList.add('hidden');
        });

        // Charts Configuration
        const expensesCtx = document.getElementById('expensesChart').getContext('2d');
        new Chart(expensesCtx, {
            type: 'doughnut',
            data: {
                labels: ['Alimentation', 'Transport', 'Loisirs', 'Factures', 'Autres'],
                datasets: [{
                    data: [30, 20, 15, 25, 10],
                    backgroundColor: [
                        '#0C4B36',  // finance-primary
                        '#1C8A5E',  // finance-accent
                        '#FFD700',  // finance-secondary
                        '#FFB347',  // finance-warning
                        '#FF6B6B'   // finance-danger
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    }
                }
            }
        });

        const trendCtx = document.getElementById('trendChart').getContext('2d');
        new Chart(trendCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Revenus',
                    data: [3000, 3200, 3100, 3400, 3300, 3500],
                    borderColor: '#1C8A5E',
                    tension: 0.4,
                    fill: false
                }, {
                    label: 'Dépenses',
                    data: [2000, 2100, 1900, 2300, 2200, 2400],
                    borderColor: '#FF6B6B',
                    tension: 0.4,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
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
    </script>
</body>

</html>