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
              <th class="px-6 py-3 text-left">Progress</th>
              <th class="px-6 py-3 text-left">Amount</th>
              <th class="px-6 py-3 text-left">Remaining</th>
              <th class="px-6 py-3 text-left">Deadline</th>
              <th class="px-6 py-3 text-center">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 bg-white text-sm text-gray-700">
            @foreach ($goals as $goal)
            <tr class="hover:bg-gray-50" data-goal-id="{{ $goal->id }}">
              <td class="px-6 py-4">
                <div class="font-medium text-gray-800">{{ $goal->name }}</div>
                <div class="text-gray-500 text-xs mt-1">{{ $goal->description }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="text-xs font-medium text-gray-500 bg-gray-100 px-2.5 py-0.5 rounded-full">{{ $goal->name }}</span>
              </td>
              <td class="px-6 py-4">
                <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2">
                  <div class="bg-blue-600 h-2.5 rounded-full progress-bar-fill" style="width: {{ $goal->progress['percentage'] }}%"></div>
                </div>
                <div class="flex justify-between text-xs text-gray-500">
                  <span>{{ $goal->progress['percentage'] }}%</span>
                  @if($goal->progress['is_on_track'])
                    <span class="text-green-600">On Track</span>
                  @else
                    <span class="text-red-600">Behind Schedule</span>
                  @endif
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                €{{ number_format($goal->current_amount, 2) }} / €{{ number_format($goal->target_amount, 2) }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <i class="fas fa-euro-sign text-gray-400 mr-1"></i>
                  <span>{{ number_format($goal->progress['remaining_amount'], 2) }}</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <i class="far fa-calendar-alt text-gray-400 mr-1"></i>
                  <span>{{ $goal->target_date }}</span>
                  <span class="text-xs text-gray-500 ml-2">({{ $goal->progress['days_remaining'] }} days left)</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-center">
                <div class="flex justify-center space-x-2">
                  <button class="text-blue-600 hover:text-blue-800 p-1" title="Add Funds" onclick="openAddFundsModal('{{ $goal->name }}', {{ $goal->current_amount }}, {{ $goal->id }}, {{ $goal->target_amount }})">
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
        <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50" onclick="window.location.href='{{ route('goals.export.csv') }}'">
          <i class="fas fa-file-csv mr-1"></i> Export CSV
        </button>
        <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50" onclick="window.location.href='{{ route('goals.export.pdf') }}'">
          <i class="fas fa-file-pdf mr-1"></i> Export PDF
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
      <form id="addFundsForm" class="p-6 space-y-4" data-goal-id="{{ $goal->id }}">
        <div>
          <label for="goalTitle" class="block text-sm font-medium text-gray-700 mb-1">Goal</label>
          <input type="text" id="goalTitle" name="goalTitle" disabled
            class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-700"
            value="{{ $goal->name }}">
        </div>
        
        <div>
          <label for="currentBalance" class="block text-sm font-medium text-gray-700 mb-1">Current Balance</label>
          <input type="text" id="currentBalance" name="currentBalance" disabled
            class="w-full px-3 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-700"
            value="{{ $goal->current_amount }}">
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

  <!-- Budget Optimization Modal -->
  <div id="budgetModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4">
      <div class="flex justify-between items-center p-6 border-b">
        <h3 class="text-xl font-bold text-gray-800">Budget Optimization</h3>
        <button id="closeBudgetBtn" class="text-gray-500 hover:text-gray-700 focus:outline-none">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
      <form id="budgetForm" class="p-6 space-y-4">
        <div>
          <label for="monthlyIncome" class="block text-sm font-medium text-gray-700 mb-1">Monthly Income (€)</label>
          <input type="number" id="monthlyIncome" name="monthly_income" required min="1" step="0.01"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="3000.00">
        </div>
        
        <div>
          <label for="needsExpenses" class="block text-sm font-medium text-gray-700 mb-1">Current Needs Expenses (€)</label>
          <input type="number" id="needsExpenses" name="needs_expenses" required min="0" step="0.01"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="1500.00">
        </div>
        
        <div>
          <label for="wantsExpenses" class="block text-sm font-medium text-gray-700 mb-1">Current Wants Expenses (€)</label>
          <input type="number" id="wantsExpenses" name="wants_expenses" required min="0" step="0.01"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="900.00">
        </div>
        
        <div>
          <label for="savingsExpenses" class="block text-sm font-medium text-gray-700 mb-1">Current Savings (€)</label>
          <input type="number" id="savingsExpenses" name="savings_expenses" required min="0" step="0.01"
            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="600.00">
        </div>
        
        <div class="flex justify-end space-x-3 pt-4">
          <button type="button" id="cancelBudgetBtn" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500">
            Cancel
          </button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Get Recommendations
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Budget Results Modal -->
  <div id="budgetResultsModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4">
      <div class="flex justify-between items-center p-6 border-b">
        <h3 class="text-xl font-bold text-gray-800">Budget Recommendations</h3>
        <button id="closeBudgetResultsBtn" class="text-gray-500 hover:text-gray-700 focus:outline-none">
          <i class="fas fa-times text-xl"></i>
        </button>
      </div>
      <div class="p-6 space-y-6">
        <div>
          <h4 class="font-semibold text-gray-800 mb-3">50/30/20 Rule Allocation</h4>
          <div class="space-y-2">
            <div class="flex justify-between">
              <span class="text-gray-600">Needs (50%)</span>
              <span class="font-medium" id="needsAllocation">€0.00</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Wants (30%)</span>
              <span class="font-medium" id="wantsAllocation">€0.00</span>
            </div>
            <div class="flex justify-between">
              <span class="text-gray-600">Savings (20%)</span>
              <span class="font-medium" id="savingsAllocation">€0.00</span>
            </div>
          </div>
        </div>
        
        <div>
          <h4 class="font-semibold text-gray-800 mb-3">Monthly Goal Requirements</h4>
          <p class="text-gray-600" id="monthlyGoalRequirements">€0.00</p>
        </div>
        
        <div>
          <h4 class="font-semibold text-gray-800 mb-3">Suggestions</h4>
          <ul class="list-disc list-inside text-gray-600 space-y-2" id="suggestions">
          </ul>
        </div>
      </div>
      <div class="p-6 border-t bg-gray-50">
        <button id="closeBudgetResultsConfirmBtn" class="w-full px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Got it
        </button>
      </div>
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

    function openAddFundsModal(goalName, currentAmount, goalId, targetAmount) {
      document.getElementById('goalTitle').value = goalName;
      document.getElementById('currentBalance').value = '€' + currentAmount.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
      addFundsForm.dataset.goalId = goalId;
      addFundsForm.dataset.targetAmount = targetAmount;
      addFundsModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
      document.getElementById('addAmount').focus();
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

    addFundsForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      
      const goalId = addFundsForm.dataset.goalId;
      const formData = new FormData(addFundsForm);
      
      try {
        const response = await fetch(`/goals/${goalId}/add-funds`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: JSON.stringify({
            amount: formData.get('addAmount'),
            funding_source: formData.get('fundingSource'),
            notes: formData.get('fundingNotes')
          })
        });
        
        const data = await response.json();
        
        if (data.success) {
          // Update the UI
          const row = document.querySelector(`tr[data-goal-id="${goalId}"]`);
          const amountCell = row.querySelector('td:nth-child(3)');
          const remainingCell = row.querySelector('td:nth-child(4) span');
          const progressBar = row.querySelector('.progress-bar-fill');
          
          amountCell.textContent = `€${data.new_balance.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})} / €${formData.get('targetAmount')}`;
          remainingCell.textContent = `€${data.progress.remaining_amount.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
          
          if (progressBar) {
            progressBar.style.width = `${data.progress.percentage}%`;
          }
          
          closeAddFundsModal();
        }
      } catch (error) {
        console.error('Error adding funds:', error);
        alert('There was an error adding funds. Please try again.');
      }
    });

    // Set up action buttons in the table
    document.querySelectorAll('button[title="Add Funds"]').forEach(btn => {
      btn.addEventListener('click', function() {
        const row = this.closest('tr');
        const goalName = row.querySelector('td:first-child div').textContent;
        const amountText = row.querySelector('td:nth-child(4)').textContent;
        const currentAmount = parseFloat(amountText.split('/')[0].replace('$', '').replace(',', '').trim());
        openAddFundsModal(goalName, currentAmount, row.dataset.goalId, row.querySelector('td:nth-child(5)').textContent.split('/')[1].trim());
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

    // Budget optimization functionality
    const budgetModal = document.getElementById('budgetModal');
    const closeBudgetBtn = document.getElementById('closeBudgetBtn');
    const cancelBudgetBtn = document.getElementById('cancelBudgetBtn');
    const budgetForm = document.getElementById('budgetForm');
    const budgetResultsModal = document.getElementById('budgetResultsModal');
    const closeBudgetResultsBtn = document.getElementById('closeBudgetResultsBtn');
    const closeBudgetResultsConfirmBtn = document.getElementById('closeBudgetResultsConfirmBtn');

    function openBudgetModal() {
      budgetModal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    function closeBudgetModal() {
      budgetModal.classList.add('hidden');
      document.body.style.overflow = '';
      budgetForm.reset();
    }

    function closeBudgetResultsModal() {
      budgetResultsModal.classList.add('hidden');
      document.body.style.overflow = '';
    }

    // Add budget optimization button to the header
    const actionsDiv = document.querySelector('.flex.items-center.space-x-2');
    const optimizeBtn = document.createElement('button');
    optimizeBtn.className = 'px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50';
    optimizeBtn.innerHTML = '<i class="fas fa-calculator mr-1"></i> Optimize Budget';
    optimizeBtn.addEventListener('click', openBudgetModal);
    actionsDiv.insertBefore(optimizeBtn, actionsDiv.firstChild);

    // Event listeners for budget modals
    closeBudgetBtn.addEventListener('click', closeBudgetModal);
    cancelBudgetBtn.addEventListener('click', closeBudgetModal);
    closeBudgetResultsBtn.addEventListener('click', closeBudgetResultsModal);
    closeBudgetResultsConfirmBtn.addEventListener('click', closeBudgetResultsModal);

    budgetModal.addEventListener('click', (e) => {
      if (e.target === budgetModal) closeBudgetModal();
    });

    budgetResultsModal.addEventListener('click', (e) => {
      if (e.target === budgetResultsModal) closeBudgetResultsModal();
    });

    // Handle budget form submission
    budgetForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      
      const formData = new FormData(budgetForm);
      const response = await fetch('{{ route('goals.budget-recommendations') }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(Object.fromEntries(formData))
      });
      
      const data = await response.json();
      
      // Update results modal
      document.getElementById('needsAllocation').textContent = '€' + data.allocation.needs.toFixed(2);
      document.getElementById('wantsAllocation').textContent = '€' + data.allocation.wants.toFixed(2);
      document.getElementById('savingsAllocation').textContent = '€' + data.allocation.savings.toFixed(2);
      document.getElementById('monthlyGoalRequirements').textContent = '€' + data.monthly_goal_requirements.toFixed(2);
      
      const suggestionsList = document.getElementById('suggestions');
      suggestionsList.innerHTML = '';
      data.suggestions.forEach(suggestion => {
        const li = document.createElement('li');
        li.textContent = suggestion;
        suggestionsList.appendChild(li);
      });
      
      closeBudgetModal();
      budgetResultsModal.classList.remove('hidden');
    });
  </script>
</body>
</html>