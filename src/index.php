<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../dist/output.css" rel="stylesheet">
</head>
<body>
    <div class="main_wrapper md:flex">
        <div class="side__bar px-6 py-10 w-[20%] bg-[#86c540] h-screen">
            <div class="logo mb-5">
                <a href="#" class="text-white text-xl font-bold">Expense Manger</a>
            </div>
            <ul>
                <li class="text-white font-medium text-base p-2"><a href="#">Home</a></li>
                <li class="text-white font-medium text-base p-2"><a href="#">Movements</a></li>
                <li class="text-white font-medium text-base p-2"><a href="#">Report by date</a></li>
                <li class="text-white font-medium text-base p-2"><a href="#">Report by category</a></li>
            </ul>
        </div>
        <div class="main__content w-[80%]">
            <header class="bg-gray-300 px-5 py-5 flex justify-items-end">
                <div class="user flex items-center">
                    <div class="user__name">
                        <a href="#">Muhammad Nabeel</a>
                    </div>
                    <div class="user__img">
                        <img src="#" alt="">
                    </div>
                </div>
            </header>
            <div class="add_form">
                <div class="button_wrapper flex justify-center gap-10 py-8 max-w-[700px] mx-auto">
                    <button onclick="toggleForm('income_form')" class="text-white text-base font-medium px-8 h-[60px] bg-[#86c540]">Add Income</button>
                    <button onclick="toggleForm('expense__form')" class="text-white text-base font-medium px-8 h-[60px] bg-red-700">Add Expense</button>
                </div>
                <!-- income form -->
                <div id="income_form" class="income__form max-w-md mx-auto bg-white p-6 rounded-md shadow-md" style="display: none;">
                    <form action="income.php" method="POST">
                        <div class="mb-4">
                            <input type="text" id="income" name="income" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <select id="categories" name="categories" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500 appearance-none">
                                <option value="" disabled selected>Select a category</option>
                                <option value="installment">Office Salary</option>
                                <option value="petrol">Savings</option>
                                <option value="grocery">Loan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <textarea id="description" name="description" class="w-full px-3 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:border-blue-500" rows="4" required></textarea>
                        </div>
                        <div class="mb-4">
                            <input type="date" id="date" name="date" value="<?php echo date('Y-m-d');?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <input type="time" id="time" name="time" value="<?php echo date('h:i'); ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" name="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                Save
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Expense Form -->

                <div id="expense__form" class="expense__form max-w-md mx-auto bg-white p-6 rounded-md shadow-md" style="display: none;">
                    <form action="expense.php" method="POST"> 
                        <div class="mb-4">
                            <input type="text" id="expense" name="expense" placeholder="Add Expense" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <select id="ex_category" name="ex_category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500 appearance-none">
                                <option value="" disabled selected>Select a category</option>
                                <option value="petrol">Petrol</option>
                                <option value="grocery">Grocery</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <textarea id="ex_description" name="ex_description" placeholder="Description" class="w-full px-3 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:border-blue-500" rows="4" required></textarea>
                        </div>
                        <div class="mb-4">
                            <input type="date" id="ex_date" name="ex_date" value="<?php echo date('Y-m-d'); ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <input type="time" id="ex_time" name="ex_time" value="<?php echo date('h:i'); ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" required>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" name="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                Save
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    
    
    <script>

        function toggleForm(formId) {
            let form = document.getElementById(formId);
            let overlay = document.getElementById("overlay");

            if (form.style.display === "none") {
                form.style.display = "block";
                overlay.style.display = "block";
            } else {
                form.style.display = "none";
                overlay.style.display = "none";
            }
        }

    </script>

</body>
</html>