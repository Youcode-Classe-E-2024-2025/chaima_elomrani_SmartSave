<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy Admin - Course Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<div class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-md p-6 w-96">
        <h2 class="text-2xl font-semibold text-black mb-6">Add Course</h2>
        <form class="space-y-4">
            <div>
                <label for="courseTitle" class=" text-sm font-medium text-black">Category name</label>
                <input type="text" name="name" required class="mt-1 w-full p-2 border-2 border-black rounded-lg ">
            </div>

            <div class="flex items-center justify-end space-x-3">
                <button type="button"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-lg transition duration-200">
                    Cancel
                </button>
                <button type="submit"
                    class="bg-primary-500 hover:bg-primary-600 text-white py-2 px-4 rounded-lg transition duration-200">
                    Save Course
                </button>
            </div>
    </div>
</div>

</form>
</div>
<script>
    document.getElementById('courseForm').addEventListener('submit', function (e) {
        e.preventDefault();
        alert('Course saved successfully!');
    });
</script>
</body>

</html>