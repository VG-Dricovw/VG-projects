<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>

  <?php require "partials/nav.php"; ?>

    <div class=" shadow-md sm:rounded-lg">
        <table
            class="my-0 mx-auto justify-center text-sm mt-10 text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 flex">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Creator
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Est Time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Real time
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once("callAPI.php");
                $id = $_GET["id"];
                
                $Json = CallAPI("GET", "http://localhost/api/task/read_single.php?id=$id");
                
                $result = json_decode($Json, true);
                // var_dump($result["name"]);
                ?>
                <?php
                    echo "<tr class='odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700'>";
                    echo "<td scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>";
                    echo htmlspecialchars($result['name']) . "</td>
            <td>" . htmlspecialchars($result["creator"]) . "</td>
            <td>" . htmlspecialchars($result["category"]) . "</td>
            <td>" . htmlspecialchars($result["est_time"]) . "</td>
            <td>" . htmlspecialchars($result["real_time"]) . "</td>
            <td>   <a href='edit' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Edit</a> |
             <a href='#' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Delete</a></td>                    
            </tr>";
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>