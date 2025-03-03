    @foreach($expenses as $expense)
    <div id="{{ $expense->id }}" class="hidden fixed inset-0 z-50 overflow-y-auto" aria-labelledby="transaction-modal"
        role="dialog" aria-modal="true">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <!-- Modal position -->
        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4">
                <div
                    class="relative transform overflow-hidden rounded-xl bg-white shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-brand-dark">Modifier la Dépense</h3>
                            <button onclick="closeEditTransactionModal(`{{ $expense->id }}`)" class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form action="{{ route('transactions.update', $expense->id) }}" method="POST"
                        class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="transactionId" name="transactionId" value="{{ $expense->id }}">
                        <!-- Nom de la Dépense -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Nom de la Dépense</label>
                            <input type="text" id="name" name="name" value="{{ $expense->name }}" required
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Montant de la Dépense -->
                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700 font-bold mb-2">Montant (DH)</label>
                            <input type="number" id="amount" name="amount" value="{{ $expense->amount }}" step="0.01"
                                required
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Catégorie de la Dépense -->
                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700 font-bold mb-2">Catégorie</label>
                            <select id="category_id" name="category_id" required
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Sélectionnez une catégorie</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $expense->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Date de la Dépense -->
                        <div class="mb-4">
                            <label for="date" class="block text-gray-700 font-bold mb-2">Date</label>
                            <input type="date" id="date" name="date" value="{{ $expense->date }}" required
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Dépense Récurrente -->
                        <div class="mb-4">
                            <label for="is_recurring" class="block text-gray-700 font-bold mb-2">Dépense
                                récurrente</label>
                            <select id="is_recurring" name="is_recurring" required
                                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="true" {{ $expense->is_recurring ? 'selected' : '' }}>Oui</option>
                                <option value="false" {{ !$expense->is_recurring ? 'selected' : '' }}>Non</option>
                            </select>
                        </div>

                        <!-- Bouton de Soumission -->
                        <div class="mt-6">
                            <button type="submit"
                                class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Modifier la Dépense
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <script>
        function openEditModal(id) {
            const modal = document.getElementById(`${id}`);
            modal.classList.remove('hidden');
        }

        function closeEditTransactionModal(id) {
            const modal = document.getElementById(`${id}`);
            modal.classList.add('hidden');
        }
    </script>