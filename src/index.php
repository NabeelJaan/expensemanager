
<?php include_once("header.php"); ?>


    <div class="main_wrapper md:flex">
        <div class="side__bar px-6 py-10 w-[20%] bg-[#86c540] h-screen">
            <div class="logo mb-5">
                <a href="#" class="text-white text-xl font-bold">Expense Manger</a>
            </div>
            <ul>
                <li class="text-white font-medium text-base p-2"><a href="#">Home</a></li>
                <li class="text-white font-medium text-base p-2"><a href="/expensemanager/src/movements.php">Movements</a></li>
                <li class="text-white font-medium text-base p-2"><a href="#">Report by date</a></li>
                <li class="text-white font-medium text-base p-2"><a href="#">Report by category</a></li>
            </ul>
        </div>

        <!-- sidebar end -->

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
                                <option value="guest expense">Guests Expenses</option>
                                <option value="internet bill">Internet Bill</option>
                                <option value="bike maintenance">Bike Maintenance</option>
                                <option value="installment">Installment</option>
                                <option value="Commetti">Commetti</option>
                                <option value="Fruits">Fruits</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <textarea id="ex_description" name="ex_description" placeholder="Description" class="w-full px-3 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring focus:border-blue-500" rows="4" required></textarea>
                        </div>
                        <div class="mb-4">
                            <input type="date" id="ex_date" name="ex_date" value="<?php echo date('d-m-Y'); ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500" required>
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
            <!-- Table Showing Last ten records -->
            
            <?php
                include_once("db_connection.php");
                $sql = "SELECT * FROM `expenses` LIMIT 10 ";
                $result = mysqli_query( $conn, $sql ) or die( "Query has error" );
            ?>

            <div class="main_records_wrapper">

                <?php
                    // Total Income Query
                    $in_sql = "SELECT * FROM `income` ";
                    $in_result = mysqli_query( $conn, $in_sql );
                    $income_data = mysqli_fetch_assoc($in_result);

                    // Total Expense Query
                    $ex_sql = "SELECT SUM(expense_amount) FROM expenses AS ex_total";
                    $ex_total = mysqli_query( $conn, $ex_sql );
                    $ex_total_rec = mysqli_fetch_assoc($ex_total);

                    $total_income = $income_data['p_income'];
                    $total_expense = $ex_total_rec['SUM(expense_amount)'];

                    $balance = $total_income - $total_expense;

                    // print_r($ex_total_rec);
                ?>

                <div class="amount_output">
                    <h2>Monthly Balance</h2>
                    <p>Income: <span><?php echo $total_income; ?> +</span></p>
                    <p>Expense: <span><?php echo $total_expense; ?> -</span></p>
                    <hr>
                    <p>Balance: <span><?php echo $balance; ?></span></p>
                </div>

                <?php if( mysqli_num_rows( $result ) > 0 ) { ?>
                    <div class="latest_records">
                        <table class="min-w-full">
                            <thead>
                                <tr class="bg-gray-300">
                                    <th class="py-2 px-4">Date</th>
                                    <th class="py-2 px-4">Name</th>
                                    <th class="py-2 px-4">Amount</th>
                                    <th class="py-2 px-4">Description</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-300">

                            <?php while($records = mysqli_fetch_assoc($result) ) { ?>

                                <tr>
                                    <td class="py-2 px-4"><?php echo $records['expense_date']; ?></td>
                                    <td class="py-2 px-4"><?php echo $records['expense_cat']; ?></td>
                                    <td class="py-2 px-4"><?php echo $records['expense_amount']; ?></td>
                                    <td class="py-2 px-4"><?php echo $records['ex_description']; ?></td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>

                <div class="see_more_btn">
                    <a href="/expensemanager/src/movements.php">See More</a>
                </div>

                <!-- Apex Chart --> 

                <div class="charts_main">
                    <h2>Reports</h2>

                    <div class="charts__inner">
                        <div class="chart__graph">
                            <h3>Monthly Graph by Category</h3>
                            <div id="chart1"></div>
                        </div>
                        <div class="chart__summary">
                            <h3>Monthly Summary by Category</h3>
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    
<?php include_once("footer.php"); ?>