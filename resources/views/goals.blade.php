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
  </style>
</head>

<body class="bg-gray-100 min-h-screen">
  <!-- Header -->
  <header class="bg-white shadow">
    <div class="container mx-auto px-4 py-6">
      <h1 class="text-2xl font-bold text-gray-800">SaveSmart</h1>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container mx-auto px-4 py-8">
    <!-- Actions Bar -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 space-y-4 md:space-y-0">
      <div class="flex items-center space-x-2">
        <h2 class="text-xl font-semibold text-gray-800">Your Goals</h2>
        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full" id="goalCount">6 Goals</span>
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
    
    <!-- Goals Table -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
      <div class="overflow-x-auto">
        <table class="w-full table-auto">
          <thead class="bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
            <tr>
              <th class="px-6 py-3 text-left">Goal</th>
              <th class="px-6 py-3 text-left">Category</th>
              <!-- <th class="px-6 py-3 text-left">Progress</th> -->
              <th class="px-6 py-3 text-left">Amount</th>
              <th class="px-6 py-3 text-left">Remaining</th>
              <th class="px-6 py-3 text-left">Deadline</th>
              <th class="px-6 py-3 text-center">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-700">
            @foreach ($goals as $goal)
            <!-- Goal 1 -->
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="font-medium text-gray-800">{{ $goal->name }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2.5 py-0.5 rounded-full">{{ $goal->category->name }}</span>
              </td>
              <!-- <td class="px-6 py-4 whitespace-nowrap">
                <div class="w-full max-w-[150px]">
                  <div class="flex justify-between items-center mb-1">
                    <span class="text-xs font-medium text-gray-700">75%</span>
                  </div>
                  <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="h-2 rounded-full bg-blue-500" style="width: 75%"></div>
                  </div>
                </div>
              </td> -->
              <td class="px-6 py-4 whitespace-nowrap">
                ${{ $goal->current_amount }} / ${{ $goal->target_amount }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <i class="fas fa-dollar-sign text-gray-400 mr-1"></i>
                  <span>{{ $goal->target_amount - $goal->current_amount }}</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <i class="far fa-calendar-alt text-gray-400 mr-1"></i>
                  <span>{{ $goal->target_date }}</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-center">
                <div class="flex justify-center space-x-2">
                  <button class="text-blue-600 hover:text-blue-800 p-1" title="Add Funds">
                    <i class="fas fa-plus-circle"></i>
                  </button>
                  <button class="text-gray-600 hover:text-gray-800 p-1" title="Edit">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="text-red-600 hover:text-red-800 p-1" title="Delete">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
    <!-- Table Actions -->
    <div class="flex justify-between items-center mb-8">
      
      <div class="flex items-center space-x-2">
        <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50">
          <i class="fas fa-file-export mr-1"></i> Export
        </button>
        <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50">
          <i class="fas fa-print mr-1"></i> Print
        </button>
      </div>
    </div>
    
    <!-- Empty State (Hidden by default) -->
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
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4">
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
            <option value="travel">Travel</option>
            <option value="savings">Savings</option>
            <option value="transportation">Transportation</option>
            <option value="housing">Housing</option>
            <option value="education">Education</option>
            <option value="life-events">Life Events</option>
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
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4 p-6">
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

  <!-- Add Funds Modal -->
  <div id="addFundsModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4">
      <div class="flex justify-between items-center p-6 border-b">
        <h3 class="text-xl font-bold text-gray-800">Add Funds to Goal</h3>
        <button id="closeAddFundsBtn" class="text-gray-500 hover:text-gray-700 focus:outline-none">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
      <form id="addFundsForm" class="p-6 space-y-4">
        <div>
          <label for="goalTitle" class="block text-sm font-medium text-gray-700 mb-1">Goal</label>
          <input type="text" id="goalTitle" name="goalTitle" disabled
            class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-700"
            value="Vacation Fund">
        </div>
        
        <div>
          <label for="currentBalance" class="block text-sm font-medium text-gray-700 mb-1">Current Balance</label>
          <input type="text" id="currentBalance" name="currentBalance" disabled
            class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-700"
            value="$3,750.00">
        </div>
        
        <div>
          <label for="addAmount" class="block text-sm font-medium text-gray-700 mb-1">Amount to Add ($)</label>
          <input type="number" id="addAmount" name="addAmount" required min="1" step="0.01"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="500.00">
        </div>
        
        <div>
          <label for="fundingSource" class="block text-sm font-medium text-gray-700 mb-1">Funding Source</label>
          <select id="fundingSource" name="fundingSource" required
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">Select a funding source</option>
            <option value="checking">Checking Account (****1234)</option>
            <option value="savings">Savings Account (****5678)</option>
            <option value="credit">Credit Card (****9012)</option>
            <option value="external">External Transfer</option>
          </select>
        </div>
        
        <div>
          <label for="fundingNotes" class="block text-sm font-medium text-gray-700 mb-1">Notes (Optional)</label>
          <textarea id="fundingNotes" name="fundingNotes" rows="2"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Add any notes about this contribution..."></textarea>
        </div>
        
        <div class="flex justify-end space-x-3 pt-4">
          <button type="button" id="cancelAddFundsBtn" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
            Cancel
          </button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Add Funds
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Modal functionality
    const emptyStateBtn = document.getElementById('emptyStateBtn');
    const newGoalBtn = document.getElementById('newGoalBtn');
    const goalModal = document.getElementById('goalModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelGoalBtn = document.getElementById('cancelGoalBtn');
    const goalForm = document.getElementById('goalForm');
    const deleteModal = document.getElementById('deleteModal');
    const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    const addFundsModal = document.getElementById('addFundsModal');
    const closeAddFundsBtn = document.getElementById('closeAddFundsBtn');
    const cancelAddFundsBtn = document.getElementById('cancelAddFundsBtn');
    const addFundsForm = document.getElementById('addFundsForm');

    // Open modals
    function openGoalModal() {
      goalModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    function openDeleteModal() {
      deleteModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    function openAddFundsModal(goalName, currentAmount) {
      document.getElementById('goalTitle').value = goalName;
      document.getElementById('currentBalance').value = '$' + currentAmount.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
      addFundsModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    // Close modals
    function closeGoalModal() {
      goalModal.classList.add('hidden');
      document.body.style.overflow = '';
      goalForm.reset();
    }

    function closeDeleteModal() {
      deleteModal.classList.add('hidden');
      document.body.style.overflow = '';
    }

    function closeAddFundsModal() {
      addFundsModal.classList.add('hidden');
      document.body.style.overflow = '';
      addFundsForm.reset();
    }

    // Event listeners for opening modals
    if (emptyStateBtn) emptyStateBtn.addEventListener('click', openGoalModal);
    if (newGoalBtn) newGoalBtn.addEventListener('click', openGoalModal);

    // Event listeners for closing modals
    if (closeModalBtn) closeModalBtn.addEventListener('click', closeGoalModal);
    if (cancelGoalBtn) cancelGoalBtn.addEventListener('click', closeGoalModal);
    if (cancelDeleteBtn) cancelDeleteBtn.addEventListener('click', closeDeleteModal);
    if (closeAddFundsBtn) closeAddFundsBtn.addEventListener('click', closeAddFundsModal);
    if (cancelAddFundsBtn) cancelAddFundsBtn.addEventListener('click', closeAddFundsModal);

    // Close modals when clicking outside
    goalModal.addEventListener('click', (e) => {
      if (e.target === goalModal) closeGoalModal();
    });

    deleteModal.addEventListener('click', (e) => {
      if (e.target === deleteModal) closeDeleteModal();
    });

    addFundsModal.addEventListener('click', (e) => {
      if (e.target === addFundsModal) closeAddFundsModal();
    });

    // Close modals with Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        if (!goalModal.classList.contains('hidden')) closeGoalModal();
        if (!deleteModal.classList.contains('hidden')) closeDeleteModal();
        if (!addFundsModal.classList.contains('hidden')) closeAddFundsModal();
      }
    });

    // Handle form submissions
    goalForm.addEventListener('submit', (e) => {
      e.preventDefault();
      // Here you would typically handle the form data, e.g., send it to a server
      console.log('Goal form submitted');
      closeGoalModal();
    });

    addFundsForm.addEventListener('submit', (e) => {
      e.preventDefault();
      // Here you would handle adding funds to the goal
      console.log('Funds added');
      closeAddFundsModal();
    });

    // Set up action buttons in the table
    document.querySelectorAll('button[title="Add Funds"]').forEach(btn => {
      btn.addEventListener('click', function() {
        const row = this.closest('tr');
        const goalName = row.querySelector('td:first-child div').textContent;
        const amountText = row.querySelector('td:nth-child(4)').textContent;
        const currentAmount = parseFloat(amountText.split('/')[0].replace('$', '').replace(',', '').trim());
        openAddFundsModal(goalName, currentAmount);
      });
    });

    document.querySelectorAll('button[title="Edit"]').forEach(btn => {
      btn.addEventListener('click', function() {
        openGoalModal();
        // Here you would populate the form with the goal data
      });
    });

    document.querySelectorAll('button[title="Delete"]').forEach(btn => {
      btn.addEventListener('click', function() {
        openDeleteModal();
      });
    });

    // Confirm delete
    confirmDeleteBtn.addEventListener('click', () => {
      // Here you would handle the deletion logic
      console.log('Goal deleted');
      closeDeleteModal();
    });

    // Search functionality
    const searchInput = document.getElementById('searchGoals');
    searchInput.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      const rows = document.querySelectorAll('tbody tr');
      
      rows.forEach(row => {
        const goalName = row.querySelector('td:first-child div').textContent.toLowerCase();
        const category = row.querySelector('td:nth-child(2) span').textContent.toLowerCase();
        
        if (goalName.includes(searchTerm) || category.includes(searchTerm)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  </script>
</body>
</html>