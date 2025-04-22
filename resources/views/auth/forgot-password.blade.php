<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Mot de passe oublié</title>
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
        <!-- Section gauche -->
        <div class="hidden lg:flex lg:w-1/2 bg-[#0A2463] flex-col justify-center items-center p-12">
            <div class="max-w-md text-center">
                <h1 class="text-4xl font-bold text-white mb-6">
                    Récupération de compte
                </h1>
                <p class="text-[#FFD700] text-lg mb-8">
                    Pas d'inquiétude ! Nous allons vous aider à récupérer votre compte.
                </p>
                <div class="p-6 bg-[#1B3B86] rounded-xl mt-8">
                    <i class="fas fa-shield-alt text-[#FFD700] text-4xl mb-4"></i>
                    <h3 class="text-white font-semibold text-xl">Sécurité garantie</h3>
                    <p class="text-white/80 mt-2 text-sm">
                        Nous vous enverrons un lien sécurisé pour réinitialiser votre mot de passe
                    </p>
                </div>
            </div>
        </div>

        <!-- Section droite -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <svg class="h-12 w-12 mx-auto mb-6" viewBox="0 0 24 24" fill="#FFD700">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z"/>
                    </svg>
                    <h2 class="text-3xl font-bold text-white">Mot de passe oublié ?</h2>
                    <p class="text-[#FFD700] mt-2">
                        Entrez votre email pour recevoir les instructions
                    </p>
                </div>

                @if (session('status'))
                    <div class="mb-4 p-4 bg-[#FFD700]/10 border border-[#FFD700] rounded-lg">
                        <p class="text-white text-sm text-center">
                            {{ session('status') }}
                        </p>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-[#FFD700]"></i>
                        <input type="email" name="email" id="email"
                            class="w-full bg-white/10 text-white rounded-lg pl-10 pr-4 py-3 border-2 border-transparent focus:border-[#FFD700] focus:outline-none transition-colors placeholder-gray-300"
                            placeholder="Adresse email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <p class="mt-1 text-[#FFD700] text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bouton d'envoi -->
                    <button type="submit"
                        class="w-full bg-[#FFD700] hover:bg-[#FFD700]/90 text-[#0A2463] rounded-lg py-3 font-bold transition-colors duration-300">
                        Envoyer le lien de réinitialisation
                    </button>

                    <!-- Lien de retour -->
                    <div class="text-center space-y-4">
                        <p class="text-white">
                            <a href="{{ route('login') }}" class="text-[#FFD700] hover:text-white transition-colors flex items-center justify-center">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Retour à la connexion
                            </a>
                        </p>
                    </div>
                </form>

                <!-- Instructions supplémentaires -->
                <div class="mt-8 p-4 bg-[#1B3B86]/50 rounded-lg">
                    <h3 class="text-white font-semibold mb-2 flex items-center">
                        <i class="fas fa-info-circle text-[#FFD700] mr-2"></i>
                        Note importante
                    </h3>
                    <p class="text-sm text-white/80">
                        Vous recevrez un email contenant un lien pour réinitialiser votre mot de passe.
                        Si vous ne le recevez pas, vérifiez votre dossier spam.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>