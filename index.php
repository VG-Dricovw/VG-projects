<?php
require "partials/nav.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once('vendor/autoload.php');

if (!$_SESSION ?? false) {
  header('location: /account/login.php');
  exit();
}

$UserJson = CallAPI("GET", "http://localhost/app/api/user/read.php");
$Userresults = json_decode($UserJson, true);
foreach ($Userresults as $result) {
  foreach ($result as $value) {
    if ($value['user_name'] === $_SESSION['user']['name']) {
      $userid = $value['id'];
    }
  }
}
$id = $userid;

$TokenJson = CallAPI("GET", "http://localhost/app/api/token/read_single.php?id=$id");
// var_dump(json_decode($TokenJson, true));


var_dump(JWT::decode($jwttoken, new Key($secret_key, 'HS512')));

var_dump("eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9 . eyJpYXQiOjE3MjQ5MjgyMTMsImlzcyI6ImxvY2FsaG9zdCIsIm5iZiI6MTcyNDkyODIxMywiZXhwIjoxNzI0OTI4NTczLCJ1c2VybmFtZSI6InVzZXIifQ . csimd9n84GtfG3vkRq6tFiiRzCz8Lim5r88DAeB5iAMkt_6uCJj7NlMH8vcBIweRVYuCefQaVUJPfv8ZfnChqQ");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Document</title>
</head>

<body>



  <div>
    <button class="bg-blue-500 rounded-md text-white p-2 m-2 content-right"><a href="/task/create.php">create
        task</a></button>
  </div>
  <div class="shadow-md sm:rounded-lg">
    <table class="my-0 mx-auto justify-center text-sm mt-10 text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3 flex">
            Title
          </th>
          <th scope="col" class="px-6 py-3">
            Name
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

        // $TaskJson = CallAPI("GET", "http://localhost/app/api/task/read.php");
        // $Taskresults = json_decode($TaskJson, true);
        // // var_dump($Taskresults);
        
        // foreach ($Taskresults as $result) {
        //   foreach ($result as $value) {
        //     // var_dump($value['name']);
        //     // var_dump($_SESSION['user']['name']);
        //     if ($value['name'] === $_SESSION['user']['name']) {
        //       //get the entire row
        //       echo "<tr class='odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700'>";
        //       echo "<td scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white'>
        //       <a href='/task/show.php?id=' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>";
        //       echo htmlspecialchars($value['title']) . "</a></td>
        //       <td>" . htmlspecialchars($value["name"]) . "</td>
        //       <td>" . htmlspecialchars($value["category"]) . "</td>
        //       <td>" . htmlspecialchars($value["est_time"]) . "</td>
        //       <td>" . htmlspecialchars($value["real_time"]) . "</td>
        //       <td>   <a href='/task/edit.php?id=$value[id]' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Edit</a> |
        //       <a href='/task/delete.php?id=$value[id]' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Delete</a></td>                    
        //       </tr>";
        //     }
        //   }
        // }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>