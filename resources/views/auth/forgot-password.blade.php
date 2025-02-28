<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Mot de passe oublié</title>
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
                    Récupération de compte
                </h1>
                <p class="text-[#3B82F6] text-lg mb-8">
                    Pas d'inquiétude ! Nous allons vous aider à récupérer votre compte.
                </p>
                <div class="p-6 bg-[#E11D48] rounded-xl mt-8">
                    <i class="fas fa-shield-alt text-[#F8FAFC] text-4xl mb-4"></i>
                    <h3 class="text-[#F8FAFC] font-semibold text-xl">Sécurité garantie</h3>
                    <p class="text-[#F8FAFC] mt-2 text-sm">
                        Nous vous enverrons un lien sécurisé pour réinitialiser votre mot de passe
                    </p>
                </div>
            </div>
        </div>

        <!-- Section droite -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 mx-auto mb-6">
                    <h2 class="text-3xl font-bold text-[#F8FAFC]">Mot de passe oublié ?</h2>
                    <p class="text-[#3B82F6] mt-2">
                        Entrez votre email pour recevoir les instructions
                    </p>
                </div>

                @if (session('status'))
                    <div class="mb-4 p-4 bg-[#3B82F6]/10 border border-[#3B82F6] rounded-lg">
                        <p class="text-[#F8FAFC] text-sm text-center">
                            {{ session('status') }}
                        </p>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-[#3B82F6]"></i>
                        <input type="email" name="email" id="email"
                            class="w-full bg-white/10 text-[#F8FAFC] rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#F43F5E] focus:outline-none transition-colors"
                            placeholder="Adresse email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <p class="mt-1 text-[#F43F5E] text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bouton d'envoi -->
                    <button type="submit" 
                        class="w-full bg-[#E11D48] hover:bg-[#F43F5E] text-[#F8FAFC] rounded-lg py-3 font-semibold transition-colors duration-300">
                        Envoyer le lien de réinitialisation
                    </button>

                    <!-- Lien de retour -->
                    <div class="text-center space-y-4">
                        <p class="text-[#F8FAFC]">
                            <a href="{{ route('login') }}" class="text-[#3B82F6] hover:text-[#F43F5E] flex items-center justify-center">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Retour à la connexion
                            </a>
                        </p>
                    </div>
                </form>

                <!-- Instructions supplémentaires -->
                <div class="mt-8 p-4 bg-white/5 rounded-lg">
                    <h3 class="text-[#F8FAFC] font-semibold mb-2 flex items-center">
                        <i class="fas fa-info-circle text-[#3B82F6] mr-2"></i>
                        Note importante
                    </h3>
                    <p class="text-sm text-[#F8FAFC]/80">
                        Vous recevrez un email contenant un lien pour réinitialiser votre mot de passe. 
                        Si vous ne le recevez pas, vérifiez votre dossier spam.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
