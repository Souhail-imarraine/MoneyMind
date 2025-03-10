<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Graphique des Tendances -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-brand-dark">
                Tendances des Dépenses
            </h3>
            <select id="trendPeriod"
                    class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-sm focus:ring-2 focus:ring-brand-primary/20">
                <option value="week">Cette semaine</option>
                <option value="month">Ce mois</option>
                <option value="year">Cette année</option>
            </select>
        </div>
        <div class="h-[300px]">
            <canvas id="expensesChart"></canvas>
        </div>
    </div>

    <!-- Graphique Dépenses et Objectifs -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-brand-dark">
                Dépenses et Objectifs
            </h3>
            <select id="periodSelect"
                    class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-sm focus:ring-2 focus:ring-brand-primary/20">
                <option value="month">Ce mois</option>
                <option value="year">Cette année</option>
            </select>
        </div>

        <div class="relative h-[250px] flex items-center justify-center">
            <canvas id="expensesGoalsChart"></canvas>
            <div class="absolute inset-0 flex items-center justify-center flex-col">
                <span class="text-sm font-medium text-gray-600">Total</span>
                <span class="text-2xl font-bold text-brand-dark">
                    {{ number_format($totalAmount, 0, ',', ' ') }} DH
                </span>
            </div>
        </div>

        <!-- Légende des dépenses et objectifs -->
        <div class="mt-4 grid grid-cols-2 gap-4">
            @foreach($expensesAndGoals as $item)
            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                <div class="w-8 h-8 rounded-full flex items-center justify-center"
                     style="background-color: {{ $item['color'] }}20">
                    <i class="fas {{ $item['icon'] }} text-sm"
                       style="color: {{ $item['color'] }}"></i>
                </div>
                <div class="ml-3 flex-1">
                    <div class="text-sm font-medium text-gray-600">
                        {{ $item['label'] }}
                    </div>
                    <div class="text-lg font-semibold text-brand-dark">
                        {{ number_format($item['amount'], 0, ',', ' ') }} DH
                    </div>
                    @if(isset($item['current']))
                    <div class="text-xs text-gray-500 mt-1">
                        Progression: {{ number_format(($item['current'] / max($item['amount'], 1)) * 100, 1) }}%
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


