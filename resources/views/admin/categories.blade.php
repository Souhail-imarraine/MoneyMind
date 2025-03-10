<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Catégories - Dashboard Admin</title>
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
                    <li class="sidebar-menu-item px-4 py-2 bg-blue-600 rounded-md mx-2 mb-1">
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center">
                            <i class="fas fa-tags w-5 h-5 mr-3"></i>
                            <span>Catégories</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-4 border-t border-gray-700">
                <a href="#" class="flex items-center text-sm">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" alt="Admin" class="w-8 h-8 rounded-full mr-2">
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
                        <h2 class="text-xl font-semibold">Gestion des Catégories</h2>
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
                <!-- Messages de notification -->
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Ajouter une catégorie -->
                <div class="bg-white rounded-lg shadow mb-6">
                    <div class="p-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Ajouter une nouvelle catégorie</h3>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label for="categoryName" class="block text-sm font-medium text-gray-700 mb-1">Nom de la catégorie</label>
                                <input type="text" id="categoryName" name="categoryName" value="{{ old('categoryName') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Ex: Divertissement">
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                                    <i class="fas fa-plus mr-2"></i>Ajouter la catégorie
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Liste des catégories -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Catégories existantes</h3>
                        <div class="relative">
                            <form action="{{ route('admin.categories.index') }}" method="GET">
                                <input type="text" name="search" placeholder="Rechercher..." value="{{ request('search') }}" class="w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <div class="absolute left-3 top-2.5 text-gray-400">
                                    <i class="fas fa-search"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($categories as $category)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-3" onclick="openEditModal('{{ $category->id }}', '{{ $category->name }}')">
                                                <i class="fas fa-edit mr-1"></i>Modifier
                                            </button>
                                            <button class="text-red-600 hover:text-red-900" onclick="confirmDelete('{{ $category->id }}', '{{ $category->name }}')">
                                                <i class="fas fa-trash mr-1"></i>Supprimer
                                            </button>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <div class="text-sm font-medium text-gray-900">{{ $category->name }}</div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2" class="px-6 py-4 text-center text-gray-500">
                                            Aucune catégorie trouvée
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal d'édition (caché par défaut) -->
    <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4">
            <div class="p-4 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-lg font-semibold">Modifier la catégorie</h3>
                <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="p-4">
                <form id="editForm" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editCategoryId" name="editCategoryId">
                    <div>
                        <label for="editCategoryName" class="block text-sm font-medium text-gray-700 mb-1">Nom de la catégorie</label>
                        <input type="text" id="editCategoryName" name="editCategoryName" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            Annuler
                        </button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation de suppression (caché par défaut) -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4">
            <div class="p-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold">Confirmer la suppression</h3>
            </div>
            <div class="p-4">
                <p class="text-gray-700">Êtes-vous sûr de vouloir supprimer la catégorie <span id="deleteCategoryName" class="font-semibold"></span> ? Cette action est irréversible.</p>
                <form id="deleteForm" method="POST" class="mt-6">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                            Annuler
                        </button>
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                            Supprimer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Fonctions pour les modals
        function openEditModal(id, name) {
            document.getElementById('editCategoryId').value = id;
            document.getElementById('editCategoryName').value = name;
            document.getElementById('editForm').action = "{{ route('admin.categories.update', '') }}/" + id;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        function confirmDelete(id, name) {
            document.getElementById('deleteCategoryName').textContent = name;
            document.getElementById('deleteForm').action = "{{ route('admin.categories.destroy', '') }}/" + id;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }

        // Toggle sidebar on mobile
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('openSidebar')) {
                document.getElementById('openSidebar').addEventListener('click', function() {
                    document.getElementById('sidebar').classList.remove('hidden');
                });
            }

            if (document.getElementById('closeSidebar')) {
                document.getElementById('closeSidebar').addEventListener('click', function() {
                    document.getElementById('sidebar').classList.add('hidden');
                });
            }
        });
    </script>
</body>
</html>
