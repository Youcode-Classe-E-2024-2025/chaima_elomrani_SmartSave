<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SaveSmart - Financial Management Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
  <!-- Main Content -->
  <div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold text-gray-800">Financial Dashboard</h1>
      <div class="flex space-x-4">
        <a href="categories"
          class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition duration-300">
          <i class="fas fa-plus mr-2"></i> Add Category
        </a>
        <button id="newGoalBtn" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow transition duration-300">
          <i class="fas fa-flag mr-2"></i> New Goal
        </button>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition duration-300">
          <i class="fas fa-download mr-2"></i> Export
        </button>
      </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="bg-white rounded-xl shadow-md p-6 card-hover">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-lg font-semibold text-gray-800">Total Balance</h2>
          <span class="text-green-500 text-sm"><i class="fas fa-arrow-up mr-1"></i>3.2%</span>
        </div>
        <p class="text-3xl font-bold text-gray-800">$24,156.00</p>
        <p class="text-gray-500 text-sm mt-2">Updated 1 hour ago</p>
      </div>
      <div class="bg-white rounded-xl shadow-md p-6 card-hover">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-lg font-semibold text-gray-800">Income</h2>
          <span class="text-green-500 text-sm"><i class="fas fa-arrow-up mr-1"></i>8.1%</span>
        </div>
        <p class="text-3xl font-bold text-green-600">$5,243.00</p>
        <p class="text-gray-500 text-sm mt-2">This month</p>
      </div>
      <div class="bg-white rounded-xl shadow-md p-6 card-hover">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-lg font-semibold text-gray-800">Expenses</h2>
          <span class="text-red-500 text-sm"><i class="fas fa-arrow-up mr-1"></i>2.3%</span>
        </div>
        <p class="text-3xl font-bold text-red-500">$3,587.00</p>
        <p class="text-gray-500 text-sm mt-2">This month</p>
      </div>
      <div class="bg-white rounded-xl shadow-md p-6 card-hover">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-lg font-semibold text-gray-800">Savings</h2>
          <span class="text-green-500 text-sm"><i class="fas fa-arrow-up mr-1"></i>12.4%</span>
        </div>
        <p class="text-3xl font-bold text-blue-600">$1,656.00</p>
        <p class="text-gray-500 text-sm mt-2">This month</p>
      </div>
    </div>

    <!-- Main Dashboard Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- Left Column - Financial Overview -->
      <div class="lg:col-span-2 space-y-8">
        <!-- Balance Chart -->
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Balance Overview</h2>
            <select id="balancePeriod"
              class="bg-gray-100 border-none rounded-md px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="week">This Week</option>
              <option value="month">This Month</option>
              <option value="year">This Year</option>
            </select>
          </div>
          <div class="chart-container">
            <canvas id="balanceChart"></canvas>
          </div>
        </div>
      </div>

      <div class="space-y-8">
        <!-- Savings Goal -->
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Savings Goal</h2>
          <div class="flex justify-between items-center mb-2">
            <span class="text-sm font-medium text-gray-700">Vacation Fund</span>
            <span class="text-sm font-medium text-gray-700">75% Complete</span>
          </div>
          <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700 mb-4">
            <div class="bg-blue-600 h-2.5 rounded-full" style="width: 75%"></div>
          </div>
          <div class="flex justify-between items-center text-sm text-gray-500">
            <span>$3,750 / $5,000</span>
            <span>2 months left</span>
          </div>
        </div>

        <!-- Quick Links or Tips -->
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
          <h2 class="text-lg font-semibold text-gray-800 mb-4">Financial Tips</h2>
          <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center">
              <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>
              Set up automatic transfers to your savings account
            </li>
            <li class="flex items-center">
              <i class="fas fa-chart-line text-green-500 mr-2"></i>
              Track your expenses regularly to identify areas for improvement
            </li>
            <li class="flex items-center">
              <i class="fas fa-piggy-bank text-pink-500 mr-2"></i>
              Create a budget and stick to it for better financial control
            </li>
          </ul>
        </div>
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

  <script>
    // Sample chart initialization
    const ctx = document.getElementById('balanceChart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Balance',
          data: [12000, 19000, 15000, 22000, 20000, 24000],
          borderColor: 'rgb(59, 130, 246)',
          tension: 0.1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    // Modal functionality
    const modal = document.getElementById('goalModal');
    const newGoalBtn = document.getElementById('newGoalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelGoalBtn = document.getElementById('cancelGoalBtn');
    const goalForm = document.getElementById('goalForm');
    const modalContent = modal.querySelector('.modal-fade-in');

    // Open modal
    newGoalBtn.addEventListener('click', () => {
      modal.classList.remove('hidden');
      document.body.style.overflow = 'hidden'; // Prevent scrolling
      setTimeout(() => {
        document.getElementById('goalName').focus();
      }, 100);
    });

    // Close modal functions
    function closeModal() {
      modalContent.classList.remove('modal-fade-in');
      modalContent.classList.add('modal-fade-out');
      
      setTimeout(() => {
        modal.classList.add('hidden');
        modalContent.classList.remove('modal-fade-out');
        modalContent.classList.add('modal-fade-in');
        document.body.style.overflow = ''; // Re-enable scrolling
        goalForm.reset(); // Reset form
        
        // Reset selected icon and color
        document.querySelectorAll('.icon-btn.selected').forEach(btn => {
          btn.classList.remove('selected', 'bg-blue-100', 'border-blue-500');
        });
        
        document.querySelectorAll('.color-btn.selected').forEach(btn => {
          btn.classList.remove('selected', 'ring-2', 'ring-offset-2');
        });
        
        document.getElementById('selectedIcon').value = '';
        document.getElementById('selectedColor').value = '';
      }, 200);
    }

    closeModalBtn.addEventListener('click', closeModal);
    cancelGoalBtn.addEventListener('click', closeModal);

    // Close when clicking outside the modal
    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        closeModal();
      }
    });

    // Escape key to close modal
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
        closeModal();
      }
    });

  
   
  </script>
</body>

</html>

