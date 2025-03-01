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
  </style>
</head>

<body class="bg-gray-100 min-h-screen">
  <!-- Top Navigation -->
  <nav class="bg-gradient-primary text-white shadow-lg">
    <div class="container mx-auto px-4 py-3">
      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-4">
          <span class="text-2xl font-bold">Save<span class="text-green-400">Smart</span></span>
          <div class="hidden md:flex space-x-4">
            <a href="#"
              class="text-blue-200 hover:text-white transition duration-300 border-b-2 border-green-400 pb-1">Dashboard</a>
            <a href="#" class="text-blue-200 hover:text-white transition duration-300">Investments</a>
            <a href="#" class="text-blue-200 hover:text-white transition duration-300">Reports</a>
            <a href="#" class="text-blue-200 hover:text-white transition duration-300">Goals</a>
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

  <!-- Main Content -->
  <div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-bold text-gray-800">Financial Dashboard</h1>
      <div class="flex space-x-4">
        <a href="categories"
          class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition duration-300">
          <i class="fas fa-plus mr-2"></i> Add Category
        </a>
        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow transition duration-300">
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

        <!-- Recent Transactions -->
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Recent Transactions</h2>
            <div class="flex items-center space-x-2">
              <select id="transactionFilter"
                class="bg-gray-100 border-none rounded-md px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="all">All</option>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
              </select>
              <button class="text-blue-600 hover:text-blue-800 text-sm transition duration-300">
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
                </tr>
              </thead>
              <tbody>
                <tr class="hover:bg-gray-50">
                  <td class="py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">Grocery Shopping</div>
                        <div class="text-sm text-gray-500">Walmart</div>
                      </div>
                    </div>
                  </td>
                  <td class="py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                      Expense
                    </span>
                  </td>
                  <td class="py-4 whitespace-nowrap text-sm text-gray-500">2023-05-15</td>
                  <td class="py-4 whitespace-nowrap text-sm text-gray-500 text-right">$120.50</td>
                </tr>
                <!-- Add more transaction rows here -->
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Right Column - Forms and Additional Info -->
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
  </script>
</body>

</html>