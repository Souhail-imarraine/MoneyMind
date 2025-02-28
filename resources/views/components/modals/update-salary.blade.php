<!-- Edit Salary Modal -->
<div id="editSalaryModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-1/3 max-w-md mx-auto">
        <h2 class="text-lg font-semibold mb-4 text-center text-gray-800">Modifier le Salaire</h2>
        <form id="editSalaryForm" method="POST" action="">
            @csrf
            <div class="form-group mb-4">
                <label for="salary" class="block text-sm font-medium text-gray-700">Nouveau Salaire</label>
                <input type="number" name="salary" id="salary" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring h-10" required>
                @error('salary')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-end mt-4">
                <button type="button" id="closeModalButton" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 transition duration-200">Annuler</button>
                <button type="submit" class="ml-2 bg-brand-primary text-white px-4 py-2 rounded-md hover:bg-brand-primary-dark transition duration-200">Modifier</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Background -->
<div id="modalBackground" class="fixed inset-0 bg-black opacity-50 hidden"></div>