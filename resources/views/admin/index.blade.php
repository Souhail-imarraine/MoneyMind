<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar" class="hidden md:flex flex-col w-64 bg-gray-800 text-white transition-all duration-300">
            <div class="p-4 flex items-center justify-between">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
                <button id="closeSidebar" class="md:hidden text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="border-t border-gray-700"></div>
            <nav class="flex-1 overflow-y-auto py-4">
                <ul>
                    <li class="sidebar-menu-item px-4 py-2 rounded-md mx-2 mb-1">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                            <i class="fas fa-chart-line w-5 h-5 mr-3"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item px-4 py-2 hover:bg-gray-700 rounded-md mx-2 mb-1">
                        <a href="{{ route('admin.users.index') }}" class="flex items-center">
                            <i class="fas fa-users w-5 h-5 mr-3"></i>
                            <span>Utilisateurs</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item px-4 py-2 hover:bg-gray-700 rounded-md mx-2 mb-1">
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center">
                            <i class="fas fa-tags w-5 h-5 mr-3"></i>
                            <span>Catégories</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-4 border-t border-gray-700">
                <a href="#" class="flex items-center text-sm">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=random" alt="Admin" class="w-8 h-8 rounded-full mr-2">
                    <div>
                        <p class="font-medium">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
                    </div>
                </a>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md transition-colors">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Déconnexion
                </button>
            </form>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navbar -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <button id="openSidebar" class="md:hidden mr-4 text-gray-600">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h2 class="text-xl font-semibold">Tableau de bord</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-600">
                            <i class="fas fa-bell"></i>
                        </button>
                        <button class="text-gray-600">
                            <i class="fas fa-cog"></i>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-4">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Nombre total d'utilisateurs</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $totalUsers }}</p>
                                <p class="text-sm text-green-600 mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    <span>12% depuis le mois dernier</span>
                                </p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fas fa-users text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Revenu mensuel moyen</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $averageIncome }} DH</p>
                                <p class="text-sm text-green-600 mt-2">
                                    <i class="fas fa-money-bill-wave mr-1"></i>
                                    <span>8% depuis le mois dernier</span>
                                </p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-euro-sign text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Comptes active</p>
                                <p class="text-3xl font-bold text-gray-800">{{ $activeUsers }}</p>
                                <p class="text-sm text-red-600 mt-2">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                </p>
                            </div>
                            <div class="bg-red-100 p-3 rounded-full">
                                <i class="fas fa-user-clock text-red-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Graphiques et statistiques -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold mb-4">Activité des utilisateurs</h3>
                        <div class="h-64 flex items-center justify-center bg-gray-50 rounded">
                            <p class="text-gray-500">Graphique d'activité des utilisateurs</p>
                            <!-- Ici vous pouvez intégrer un graphique avec Chart.js ou autre -->
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold mb-4">Répartition des dépenses</h3>
                        <div class="h-64 flex items-center justify-center bg-gray-50 rounded">
                            <p class="text-gray-500">Graphique de répartition des dépenses</p>
                            <!-- Ici vous pouvez intégrer un graphique avec Chart.js ou autre -->
                        </div>
                    </div>
                </div>

                <!-- Activités récentes -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Activités récentes</h3>
                    </div>
                    <div class="p-4">
                        <ul class="divide-y divide-gray-200">
                            <li class="py-3">
                                <div class="flex items-center">
                                    <div class="bg-blue-100 p-2 rounded-full mr-3">
                                        <i class="fas fa-user-plus text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Nouvel utilisateur inscrit</p>
                                        <p class="text-xs text-gray-500">Il y a 2 heures</p>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3">
                                <div class="flex items-center">
                                    <div class="bg-green-100 p-2 rounded-full mr-3">
                                        <i class="fas fa-tag text-green-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Nouvelle catégorie ajoutée</p>
                                        <p class="text-xs text-gray-500">Il y a 5 heures</p>
                                    </div>
                                </div>
                            </li>
                            <li class="py-3">
                                <div class="flex items-center">
                                    <div class="bg-red-100 p-2 rounded-full mr-3">
                                        <i class="fas fa-user-minus text-red-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Compte utilisateur supprimé</p>
                                        <p class="text-xs text-gray-500">Il y a 1 jour</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>
</html>
