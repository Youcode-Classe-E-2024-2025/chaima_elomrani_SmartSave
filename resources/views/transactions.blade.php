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
<x-header />

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Transactions</h1>
            <button id="addTransactionBtn"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition duration-300">
                <i class="fas fa-plus mr-2"></i> Add Transaction
            </button>
        </div>

        <!-- Add Transaction Form (Hidden by default) -->
        <div id="addTransactionForm" class="bg-white rounded-xl shadow-md p-6 mb-8 hidden">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Add New Transaction</h2>

            <form id="transactionForm" class="space-y-4" action="{{ route('transaction.create')}}" method="post">
                @csrf
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <input type="text" id="description" name="description"
                        class="mt-1 block w-full border p-2 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                    <input type="number" id="amount" name="amount" step="0.01"
                        class="mt-1 block w-full border p-2 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
    <select id="category_id" name="category_id" required
        class="mt-1 block w-full border p-2 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <select id="type" name="type"
                        class="mt-1 block w-full border p-2 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="income">Income</option>
                        <option value="expense">Expense</option>
                    </select>
                </div>
                <div>
                    <label for="transaction_date" class="block text-sm font-medium text-gray-700">Transaction Date</label>
                    <input type="transaction_date" id="transaction_date" name="transaction_date"
                        class="mt-1 block w-full border p-2 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div class="flex justify-end space-x-3">
                    <button type="button" id="cancelTransactionBtn"
                        class="px-4 py-2  border p-2 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                    <select id="transactionFilter"
                        class="bg-gray-100 border-none rounded-md px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
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
                            <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description</th>
                            <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Type</th>
                            <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category</th>
                            <th class="py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                            </th>
                            <th class="py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Amount</th>
                            <th class="py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    @foreach ($transactions as $transaction)
                        <tbody id="transactionsTableBody">
                            <td class="py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $transaction->description }}
                            </td>
                            <td class="py-4 whitespace-nowrap text-sm text-gray-500">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${transaction.category === 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                                    <span class="{{ $transaction->type === 'income' ? 'text-green-500' : 'text-red-500' }}">
                                        {{ $transaction->type }}
                                    </span>
                                </span>
                            </td>
                            <td class="py-4 whitespace-nowrap text-sm text-gray-500">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${transaction.category === 'income' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                                    {{ $transaction->category->name ?? 'makaynach ghiyriha '}}
                                </span>
                            </td>
                            <td class="py-4 whitespace-nowrap text-sm text-gray-500">{{ $transaction->transaction_date }}
                            </td>
                            <td class="py-4 whitespace-nowrap text-sm text-gray-500 text-right">
                                <span class="{{ $transaction->type === 'income' ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $transaction->amount }} $
                                </span>
                            </td>
                            <td class="py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button onclick="editTransaction(${transaction.id})"
                                    class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</button>
                                    <form action="{{ route('transaction.delete', $transaction->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:text-red-900">Delete
                                </button>
                                </form>
                            </td>

                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <script>
        const transactionForm = document.getElementById('transactionForm');
        const cancelTransactionBtn = document.getElementById('cancelTransactionBtn');

        addTransactionBtn.addEventListener('click', () => {
            addTransactionForm.classList.toggle('hidden');
        });

        cancelTransactionBtn.addEventListener('click', () => {
            addTransactionForm.classList.add('hidden');
        });

   

     
    </script>
</body>

</html>

+