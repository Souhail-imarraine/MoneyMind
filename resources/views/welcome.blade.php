<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinanceFlow | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    brand: {
                        primary: '#2563eb', // Bleu royal
                        secondary: '#16a34a', // Vert émeraude
                        dark: '#1e293b', // Bleu foncé
                        light: '#f8fafc', // Gris très clair
                        accent: '#6366f1' // Indigo
                    }
                }
            }
        }
    }
    </script>
</head>

<body class="bg-gray-50">
    <!-- Mobile Navigation Bar -->
    <nav class="md:hidden fixed bottom-0 inset-x-0 bg-white border-t border-gray-200 z-50">
        <div class="grid grid-cols-5 gap-1">
            <a href="#" class="flex flex-col items-center py-3 text-brand-primary">
                <i class="fas fa-home text-lg"></i>
                <span class="text-xs mt-1">Accueil</span>
            </a>
            <a href="#" class="flex flex-col items-center py-3 text-gray-600">
                <i class="fas fa-chart-line text-lg"></i>
                <span class="text-xs mt-1">Stats</span>
            </a>
            <button
                class="flex flex-col items-center py-3 px-6 -mt-6 bg-brand-primary text-white rounded-full shadow-lg">
                <i class="fas fa-plus text-xl"></i>
            </button>
            <a href="#" class="flex flex-col items-center py-3 text-gray-600">
                <i class="fas fa-bullseye text-lg"></i>
                <span class="text-xs mt-1">Objectifs</span>
            </a>
            <a href="#" class="flex flex-col items-center py-3 text-gray-600">
                <i class="fas fa-user text-lg"></i>
                <span class="text-xs mt-1">Profil</span>
            </a>
        </div>
    </nav>

    <!-- Desktop Sidebar -->
    <aside class="hidden md:flex md:w-72 md:flex-col md:fixed md:inset-y-0 bg-white border-r border-gray-200">
        <div class="flex flex-col flex-grow pt-5 overflow-y-auto">
            <div class="px-6 pb-6">
                <h1 class="flex items-center text-2xl font-bold text-brand-dark">
                    <i class="fas fa-wallet text-brand-primary mr-3"></i>
                    FinanceFlow
                </h1>
            </div>

            <nav class="flex-1 px-4 space-y-1">
                <a href="#" class="flex items-center px-4 py-3 text-brand-primary bg-brand-primary/10 rounded-xl">
                    <i class="fas fa-home w-6"></i>
                    <span>Tableau de bord</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl">
                    <i class="fas fa-chart-line w-6"></i>
                    <span>Analyses</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl">
                    <i class="fas fa-exchange-alt w-6"></i>
                    <span>Transactions</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl">
                    <i class="fas fa-bullseye w-6"></i>
                    <span>Objectifs</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-xl">
                    <i class="fas fa-bell w-6"></i>
                    <span>Notifications</span>
                </a>
            </nav>

            <div class="p-4 mt-6">
                <div class="bg-brand-primary/5 p-4 rounded-xl">
                    <div class="flex items-center mb-3">
                        <i class="fas fa-crown text-brand-primary mr-2"></i>
                        <span class="font-medium text-brand-dark">Premium</span>
                    </div>
                    <p class="text-sm text-gray-600 mb-3">
                        Débloquez toutes les fonctionnalités avancées
                    </p>
                    <button
                        class="w-full bg-brand-primary text-white py-2 rounded-lg text-sm hover:bg-brand-primary/90 transition-colors">
                        Upgrade
                    </button>
                </div>
            </div>
        </div>

        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center">
                <img src="https://ui-avatars.com/api/?name=John+Doe" class="w-10 h-10 rounded-full">
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">John Doe</p>
                    <p class="text-xs text-gray-500">john@example.com</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="md:pl-72">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 py-6">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-2xl font-bold text-brand-dark">Bonjour, John 👋</h1>
                    <p class="text-gray-600">Voici le résumé de vos finances</p>
                </div>

                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher..."
                            class="w-full pl-10 pr-4 py-2 rounded-xl border border-gray-200 focus:ring-2 focus:ring-brand-primary/20 focus:border-brand-primary">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <button
                        class="bg-brand-primary text-white px-4 py-2 rounded-xl hover:bg-brand-primary/90 transition-colors hidden md:flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>Nouvelle Transaction</span>
                    </button>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Balance Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-brand-primary/10 p-3 rounded-xl">
                            <i class="fas fa-wallet text-brand-primary text-xl"></i>
                        </div>
                        <div class="flex items-center space-x-1 text-brand-secondary">
                            <i class="fas fa-arrow-up text-sm"></i>
                            <span class="text-sm font-medium">2.5%</span>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium">Balance Totale</h3>
                    <div class="mt-2 flex items-baseline">
                        <p class="text-2xl font-bold text-brand-dark">12,560</p>
                        <span class="ml-1 text-gray-500">DH</span>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <span class="flex items-center text-brand-secondary">
                            <i class="fas fa-arrow-up mr-1 text-xs"></i>
                            +1,234 DH
                        </span>
                        <span class="ml-2">vs mois dernier</span>
                    </div>
                </div>
                <!-- Dépenses Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-brand-accent/10 p-3 rounded-xl">
                            <i class="fas fa-credit-card text-brand-accent text-xl"></i>
                        </div>
                        <div class="flex items-center space-x-1 text-red-500">
                            <i class="fas fa-arrow-down text-sm"></i>
                            <span class="text-sm font-medium">1.8%</span>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium">Dépenses du Mois</h3>
                    <div class="mt-2 flex items-baseline">
                        <p class="text-2xl font-bold text-brand-dark">4,890</p>
                        <span class="ml-1 text-gray-500">DH</span>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <span class="flex items-center text-red-500">
                            <i class="fas fa-arrow-down mr-1 text-xs"></i>
                            -320 DH
                        </span>
                        <span class="ml-2">vs mois dernier</span>
                    </div>
                </div>

                <!-- Revenus Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-brand-secondary/10 p-3 rounded-xl">
                            <i class="fas fa-chart-line text-brand-secondary text-xl"></i>
                        </div>
                        <div class="flex items-center space-x-1 text-brand-secondary">
                            <i class="fas fa-arrow-up text-sm"></i>
                            <span class="text-sm font-medium">3.2%</span>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium">Revenus du Mois</h3>
                    <div class="mt-2 flex items-baseline">
                        <p class="text-2xl font-bold text-brand-dark">8,750</p>
                        <span class="ml-1 text-gray-500">DH</span>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <span class="flex items-center text-brand-secondary">
                            <i class="fas fa-arrow-up mr-1 text-xs"></i>
                            +550 DH
                        </span>
                        <span class="ml-2">vs mois dernier</span>
                    </div>
                </div>

                <!-- Épargne Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-purple-500/10 p-3 rounded-xl">
                            <i class="fas fa-piggy-bank text-purple-500 text-xl"></i>
                        </div>
                        <div class="flex items-center space-x-1 text-purple-500">
                            <i class="fas fa-arrow-up text-sm"></i>
                            <span class="text-sm font-medium">5.7%</span>
                        </div>
                    </div>
                    <h3 class="text-gray-500 text-sm font-medium">Total Épargné</h3>
                    <div class="mt-2 flex items-baseline">
                        <p class="text-2xl font-bold text-brand-dark">15,320</p>
                        <span class="ml-1 text-gray-500">DH</span>
                    </div>
                    <div class="mt-4 flex items-center text-sm text-gray-500">
                        <span class="flex items-center text-purple-500">
                            <i class="fas fa-arrow-up mr-1 text-xs"></i>
                            +1,200 DH
                        </span>
                        <span class="ml-2">vs mois dernier</span>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Dépenses Chart -->
                <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                        <h3 class="text-lg font-semibold text-brand-dark mb-4 md:mb-0">
                            Aperçu des Dépenses
                        </h3>
                        <div class="flex items-center space-x-4">
                            <select
                                class="bg-gray-50 border border-gray-200 rounded-xl px-4 py-2 text-sm focus:ring-2 focus:ring-brand-primary/20">
                                <option>Cette semaine</option>
                                <option>Ce mois</option>
                                <option>Cette année</option>
                            </select>
                            <button class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                        </div>
                    </div>
                    <div class="h-[300px]">
                        <canvas id="expensesChart"></canvas>
                    </div>
                </div>

                <!-- Objectifs Section -->
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-brand-dark">Objectifs</h3>
                        <button class="text-brand-primary hover:text-brand-primary/80">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="space-y-6">
                        <!-- Objectif 1 -->
                        <div class="group">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-brand-primary/10 p-2 rounded-lg">
                                        <i class="fas fa-car text-brand-primary"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-brand-dark">Nouvelle Voiture</h4>
                                        <p class="text-sm text-gray-500">150,000 DH</p>
                                    </div>
                                </div>
                                <span class="text-sm font-medium text-brand-primary">65%</span>
                            </div>
                            <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-brand-primary rounded-full" style="width: 65%"></div>
                            </div>
                        </div>

                        <!-- Objectif 2 -->
                        <div class="group">
                            <div class="flex items-center justify-between mb-2">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-brand-secondary/10 p-2 rounded-lg">
                                        <i class="fas fa-home text-brand-secondary"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-brand-dark">Apport Maison</h4>
                                        <p class="text-sm text-gray-500">200,000 DH</p>
                                    </div>
                                </div>
                                <span class="text-sm font-medium text-brand-secondary">40%</span>
                            </div>
                            <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                <div class="h-full bg-brand-secondary rounded-full" style="width: 40%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transactions & AI Insights -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Transactions -->
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-brand-dark">
                            Transactions Récentes
                        </h3>
                        <a href="#" class="text-brand-primary hover:text-brand-primary/80 text-sm">
                            Voir tout
                        </a>
                    </div>
                    <div class="space-y-4">
                        <!-- Transaction 1 -->
                        <div
                            class="flex items-center justify-between p-4 hover:bg-gray-50 rounded-xl transition-colors">
                            <div class="flex items-center space-x-3">
                                <div class="bg-red-500/10 p-3 rounded-xl">
                                    <i class="fas fa-shopping-bag text-red-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-brand-dark">Marjane</h4>
                                    <p class="text-sm text-gray-500">Courses</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-red-500">-450 DH</p>
                                <p class="text-sm text-gray-500">Aujourd'hui</p>
                            </div>
                        </div>

                        <!-- Transaction 2 -->
                        <div
                            class="flex items-center justify-between p-4 hover:bg-gray-50 rounded-xl transition-colors">
                            <div class="flex items-center space-x-3">
                                <div class="bg-green-500/10 p-3 rounded-xl">
                                    <i class="fas fa-briefcase text-green-500"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-brand-dark">Salaire</h4>
                                    <p class="text-sm text-gray-500">Revenu</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium text-green-500">+8,500 DH</p>
                                <p class="text-sm text-gray-500">Hier</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- AI Insights -->
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-brand-dark">
                            Insights IA
                        </h3>
                        <span class="text-xs font-medium text-gray-500">
                            Mis à jour il y a 5min
                        </span>
                    </div>
                    <div class="space-y-4">
                        <!-- Insight 1 -->
                        <div class="bg-gradient-to-r from-brand-primary/5 to-brand-secondary/5 rounded-xl p-6">
                            <div class="flex items-start space-x-4">
                                <div
                                    class="bg-gradient-to-r from-brand-primary to-brand-secondary p-3 rounded-xl text-white">
                                    <i class="fas fa-robot text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-brand-dark mb-2">
                                        Optimisation des Dépenses
                                    </h4>
                                    <p class="text-gray-600 leading-relaxed">
                                        Vos dépenses en restauration ont augmenté de 25% ce mois-ci.
                                        Réduire de 200 DH dans cette catégorie vous permettrait d'atteindre
                                        votre objectif d'épargne plus rapidement.
                                    </p>
                                    <button
                                        class="mt-4 text-brand-primary hover:text-brand-primary/80 text-sm font-medium">
                                        Voir les détails →
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Insight 2 -->
                        <div class="bg-gradient-to-r from-purple-500/5 to-pink-500/5 rounded-xl p-6">
                            <div class="flex items-start space-x-4">
                                <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-3 rounded-xl text-white">
                                    <i class="fas fa-lightbulb text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium text-brand-dark mb-2">
                                        Opportunité d'Épargne
                                    </h4>
                                    <p class="text-gray-600 leading-relaxed">
                                        Vous avez des paiements récurrents pour plusieurs services de streaming.
                                        Regrouper vos abonnements pourrait vous faire économiser jusqu'à 150 DH par
                                        mois.
                                    </p>
                                    <button class="mt-4 text-purple-500 hover:text-purple-600 text-sm font-medium">
                                        Explorer les options →
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Add Transaction Modal -->
    <div id="addTransactionModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-semibold text-gray-800">Ajouter une Transaction</h3>
                        <button class="text-gray-400 hover:text-gray-500" onclick="closeModal()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <form>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Type de Transaction</label>
                                <div class="flex space-x-4">
                                    <label class="flex-1">
                                        <input type="radio" name="type" value="expense" class="sr-only" checked>
                                        <div class="p-3 border rounded-xl text-center cursor-pointer hover:bg-gray-50">
                                            <i class="fas fa-arrow-up text-red-500 mb-1"></i>
                                            <p class="text-sm">Dépense</p>
                                        </div>
                                    </label>
                                    <label class="flex-1">
                                        <input type="radio" name="type" value="income" class="sr-only">
                                        <div class="p-3 border rounded-xl text-center cursor-pointer hover:bg-gray-50">
                                            <i class="fas fa-arrow-down text-green-500 mb-1"></i>
                                            <p class="text-sm">Revenu</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Montant</label>
                                <div class="relative">
                                    <input type="number" class="w-full px-4 py-2 border rounded-xl" placeholder="0.00">
                                    <div class="absolute inset-y-0 right-4 flex items-center">
                                        <span class="text-gray-500">DH</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                                <select class="w-full px-4 py-2 border rounded-xl">
                                    <option>Alimentation</option>
                                    <option>Transport</option>
                                    <option>Loisirs</option>
                                    <option>Factures</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                <input type="text" class="w-full px-4 py-2 border rounded-xl" placeholder="Description de la transaction">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                                <input type="date" class="w-full px-4 py-2 border rounded-xl">
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="w-full bg-brand-primary text-white py-2 rounded-xl hover:bg-brand-primary/90">
                                Ajouter la Transaction
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Initialize Charts
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('expensesChart').getContext('2d');

        new Chart(ctx, {
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
    });

    // Modal Functions
    function openAddTransactionModal() {
        document.getElementById('addTransactionModal').classList.remove('hidden');
    }

    function closeAddTransactionModal() {
        document.getElementById('addTransactionModal').classList.add('hidden');
    }
    </script>
</body>

</html>