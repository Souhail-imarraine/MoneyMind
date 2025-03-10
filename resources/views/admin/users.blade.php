<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs - Dashboard Admin</title>
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
                    <li class="sidebar-menu-item px-4 py-2 hover:bg-gray-700 rounded-md mx-2 mb-1">
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
                        <h2 class="text-xl font-semibold">Gestion des Utilisateurs</h2>
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
                <!-- Filtres et recherche -->
                <div class="bg-white rounded-lg shadow mb-6 p-4">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0">
                        <div class="flex-1 max-w-md">
                            <div class="relative">
                                <input type="text" placeholder="Rechercher un utilisateur..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <div class="absolute left-3 top-2.5 text-gray-400">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <select class="rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>Tous les utilisateurs</option>
                                <option>Actifs</option>
                                <option>Inactifs</option>
                            </select>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                                <i class="fas fa-filter mr-2"></i>Filtrer
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Utilisateurs actifs -->
                <div class="bg-white rounded-lg shadow mb-6">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Tous les utilisateurs</h3>
                    </div>
                    <div class="p-4">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dernière activité</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Pierre+Durand&background=random" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Actif</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $user->created_at->diffForHumans() }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Utilisateurs inactifs -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Utilisateurs inactifs (2+ mois)</h3>
                    </div>
                    <div class="p-4">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dernière activité</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Jean+Dupont&background=random" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Jean Dupont</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">jean.dupont@example.com</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Il y a 3 mois</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-red-600 hover:text-red-900 mr-3">Supprimer</button>
                                            <button class="text-blue-600 hover:text-blue-900">Contacter</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Marie+Martin&background=random" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">Marie Martin</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">marie.martin@example.com</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Il y a 2 mois</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-red-600 hover:text-red-900 mr-3" onclick="confirmDelete({{ $user->id }})">Supprimer</button>
                                            <button class="text-blue-600 hover:text-blue-900">Contacter</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>
</html>
