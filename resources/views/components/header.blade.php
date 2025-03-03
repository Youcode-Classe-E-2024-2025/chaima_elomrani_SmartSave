
     <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    body {
      font-family: 'Inter', sans-serif;
    }

    .bg-gradient-primary {
      background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
    }

    .card-hover {
      transition: all 0.3s ease;
    }

    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .chart-container {
      position: relative;
      height: 300px;
      width: 100%;
    }
  </style>

<header>
    <!-- Top Navigation -->
  <nav class="bg-gradient-primary text-white shadow-lg">
    <div class="container mx-auto px-4 py-3">
      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-4">
          <span class="text-2xl font-bold">Save<span class="text-green-400">Smart</span></span>
          <div class="hidden md:flex space-x-4">
              <a href="home" class="text-blue-200 hover:text-white transition duration-300">Home</a>
            <a href="dashboard"
              class="text-blue-200 hover:text-white transition duration-300 border-b-2 border-green-400 pb-1">Dashboard</a>
            <a href="categories" class="text-blue-200 hover:text-white transition duration-300">Catagories</a>
            <a href="profile" class="text-blue-200 hover:text-white transition duration-300">Profile</a>
          </div>
        </div>
        <div class="flex items-center space-x-4">

          <div class="relative">
            <button
              class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
              <span class="sr-only">Open user menu</span>
              <div
                class="h-8 w-8 rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 flex items-center justify-center">
                <span class="text-white font-medium">RJ</span>
              </div>
            </button>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>