<div id="transactionModal" class="fixed inset-0 z-50 hidden">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>

    <!-- Modal -->
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="bg-white dark:bg-[#1a1f37] rounded-xl shadow-xl w-full max-w-2xl">
            <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Modal Header -->
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex justify-between items-center">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                            Nouvelle Transaction
                        </h2>
                        <button type="button" onclick="closeTransactionModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="p-6 space-y-6">
                    <!-- Type de Transaction -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Type de Transaction
                        </label>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="relative cursor-pointer">
                                <input type="radio" name="type" value="income" class="peer sr-only">
                                <div class="p-4 rounded-xl border-2 border-green-100 text-green-600 peer-checked:bg-green-50 peer-checked:border-green-500 hover:bg-green-50 flex items-center justify-center space-x-2 transition-colors">
                                    <i class="fas fa-arrow-down text-xl"></i>
                                    <span>Revenu</span>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="type" value="expense" class="peer sr-only">
                                <div class="p-4 rounded-xl border-2 border-red-100 text-red-600 peer-checked:bg-red-50 peer-checked:border-red-500 hover:bg-red-50 flex items-center justify-center space-x-2 transition-colors">
                                    <i class="fas fa-arrow-up text-xl"></i>
                                    <span>Dépense</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Montant et Date -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Montant
                            </label>
                            <div class="relative">
                                <input type="number"
                                       name="amount"
                                       step="0.01"
                                       required
                                       class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 focus:ring-2 focus:ring-money-primary/20 dark:focus:ring-money-secondary/20"
                                       placeholder="0.00">
                                <span class="absolute right-4 top-3 text-gray-500 dark:text-gray-400">DH</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Date
                            </label>
                            <input type="date"
                                   name="date"
                                   required
                                   class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 focus:ring-2 focus:ring-money-primary/20 dark:focus:ring-money-secondary/20">
                        </div>
                    </div>

                    <!-- Catégorie -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Catégorie
                        </label>
                        <select name="category"
                                required
                                class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 focus:ring-2 focus:ring-money-primary/20 dark:focus:ring-money-secondary/20">
                            <option value="">Sélectionner une catégorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Description
                        </label>
                        <textarea name="description"
                                  rows="3"
                                  class="w-full px-4 py-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 border border-gray-200 dark:border-gray-600 focus:ring-2 focus:ring-money-primary/20 dark:focus:ring-money-secondary/20"
                                  placeholder="Ajouter une description..."></textarea>
                    </div>

                    <!-- Pièce jointe -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Pièce jointe
                        </label>
                        <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-xl p-6 text-center" id="dropZone">
                            <input type="file"
                                   name="attachment"
                                   id="file-upload"
                                   class="hidden"
                                   accept="image/*,.pdf">
                            <label for="file-upload" class="cursor-pointer">
                                <div class="space-y-2">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400"></i>
                                    <p class="text-gray-600 dark:text-gray-400">
                                        Glissez-déposez un fichier ici ou
                                        <span class="text-money-primary dark:text-money-secondary">parcourir</span>
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        PNG, JPG ou PDF (max. 5MB)
                                    </p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="p-6 border-t border-gray-200 dark:border-gray-700 flex justify-end space-x-4">
                    <button type="button"
                            onclick="closeTransactionModal()"
                            class="px-6 py-2.5 rounded-xl border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        Annuler
                    </button>
                    <button type="submit"
                            class="px-6 py-2.5 rounded-xl bg-money-primary dark:bg-money-secondary text-white hover:bg-money-primary/90 dark:hover:bg-money-secondary/90">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Modal functions
    function openTransactionModal() {
        document.getElementById('transactionModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeTransactionModal() {
        document.getElementById('transactionModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // File upload handling
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('file-upload');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, unhighlight, false);
    });

    function highlight(e) {
        dropZone.classList.add('border-money-primary', 'dark:border-money-secondary');
    }

    function unhighlight(e) {
        dropZone.classList.remove('border-money-primary', 'dark:border-money-secondary');
    }

    dropZone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        fileInput.files = files;
    }
</script>
@endpush 
