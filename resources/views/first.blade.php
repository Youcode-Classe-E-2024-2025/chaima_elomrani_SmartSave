<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartSave - Select Account</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #162447 0%, #1f4068 100%);
      min-height: 100vh;
    }
    .account-card {
      transition: all 0.3s ease;
    }
    .account-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }
    .logo-pulse {
      animation: pulse 2s infinite;
    }
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
    .add-profile-icon {
      transition: all 0.3s ease;
    }
    .add-profile:hover .add-profile-icon {
      transform: rotate(90deg);
    }
    .modal {
      opacity: 0;
      transform: scale(0.95);
      transition: opacity 0.3s ease, transform 0.3s ease;
    }
    .modal.active {
      opacity: 1;
      transform: scale(1);
    }
    .modal-overlay {
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    .modal-overlay.active {
      opacity: 1;
    }
  </style>
</head>
<body class="font-sans text-white">
  <!-- Navigation Bar -->
  <nav class="px-6 py-4 shadow-lg bg-gradient-to-r from-blue-900 to-indigo-900">
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center">
        <span class="text-3xl font-bold logo-pulse text-blue-300">Smart<span class="text-green-400">Save</span></span>
      </div>
      <div class="hidden md:flex space-x-6 items-center">
        <a href="#" class="text-blue-200 hover:text-white transition duration-300">Dashboard</a>
        <a href="#" class="text-blue-200 hover:text-white transition duration-300">Investments</a>
        <a href="#" class="text-blue-200 hover:text-white transition duration-300">Support</a>
        <button class="bg-gradient-to-r from-green-500 to-green-600 px-4 py-2 rounded-lg hover:from-green-600 hover:to-green-700 transition duration-300">Log Out</button>
      </div>
      <div class="md:hidden">
        <button class="text-white text-2xl focus:outline-none">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="container mx-auto px-6 py-12">
    <!-- Accounts Section -->
    <section class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 max-w-5xl mx-auto">
      <!-- Account 1 -->
      <div class="account-card bg-gradient-to-b from-blue-800 to-blue-900 rounded-lg p-3 flex flex-col items-center cursor-pointer">
        <div class="w-32 h-32 rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 flex items-center justify-center mb-4 overflow-hidden">
          <img src="/api/placeholder/128/128" alt="Robert's profile" class="w-full h-full object-cover">
        </div>
        <span class="text-lg font-medium mt-2">Robert</span>
        <span class="text-xs text-blue-300 mt-1">Premium Plan</span>
      </div>
    
      <!-- Add Profile Button -->
      <div id="addProfileButton" class="add-profile account-card bg-gradient-to-b from-gray-800 to-gray-900 rounded-lg p-3 flex flex-col items-center justify-center cursor-pointer">
        <div class="w-32 h-32 rounded-full border-2 border-dashed border-gray-500 flex items-center justify-center mb-4">
          <span class="add-profile-icon text-5xl text-gray-400"><i class="fas fa-plus"></i></span>
        </div>
        <span class="text-lg font-medium mt-2 text-gray-300">Add Profile</span>
      </div>
    </section>

    <!-- Create Account Modal (Hidden by default) -->
    <div id="createAccountModal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
      <div class="modal-overlay absolute inset-0 bg-black bg-opacity-70"></div>
      <div class="modal bg-white rounded-lg shadow-xl p-8 w-full max-w-md relative z-10 flex-col flex">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-gray-800">Create Your Account</h2>
          <button id="closeModalButton" class="text-gray-500 hover:text-gray-800 text-2xl focus:outline-none">
            <i class="fas fa-times"></i>
          </button>
        </div>
        
        <form id="accountForm" class="">
          <div class="flex flex-col items-center">
            <div id="profileImageContainer" class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center overflow-hidden cursor-pointer mb-4">
              <img id="previewImage" class="hidden w-full h-full object-cover">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>
            </div>
            <input type="file" id="profileImageInput" class="hidden" accept="image/*">
            <button type="button" id="uploadButton" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">
              Upload Profile Picture
            </button>
          </div>

          <div>
            <label for="fullName" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <input type="text" id="fullName" name="fullName" required
              class="w-full px-3 py-2 text-black border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          </div>

          <!-- <div>
            <label for="accountType" class="block text-sm font-medium text-gray-700 mb-1">Account Type</label>
            <select id="accountType" name="accountType" required
              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
              <option value="personal">Personal Account</option>
              <option value="business">Business Account</option>
              <option value="family">Family Account</option>
              <option value="child">Child Account (Managed)</option>
            </select>
          </div> -->

          <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-phone text-gray-400"></i>
              </div>
              <input type="tel" id="phone" name="phone" required
                class="w-full pl-10 pr-3 py-2  text-black  border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="(555) 555-5555">
            </div>
          </div>

          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-envelope text-gray-400"></i>
              </div>
              <input type="email" id="email" name="email" required
                class="w-full pl-10 pr-3 py-2 border text-black  border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="your@email.com">
            </div>
          </div>

          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="createBudget" name="createBudget" type="checkbox"
                class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
            </div>
            <div class="ml-3 text-sm">
              <label for="createBudget" class="font-medium text-gray-700">Create initial budget plan</label>
              <p class="text-gray-500">We'll help you set up a personalized budget based on your financial goals.</p>
            </div>
          </div>

          <div class="flex space-x-4 pt-4">
            <button type="button" id="cancelButton" class="w-1/3 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition duration-300">
              Cancel
            </button>
            <button type="submit" class="w-2/3 px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded hover:from-green-600 hover:to-green-700 transition duration-300">
              Create Account
            </button>
          </div>
        </form>

        <!-- Success Message (Hidden by default) -->
        <div id="successMessage" class="hidden text-center py-6">
          <div class="text-5xl text-green-500 mb-4"><i class="fas fa-check-circle"></i></div>
          <h3 class="text-2xl font-bold mb-2 text-gray-800">Profile Created!</h3>
          <p class="text-gray-600 mb-6">You've successfully created your new profile</p>
          <button id="goToDashboardButton" class="px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:from-green-600 hover:to-green-700 transition duration-300">
            Go to Dashboard
          </button>
        </div>
      </div>
    </div>
  </main>

  <script>
    // Add interaction for account selection
    document.querySelectorAll('.account-card').forEach(card => {
      if (!card.id || card.id !== 'addProfileButton') {
        card.addEventListener('click', function() {
          selectProfile(this);
        });
      }
    });

    // Add Profile Button Event Listener
    const addProfileButton = document.getElementById('addProfileButton');
    const createAccountModal = document.getElementById('createAccountModal');
    const modalOverlay = document.querySelector('.modal-overlay');
    const modal = document.querySelector('.modal');
    const closeModalButton = document.getElementById('closeModalButton');
    const cancelButton = document.getElementById('cancelButton');
    const accountForm = document.getElementById('accountForm');
    const successMessage = document.getElementById('successMessage');
    const goToDashboardButton = document.getElementById('goToDashboardButton');
    const uploadButton = document.getElementById('uploadButton');
    const profileImageInput = document.getElementById('profileImageInput');
    const profileImageContainer = document.getElementById('profileImageContainer');
    const previewImage = document.getElementById('previewImage');

    // Show Modal
    addProfileButton.addEventListener('click', () => {
      createAccountModal.classList.remove('hidden');
      setTimeout(() => {
        modalOverlay.classList.add('active');
        modal.classList.add('active');
      }, 10);
      document.body.style.overflow = 'hidden';
    });

    // Close Modal Functions
    function closeModal() {
      modalOverlay.classList.remove('active');
      modal.classList.remove('active');
      setTimeout(() => {
        createAccountModal.classList.add('hidden');
        // Reset form and hide success message
        accountForm.reset();
        accountForm.classList.remove('hidden');
        successMessage.classList.add('hidden');
        // Reset image preview
        previewImage.classList.add('hidden');
        previewImage.src = '';
        profileImageContainer.querySelector('svg').classList.remove('hidden');
      }, 300);
      document.body.style.overflow = '';
    }

    closeModalButton.addEventListener('click', closeModal);
    cancelButton.addEventListener('click', closeModal);
    modalOverlay.addEventListener('click', closeModal);

    // Profile Picture Upload
    uploadButton.addEventListener('click', () => {
      profileImageInput.click();
    });

    profileImageContainer.addEventListener('click', () => {
      profileImageInput.click();
    });

    profileImageInput.addEventListener('change', (e) => {
      if (e.target.files && e.target.files[0]) {
        const reader = new FileReader();
        reader.onload = (event) => {
          previewImage.src = event.target.result;
          previewImage.classList.remove('hidden');
          profileImageContainer.querySelector('svg').classList.add('hidden');
        };
        reader.readAsDataURL(e.target.files[0]);
      }
    });

    // Form Submission
    accountForm.addEventListener('submit', (e) => {
      e.preventDefault();
      
      // Get form data
      const fullName = document.getElementById('fullName').value || "New User";
      
      // Hide form and show success message
      accountForm.classList.add('hidden');
      successMessage.classList.remove('hidden');
      
      // Update success message with user's name
      const successMessageText = document.querySelector('#successMessage p');
      successMessageText.textContent = `You've successfully created a profile for ${fullName}!`;
    });

    // Go to Dashboard Button
    goToDashboardButton.addEventListener('click', () => {
      closeModal();
      
      // Mock loading transition
      document.body.innerHTML += `
        <div id="loading-overlay" class="fixed inset-0 bg-blue-900 bg-opacity-90 flex items-center justify-center z-50 flex-col">
          <div class="text-3xl mb-6">Welcome to your new account!</div>
          <div class="w-16 h-16 border-4 border-green-400 border-t-transparent rounded-full animate-spin"></div>
          <div class="mt-4 text-blue-200">Loading your financial dashboard...</div>
        </div>
      `;
      
      // In a real app, we would redirect to the user's dashboard
      setTimeout(() => {
        document.getElementById('loading-overlay').classList.add('opacity-0');
        setTimeout(() => {
          document.getElementById('loading-overlay').remove();
        }, 300);
      }, 2000);
    });

    function selectProfile(profileElement) {
      // Get profile name
      const profileName = profileElement.querySelector('span').textContent;
      
      // Animate profile selection with a pulse effect
      profileElement.classList.add('scale-110');
      setTimeout(() => {
        profileElement.classList.remove('scale-110');
        
        // Mock loading transition
        document.body.innerHTML += `
          <div id="loading-overlay" class="fixed inset-0 bg-blue-900 bg-opacity-90 flex items-center justify-center z-50 flex-col">
            <div class="text-3xl mb-6">Welcome back, ${profileName}!</div>
            <div class="w-16 h-16 border-4 border-green-400 border-t-transparent rounded-full animate-spin"></div>
            <div class="mt-4 text-blue-200">Loading your financial dashboard...</div>
          </div>
        `;
        
        // In a real app, we would redirect to the user's dashboard
        setTimeout(() => {
          document.getElementById('loading-overlay').classList.add('opacity-0');
          setTimeout(() => {
            document.getElementById('loading-overlay').remove();
          }, 300);
        }, 2000);
      }, 300);
    }
  </script>
</body>
</html>