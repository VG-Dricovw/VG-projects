<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
            

            Hello, <?php
            if ($_SESSION) {
                  echo substr($_SESSION['user']['email'], 0, strpos($_SESSION['user']['email'], '@'));
                 } else {
                     echo 'guest';  
                     }; ?>
                     </h1>

           
    </div>
</header>