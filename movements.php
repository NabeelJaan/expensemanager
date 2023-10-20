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

            <div class="search-form">
                <form class="form__wrapper">
                    <div class="months">
                        <select id="month" name="month">
                            <option value="all">All Months</option>
                            <option value="jan">January</option>
                            <option value="feb">February</option>
                            <option value="march">March</option>
                            <option value="april">April</option>
                            <option value="may">May</option>
                            <option value="june">June</option>
                            <option value="july">July</option>
                            <option value="aug">August</option>
                            <option value="Sep">September</option>
                            <option value="10">October</option>
                            <option value="Nov">November</option>
                            <option value="Dec">December</option>
                        </select>
                    </div>
                    
                    <div class="years">
                        <select id="year" name="year">
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                        </select>
                    </div>
                    
                    <div class="s_btn">
                        <button type="submit">Search</button>
                    </div>

                </form>
            </div>

        </div>
    </div>


<?php include_once("footer.php"); ?>