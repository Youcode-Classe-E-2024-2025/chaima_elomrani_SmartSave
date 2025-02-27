<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy Admin - Manage Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { "50": "#eff6ff", "100": "#dbeafe", "200": "#bfdbfe", "300": "#93c5fd", "400": "#60a5fa", "500": "#3b82f6", "600": "#2563eb", "700": "#1d4ed8", "800": "#1e40af", "900": "#1e3a8a", "950": "#172554" }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100">
    <!-- Modal Overlay - Hidden by default -->
    <div id="addForm" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-md p-6 w-96 max-w-md mx-auto">
            <h2 class="text-2xl font-semibold text-black mb-6">Add Category</h2>
            <form action="/categories" method="POST"  class="space-y-4  flex flex-col gap-4">
            @csrf
                <div>
                    <label for="categoryName" class="text-sm font-medium text-black">Category name</label>
                    <input type="text" id="categoryName" name="name" required class="mt-1 w-full p-2 border border-gray-300 focus:border-primary-500 focus:ring-1 focus:ring-primary-500 rounded-lg">
                </div>

                <div class="flex items-center justify-end space-x-3 mt-6">
                    <button type="button" id="cancelBtn"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg transition duration-200">
                        Cancel
                    </button>
                    <button type="submit"
                        class="bg-primary-500 hover:bg-primary-600 text-white py-2 px-4 rounded-lg transition duration-200">
                        Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-50 text-gray-800">
        <div class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r">
            <div class="flex items-center justify-center h-14 border-b">
                <div class="text-2xl font-bold text-primary-600">Youdemy Admin</div>
            </div>
            <div class="overflow-y-auto overflow-x-hidden flex-grow">
                <ul class="flex flex-col py-4 space-y-1">
                    <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
                        </div>
                    </li>
                    <li>
                        <a href="admin-users.html"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-primary-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-users"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-primary-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-th-large text-primary-500"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Transactions</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin-tags.html"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-primary-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-tags"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Statistics</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ml-64 flex-1">
            <header class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
                <h1 class="text-2xl font-semibold text-gray-800">Manage Categories</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Welcome, Admin</span>
                    <button
                        class="bg-primary-500 hover:bg-primary-600 text-white py-2 px-4 rounded-lg transition duration-200">
                        Logout
                    </button>
                </div>
            </header>
            <main class="p-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-semibold text-gray-800">Category List</h2>
                        <button id="addBtn"
                            class="bg-primary-500 hover:bg-primary-600 text-white py-2 px-4 rounded-lg transition duration-200">
                            Add New Category
                        </button>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left">Name</th>
                                    <th class="py-3 px-4 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($categories as $category)
                                    <tr>
                                        <td class="py-3 px-4">{{ $category->name }}</td>
                                        <td class="py-3 px-4">
                                            <button class="text-blue-500 hover:text-blue-700 mr-2">Edit</button>
                                            <form action="{{ route('category.delete', $category->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        const addForm = document.getElementById('addForm');
        const addBtn = document.getElementById('addBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        
        // Show the modal when Add New Category button is clicked
        addBtn.addEventListener('click', () => {
            addForm.classList.remove('hidden');
        });
        
        // Hide the modal when Cancel button is clicked
        cancelBtn.addEventListener('click', () => {
            addForm.classList.add('hidden');
        });
        
        // Also hide the modal when clicking outside the form
        addForm.addEventListener('click', (e) => {
            if (e.target === addForm) {
                addForm.classList.add('hidden');
            }
        });
    </script>
</body>

</html>

