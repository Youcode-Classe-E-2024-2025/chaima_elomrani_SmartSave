<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Selection</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        .profile-card:hover {
            animation: pulse 0.5s ease-in-out;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-950 to-gray-900 min-h-screen flex flex-col items-center justify-center p-4">
    <main class="w-full max-w-6xl mx-auto flex flex-col items-center justify-center gap-12">
        
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 md:gap-6 w-full max-w-4xl">
            <!-- Profile 1 -->
            <div class="profile-card cursor-pointer group">
                <div class="relative flex flex-col items-center">
                    <div class="relative w-full aspect-square rounded-xl overflow-hidden bg-gradient-to-b from-blue-500 to-blue-700 shadow-lg transition-all duration-300 group-hover:shadow-2xl">
                        <img src="https://via.placeholder.com/200" alt="Primary" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <span class="mt-3 text-gray-300 group-hover:text-white font-medium transition-colors duration-300">
                        Primary
                    </span>
                </div>
            </div>

            <!-- Profile 2 -->
            <div class="profile-card cursor-pointer group">
                <div class="relative flex flex-col items-center">
                    <div class="relative w-full aspect-square rounded-xl overflow-hidden bg-gradient-to-b from-amber-400 to-amber-600 shadow-lg transition-all duration-300 group-hover:shadow-2xl">
                        <img src="https://via.placeholder.com/200" alt="Krishnadev" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <span class="mt-3 text-gray-300 group-hover:text-white font-medium transition-colors duration-300">
                        Krishnadev
                    </span>
                </div>
            </div>

            <!-- Profile 3 -->
            <div class="profile-card cursor-pointer group">
                <div class="relative flex flex-col items-center">
                    <div class="relative w-full aspect-square rounded-xl overflow-hidden bg-gradient-to-b from-red-500 to-red-700 shadow-lg transition-all duration-300 group-hover:shadow-2xl">
                        <img src="https://via.placeholder.com/200" alt="Krishnapriya" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <span class="mt-3 text-gray-300 group-hover:text-white font-medium transition-colors duration-300">
                        Krishnapriya
                    </span>
                </div>
            </div>

            <!-- Profile 4 -->
            <div class="profile-card cursor-pointer group">
                <div class="relative flex flex-col items-center">
                    <div class="relative w-full aspect-square rounded-xl overflow-hidden bg-gradient-to-b from-teal-500 to-teal-700 shadow-lg transition-all duration-300 group-hover:shadow-2xl">
                        <img src="https://via.placeholder.com/200" alt="Guest" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <span class="mt-3 text-gray-300 group-hover:text-white font-medium transition-colors duration-300">
                        Guest
                    </span>
                </div>
            </div>

            <!-- Profile 5 (Children - Locked) -->
            <div class="profile-card cursor-pointer group">
                <div class="relative flex flex-col items-center">
                    <div class="relative w-full aspect-square rounded-xl overflow-hidden bg-gradient-to-b from-purple-500 to-blue-500 shadow-lg transition-all duration-300 group-hover:shadow-2xl">
                        <img src="https://via.placeholder.com/200" alt="Children" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white/80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <span class="mt-3 text-gray-300 group-hover:text-white font-medium transition-colors duration-300">
                        Children
                    </span>
                </div>
            </div>

            <!-- Add Profile Button -->
            <div class="profile-card cursor-pointer group">
                <div class="relative flex flex-col items-center">
                    <div class="relative w-full aspect-square rounded-xl overflow-hidden bg-gray-800 shadow-lg transition-all duration-300 group-hover:shadow-2xl flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <span class="mt-3 text-gray-300 group-hover:text-white font-medium transition-colors duration-300">
                        Add Profile
                    </span>
                </div>
            </div>
        </div>
        
        <button class="mt-8 px-8 py-2 text-gray-400 hover:text-white border border-gray-700 rounded-md hover:bg-gray-800 transition-all duration-300">
            Manage Profiles
        </button>
    </main>
</body>
</html>

