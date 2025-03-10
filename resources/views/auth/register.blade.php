<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-white min-h-screen">
    <div class="flex min-h-screen">
        <!-- Section gauche (visible uniquement sur desktop) -->
        <div class="hidden lg:flex lg:w-1/2 bg-gray-100 flex-col justify-center items-center p-12">
            <div class="max-w-md text-center">
                <h1 class="text-4xl font-bold text-gray-800 mb-6">
                    Bienvenue sur MoneyMind
                </h1>
                <p class="text-gray-600 text-lg mb-8">
                    Prenez le contrôle de vos finances et atteignez vos objectifs avec MoneyMind
                </p>
                <div class="grid grid-cols-2 gap-6 mt-12">
                    <!-- Features -->
                    <div class="p-4 bg-white shadow-md rounded-xl">
                        <i class="fas fa-chart-line text-blue-500 text-2xl mb-3"></i>
                        <h3 class="text-gray-800 font-semibold">Suivi Intelligent</h3>
                    </div>
                    <div class="p-4 bg-white shadow-md rounded-xl">
                        <i class="fas fa-piggy-bank text-blue-500 text-2xl mb-3"></i>
                        <h3 class="text-gray-800 font-semibold">Objectifs d'épargne</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section droite (formulaire) -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 mx-auto mb-6">
                    <h2 class="text-3xl font-bold text-gray-800">Créer votre compte</h2>
                    <p class="text-gray-600 mt-2">Commencez votre voyage vers la liberté financière</p>
                </div>

                <form method="POST" action="{{ route('register.store') }}" class="space-y-6">
                    @csrf

                    <!-- Nom -->
                    <div class="relative">
                        <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" name="name" id="name"
                            class="w-full bg-white text-gray-800 rounded-lg pl-10 pr-4 py-3 border border-gray-300 focus:border-blue-500 focus:outline-none transition-colors"
                            placeholder="Nom complet" value="{{ old('name') }}">
                        @error('name')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="email" name="email" id="email"
                            class="w-full bg-white text-gray-800 rounded-lg pl-10 pr-4 py-3 border border-gray-300 focus:border-blue-500 focus:outline-none transition-colors"
                            placeholder="Adresse email" value="{{ old('email') }}">
                        @error('email')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Salaire -->
                    <div class="relative">
                        <i class="fas fa-money-bill-wave absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="number" name="salary" id="salary" required
                            class="w-full bg-white text-gray-800 rounded-lg pl-10 pr-4 py-3 border border-gray-300 focus:border-blue-500 focus:outline-none transition-colors"
                            placeholder="Salaire mensuel" value="{{ old('salary') }}">
                        @error('salary')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Day of Salary -->
                    <div class="relative">
                        <i class="fas fa-calendar-day absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" name="salary_day" id="salary_day" required
                            class="w-full bg-white text-gray-800 rounded-lg pl-10 pr-4 py-3 border border-gray-300 focus:border-blue-500 focus:outline-none transition-colors"
                            placeholder="Jour du salaire (Ex: 15)">
                        @error('salary_day')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Mot de passe -->
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="password" name="password" id="password"
                            class="w-full bg-white text-gray-800 rounded-lg pl-10 pr-4 py-3 border border-gray-300 focus:border-blue-500 focus:outline-none transition-colors"
                            placeholder="Mot de passe">
                        @error('password')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirmation mot de passe -->
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full bg-white text-gray-800 rounded-lg pl-10 pr-4 py-3 border border-gray-300 focus:border-blue-500 focus:outline-none transition-colors"
                            placeholder="Confirmer le mot de passe">
                    </div>

                    <!-- Bouton d'inscription -->
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white rounded-lg py-3 font-semibold transition-colors duration-300">
                        Créer mon compte
                    </button>

                    <!-- Lien de connexion -->
                    <p class="text-center text-gray-600">
                        Déjà inscrit ?
                        <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Se connecter</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
