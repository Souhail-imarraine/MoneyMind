<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMind - Gestion Financière Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-[#F8F9FA]">
    <!-- Barre de navigation fixe -->
    <nav class="fixed w-full bg-white/90 backdrop-blur-md shadow-sm z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <svg class="h-12 w-12" viewBox="0 0 24 24" fill="#0A2463">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z"/>
                    </svg>
                    <span class="ml-3 text-2xl font-bold text-[#0A2463]">MoneyMind</span>
                </div>

                <!-- Navigation Desktop -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="#" class="text-gray-700 hover:text-[#0A2463] font-medium">Accueil</a>
                    <a href="#" class="text-gray-700 hover:text-[#0A2463] font-medium">Fonctionnalités</a>
                    <a href="#" class="text-gray-700 hover:text-[#0A2463] font-medium">Solutions</a>
                    <a href="#" class="text-gray-700 hover:text-[#0A2463] font-medium">Tarifs</a>
                    <div class="flex items-center space-x-4">
                        <a href="#" class="text-[#0A2463] font-semibold hover:text-[#0A2463]/80">Se connecter</a>
                        <a href="#" class="bg-[#0A2463] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#0A2463]/90 transition duration-300">
                            Démarrer gratuitement
                        </a>
                    </div>
                </div>

                <!-- Menu Mobile Button -->
                <button id="mobile-menu-button" class="lg:hidden text-[#0A2463] focus:outline-none">
                    <svg class="w-6 h-6" id="menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="w-6 h-6 hidden" id="close-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Menu Mobile Panel -->
            <div id="mobile-menu" class="hidden lg:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white rounded-lg shadow-lg mt-2">
                    <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-[#0A2463] hover:text-white rounded-lg transition duration-300">Accueil</a>
                    <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-[#0A2463] hover:text-white rounded-lg transition duration-300">Fonctionnalités</a>
                    <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-[#0A2463] hover:text-white rounded-lg transition duration-300">Solutions</a>
                    <a href="#" class="block px-4 py-3 text-gray-700 hover:bg-[#0A2463] hover:text-white rounded-lg transition duration-300">Tarifs</a>
                    <div class="border-t border-gray-200 my-2"></div>
                    <a href="#" class="block px-4 py-3 text-[#0A2463] font-semibold hover:bg-gray-100 rounded-lg transition duration-300">Se connecter</a>
                    <a href="#" class="block px-4 py-3 text-center bg-[#0A2463] text-white rounded-lg font-semibold hover:bg-[#0A2463]/90 transition duration-300 mt-2">
                        Démarrer gratuitement
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 bg-gradient-to-br from-[#0A2463] to-[#1B3B86]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="text-center lg:text-left">
                    <h1 class="text-4xl lg:text-5xl font-bold text-white leading-tight">
                        L'excellence financière à portée de main
                    </h1>
                    <p class="mt-6 text-xl text-gray-300">
                        Découvrez une nouvelle ère de gestion financière avec MoneyMind.
                        Intelligence artificielle et expertise financière réunies.
                    </p>
                    <div class="mt-10 flex flex-col sm:flex-row justify-center lg:justify-start space-y-4 sm:space-y-0 sm:space-x-6">
                        <a href="#" class="bg-[#FFD700] text-[#0A2463] px-8 py-4 rounded-lg font-bold hover:bg-[#FFD700]/90 transition duration-300 text-center">
                            Commencer l'essai gratuit
                        </a>
                        <a href="#" class="flex items-center justify-center text-white font-medium hover:text-[#FFD700] transition duration-300">
                            <i class="fas fa-play-circle mr-2"></i>
                            Voir la démo
                        </a>
                    </div>
                </div>
                <div class="hidden lg:block relative">
                    <svg class="w-full h-auto" viewBox="0 0 600 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="600" height="400" rx="16" fill="#FFFFFF" />
                        <path d="M100 300 L200 200 L300 250 L400 150 L500 200" stroke="#0A2463" stroke-width="4" fill="none"/>
                        <circle cx="100" cy="300" r="6" fill="#0A2463"/>
                        <circle cx="200" cy="200" r="6" fill="#0A2463"/>
                        <circle cx="300" cy="250" r="6" fill="#0A2463"/>
                        <circle cx="400" cy="150" r="6" fill="#0A2463"/>
                        <circle cx="500" cy="200" r="6" fill="#0A2463"/>
                    </svg>
                    <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-xl shadow-xl">
                        <div class="flex items-center space-x-4">
                            <div class="bg-green-100 p-3 rounded-full">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Croissance mensuelle</p>
                                <p class="text-xl font-bold text-[#0A2463]">+27.4%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Partenaires -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-600 mb-8">Ils nous font confiance</p>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 items-center justify-items-center">
                <svg class="h-8 w-auto opacity-50 hover:opacity-100 transition-opacity" viewBox="0 0 120 40" fill="#0A2463">
                    <rect x="10" y="10" width="100" height="20" rx="4"/>
                </svg>
                <svg class="h-8 w-auto opacity-50 hover:opacity-100 transition-opacity" viewBox="0 0 120 40" fill="#0A2463">
                    <circle cx="60" cy="20" r="15"/>
                </svg>
                <svg class="h-8 w-auto opacity-50 hover:opacity-100 transition-opacity" viewBox="0 0 120 40" fill="#0A2463">
                    <polygon points="60,10 80,30 40,30"/>
                </svg>
                <svg class="h-8 w-auto opacity-50 hover:opacity-100 transition-opacity" viewBox="0 0 120 40" fill="#0A2463">
                    <path d="M20,20 Q60,5 100,20"/>
                </svg>
                <svg class="h-8 w-auto opacity-50 hover:opacity-100 transition-opacity" viewBox="0 0 120 40" fill="#0A2463">
                    <rect x="20" y="10" width="80" height="20" rx="10"/>
                </svg>
            </div>
        </div>
    </section>

    <!-- Section Fonctionnalités -->
    <section class="py-20 bg-[#F8F9FA]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-[#0A2463]">Solutions innovantes</h2>
                <p class="mt-4 text-xl text-gray-600">Des outils puissants conçus pour votre réussite financière</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-[#0A2463]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-[#0A2463]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#0A2463] mb-4">Analyse intelligente</h3>
                    <p class="text-gray-600">Visualisez vos données financières avec des graphiques interactifs et des rapports détaillés.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-[#0A2463]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-[#0A2463]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#0A2463] mb-4">IA prédictive</h3>
                    <p class="text-gray-600">Anticipez les tendances et optimisez vos décisions financières grâce à notre IA.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-[#0A2463]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-[#0A2463]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#0A2463] mb-4">Sécurité maximale</h3>
                    <p class="text-gray-600">Vos données sont protégées par les meilleurs systèmes de sécurité.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section CTA -->
    <section class="py-20 bg-[#0A2463]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-8">Prêt à transformer votre gestion financière ?</h2>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6">
                <a href="#" class="bg-[#FFD700] text-[#0A2463] px-8 py-4 rounded-lg font-bold hover:bg-[#FFD700]/90 transition duration-300">
                    Commencer maintenant
                </a>
                <a href="#" class="border-2 border-white text-white px-8 py-4 rounded-lg font-bold hover:bg-white hover:text-[#0A2463] transition duration-300">
                    Contactez-nous
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div>
                    <div class="flex items-center mb-6">
                        <svg class="h-10 w-10" viewBox="0 0 45 45" fill="#0A2463">
                            <circle cx="22.5" cy="22.5" r="20"/>
                            <path d="M15 22.5 L22.5 15 L30 22.5 L22.5 30 Z" fill="white"/>
                        </svg>
                        <span class="ml-3 text-xl font-bold text-[#0A2463]">MoneyMind</span>
                    </div>
                    <p class="text-gray-600">Votre partenaire de confiance pour une meilleure gestion financière.</p>
                </div>
                <div>
                    <h3 class="text-[#0A2463] font-semibold mb-4">Produit</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-[#0A2463]">Fonctionnalités</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-[#0A2463]">Solutions</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-[#0A2463]">Tarifs</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-[#0A2463] font-semibold mb-4">Entreprise</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-[#0A2463]">À propos</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-[#0A2463]">Blog</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-[#0A2463]">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-[#0A2463] font-semibold mb-4">Suivez-nous</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-600 hover:text-[#0A2463]">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-[#0A2463]">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                                <rect x="2" y="9" width="4" height="12"/>
                                <circle cx="4" cy="4" r="2"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-[#0A2463]">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-200 mt-12 pt-8 text-center text-gray-600">
                <p>&copy; 2024 MoneyMind. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Ajouter ce script à la fin du body -->
    <script>
        // Menu mobile toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });

        // Fermer le menu mobile lors du clic sur un lien
        const mobileMenuLinks = mobileMenu.querySelectorAll('a');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            });
        });

        // Fermer le menu mobile lors du défilement
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            if (currentScroll > lastScroll) {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
            lastScroll = currentScroll;
        });
    </script>
</body>
</html>
