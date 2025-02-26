    <!-- Add Transaction Modal -->
    <div id="addTransactionModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
        <div class="absolute inset-0 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-md">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-semibold text-gray-800">Ajouter une Transaction</h3>
                        <button class="text-gray-400 hover:text-gray-500" onclick="closeAddTransactionModal()">
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
                                <input type="text" class="w-full px-4 py-2 border rounded-xl"
                                    placeholder="Description de la transaction">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                                <input type="date" class="w-full px-4 py-2 border rounded-xl">
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="w-full bg-brand-primary text-white py-2 rounded-xl hover:bg-brand-primary/90">
                                Ajouter la Transaction
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>