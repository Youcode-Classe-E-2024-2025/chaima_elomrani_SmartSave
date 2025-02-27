<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SaveSmart - Financial Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
  <style>
    body {
      background-color: #f8fafc;
      font-family: 'Inter', sans-serif;
    }
    .bg-gradient-primary {
      background: linear-gradient(135deg, #162447 0%, #1f4068 100%);
    }
    .card {
      transition: all 0.3s ease;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .logo-pulse {
      animation: pulse 2s infinite;
    }
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
    .progress-bar {
      transition: width 1s ease-in-out;
    }
    .chart-container {
      position: relative;
      height: 300px;
      width: 100%;
    }
    .modal {
      transition: opacity 0.3s ease;
      opacity: 0;
      pointer-events: none;
    }
    .modal.active {
      opacity: 1;
      pointer-events: auto;
    }
    .modal-content {
      transition: transform 0.3s ease;
      transform: scale(0.95);
    }
    .modal.active .modal-content {
      transform: scale(1);
    }
    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb {
      background: #c5c5c5;
      border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #a1a1a1;
    }
    .table-hover tr:hover {
      background-color: rgba(37, 99, 235, 0.05);
    }
    /* Switch toggle */
    .switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
    }
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      transition: .4s;
      border-radius: 34px;
    }
    .slider:before {
      position: absolute;
      content: "";
      height: 16px;
      width: 16px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }
    input:checked + .slider {
      background-color: #3b82f6;
    }
    input:checked + .slider:before {
      transform: translateX(26px);
    }
    /* Category Pills */
    .category-pill {
      transition: all 0.2s ease;
    }
    .category-pill:hover {
      transform: translateY(-2px);
    }
    /* Transaction Item */
    .transaction-item {
      transition: all 0.2s ease;
    }
    .transaction-item:hover {
      background-color: rgba(37, 99, 235, 0.05);
    }
  </style>
