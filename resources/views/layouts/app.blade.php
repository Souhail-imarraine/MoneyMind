<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinanceFlow | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    brand: {
                        primary: '#E11D48',    // Rose
                        secondary: '#3B82F6',   // Blue
                        dark: '#1E293B',       // Slate Dark
                        light: '#F8FAFC',      // Light
                        accent: '#F43F5E'      // Lighter Rose
                    }
                }
            }
        }
    }
    </script>
</head>
<body class="bg-gray-50">
    @include('components.navigation.mobile')
    @include('components.navigation.sidebar')

    <main class="md:pl-72">
        @yield('content')
    </main>

    @stack('modals')
    @stack('scripts')

    <script>
        function openAddTransactionModal() {
            document.getElementById('addTransactionModal').classList.remove('hidden');
        }

        function closeAddTransactionModal() {
            document.getElementById('addTransactionModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('addTransactionModal');
            if (event.target === modal) {
                closeAddTransactionModal();
            }
        });

        document.getElementById('editSalaryButton').addEventListener('click', function() {
            document.getElementById('editSalaryModal').classList.remove('hidden');
            document.getElementById('modalBackground').classList.remove('hidden');
        });

        document.getElementById('closeModalButton').addEventListener('click', function() {
            document.getElementById('editSalaryModal').classList.add('hidden');
            document.getElementById('modalBackground').classList.add('hidden');
        });
    </script>
</body>
</html>