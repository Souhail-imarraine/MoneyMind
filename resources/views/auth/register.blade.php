<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#0A2463] to-[#1B3B86] min-h-screen">
    <div class="flex min-h-screen">
        <!-- Section gauche (visible uniquement sur desktop) -->
        <div class="hidden lg:flex lg:w-1/2 bg-[#0A2463] flex-col justify-center items-center p-12">
            <div class="max-w-md text-center">
                <h1 class="text-4xl font-bold text-white mb-6">
                    Bienvenue sur MoneyMind
                </h1>
                <p class="text-[#FFD700] text-lg mb-8">
                    Prenez le contrôle de vos finances et atteignez vos objectifs avec MoneyMind
                </p>
                <div class="grid grid-cols-2 gap-6 mt-12">
                    <!-- Features -->
                    <div class="p-4 bg-[#1B3B86] rounded-xl">
                        <i class="fas fa-chart-line text-[#FFD700] text-2xl mb-3"></i>
                        <h3 class="text-white font-semibold">Suivi Intelligent</h3>
                    </div>
                    <div class="p-4 bg-[#1B3B86] rounded-xl">
                        <i class="fas fa-piggy-bank text-[#FFD700] text-2xl mb-3"></i>
                        <h3 class="text-white font-semibold">Objectifs d'épargne</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section droite (formulaire) -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <svg class="h-12 w-12 mx-auto mb-6" viewBox="0 0 24 24" fill="#FFD700">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z"/>
                    </svg>
                    <h2 class="text-3xl font-bold text-white">Créer votre compte</h2>
                    <p class="text-[#FFD700] mt-2">Commencez votre voyage vers la liberté financière</p>
                </div>

                <form method="POST" action="{{ route('register.store') }}" class="space-y-6">
                    @csrf

                    <!-- Nom -->
                    <div class="relative">
                        <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-[#FFD700]"></i>
                        <input type="text" name="name" id="name"
                            class="w-full bg-white/10 text-white rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#FFD700] focus:outline-none transition-colors placeholder-gray-300"
                            placeholder="Nom complet" value="{{ old('name') }}">
                        @error('name')
                        <p class="mt-1 text-[#FFD700] text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-[#FFD700]"></i>
                        <input type="email" name="email" id="email"
                            class="w-full bg-white/10 text-white rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#FFD700] focus:outline-none transition-colors placeholder-gray-300"
                            placeholder="Adresse email" value="{{ old('email') }}">
                        @error('email')
                        <p class="mt-1 text-[#FFD700] text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Salaire -->
                    <div class="relative">
                        <i class="fas fa-money-bill-wave absolute left-3 top-1/2 transform -translate-y-1/2 text-[#FFD700]"></i>
                        <input type="number" name="salary" id="salary" required
                            class="w-full bg-white/10 text-white rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#FFD700] focus:outline-none transition-colors placeholder-gray-300"
                            placeholder="Salaire mensuel" value="{{ old('salary') }}">
                        @error('salary')
                        <p class="mt-1 text-[#FFD700] text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Day of Salary -->
                    <div class="relative">
                        <i class="fas fa-calendar-day absolute left-3 top-1/2 transform -translate-y-1/2 text-[#FFD700]"></i>
                        <input type="text" name="salary_day" id="salary_day" required
                            class="w-full bg-white/10 text-white rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#FFD700] focus:outline-none transition-colors placeholder-gray-300"
                            placeholder="Jour du salaire (Ex: 15)">
                        @error('salary_day')
                        <p class="mt-1 text-[#FFD700] text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Mot de passe -->
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-[#FFD700]"></i>
                        <input type="password" name="password" id="password"
                            class="w-full bg-white/10 text-white rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#FFD700] focus:outline-none transition-colors placeholder-gray-300"
                            placeholder="Mot de passe">
                        @error('password')
                        <p class="mt-1 text-[#FFD700] text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirmation mot de passe -->
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-[#FFD700]"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full bg-white/10 text-white rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#FFD700] focus:outline-none transition-colors placeholder-gray-300"
                            placeholder="Confirmer le mot de passe">
                    </div>

                    <!-- Bouton d'inscription -->
                    <button type="submit"
                        class="w-full bg-[#FFD700] hover:bg-[#FFD700]/90 text-[#0A2463] rounded-lg py-3 font-bold transition-colors duration-300">
                        Créer mon compte
                    </button>

                    <!-- Lien de connexion -->
                    <p class="text-center text-white">
                        Déjà inscrit ?
                        <a href="{{ route('login') }}" class="text-[#FFD700] hover:text-white transition-colors">Se connecter</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>