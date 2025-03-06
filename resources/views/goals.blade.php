<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SaveSmart - Financial Goals</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    body {
      font-family: 'Inter', sans-serif;
    }

    .card-hover {
      transition: all 0.3s ease;
    }

    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* Modal animation */
    .modal-fade-in {
      animation: fadeIn 0.3s ease-out forwards;
    }

    .modal-fade-out {
      animation: fadeOut 0.3s ease-out forwards;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeOut {
      from {
        opacity: 1;
        transform: translateY(0);
      }
      to {
        opacity: 0;
        transform: translateY(-20px);
      }
    }
  </style>
</head>

<body class="bg-gray-100 min-h-screen">
  <!-- Header -->
  <header class="bg-white shadow-sm">
    <div class="container mx-auto px-4 py-4 flex flex-col md:flex-row md:items-center md:justify-between">
      <div class="flex items-center justify-between mb-4 md:mb-0">
        <h1 class="text-2xl font-bold text-gray-800">Financial Goals</h1>
        <button class="md:hidden text-gray-500 focus:outline-none" id="mobileMenuBtn">
          <i class="fas fa-bars text-xl"></i>
        </button>
      </div>
      <div class="hidden md:flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4" id="navMenu">
        <a href="index.html" class="text-gray-600 hover:text-blue-600 transition duration-300">
          <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
        </a>
        <a href="#" class="text-blue-600 font-medium">
          <i class="fas fa-flag mr-2"></i>Goals
        </a>
        <a href="#" class="text-gray-600 hover:text-blue-600 transition duration-300">
          <i class="fas fa-chart-pie mr-2"></i>Budget
        </a>
        <a href="#" class="text-gray-600 hover:text-blue-600 transition duration-300">
          <i class="fas fa-history mr-2"></i>Transactions
        </a>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container mx-auto px-4 py-8">
    <!-- Actions Bar -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 space-y-4 md:space-y-0">
      <div class="flex items-center space-x-2">
        <h2 class="text-xl font-semibold text-gray-800">Your Goals</h2>
        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full" id="goalCount">0 Goals</span>
      </div>
      
      <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
        <div class="relative">
          <input type="text" id="searchGoals" placeholder="Search goals..." 
            class="w-full md:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
        
        <div class="flex space-x-2">
          <select id="filterCategory" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">All Categories</option>
            <option value="vacation">Vacation</option>
            <option value="emergency">Emergency Fund</option>
            <option value="retirement">Retirement</option>
            <option value="education">Education</option>
            <option value="home">Home Purchase</option>
            <option value="car">Vehicle</option>
            <option value="other">Other</option>
          </select>
          
          <select id="sortGoals" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="progress-desc">Progress (High to Low)</option>
            <option value="progress-asc">Progress (Low to High)</option>
            <option value="date-asc">Date (Closest First)</option>
            <option value="date-desc">Date (Furthest First)</option>
            <option value="amount-desc">Amount (High to Low)</option>
            <option value="amount-asc">Amount (Low to High)</option>
          </select>
        </div>
        
        <button id="newGoalBtn" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow transition duration-300">
          <i class="fas fa-plus mr-2"></i> New Goal
        </button>
      </div>
    </div>
    
    <!-- Goals Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <div class="bg-white rounded-xl shadow-md p-6">
        <div class="flex items-center mb-2">
          <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
            <i class="fas fa-flag text-blue-600"></i>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-gray-800">Total Goals</h3>
            <p class="text-2xl font-bold text-gray-800" id="totalGoalsCount">6</p>
          </div>
        </div>
      </div>
      
      <div class="bg-white rounded-xl shadow-md p-6">
        <div class="flex items-center mb-2">
          <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-3">
            <i class="fas fa-check text-green-600"></i>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-gray-800">Total Saved</h3>
            <p class="text-2xl font-bold text-gray-800" id="totalSaved">$12,450</p>
          </div>
        </div>
      </div>
      
      <div class="bg-white rounded-xl shadow-md p-6">
        <div class="flex items-center mb-2">
          <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-3">
            <i class="fas fa-bullseye text-purple-600"></i>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-gray-800">Target Amount</h3>
            <p class="text-2xl font-bold text-gray-800" id="totalTarget">$28,500</p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Goals Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="goalsContainer">
      <!-- Goals will be dynamically inserted here -->
    </div>
    
    <!-- Empty State -->
    <div id="emptyState" class=" text-center py-16">
      <div class="mx-auto w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center mb-4">
        <i class="fas fa-flag text-gray-400 text-3xl"></i>
      </div>
      <h3 class="text-xl font-semibold text-gray-800 mb-2">No goals found</h3>
      <p class="text-gray-500 mb-6">You don't have any financial goals yet or none match your filters.</p>
      <button id="emptyStateBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition duration-300">
        <i class="fas fa-plus mr-2"></i> Create Your First Goal
      </button>
    </div>
  </div>

  <!-- Delete Confirmation Modal -->
  <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4 modal-fade-in p-6">
      <div class="text-center mb-6">
        <div class="mx-auto w-16 h-16 rounded-full bg-red-100 flex items-center justify-center mb-4">
          <i class="fas fa-exclamation-triangle text-red-500 text-2xl"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Delete Goal</h3>
        <p class="text-gray-600">Are you sure you want to delete this goal? This action cannot be undone.</p>
      </div>
      
      <div class="flex justify-center space-x-4">
        <button id="cancelDeleteBtn" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
          Cancel
        </button>
        <button id="confirmDeleteBtn" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
          Delete Goal
        </button>
      </div>
    </div>
  </div>

  <!-- Add Goal Modal -->
  <div id="goalModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4 modal-fade-in">
      <div class="flex justify-between items-center p-6 border-b">
        <h3 class="text-xl font-bold text-gray-800">Add New Financial Goal</h3>
        <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700 focus:outline-none">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
      <form id="goalForm" class="p-6 space-y-4">
        <div>
          <label for="goalName" class="block text-sm font-medium text-gray-700 mb-1">Goal Name</label>
          <input type="text" id="goalName" name="goalName" required
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="e.g., Vacation Fund, Emergency Fund">
        </div>
        
        <div>
          <label for="goalCategory" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
          <select id="goalCategory" name="goalCategory" required
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Select a category</option>
            <option value="vacation">Vacation</option>
            <option value="emergency">Emergency Fund</option>
            <option value="retirement">Retirement</option>
            <option value="education">Education</option>
            <option value="home">Home Purchase</option>
            <option value="car">Vehicle</option>
            <option value="other">Other</option>
          </select>
        </div>
        
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="targetAmount" class="block text-sm font-medium text-gray-700 mb-1">Target Amount ($)</label>
            <input type="number" id="targetAmount" name="targetAmount" required min="1" step="0.01"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="5000.00">
          </div>
          <div>
            <label for="currentAmount" class="block text-sm font-medium text-gray-700 mb-1">Current Amount ($)</label>
            <input type="number" id="currentAmount" name="currentAmount" min="0" step="0.01"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="0.00">
          </div>
        </div>
        
        <div>
          <label for="targetDate" class="block text-sm font-medium text-gray-700 mb-1">Target Date</label>
          <input type="date" id="targetDate" name="targetDate" required
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        
        <div>
          <label for="goalIcon" class="block text-sm font-medium text-gray-700 mb-1">Icon</label>
          <div class="grid grid-cols-6 gap-2">
            <button type="button" class="icon-btn p-2 border border-gray-300 rounded-lg text-center hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" data-icon="plane">
              <i class="fas fa-plane"></i>
            </button>
            <button type="button" class="icon-btn p-2 border border-gray-300 rounded-lg text-center hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" data-icon="home">
              <i class="fas fa-home"></i>
            </button>
            <button type="button" class="icon-btn p-2 border border-gray-300 rounded-lg text-center hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" data-icon="car">
              <i class="fas fa-car"></i>
            </button>
            <button type="button" class="icon-btn p-2 border border-gray-300 rounded-lg text-center hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" data-icon="graduation-cap">
              <i class="fas fa-graduation-cap"></i>
            </button>
            <button type="button" class="icon-btn p-2 border border-gray-300 rounded-lg text-center hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" data-icon="piggy-bank">
              <i class="fas fa-piggy-bank"></i>
            </button>
            <button type="button" class="icon-btn p-2 border border-gray-300 rounded-lg text-center hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" data-icon="heart">
              <i class="fas fa-heart"></i>
            </button>
          </div>
          <input type="hidden" id="selectedIcon" name="selectedIcon" value="">
        </div>
        
        <div>
          <label for="goalColor" class="block text-sm font-medium text-gray-700 mb-1">Color</label>
          <div class="grid grid-cols-6 gap-2">
            <button type="button" class="color-btn w-full h-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" style="background-color: #3b82f6;" data-color="#3b82f6"></button>
            <button type="button" class="color-btn w-full h-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" style="background-color: #10b981;" data-color="#10b981"></button>
            <button type="button" class="color-btn w-full h-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" style="background-color: #f59e0b;" data-color="#f59e0b"></button>
            <button type="button" class="color-btn w-full h-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" style="background-color: #ef4444;" data-color="#ef4444"></button>
            <button type="button" class="color-btn w-full h-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" style="background-color: #8b5cf6;" data-color="#8b5cf6"></button>
            <button type="button" class="color-btn w-full h-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" style="background-color: #ec4899;" data-color="#ec4899"></button>
          </div>
          <input type="hidden" id="selectedColor" name="selectedColor" value="">
        </div>
        
        <div>
          <label for="goalDescription" class="block text-sm font-medium text-gray-700 mb-1">Description (Optional)</label>
          <textarea id="goalDescription" name="goalDescription" rows="3"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Add details about your financial goal..."></textarea>
        </div>
        
        <div class="flex justify-end space-x-3 pt-4">
          <button type="button" id="cancelGoalBtn" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
            Cancel
          </button>
          <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            Save Goal
          </button>
        </div>
      </form>
    </div>
  </div>

</body>

</html>

