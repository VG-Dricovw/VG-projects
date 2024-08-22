<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <?php
  
    $id = $_GET["id"];

    function deleteTask($id)
    {
        var_dump("starting delete");
        var_dump($id);

        $Json = CallAPI("DELETE", "http://localhost/api/task/delete.php", [$id]);
        header('Location: ../index.php');
        $result = json_decode($Json, true);
        var_dump($result);
    }


    if (isset($_GET["delete"])) {
        deleteTask($id);
    }
    ?>

    <?php require "../partials/nav.php"; ?>

    <div class="mt-10 ml-52 justify-center text-lg">
        <p>
        do you want to delete?
        </p>

        <button class="p-2 rounded-md button bg-red-500 text-black mr-20"><a href="/task/delete.php?id=<?= $id ?>&delete=true">delete</a></button>

        <button class="p-2 rounded-md button bg-green-500 text-black"><a href='/task/delete.php?id=<?= $id ?>&delete=false'>no</a></button>
    </div>

</body>

</html>