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
<x-header />

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
      <!-- Example Goal Card (Fixed) -->
     <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover">
        <div class="p-1 bg-blue-500"></div>
        @foreach ($goals as $goal)
        <div class="p-6">
          <div class="flex justify-between items-start mb-4">
            <div class="flex items-center">
              <div class="w-10 h-10 rounded-full flex items-center justify-center mr-3 bg-blue-100">
                <i class="fas fa-plane text-lg text-blue-500"></i>
              </div>

              <div>
                <h3 class="text-lg font-semibold text-gray-800">{{ $goal->name }}</h3>
                <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2 py-0.5 rounded-full">{{ $goal->category->name }}</span>
              </div>
            </div>
            <div class="dropdown relative">
              <button class="text-gray-400 hover:text-gray-600 focus:outline-none" data-goal-id="1">
                <i class="fas fa-ellipsis-v"></i>
              </button>
              <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden z-10">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 edit-goal" data-goal-id="1">
                  <i class="fas fa-edit mr-2"></i> Edit
                </a>
                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 delete-goal" data-goal-id="1">
                  <i class="fas fa-trash mr-2"></i> Delete
                </a>
              </div>
            </div>
          </div>
          
          <div class="mb-4">
            <div class="flex justify-between items-center mb-1">
              <span class="text-sm font-medium text-gray-700">75% Complete</span>
              <span class="text-sm font-medium text-gray-700">$3,750 / $5,000</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5">
              <div class="h-2.5 rounded-full bg-blue-500" style="width: 75%"></div>
            </div>
          </div>
          
          <div class="flex justify-between items-center text-sm text-gray-500">
            <div>
              <i class="fas fa-dollar-sign mr-1"></i> $1,250 left
            </div>
            <div>
              <i class="far fa-calendar-alt mr-1"></i> 2 months left
            </div>
          </div>
          
          <div class="mt-4 pt-4 border-t border-gray-100">
            <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-300 add-funds" data-goal-id="1">
              <i class="fas fa-plus mr-2"></i> Add Funds
            </button>
          </div>
        </div>
               
        @endforeach
      </div>
    </div>
    
    <!-- Empty State -->
    <div id="emptyState" class="hidden text-center py-16">
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

  <!-- Add Goal Modal -->
  <div id="goalModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4 modal-fade-in">
      <div class="flex justify-between items-center p-6 border-b">
        <h3 class="text-xl font-bold text-gray-800">Add New Financial Goal</h3>
        <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700 focus:outline-none">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
      <form id="goalForm" class="p-6 space-y-4" action="goals.create" method="POST">
        @csrf
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
            @foreach ($categories as $category )
            <option value="vacation">{{ $category->name }}</option>
            @endforeach
          
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

  <script>
    const emptyStateBtn = document.getElementById('emptyStateBtn');
    const newGoalBtn = document.getElementById('newGoalBtn');
    const goalModal = document.getElementById('goalModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelGoalBtn = document.getElementById('cancelGoalBtn');
    const goalForm = document.getElementById('goalForm');

    function openModal() {
      goalModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    function closeModal() {
      goalModal.classList.add('hidden');
      document.body.style.overflow = '';
      goalForm.reset();
    }

    emptyStateBtn.addEventListener('click', openModal);
    newGoalBtn.addEventListener('click', openModal);
    closeModalBtn.addEventListener('click', closeModal);
    cancelGoalBtn.addEventListener('click', closeModal);

    // Close modal when clicking outside
    goalModal.addEventListener('click', (e) => {
      if (e.target === goalModal) {
        closeModal();
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !goalModal.classList.contains('hidden')) {
        closeModal();
      }
    });

    // Handle form submission
    goalForm.addEventListener('submit', (e) => {
      e.preventDefault();
      // Here you would typically handle the form data, e.g., send it to a server
      console.log('Form submitted');
      closeModal();
    });
  </script>
</body>
</html>

