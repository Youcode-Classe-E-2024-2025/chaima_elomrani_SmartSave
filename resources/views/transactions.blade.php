<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaveSmart - Transactions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
                        <a href="#" class="text-blue-200 hover:text-white transition duration-300">Dashboard</a>
                        <a href="#" class="text-blue-200 hover:text-white transition duration-300 border-b-2 border-green-400 pb-1">Transactions</a>
                        <a href="#" class="text-blue-200 hover:text-white transition duration-300">Reports</a>
                        <a href="#" class="text-blue-200 hover:text-white transition duration-300">Goals</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <span class="sr-only">Open user menu</span>
                            <div class="h-8 w-8 rounded-full bg-gradient-to-r from-purple-500 to-indigo-500 flex items-center justify-center">
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
            <h1 class="text-3xl font-bold text-gray-800">Transactions</h1>
            <button id="addTransactionBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition duration-300">
                <i class="fas fa-plus mr-2"></i> Add Transaction
            </button>
        </div>

        <!-- Add Transaction Form (Hidden by default) -->
        <div id="addTransactionForm" class="bg-white rounded-xl shadow-md p-6 mb-8 hidden">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Add New Transaction</h2>
            <form id="transactionForm" class="space-y-4">
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <input type="text" id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                    <input type="number" id="amount" name="amount" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select id="category" name="category" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="income">Income</option>
                        <option value="expense">Expense</option>
                    </select>
                </div>
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" id="date" name="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" id="cancelTransactionBtn" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Add Transaction
                    </button>
                </div>
            </form>
        </div>

        <!-- Transactions Table -->
        <div class="bg-white rounded-xl shadow-md p-6 card-hover">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Recent Transactions</h2>
                <div class="flex items-center space-x-2">
                    <select id="transactionFilter" class="bg-gray-100 border-none rounded-md px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="all">All</option>
                        <option value="income">Income</option>
                        <option value="expense">Expense</option>
                    </select>
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
                    <tbody id="transactionsTableBody">
                        <!-- Transaction rows will be dynamically added here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Sample transactions data
        let transactions = [
            { id: 1, description: "Salary", category: "income", date: "2023-05-01", amount: 5000 },
            { id: 2, description: "Rent", category: "expense", date: "2023-05-05", amount: -1200 },
            { id: 3, description: "Groceries", category: "expense", date: "2023-05-10", amount: -200 },
        ];

        // DOM elements
        const addTransactionBtn = document.getElementById('addTransactionBtn');
        const addTransactionForm = document.getElementById('addTransactionForm');
        const transactionForm = document.getElementById('transactionForm');
        const cancelTransactionBtn = document.getElementById('cancelTransactionBtn');
        const transactionsTableBody = document.getElementById('transactionsTableBody');
        const transactionFilter = document.getElementById('transactionFilter');

        // Show/hide add transaction form
        addTransactionBtn.addEventListener('click', () => {
            addTransactionForm.classList.toggle('hidden');
        });

        cancelTransactionBtn.addEventListener('click', () => {
            addTransactionForm.classList.add('hidden');
            transactionForm.reset();
        });

        // Add new transaction
        transactionForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const newTransaction = {
                id: transactions.length + 1,
                description: document.getElementById('description').value,
                amount: parseFloat(document.getElementById('amount').value),
                category: document.getElementById('category').value,
                date: document.getElementById('date').value
            };
            transactions.push(newTransaction);
            renderTransactions();
            addTransactionForm.classList.add('hidden');
            transactionForm.reset();
        });

        // Render transactions
        function renderTransactions(filter = 'all') {
            transactionsTableBody.innerHTML = '';
            transactions
                .filter(transaction => filter === 'all' || transaction.category === filter)
                .forEach(transaction => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td class="py-4 whitespace-nowrap text-sm font-medium text-gray-900">${transaction.description}</td>
                        <td class="py-4 whitespace-nowrap text-sm text-gray-500">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${transaction.category === 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                                ${transaction.category}
                            </span>
                        </td>
                        <td class="py-4 whitespace-nowrap text-sm text-gray-500">${transaction.date}</td>
                        <td class="py-4 whitespace-nowrap text-sm text-gray-500 text-right">${transaction.amount.toFixed(2)}</td>
                        <td class="py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button onclick="editTransaction(${transaction.id})" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</button>
                            <button onclick="deleteTransaction(${transaction.id})" class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                    `;
                    transactionsTableBody.appendChild(row);
                });
        }

        // Filter transactions
        transactionFilter.addEventListener('change', (e) => {
            renderTransactions(e.target.value);
        });

        // Edit transaction
        function editTransaction(id) {
            const transaction = transactions.find(t => t.id === id);
            if (transaction) {
                document.getElementById('description').value = transaction.description;
                document.getElementById('amount').value = Math.abs(transaction.amount);
                document.getElementById('category').value = transaction.category;
                document.getElementById('date').value = transaction.date;
                addTransactionForm.classList.remove('hidden');
                // Remove the edited transaction and re-add it after editing
                transactions = transactions.filter(t => t.id !== id);
            }
        }

        // Delete transaction
        function deleteTransaction(id) {
            transactions = transactions.filter(t => t.id !== id);
            renderTransactions();
        }

        // Initial render
        renderTransactions();
    </script>
</body>
</html>

