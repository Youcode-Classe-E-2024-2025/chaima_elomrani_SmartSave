<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSmart - Prenez le contrôle de vos finances</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#0a2463', // Dark Blue
                            light: '#1e3a8a',
                        },
                        secondary: {
                            DEFAULT: '#3e92cc', // Medium Blue
                        },
                        accent: {
                            DEFAULT: '#2ecc71', // Green for finance/success
                        },
                        dark: {
                            DEFAULT: '#1a1a2e',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        .gradient-text {
            background: linear-gradient(90deg, #0a2463 0%, #3e92cc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .hero-pattern {
            background-color: #0a2463;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%233e92cc' fill-opacity='0.1'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        
        .stats-item:not(:last-child)::after {
            content: "";
            position: absolute;
            right: 0;
            top: 20%;
            height: 60%;
            width: 1px;
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(10, 36, 99, 0.1), 0 8px 10px -6px rgba(10, 36, 99, 0.1);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
    </style>
</head>
<body class="font-sans text-gray-800 bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-primary shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-white text-2xl font-bold">Save<span class="text-accent">Smart</span></span>
                    </div>
                    <div class="hidden md:ml-10 md:flex md:space-x-8">
                        <a href="#" class="text-white hover:text-accent border-transparent border-b-2 hover:border-accent inline-flex items-center px-1 pt-1 text-sm font-medium">Accueil</a>
                        <a href="#features" class="text-gray-300 hover:text-accent border-transparent border-b-2 hover:border-accent inline-flex items-center px-1 pt-1 text-sm font-medium">Fonctionnalités</a>
                        <a href="#how-it-works" class="text-gray-300 hover:text-accent border-transparent border-b-2 hover:border-accent inline-flex items-center px-1 pt-1 text-sm font-medium">Comment ça marche</a>
                        <a href="#pricing" class="text-gray-300 hover:text-accent border-transparent border-b-2 hover:border-accent inline-flex items-center px-1 pt-1 text-sm font-medium">Tarifs</a>
                        <a href="#testimonials" class="text-gray-300 hover:text-accent border-transparent border-b-2 hover:border-accent inline-flex items-center px-1 pt-1 text-sm font-medium">Témoignages</a>
                    </div>
                </div>
                <div class="hidden md:flex items-center">
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Connexion</a>
                    <a href="#" class="ml-4 px-4 py-2 rounded-md text-sm font-medium bg-accent hover:bg-opacity-90 text-white shadow-sm">S'inscrire</a>
                </div>
                <div class="-mr-2 flex items-center md:hidden">
                    <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-primary-light focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
                        <span class="sr-only">Ouvrir le menu</span>
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="mobile-menu hidden md:hidden bg-primary-light">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#" class="text-white block px-3 py-2 rounded-md text-base font-medium">Accueil</a>
                <a href="#features" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Fonctionnalités</a>
                <a href="#how-it-works" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Comment ça marche</a>
                <a href="#pricing" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Tarifs</a>
                <a href="#testimonials" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Témoignages</a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="flex items-center px-5">
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white">Connexion</a>
                    <a href="#" class="ml-4 block px-4 py-2 rounded-md text-base font-medium bg-accent hover:bg-opacity-90 text-white">S'inscrire</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-pattern pt-28 pb-20 md:pt-32 md:pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="opacity-0 animate-fadeInUp">
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight">
                        Prenez le contrôle de vos finances personnelles
                    </h1>
                    <p class="mt-4 text-lg text-gray-300">
                        Suivez, analysez et optimisez vos finances familiales avec des outils intuitifs. Atteignez vos objectifs financiers plus rapidement avec SaveSmart.
                    </p>
                    <div class="mt-8 flex flex-col sm:flex-row">
                        <a href="#" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-accent hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent w-full sm:w-auto">
                            Commencer gratuitement
                        </a>
                        <a href="#how-it-works" class="mt-3 sm:mt-0 sm:ml-3 inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary-light hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary w-full sm:w-auto">
                            Comment ça marche <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                <div class="opacity-0 animate-fadeInUp delay-200">
                    <img src="/api/placeholder/600/400" alt="SaveSmart Dashboard Preview" class="rounded-xl shadow-2xl transform -rotate-1 hover:rotate-0 transition-transform duration-500" />
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="bg-secondary py-12 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="stats-item relative text-center opacity-0 animate-fadeInUp">
                    <div class="text-4xl font-bold">10,000+</div>
                    <div class="mt-2">Familles qui nous font confiance</div>
                </div>
                <div class="stats-item relative text-center opacity-0 animate-fadeInUp delay-100">
                    <div class="text-4xl font-bold">€2.5M</div>
                    <div class="mt-2">Économisés par nos utilisateurs</div>
                </div>
                <div class="stats-item relative text-center opacity-0 animate-fadeInUp delay-200">
                    <div class="text-4xl font-bold">92%</div>
                    <div class="mt-2">Taux de satisfaction client</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center opacity-0 animate-fadeInUp">
                <h2 class="text-3xl md:text-4xl font-bold gradient-text inline-block">Fonctionnalités principales</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    SaveSmart vous offre tous les outils nécessaires pour maîtriser vos finances personnelles et familiales.
                </p>
            </div>
            
            <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-white rounded-xl p-6 shadow-md border border-gray-100 transition-all duration-300 opacity-0 animate-fadeInUp">
                    <div class="h-12 w-12 bg-primary-light rounded-lg flex items-center justify-center text-white mb-4">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-primary">Gestion multi-utilisateurs</h3>
                    <p class="mt-2 text-gray-600">
                        Ajoutez plusieurs membres de votre famille sous un même compte pour une gestion financière collaborative.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="feature-card bg-white rounded-xl p-6 shadow-md border border-gray-100 transition-all duration-300 opacity-0 animate-fadeInUp delay-100">
                    <div class="h-12 w-12 bg-primary-light rounded-lg flex items-center justify-center text-white mb-4">
                        <i class="fas fa-chart-pie text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-primary">Visualisations graphiques</h3>
                    <p class="mt-2 text-gray-600">
                        Suivez votre progression financière à l'aide de tableaux et graphiques personnalisables.
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="feature-card bg-white rounded-xl p-6 shadow-md border border-gray-100 transition-all duration-300 opacity-0 animate-fadeInUp delay-200">
                    <div class="h-12 w-12 bg-primary-light rounded-lg flex items-center justify-center text-white mb-4">
                        <i class="fas fa-tags text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-primary">Catégories personnalisables</h3>
                    <p class="mt-2 text-gray-600">
                        Créez et personnalisez vos catégories de dépenses selon vos besoins spécifiques.
                    </p>
                </div>
                
                <!-- Feature 4 -->
                <div class="feature-card bg-white rounded-xl p-6 shadow-md border border-gray-100 transition-all duration-300 opacity-0 animate-fadeInUp delay-300">
                    <div class="h-12 w-12 bg-primary-light rounded-lg flex items-center justify-center text-white mb-4">
                        <i class="fas fa-bullseye text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-primary">Objectifs d'épargne</h3>
                    <p class="mt-2 text-gray-600">
                        Définissez des objectifs financiers et suivez votre progression vers leur réalisation.
                    </p>
                </div>
                
                <!-- Feature 5 -->
                <div class="feature-card bg-white rounded-xl p-6 shadow-md border border-gray-100 transition-all duration-300 opacity-0 animate-fadeInUp delay-400">
                    <div class="h-12 w-12 bg-primary-light rounded-lg flex items-center justify-center text-white mb-4">
                        <i class="fas fa-sliders-h text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-primary">Optimisation budgétaire</h3>
                    <p class="mt-2 text-gray-600">
                        Utilisez notre algorithme intelligent pour optimiser votre budget selon vos priorités.
                    </p>
                </div>
                
                <!-- Feature 6 -->
                <div class="feature-card bg-white rounded-xl p-6 shadow-md border border-gray-100 transition-all duration-300 opacity-0 animate-fadeInUp delay-500">
                    <div class="h-12 w-12 bg-primary-light rounded-lg flex items-center justify-center text-white mb-4">
                        <i class="fas fa-file-export text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-primary">Export de données</h3>
                    <p class="mt-2 text-gray-600">
                        Exportez vos données financières au format PDF ou CSV pour un usage externe.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center opacity-0 animate-fadeInUp">
                <h2 class="text-3xl md:text-4xl font-bold gradient-text inline-block">Comment ça marche</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    SaveSmart vous accompagne à chaque étape de votre parcours financier grâce à une approche simple et efficace.
                </p>
            </div>
            
            <div class="mt-16 relative">
                <!-- Timeline line -->
                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-primary-light opacity-20"></div>
                
                <!-- Step 1 -->
                <div class="relative mb-16 md:mb-12 opacity-0 animate-fadeInUp">
                    <div class="md:grid md:grid-cols-2 md:gap-8 items-center">
                        <div class="md:text-right md:pr-12">
                            <div class="hidden md:block absolute right-0 top-6 transform translate-x-1/2 w-8 h-8 bg-primary rounded-full border-4 border-white"></div>
                            <h3 class="text-2xl font-semibold text-primary">1. Inscrivez-vous en quelques clics</h3>
                            <p class="mt-3 text-gray-600">
                                Créez un compte sécurisé et ajoutez les membres de votre famille qui participeront à la gestion budgétaire.
                            </p>
                        </div>
                        <div class="mt-6 md:mt-0 md:pl-12">
                            <img src="/api/placeholder/400/300" alt="Inscription" class="rounded-lg shadow-md" />
                        </div>
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div class="relative mb-16 md:mb-12 opacity-0 animate-fadeInUp delay-100">
                    <div class="md:grid md:grid-cols-2 md:gap-8 items-center">
                        <div class="order-last md:order-first md:pr-12">
                            <img src="/api/placeholder/400/300" alt="Configuration" class="rounded-lg shadow-md" />
                        </div>
                        <div class="mt-6 md:mt-0 md:pl-12">
                            <div class="hidden md:block absolute left-0 top-6 transform -translate-x-1/2 w-8 h-8 bg-primary rounded-full border-4 border-white"></div>
                            <h3 class="text-2xl font-semibold text-primary">2. Configurez vos catégories</h3>
                            <p class="mt-3 text-gray-600">
                                Personnalisez vos catégories de revenus et dépenses selon votre style de vie et vos priorités financières.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="relative mb-16 md:mb-12 opacity-0 animate-fadeInUp delay-200">
                    <div class="md:grid md:grid-cols-2 md:gap-8 items-center">
                        <div class="md:text-right md:pr-12">
                            <div class="hidden md:block absolute right-0 top-6 transform translate-x-1/2 w-8 h-8 bg-primary rounded-full border-4 border-white"></div>
                            <h3 class="text-2xl font-semibold text-primary">3. Suivez vos dépenses</h3>
                            <p class="mt-3 text-gray-600">
                                Enregistrez facilement vos transactions quotidiennes et visualisez en temps réel l'état de vos finances.
                            </p>
                        </div>
                        <div class="mt-6 md:mt-0 md:pl-12">
                            <img src="/api/placeholder/400/300" alt="Suivi des dépenses" class="rounded-lg shadow-md" />
                        </div>
                    </div>
                </div>
                
                <!-- Step 4 -->
                <div class="relative opacity-0 animate-fadeInUp delay-300">
                    <div class="md:grid md:grid-cols-2 md:gap-8 items-center">
                        <div class="order-last md:order-first md:pr-12">
                            <img src="/api/placeholder/400/300" alt="Optimisation" class="rounded-lg shadow-md" />
                        </div>
                        <div class="mt-6 md:mt-0 md:pl-12">
                            <div class="hidden md:block absolute left-0 top-6 transform -translate-x-1/2 w-8 h-8 bg-primary rounded-full border-4 border-white"></div>
                            <h3 class="text-2xl font-semibold text-primary">4. Optimisez votre budget</h3>
                            <p class="mt-3 text-gray-600">
                                Utilisez nos outils d'optimisation comme la méthode 50/30/20 pour répartir efficacement votre budget et atteindre vos objectifs.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Preview -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center opacity-0 animate-fadeInUp">
                <h2 class="text-3xl md:text-4xl font-bold gradient-text inline-block">Un tableau de bord intuitif</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    Gérez vos finances avec un tableau de bord simple et puissant qui vous donne une vision claire de votre situation financière.
                </p>
            </div>
            
            <div class="mt-12 opacity-0 animate-fadeInUp delay-100">
                <img src="/api/placeholder/1200/600" alt="SaveSmart Dashboard" class="rounded-xl shadow-xl w-full" />
            </div>
            
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-lg p-6 opacity-0 animate-fadeInUp delay-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 bg-primary rounded-full flex items-center justify-center text-white">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-primary">Vue d'ensemble</h3>
                            <p class="mt-1 text-gray-600">Visualisez toutes vos finances en un coup d'œil</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 opacity-0 animate-fadeInUp delay-300">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 bg-primary rounded-full flex items-center justify-center text-white">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-primary">Sécurité renforcée</h3>
                            <p class="mt-1 text-gray-600">Vos données financières toujours protégées</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-6 opacity-0 animate-fadeInUp delay-400">
                    <div class="flex items-center">
                    <div class="h-10 w-10 bg-primary rounded-full flex items-center justify-center text-white">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-primary">Accessible partout</h3>
                            <p class="mt-1 text-gray-600">Utilisez l'application sur tous vos appareils</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center opacity-0 animate-fadeInUp">
                <h2 class="text-3xl md:text-4xl font-bold gradient-text inline-block">Plans tarifaires</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    Choisissez le plan qui correspond le mieux à vos besoins, sans frais cachés ni engagement à long terme.
                </p>
            </div>
            
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Free Plan -->
                <div class="bg-white rounded-xl shadow-md p-8 border border-gray-100 opacity-0 animate-fadeInUp relative">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gray-200 rounded-t-xl"></div>
                    <h3 class="text-xl font-bold text-gray-800">Débutant</h3>
                    <div class="mt-4 flex items-end">
                        <span class="text-4xl font-bold text-primary">Gratuit</span>
                    </div>
                    <p class="mt-2 text-gray-600">Parfait pour débuter dans la gestion de budget</p>
                    
                    <ul class="mt-6 space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>Jusqu'à 5 catégories de dépenses</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>Graphiques de base</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>1 utilisateur</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>Application mobile</span>
                        </li>
                        <li class="flex items-start text-gray-400">
                            <i class="fas fa-times mt-1 mr-2"></i>
                            <span>Objectifs financiers</span>
                        </li>
                    </ul>
                    
                    <a href="#" class="mt-8 block w-full bg-gray-100 hover:bg-gray-200 text-primary font-medium py-3 px-4 rounded-lg text-center">
                        Commencer gratuitement
                    </a>
                </div>
                
                <!-- Premium Plan -->
                <div class="bg-white rounded-xl shadow-xl p-8 border border-gray-100 opacity-0 animate-fadeInUp delay-100 relative transform md:scale-105 z-10">
                    <div class="absolute top-0 left-0 w-full h-1 bg-accent rounded-t-xl"></div>
                    <div class="absolute -top-5 right-5 bg-accent text-white text-sm font-semibold py-1 px-3 rounded-full">Populaire</div>
                    <h3 class="text-xl font-bold text-gray-800">Premium</h3>
                    <div class="mt-4 flex items-end">
                        <span class="text-4xl font-bold text-primary">€4.99</span>
                        <span class="ml-1 text-gray-600">/mois</span>
                    </div>
                    <p class="mt-2 text-gray-600">Idéal pour la gestion financière familiale</p>
                    
                    <ul class="mt-6 space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>Catégories illimitées</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>Graphiques avancés</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>Jusqu'à 5 utilisateurs</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>Objectifs financiers</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>Export PDF/CSV</span>
                        </li>
                    </ul>
                    
                    <a href="#" class="mt-8 block w-full bg-accent hover:bg-opacity-90 text-white font-medium py-3 px-4 rounded-lg text-center">
                        Essayer 30 jours gratuits
                    </a>
                </div>
                
                <!-- Enterprise Plan -->
                <div class="bg-white rounded-xl shadow-md p-8 border border-gray-100 opacity-0 animate-fadeInUp delay-200 relative">
                    <div class="absolute top-0 left-0 w-full h-1 bg-primary rounded-t-xl"></div>
                    <h3 class="text-xl font-bold text-gray-800">Entreprise</h3>
                    <div class="mt-4 flex items-end">
                        <span class="text-4xl font-bold text-primary">€9.99</span>
                        <span class="ml-1 text-gray-600">/mois</span>
                    </div>
                    <p class="mt-2 text-gray-600">Pour une gestion financière professionnelle</p>
                    
                    <ul class="mt-6 space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>Toutes les fonctionnalités Premium</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>Utilisateurs illimités</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>Outils de projection financière</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>API pour intégrations externes</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check text-accent mt-1 mr-2"></i>
                            <span>Support prioritaire</span>
                        </li>
                    </ul>
                    
                    <a href="#" class="mt-8 block w-full bg-primary hover:bg-primary-light text-white font-medium py-3 px-4 rounded-lg text-center">
                        Contacter les ventes
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center opacity-0 animate-fadeInUp">
                <h2 class="text-3xl md:text-4xl font-bold gradient-text inline-block">Ce que disent nos utilisateurs</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    Découvrez comment SaveSmart a transformé la gestion financière de nos utilisateurs.
                </p>
            </div>
            
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 rounded-xl p-6 shadow-md opacity-0 animate-fadeInUp">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-12 w-12 bg-primary rounded-full flex items-center justify-center text-white text-xl font-bold">
                                M
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900">Marie Dupont</h4>
                            <div class="flex text-yellow-400 mt-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600 italic">
                        "Grâce à SaveSmart, j'ai pu économiser suffisamment pour partir en vacances avec ma famille cette année. L'application est simple à utiliser et les graphiques m'aident à comprendre où va mon argent."
                    </p>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-gray-50 rounded-xl p-6 shadow-md opacity-0 animate-fadeInUp delay-100">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-12 w-12 bg-primary rounded-full flex items-center justify-center text-white text-xl font-bold">
                                T
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900">Thomas Bernard</h4>
                            <div class="flex text-yellow-400 mt-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600 italic">
                        "En tant que père de famille, je cherchais un outil qui me permettrait de gérer notre budget facilement. SaveSmart a dépassé mes attentes avec ses fonctionnalités multi-utilisateurs qui permettent à toute la famille de participer."
                    </p>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-gray-50 rounded-xl p-6 shadow-md opacity-0 animate-fadeInUp delay-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-12 w-12 bg-primary rounded-full flex items-center justify-center text-white text-xl font-bold">
                                S
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-medium text-gray-900">Sophie Martin</h4>
                            <div class="flex text-yellow-400 mt-1">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-gray-600 italic">
                        "La fonctionnalité des objectifs d'épargne a changé ma vie ! J'ai finalement pu économiser pour l'acompte de ma maison. Le support client est également excellent, toujours disponible pour répondre à mes questions."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center opacity-0 animate-fadeInUp">
                <h2 class="text-3xl md:text-4xl font-bold text-white">Prêt à prendre le contrôle de vos finances ?</h2>
                <p class="mt-4 text-lg text-gray-300 max-w-3xl mx-auto">
                    Rejoignez des milliers de familles qui ont transformé leur situation financière grâce à SaveSmart.
                </p>
                <div class="mt-8">
                    <a href="#" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-primary bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                        Commencer gratuitement
                    </a>
                    <p class="mt-3 text-sm text-gray-300">Pas de carte de crédit requise</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-12 pb-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="text-2xl font-bold">Save<span class="text-accent">Smart</span></div>
                    <p class="mt-2 text-gray-400">
                        Simplifiez la gestion de vos finances personnelles et atteignez vos objectifs plus rapidement.
                    </p>
                    <div class="flex mt-4 space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="font-semibold text-lg">Produit</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#features" class="text-gray-400 hover:text-white">Fonctionnalités</a></li>
                        <li><a href="#pricing" class="text-gray-400 hover:text-white">Tarifs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Télécharger l'application</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Mises à jour</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-semibold text-lg">Support</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Centre d'aide</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contacter le support</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Tutoriels vidéo</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">FAQ</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-semibold text-lg">Entreprise</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">À propos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Carrières</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Confidentialité</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Conditions d'utilisation</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-12 pt-6 border-t border-gray-800 text-center">
                <p class="text-gray-400 text-sm">
                    &copy; 2025 SaveSmart. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    // Close mobile menu if open
                    mobileMenu.classList.add('hidden');
                    
                    const targetId = this.getAttribute('href');
                    if(targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if(targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 80,
                            behavior: 'smooth'
                        });
                    }
                });
            });
            
            // Animation on scroll
            const animatedElements = document.querySelectorAll('.animate-fadeInUp');
            
            function checkIfInView() {
                animatedElements.forEach(element => {
                    const rect = element.getBoundingClientRect();
                    const windowHeight = window.innerHeight || document.documentElement.clientHeight;
                    
                    if (rect.top <= windowHeight * 0.85) {
                        element.style.opacity = '1';
                    }
                });
            }
            
            // Run on page load
            checkIfInView();
            
            // Run on scroll
            window.addEventListener('scroll', checkIfInView);
        });
    </script>
</body>
</html>