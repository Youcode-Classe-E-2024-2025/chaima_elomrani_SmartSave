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
      <div class="add-profile account-card bg-gradient-to-b from-gray-800 to-gray-900 rounded-lg p-3 flex flex-col items-center justify-center cursor-pointer">
        <div class="w-32 h-32 rounded-full border-2 border-dashed border-gray-500 flex items-center justify-center mb-4">
          <span class="add-profile-icon text-5xl text-gray-400"><i class="fas fa-plus"></i></span>
        </div>
        <span class="text-lg font-medium mt-2 text-gray-300">Add Profile</span>
      </div>
    </section>

   
  </main>

  

  <script>
    // Add interaction for account selection
    document.querySelectorAll('.account-card').forEach(card => {
      card.addEventListener('click', function() {
        if (this.classList.contains('add-profile')) {
          showAddProfileModal();
        } else {
          selectProfile(this);
        }
      });
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


      
      document.body.appendChild(modal);
      
      // Add event listeners for modal interaction
      document.getElementById('close-modal').addEventListener('click', closeModal);
      document.getElementById('cancel-profile').addEventListener('click', closeModal);
      document.getElementById('create-profile').addEventListener('click', createProfile);
      
      // Prevent background scrolling
      document.body.style.overflow = 'hidden';
      
      // Fade in animation
      setTimeout(() => {
        modal.querySelector('div > div').classList.add('transform', 'scale-100');
        modal.querySelector('div > div').classList.remove('scale-95');
      }, 10);
    
  </script>
</body>
</html>