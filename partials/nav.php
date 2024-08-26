<?php
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

?>
<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex flex-row h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="text-white py-2 mr-10">
                    Task Management
                </div>
                <div class="flex flex-shrink-0 items-center">

                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company">
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">

                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/" class="<?= urlIs("/") ? 'bg-gray-900 text-white' : ''; ?>
                        rounded-md  px-3 py-2 text-sm font-medium text-gray-500"
                            aria-current="page">Dashboard</a>
                        <a href="/task/team.php"
                            class=" <?= urlIs("/task/team.php") ? 'bg-gray-900 text-white' : ''; ?>
                        rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
                    </div>
                </div>
            </div>
            <class="items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">


                <!-- Profile dropdown -->
                <div class="relative flex flex-nowrap">
                    <?php
                    session_start();
                 
                    if (str_contains($_SERVER['REQUEST_URI'], "task")) {
                        require("../callAPI.php");
                    } else {
                        require("callAPI.php");
                    }

                    echo "<div class='text-white mr-10'>";
                    if (isset($Jwt)) {
                        var_dump($Jwt);
                    } else {
                        echo "no jwt            ";
                    }
                    print_r($_SESSION['user']['name']);
                    // print_r($_SESSION);
                    echo "</div>";
                    if ($_SESSION['user'] ?? false):

                    ?>
                        <button type="button"
                            class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">

                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                            ></button>
                        <form method="POST" action="/account/logout.php" class="relative flex ml-2">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="text-white bg-red-800 rounded-md p-2">Log out</button>
                        </form>
                    <?php else: ?>
                        <a href="/account/register.php"
                            class="rounded-md relative text-white flex px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                            register</a>
                        <a href="/account/login.php"
                            class="rounded-md relative flex px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                            login</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
</nav>