</head>
<body class="min-h-screen">
  <!-- Top Navigation -->
  <nav class="bg-gradient-primary text-white shadow-lg">
    <div class="container mx-auto px-4 py-3">
      <div class="flex justify-between items-center">
        <div class="flex items-center">
          <span class="text-2xl font-bold logo-pulse text-blue-300">Smart<span class="text-green-400">Save</span></span>
        </div>
        <div class="hidden md:flex space-x-6 items-center">
          <a href="#" class="text-blue-200 hover:text-white transition duration-300 border-b-2 border-green-400 pb-1">Dashboard</a>
          <a href="#" class="text-blue-200 hover:text-white transition duration-300">Investments</a>
          <a href="#" class="text-blue-200 hover:text-white transition duration-300">Reports</a>
          <a href="#" class="text-blue-200 hover:text-white transition duration-300">Goals</a>
          <div class="relative ml-3">
            <button id="profileButton" class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
              <span class="sr-only">Open user menu</span>
              <div class="h-8 w-8 rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 flex items-center justify-center">
                <span class="text-white font-medium">RJ</span>
              </div>
            </button>
          </div>
        </div>
        <div class="md:hidden">
          <button class="text-white text-xl focus:outline-none">
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main Content Area -->
  <div class="container mx-auto px-4 py-8">
    <!-- Dashboard Header with Quick Stats -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
      <div>
        <h1 class="text-2xl font-bold text-gray-800">Financial Dashboard</h1>
        <p class="text-gray-600">Welcome back, Robert. Here's your financial overview.</p>
      </div>
      <div class="mt-4 md:mt-0 flex space-x-3">
        <button id="addTransactionBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition duration-300 flex items-center">
          <i class="fas fa-plus mr-2"></i> Add Transaction
        </button>
        <button id="addGoalBtn" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow transition duration-300 flex items-center">
          <i class="fas fa-flag mr-2"></i> New Goal
        </button>
      </div>
    </div>

    <!-- Main Dashboard Grid -->
    <div class="">
      <!-- Left Column - Financial Overview -->
      <div class="lg:col-span-2 space-y-6">

        <!-- Balance Card -->
        <div class="bg-white rounded-xl shadow-md p-6 card">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Account Balance</h2>
            <div class="text-sm text-gray-500">
              <select id="balancePeriod" class="bg-gray-100 border-none rounded-md px-2 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="today">Today</option>
                <option value="week" selected>This Week</option>
                <option value="month">This Month</option>
                <option value="year">This Year</option>
              </select>
            </div>
          </div>
          
          <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center mb-4">
            <div>
              <p class="text-gray-500 text-sm">Total Balance</p>
              <p class="text-3xl font-bold text-gray-800">$24,156.00</p>
              <p class="text-green-500 text-sm flex items-center">
                <i class="fas fa-arrow-up mr-1"></i> 3.2% from last month
              </p>
            </div>
            <div class="flex space-x-8 mt-4 lg:mt-0">
              <div class="text-center">
                <p class="text-gray-500 text-sm">Income</p>
                <p class="text-xl font-semibold text-green-600">$5,243.00</p>
                <p class="text-green-500 text-xs flex items-center justify-center">
                  <i class="fas fa-arrow-up mr-1"></i> 8.1%
                </p>
              </div>
              <div class="text-center">
                <p class="text-gray-500 text-sm">Expenses</p>
                <p class="text-xl font-semibold text-red-500">$3,587.00</p>
                <p class="text-red-500 text-xs flex items-center justify-center">
                  <i class="fas fa-arrow-up mr-1"></i> 2.3%
                </p>
              </div>
              <div class="text-center">
                <p class="text-gray-500 text-sm">Savings</p>
                <p class="text-xl font-semibold text-blue-600">$1,656.00</p>
                <p class="text-green-500 text-xs flex items-center justify-center">
                  <i class="fas fa-arrow-up mr-1"></i> 12.4%
                </p>
              </div>
            </div>
          </div>
          
          <!-- Chart Container -->
          <div class="chart-container pt-2">
            <canvas id="balanceChart"></canvas>
          </div>
        </div>
      </div>
        
 <div class="container mx-auto p-6">
    
    <!-- Form for Adding Transactions -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <h2 class="text-xl font-semibold mb-4">Add Transaction</h2>
        <form id="transactionForm" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <input type="text" id="description" placeholder="Description" class="p-2 border rounded">
            <input type="number" id="amount" placeholder="Amount" class="p-2 border rounded">
            <select id="category" class="p-2 border rounded">
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Add</button>
        </form>
    </div>
    <!-- Financial Data Table -->
  
    
    
        <div class="bg-white rounded-xl shadow-md p-6 ">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg mt-4 font-semibold text-gray-800">Recent Transactions</h2>
            <div class="flex items-center space-x-2">
              <select id="transactionFilter" class="bg-gray-100 border-none rounded-md px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="all">All</option>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
              </select>
              <button id="viewAllTransactionsBtn" class="text-blue-600 hover:text-blue-800 text-sm transition duration-300">
                View All
              </button>
            </div>
          </div>
          
          <div class="overflow-x-auto">
            <table class="min-w-full">
              <thead>
                <tr class="border-b border-gray-200">
                  <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                  <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                  <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                  <th class="py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                  <th class="py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $transactions as $transaction)
                <tr class="transaction-item">
                  <td class="py-3 whitespace-nowrap">
                    <div class="flex items-center">
                     
                      <div class="ml-3">
                        <p class="text-sm font-medium text-gray-800">    {{ $transaction['description'] }}</p>
                        <p class="text-xs text-gray-500">{{ $transaction['user_id'] }}</p>
                      </div>
                    </div>
                  </td>
                  <td class="py-3 whitespace-nowrap">
                    <span class="px-2 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded-full">
                    {{ $transaction['category_id'] }}
                    </span>
                  </td>
                  <td class="py-3 whitespace-nowrap text-sm text-gray-600">
                  {{ $transaction['transaction_date'] }}
                  </td>
                  <td class="py-3 whitespace-nowrap text-sm font-medium text-green-600 text-right">
                    {{ $transaction['amount'] }}
                  </td>
                  <td class="py-3 whitespace-nowrap text-right text-sm">
                    <button class="text-blue-600 hover:text-blue-900 mr-2"><i class="fas fa-edit"></i></button>
                    <td class="p-2">
                        <form action="{{ route('category.delete', $category->id) }}" method="POST">
                        @csrf
                            @method('DELETE')
                        <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        </td>
                  </td>
                </tr>
                    @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Form for Adding Category -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <h2 class="text-xl font-semibold mb-4">Add Category</h2>
        <form action="/categories" method="POST"  class="grid grid-cols-1 md:grid-cols-2 gap-4">
          @csrf
            <input type="text" name="name" id="categoryName" placeholder="Category Name" class="p-2 border rounded">
            <button type="submit" class="bg-green-500 text-white p-2 rounded">Add Category</button>
        </form>
    </div>
    
    
      
     
    
  </div>
</body>
</html>
