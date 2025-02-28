            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Spending Trends Chart -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-brand-dark">
                            Tendances des Dépenses
                        </h3>
                        <div class="flex items-center space-x-4">
                            <select
                                class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-sm focus:ring-2 focus:ring-brand-primary/20">
                                <option>Cette semaine</option>
                                <option>Ce mois</option>
                                <option>Cette année</option>
                            </select>
                        </div>
                    </div>

                    <div class="h-[300px]">
                        <canvas id="expensesChart"></canvas>
                    </div>
                </div>

                <!-- Spending by Category -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg font-semibold text-brand-dark">
                            Dépenses par Catégorie
                        </h3>
                        <select
                            class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-sm focus:ring-2 focus:ring-brand-primary/20">
                            <option>Ce mois</option>
                            <option>3 derniers mois</option>
                            <option>Cette année</option>
                        </select>
                    </div>

                    <div class="relative h-[250px] flex items-center justify-center">
                        <canvas id="categoryChart"></canvas>
                        <div class="absolute inset-0 flex items-center justify-center flex-col">
                            <span class="text-sm font-medium text-gray-600">Total</span>
                            <span class="text-2xl font-bold text-brand-dark">3,800 DH</span>
                        </div>
                    </div>

                    <!-- Categories Legend -->
                    <div class="mt-4 grid grid-cols-2 gap-3">
                        <div class="flex items-center">
                            <span class="w-2.5 h-2.5 rounded-full bg-brand-primary mr-2"></span>
                            <span class="text-xs text-gray-600">Alimentation</span>
                            <span class="ml-auto text-xs font-medium text-brand-dark">1,250 DH</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2.5 h-2.5 rounded-full bg-brand-secondary mr-2"></span>
                            <span class="text-xs text-gray-600">Transport</span>
                            <span class="ml-auto text-xs font-medium text-brand-dark">850 DH</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2.5 h-2.5 rounded-full bg-purple-500 mr-2"></span>
                            <span class="text-xs text-gray-600">Factures</span>
                            <span class="ml-auto text-xs font-medium text-brand-dark">1,100 DH</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-2.5 h-2.5 rounded-full bg-orange-500 mr-2"></span>
                            <span class="text-xs text-gray-600">Loisirs</span>
                            <span class="ml-auto text-xs font-medium text-brand-dark">600 DH</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Salary Section -->
            <div class="bg-white rounded-xl shadow-sm p-6 mb-8">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-brand-dark">
                        Salaire
                    </h3>
                    <div class="flex items-center space-x-2">
                        <span class="text-2xl font-bold text-brand-dark">{{ Auth::user()->salary }} DH</span>
                        <button id="editSalaryButton" class="text-brand-primary hover:text-brand-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 4h2a2 2 0 012 2v2m-4-4l-8 8m0 0l-4 4m4-4h4m-4 0v4m8-8l4-4m0 0l-4 4m0 0l-4 4" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>