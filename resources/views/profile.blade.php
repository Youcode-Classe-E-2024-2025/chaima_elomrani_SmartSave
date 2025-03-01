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
    <div class="max-w-full flex flex-wrap gap-6 justify-center">  <!-- FLEX CONTAINER -->

        <!-- Profile Cards -->
        @foreach ($profiles as $profile)
        <div class="profile-card cursor-pointer group">
            <div class="items-center">
                <div class="relative w-32 h-32 rounded-xl overflow-hidden bg-gradient-to-b from-teal-500 to-teal-700 shadow-lg">
                    <img src="https://via.placeholder.com/200" alt="Guest" class="w-full h-full object-cover opacity-90">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Trash icon - hidden by default, shown on hover -->
                    <div class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white hover:text-red-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                </div>
                <span class="mt-3 text-gray-300 group-hover:text-white font-medium transition-colors duration-300">
                    {{ $profile->name }}
                </span>
            </div>
        </div>
        @endforeach

        <!-- Add Profile Button -->
        <div class="profile-card cursor-pointer group">
            <div class="relative flex flex-col items-center">
                <div id="addBtn" class="relative w-32 h-32 rounded-xl overflow-hidden bg-gray-800 shadow-lg transition-all duration-300 group-hover:shadow-2xl flex items-center justify-center">
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

    <!-- Manage Profiles Button -->
    <button class="mt-8 px-8 py-2 text-gray-400 hover:text-white border border-gray-700 rounded-md hover:bg-gray-800 transition-all duration-300">
        Manage Profiles
    </button>
</main>
    

    <!-- Modal for adding a new profile -->
    <div id="addProfileModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-gray-900 rounded-lg p-8 max-w-md w-full mx-4">
            <h2 class="text-2xl font-bold text-white mb-4">Create New Profile</h2>
            <form id="addProfileForm" class="space-y-6" action="{{ route('profile.create') }}" method="POST"> 
                @csrf
                    <div>
                    <label for="name" class="block text-sm font-medium text-gray-400 mb-1">Profile Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="number" class="block text-sm font-medium text-gray-400 mb-1">Phone number</label>
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
        // profileImageInput.addEventListener('change', (e) => {
        //     if (e.target.files && e.target.files[0]) {
        //         const reader = new FileReader();
                
        //         reader.onload = (event) => {
        //             profileImagePreview.innerHTML = '';
        //             const img = document.createElement('img');
        //             img.src = event.target.result;
        //             img.classList.add('w-full', 'h-full', 'object-cover');
        //             profileImagePreview.appendChild(img);
        //         };
                
        //         reader.readAsDataURL(e.target.files[0]);
        //     }
        // });

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