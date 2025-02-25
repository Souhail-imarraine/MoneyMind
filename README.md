<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

MoneyMind - Gestion Budgétaire Intelligente

MoneyMind est une application qui simplifie la gestion budgétaire personnelle en permettant aux utilisateurs de suivre leurs revenus, dépenses, objectifs d’épargne et souhaits, tout en recevant des suggestions intelligentes via une IA.

🛠️ Fonctionnalités Principales

🏠 Front Office

🌐 Visiteur

Consulter une page d’accueil publique avec une présentation de l’application.

Inscription avec saisie du salaire mensuel et date de crédit.

Système de récupération de mot de passe.

👤 Utilisateur Authentifié

Gérer son salaire mensuel et date de crédit automatique.

Ajouter et gérer ses dépenses avec catégories personnalisées.

Configurer des dépenses récurrentes (loyer, abonnements, etc.).

Définir des alertes budgétaires pour surveiller les dépenses.

Consulter un tableau de bord avec :

Revenu restant et total dépensé.

Progression des objectifs d’épargne.

Derniers conseils d’IA.

Recevoir des notifications par email.

📊 Back Office (Administrateur)

Accéder à un tableau de bord avec statistiques globales.

Supprimer des comptes inactifs.

Ajouter, modifier ou supprimer des catégories de dépenses.

⚙️ Fonctionnalités Transversales

Système d’authentification et d’autorisation par rôles.

Gestion automatique des salaires et dépenses récurrentes.

Suggestions intelligentes via l’API Gemini.

Statistiques et filtrage des dépenses.

💡 Exigences Techniques

Architecture : Application monolithique scalable avec Laravel.

Automatisation : Gestion des salaires et dépenses via CRON jobs.

IA : Intégration de l’API Gemini pour suggestions personnalisées.

Déploiement : Serveur Linux (AWS, Azure, DigitalOcean).

Interface : Responsive et intuitive, avec visualisation des données (graphiques, tableaux).

⚡ Sécurité

Validation des entrées côté serveur.

Protection contre XSS et CSRF.

Hachage des mots de passe (bcrypt).

Contrôle d’accès basé sur les rôles.