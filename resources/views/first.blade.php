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
        
        /* Add fade-in/out animations for modal */
        .modal-fade-in {
            animation: fadeIn 0.3s ease-in-out forwards;
        }
        
        .modal-fade-out {
            animation: fadeOut 0.3s ease-in-out forwards;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
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
                    <div id="addBtn" class="relative w-full aspect-square rounded-xl overflow-hidden bg-gray-800 shadow-lg transition-all duration-300 group-hover:shadow-2xl flex items-center justify-center">
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

    <!-- Modal for adding a new profile -->
    <div id="addProfileModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-gray-900 rounded-lg p-8 max-w-md w-full mx-4">
            <h2 class="text-2xl font-bold text-white mb-4">Create New Profile</h2>
            <form id="addProfileForm" class="space-y-6">
                <div class="flex flex-col items-center mb-4">
                    <div id="profileImagePreview" class="w-32 h-32 rounded-full bg-gray-700 flex items-center justify-center cursor-pointer overflow-hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <input type="file" id="profileImageInput" class="hidden" accept="image/*">
                    <button type="button" id="uploadImageBtn" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-300">
                        Upload Photo
                    </button>
                </div>
                <div>
                    <label for="profileName" class="block text-sm font-medium text-gray-400 mb-1">Profile Name</label>
                    <input type="text" id="profileName" name="profileName" required
                        class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="profileName" class="block text-sm font-medium text-gray-400 mb-1">Phone number</label>
                    <input type="text " id="number" name="number" required
                        class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
               
               
                <div class="flex justify-between">
                    <button type="button" id="cancelAddProfile" class="px-4 py-2 bg-gray-800 text-gray-300 rounded hover:bg-gray-700 transition-colors duration-300">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-300">
                        Create Profile
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Get DOM elements
        const addProfileModal = document.getElementById('addProfileModal');
        const addBtn = document.getElementById('addBtn');
        const cancelAddProfile = document.getElementById('cancelAddProfile');
        const profileImagePreview = document.getElementById('profileImagePreview');
        const profileImageInput = document.getElementById('profileImageInput');
        const uploadImageBtn = document.getElementById('uploadImageBtn');
        const addProfileForm = document.getElementById('addProfileForm');

        // Show modal with animation when Add Profile is clicked
        addBtn.addEventListener('click', () => {
            addProfileModal.classList.remove('hidden');
            addProfileModal.classList.add('modal-fade-in');
        });

        // Hide modal with animation when Cancel is clicked
        cancelAddProfile.addEventListener('click', () => {
            addProfileModal.classList.add('modal-fade-out');
            setTimeout(() => {
                addProfileModal.classList.add('hidden');
                addProfileModal.classList.remove('modal-fade-in', 'modal-fade-out');
                // Reset form
                addProfileForm.reset();
                // Reset image preview
                profileImagePreview.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                `;
            }, 300); // Match the animation duration
        });

        // Close modal when clicking outside of it
        addProfileModal.addEventListener('click', (e) => {
            if (e.target === addProfileModal) {
                cancelAddProfile.click();
            }
        });

        // Handle image upload button click
        uploadImageBtn.addEventListener('click', () => {
            profileImageInput.click();
        });

        // Handle image preview when file is selected
        profileImageInput.addEventListener('change', (e) => {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                
                reader.onload = (event) => {
                    profileImagePreview.innerHTML = '';
                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.classList.add('w-full', 'h-full', 'object-cover');
                    profileImagePreview.appendChild(img);
                };
                
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        // Handle form submission
        addProfileForm.addEventListener('submit', (e) => {
            e.preventDefault();
            // Here you would typically handle the form data
            // For now, just close the modal
            cancelAddProfile.click();
        });
    </script>
</body>
</html>