<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Gestion Financière</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #F3F4F6;
    }

    .currency-card {
        background: linear-gradient(135deg, #00A86B 0%, #004D40 100%);
    }

    .transaction-item:hover {
        transform: translateY(-2px);
        transition: all 0.3s ease;
    }

    /* Add styles for mobile menu */
    #mobile-sidebar {
        transition: transform 0.3s ease-in-out;
    }

    #mobile-sidebar.active {
        transform: translateX(0);
    }

    #mobile-overlay.active {
        display: block;
    }

    /* Add styles for mobile search */
    #mobile-search.active {
        display: block;
    }
    </style>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    money: {
                        primary: '#00A86B',
                        secondary: '#FFD700',
                        dark: '#004D40',
                        light: '#E0F2F1'
                    }
                }
            }
        }
    }
    </script>
</head>

<body class="min-h-screen">
    <!-- Top Navigation -->
    <!-- Header - Version sombre et responsive améliorée -->
    <header class="bg-[#1a1f37] text-white border-b border-gray-700">
        <div class="px-4 py-3">
            <div class="flex items-center justify-between">
                <!-- Left Side -->
                <div class="flex items-center space-x-4">
                    <button id="mobile-menu-button"
                        class="lg:hidden text-gray-300 hover:bg-gray-700/50 p-2 rounded-lg transition-colors"
                        onclick="toggleMobileMenu()">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <div class="flex items-center space-x-3">
                        <div class="bg-finance-secondary/20 p-2 rounded-lg">
                            <i class="fas fa-coins text-finance-secondary text-xl"></i>
                        </div>
                        <span class="text-lg font-bold hidden sm:block">MoneyMind</span>
                    </div>
                </div>

                <!-- Center - Search Bar -->
                <div class="hidden md:block flex-1 max-w-xl mx-6">
                    <div class="relative">
                        <input type="text" placeholder="Rechercher..."
                            class="w-full px-4 py-2 pl-10 rounded-lg bg-gray-700/50 border border-gray-600 text-white placeholder-gray-400 focus:bg-gray-700 focus:ring-2 focus:ring-finance-secondary/50 focus:border-finance-secondary transition-all">
                        <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="flex items-center space-x-3">
                    <!-- Mobile Search Toggle -->
                    <button class="md:hidden p-2 hover:bg-gray-700/50 rounded-lg text-gray-300"
                        onclick="toggleMobileSearch()">
                        <i class="fas fa-search text-xl"></i>
                    </button>

                    <!-- Notifications -->
                    <button class="relative p-2 hover:bg-gray-700/50 rounded-lg text-gray-300">
                        <i class="fas fa-bell text-xl"></i>
                        <span
                            class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">
                            3
                        </span>
                    </button>

                    <!-- Profile -->
                    <div class="relative group">
                        <button class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700/50">
                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=FFD700&color=1a1f37"
                                alt="Profile" class="h-8 w-8 rounded-lg object-cover">
                            <span class="hidden sm:block text-sm">John Doe</span>
                            <i class="fas fa-chevron-down text-xs hidden sm:block"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            class="absolute right-0 mt-2 w-48 bg-[#1a1f37] rounded-lg shadow-lg py-2 hidden group-hover:block border border-gray-700">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700/50">
                                <i class="fas fa-user mr-2"></i> Profil
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700/50">
                                <i class="fas fa-cog mr-2"></i> Paramètres
                            </a>
                            <div class="border-t border-gray-700 my-1"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-700/50">
                                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Search Bar - Hidden by default -->
            <div id="mobile-search" class="md:hidden mt-3 hidden">
                <div class="relative">
                    <input type="text" placeholder="Rechercher..."
                        class="w-full px-4 py-2 pl-10 rounded-lg bg-gray-700/50 border border-gray-600 text-white placeholder-gray-400 focus:bg-gray-700 focus:ring-2 focus:ring-finance-secondary/50 focus:border-finance-secondary">
                    <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Banner -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Bonjour, John! 👋</h1>
                    <p class="text-gray-600 mt-1">Voici le résumé de vos finances pour aujourd'hui</p>
                </div>
                <div class="text-right">
                    <p class="text-sm text-gray-500">Dernière mise à jour</p>
                    <p class="text-money-primary font-semibold">15 Mars 2024, 14:30</p>
                </div>
            </div>
        </div>

        <!-- Balance Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Balance Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-money-light rounded-full w-12 h-12 flex items-center justify-center">
                        <i class="fas fa-wallet text-xl text-money-primary"></i>
                    </div>
                    <span class="text-money-primary bg-money-light px-3 py-1 rounded-full text-sm">+2.5%</span>
                </div>
                <h3 class="text-gray-500 text-sm">Balance Totale</h3>
                <p class="text-2xl font-bold text-gray-800 mt-1">25,420 DH</p>
                <div class="mt-4 flex items-center text-sm text-gray-500">
                    <i class="fas fa-arrow-up text-money-primary mr-1"></i>
                    <span>850 DH depuis le mois dernier</span>
                </div>
            </div>

            <!-- Income Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-green-100 rounded-full w-12 h-12 flex items-center justify-center">
                        <i class="fas fa-arrow-down text-xl text-green-600"></i>
                    </div>
                    <span class="text-green-600 bg-green-100 px-3 py-1 rounded-full text-sm">+4.3%</span>
                </div>
                <h3 class="text-gray-500 text-sm">Revenus du Mois</h3>
                <p class="text-2xl font-bold text-gray-800 mt-1">8,250 DH</p>
                <div class="mt-4 flex items-center text-sm text-gray-500">
                    <i class="fas fa-arrow-up text-green-600 mr-1"></i>
                    <span>340 DH depuis le mois dernier</span>
                </div>
            </div>

            <!-- Expenses Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-red-100 rounded-full w-12 h-12 flex items-center justify-center">
                        <i class="fas fa-arrow-up text-xl text-red-600"></i>
                    </div>
                    <span class="text-red-600 bg-red-100 px-3 py-1 rounded-full text-sm">-2.8%</span>
                </div>
                <h3 class="text-gray-500 text-sm">Dépenses du Mois</h3>
                <p class="text-2xl font-bold text-gray-800 mt-1">3,180 DH</p>
                <div class="mt-4 flex items-center text-sm text-gray-500">
                    <i class="fas fa-arrow-down text-red-600 mr-1"></i>
                    <span>90 DH depuis le mois dernier</span>
                </div>
            </div>

            <!-- Savings Card -->
            <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-purple-100 rounded-full w-12 h-12 flex items-center justify-center">
                        <i class="fas fa-piggy-bank text-xl text-purple-600"></i>
                    </div>
                    <span class="text-purple-600 bg-purple-100 px-3 py-1 rounded-full text-sm">42%</span>
                </div>
                <h3 class="text-gray-500 text-sm">Objectif d'Épargne</h3>
                <p class="text-2xl font-bold text-gray-800 mt-1">5,000 DH</p>
                <div class="mt-4">
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-purple-600 h-2 rounded-full" style="width: 42%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <button onclick="openTransactionModal()"
                class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 flex items-center justify-center space-x-3 group">
                <i class="fas fa-plus"></i>
                <span>Nouvelle Transaction</span>
            </button>
            <button
                class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 flex items-center justify-center space-x-3 group">
                <i
                    class="fas fa-exchange-alt text-money-primary text-2xl group-hover:scale-110 transition-transform"></i>
                <span class="text-lg font-semibold">Transfert d'Argent</span>
            </button>
            <button
                class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 flex items-center justify-center space-x-3 group">
                <i class="fas fa-chart-pie text-money-primary text-2xl group-hover:scale-110 transition-transform"></i>
                <span class="text-lg font-semibold">Voir les Rapports</span>
            </button>
        </div>
        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Expenses Chart -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Répartition des Dépenses</h2>
                    <select class="bg-gray-100 rounded-lg px-3 py-1 text-sm">
                        <option>Ce mois</option>
                        <option>3 mois</option>
                        <option>6 mois</option>
                    </select>
                </div>
                <canvas id="expensesChart" height="300"></canvas>
            </div>

            <!-- Income/Expenses Trend -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Tendances Financières</h2>
                    <select class="bg-gray-100 rounded-lg px-3 py-1 text-sm">
                        <option>6 mois</option>
                        <option>1 an</option>
                    </select>
                </div>
                <canvas id="trendChart" height="300"></canvas>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800">Transactions Récentes</h2>
                <button class="text-money-primary hover:text-money-dark">Voir tout</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-sm text-gray-500 border-b">
                            <th class="pb-3 font-semibold">Date</th>
                            <th class="pb-3 font-semibold">Description</th>
                            <th class="pb-3 font-semibold">Catégorie</th>
                            <th class="pb-3 font-semibold">Montant</th>
                            <th class="pb-3 font-semibold">Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b hover:bg-gray-50 transition-colors">
                            <td class="py-4 text-sm">15 Mars 2024</td>
                            <td class="py-4">
                                <div class="flex items-center">
                                    <div class="bg-blue-100 rounded-full p-2 mr-3">
                                        <i class="fas fa-shopping-cart text-blue-600"></i>
                                    </div>
                                    <span>Carrefour Market</span>
                                </div>
                            </td>
                            <td class="py-4">
                                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-sm">
                                    Courses
                                </span>
                            </td>
                            <td class="py-4 text-red-600 font-medium">-450.00 DH</td>
                            <td class="py-4">
                                <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-sm">
                                    Complété
                                </span>
                            </td>
                        </tr>
                        <!-- Ajoutez plus de transactions ici -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="mobile-sidebar"
        class="fixed inset-y-0 left-0 w-64 bg-[#1a1f37] transform -translate-x-full transition-transform duration-300 ease-in-out z-50">
        <div class="p-4 border-b border-gray-700">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="bg-finance-secondary/20 p-2 rounded-lg">
                        <i class="fas fa-coins text-finance-secondary text-xl"></i>
                    </div>
                    <span class="text-lg font-bold text-white">MoneyMind</span>
                </div>
                <button onclick="toggleMobileMenu()" class="text-gray-300 hover:text-white">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <nav class="mt-4 px-4">
            <a href="#" class="block py-2.5 px-4 rounded-lg text-white bg-gray-700/50 mb-1">
                <i class="fas fa-home mr-2"></i> Accueil
            </a>
            <a href="#" class="block py-2.5 px-4 rounded-lg text-gray-300 hover:bg-gray-700/50 mb-1">
                <i class="fas fa-chart-line mr-2"></i> Dashboard
            </a>
            <a href="#" class="block py-2.5 px-4 rounded-lg text-gray-300 hover:bg-gray-700/50 mb-1">
                <i class="fas fa-wallet mr-2"></i> Transactions
            </a>
            <a href="#" class="block py-2.5 px-4 rounded-lg text-gray-300 hover:bg-gray-700/50 mb-1">
                <i class="fas fa-chart-pie mr-2"></i> Rapports
            </a>
        </nav>
    </div>

    <div id="mobile-overlay" class="fixed inset-0 bg-black opacity-50 hidden z-40" onclick="toggleMobileMenu()">
    </div>

    <!-- Modal Nouvelle Transaction -->
    <div id="transaction-modal" class="fixed inset-0 z-50 hidden animate-fade-in" aria-labelledby="modal-title"
        role="dialog" aria-modal="true">
        <!-- Overlay -->
        <div class="fixed inset-0 bg-black/50 backdrop-blur-sm"></div>

        <!-- Modal Content -->
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-white dark:bg-[#1a1f37] rounded-2xl shadow-xl w-full max-w-2xl transform transition-all">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="modal-title">
                            Nouvelle Transaction
                        </h3>
                        <button type="button" class="text-gray-400 hover:text-gray-500"
                            onclick="closeTransactionModal()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <form class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Type de transaction
                                </label>
                                <select
                                    class="w-full h-12 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                    <option>Dépense</option>
                                    <option>Revenu</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Catégorie
                                </label>
                                <select
                                    class="w-full h-12 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                    <option>Alimentation</option>
                                    <option>Transport</option>
                                    <option>Loisirs</option>
                                    <option>Factures</option>
                                    <option>Autres</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                Description
                            </label>
                            <input type="text"
                                class="w-full h-12 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Montant (DH)
                                </label>
                                <input type="number"
                                    class="w-full h-12 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Date
                                </label>
                                <input type="date"
                                    class="w-full h-12 rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 mt-6">
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 dark:bg-gray-600 dark:text-gray-300 dark:hover:bg-gray-500"
                                onclick="closeTransactionModal()">
                                Annuler
                            </button>
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-finance-accent rounded-lg hover:bg-finance-accent/90">
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Functions for mobile menu
    function toggleMobileMenu() {
        const sidebar = document.getElementById('mobile-sidebar');
        const overlay = document.getElementById('mobile-overlay');
        
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
        
        if (sidebar.classList.contains('active')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = 'auto';
        }
    }

    // Function for mobile search
    function toggleMobileSearch() {
        const searchBar = document.getElementById('mobile-search');
        searchBar.classList.toggle('active');
    }

    // Configuration des graphiques
    // document.addEventListener('DOMContentLoaded', function() {
    //     const expensesCtx = document.getElementById('expensesChart').getContext('2d');
    //     new Chart(expensesCtx, {
    //         type: 'doughnut',
    //         data: {
    //             labels: ['Courses', 'Transport', 'Loisirs', 'Factures', 'Autres'],
    //             datasets: [{
    //                 data: [30, 20, 15, 25, 10],
    //                 backgroundColor: [
    //                     '#00A86B',
    //                     '#FFD700',
    //                     '#FF6B6B',
    //                     '#4ECDC4',
    //                     '#95A5A6'
    //                 ],
    //                 borderWidth: 0
    //             }]
    //         },
    //         options: {
    //             responsive: true,
    //             maintainAspectRatio: false,
    //             plugins: {
    //                 legend: {
    //                     position: 'bottom',
    //                     labels: {
    //                         padding: 20,
    //                         usePointStyle: true
    //                     }
    //                 }
    //             }
    //         }
    //     });

    //     const trendCtx = document.getElementById('trendChart').getContext('2d');
    //     new Chart(trendCtx, {
    //         type: 'line',
    //         data: {
    //             labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
    //             datasets: [{
    //                 label: 'Revenus',
    //                 data: [3000, 3200, 3100, 3400, 3300, 3500],
    //                 borderColor: '#00A86B',
    //                 tension: 0.4,
    //                 fill: false
    //             }, {
    //                 label: 'Dépenses',
    //                 data: [2000, 2100, 1900, 2300, 2200, 2400],
    //                 borderColor: '#FF6B6B',
    //                 tension: 0.4,
    //                 fill: false
    //             }]
    //         },
    //         options: {
    //             responsive: true,
    //             maintainAspectRatio: false,
    //             plugins: {
    //                 legend: {
    //                     position: 'bottom'
    //                 }
    //             },
    //             scales: {
    //                 y: {
    //                     beginAtZero: true,
    //                     grid: {
    //                         drawBorder: false
    //                     }
    //                 },
    //                 x: {
    //                     grid: {
    //                         display: false
    //                     }
    //                 }
    //             }
    //         }
    //     });
    // });

    // Transaction Modal Functions
    function openTransactionModal() {
        const modal = document.getElementById('transaction-modal');
        if (modal) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeTransactionModal() {
        const modal = document.getElementById('transaction-modal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    }

    // Close modal when clicking overlay
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('transaction-modal');
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeTransactionModal();
                }
            });
        }
    });
    </script>
</body>