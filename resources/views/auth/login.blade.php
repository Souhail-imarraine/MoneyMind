<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-[#E11D48] to-[#1E293B] min-h-screen">
    <div class="flex min-h-screen">
        <!-- Section gauche -->
        <div class="hidden lg:flex lg:w-1/2 bg-[#1E293B] flex-col justify-center items-center p-12">
            <div class="max-w-md text-center">
                <h1 class="text-4xl font-bold text-[#F8FAFC] mb-6">
                    Bon retour parmi nous !
                </h1>
                <p class="text-[#3B82F6] text-lg mb-8">
                    Connectez-vous pour continuer votre voyage vers la liberté financière
                </p>
                <div class="grid grid-cols-2 gap-6 mt-12">
                    <div class="p-4 bg-[#E11D48] rounded-xl">
                        <i class="fas fa-chart-pie text-[#F8FAFC] text-2xl mb-3"></i>
                        <h3 class="text-[#fff] font-semibold">Tableau de bord</h3>
                    </div>
                    <div class="p-4 bg-[#E11D48] rounded-xl">
                        <i class="fas fa-wallet text-[#F8FAFC] text-2xl mb-3"></i>
                        <h3 class="text-[#fff] font-semibold">Gérez vos finances</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section droite -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 mx-auto mb-6">
                    <h2 class="text-3xl font-bold text-[#F8FAFC]">Connexion</h2>
                    <p class="text-[#3B82F6] mt-2">Heureux de vous revoir !</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-[#3B82F6]"></i>
                        <input type="email" name="email" id="email"
                            class="w-full bg-white/10 text-[#F8FAFC] rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#F43F5E] focus:outline-none transition-colors"
                            placeholder="Adresse email" value="{{ old('email') }}">
                        @error('email')
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

                    <!-- Se souvenir de moi -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" id="remember"
                                class="h-4 w-4 text-[#E11D48] focus:ring-[#F43F5E] border-gray-300 rounded">
                            <label for="remember" class="ml-2 block text-sm text-[#F8FAFC]">
                                Se souvenir de moi
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" 
                                class="text-sm text-[#3B82F6] hover:text-[#F43F5E]">
                                Mot de passe oublié ?
                            </a>
                        @endif
                    </div>

                    <!-- Bouton de connexion -->
                    <button type="submit" 
                        class="w-full bg-[#E11D48] hover:bg-[#F43F5E] text-[#F8FAFC] rounded-lg py-3 font-semibold transition-colors duration-300">
                        Se connecter
                    </button>

                    <!-- Lien d'inscription -->
                    <p class="text-center text-[#F8FAFC]">
                        Pas encore de compte ? 
                        <a href="{{ route('register') }}" class="text-[#3B82F6] hover:text-[#F43F5E]">
                            S'inscrire
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
