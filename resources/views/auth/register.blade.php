<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Ajout de Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Ajout des icônes -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-[#E11D48] to-[#1E293B] min-h-screen">
    <div class="flex min-h-screen">
        <!-- Section gauche (visible uniquement sur desktop) -->
        <div class="hidden lg:flex lg:w-1/2 bg-[#1E293B] flex-col justify-center items-center p-12">
            <div class="max-w-md text-center">
                <h1 class="text-4xl font-bold text-[#F8FAFC] mb-6">
                    Bienvenue sur MoneyMind
                </h1>
                <p class="text-[#3B82F6] text-lg mb-8">
                    Prenez le contrôle de vos finances et atteignez vos objectifs avec MoneyMind
                </p>
                <div class="grid grid-cols-2 gap-6 mt-12">
                    <!-- Features -->
                    <div class="p-4 bg-[#E11D48] rounded-xl">
                        <i class="fas fa-chart-line text-[#F8FAFC] text-2xl mb-3"></i>
                        <h3 class="text-[#F8FAFC] font-semibold">Suivi Intelligent</h3>
                    </div>
                    <div class="p-4 bg-[#E11D48] rounded-xl">
                        <i class="fas fa-piggy-bank text-[#F8FAFC] text-2xl mb-3"></i>
                        <h3 class="text-[#F8FAFC] font-semibold">Objectifs d'épargne</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section droite (formulaire) -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 mx-auto mb-6">
                    <h2 class="text-3xl font-bold text-[#F8FAFC]">Créer votre compte</h2>
                    <p class="text-[#3B82F6] mt-2">Commencez votre voyage vers la liberté financière</p>
                </div>

                <form method="POST" action="{{ route('register.store') }}" class="space-y-6">
                    @csrf

                    <!-- Nom -->
                    <div class="relative">
                        <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-[#3B82F6]"></i>
                        <input type="text" name="name" id="name"
                            class="w-full bg-white/10 text-[#F8FAFC] rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#F43F5E] focus:outline-none transition-colors"
                            placeholder="Nom complet" value="{{ old('name') }}">
                        @error('name')
                        <p class="mt-1 text-[#F43F5E] text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="relative">
                        <i
                            class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-[#3B82F6]"></i>
                        <input type="email" name="email" id="email"
                            class="w-full bg-white/10 text-[#F8FAFC] rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#F43F5E] focus:outline-none transition-colors"
                            placeholder="Adresse email" value="{{ old('email') }}">
                        @error('email')
                        <p class="mt-1 text-[#F43F5E] text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Salaire -->
                    <div class="relative">
                        <i
                            class="fas fa-money-bill-wave absolute left-3 top-1/2 transform -translate-y-1/2 text-[#3B82F6]"></i>
                        <input type="number" name="salary" id="salary" required
                            class="w-full bg-white/10 text-[#F8FAFC] rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#F43F5E] focus:outline-none transition-colors"
                            placeholder="Salaire mensuel" value="{{ old('salary') }}">
                        @error('salary')
                        <p class="mt-1 text-[#F43F5E] text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Date de salaire -->
                    <div class="relative">
                        <i
                            class="fas fa-calendar absolute left-3 top-1/2 transform -translate-y-1/2 text-[#3B82F6]"></i>
                        <input type="date" name="salary_date" id="salary_date" required
                            class="w-full bg-white/10 text-[#F8FAFC] rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#F43F5E] focus:outline-none transition-colors"
                            value="{{ old('salary_date') }}">
                        @error('salary_date')
                        <p class="mt-1 text-[#F43F5E] text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Mot de passe -->
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-[#3B82F6]"></i>
                        <input type="password" name="password" id="password"
                            class="w-full bg-white/10 text-[#F8FAFC] rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#F43F5E] focus:outline-none transition-colors"
                            placeholder="Mot de passe">
                        @error('password')
                        <p class="mt-1 text-[#F43F5E] text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirmation mot de passe -->
                    <div class="relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-[#3B82F6]"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full bg-white/10 text-[#F8FAFC] rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#F43F5E] focus:outline-none transition-colors"
                            placeholder="Confirmer le mot de passe">
                    </div>

                    <!-- Bouton d'inscription -->
                    <button type="submit"
                        class="w-full bg-[#E11D48] hover:bg-[#F43F5E] text-[#F8FAFC] rounded-lg py-3 font-semibold transition-colors duration-300">
                        Créer mon compte
                    </button>

                    <!-- Lien de connexion -->
                    <p class="text-center text-[#F8FAFC]">
                        Déjà inscrit ?
                        <a href="{{ route('login') }}" class="text-[#3B82F6] hover:text-[#F43F5E]">Se connecter</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>