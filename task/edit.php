<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<?php
require_once("../callAPI.php");
// var_dump($_SERVER['REQUEST_METHOD']);
$id = $_GET["id"];
$Json = CallAPI("GET", "http://localhost/api/task/read_single.php?id=$id");
$result = json_decode($Json, true);
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    echo"<br>";
    var_dump($_POST);
    echo "<br>";
    $Json = CallAPI("PUT", "http://localhost/api/task/update.php?id=$id", $_POST);
    echo "<br><br>json:  ";
    var_dump($Json); 
    $result = json_decode($Json, true);
}
?>
<body>

<?php require "../partials/nav.php"; ?>


    <form class="ml-52" method="POST">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be
                    careful what you share.</p>

                <div class="hidden">
                     <input type="text" name="id" id="id" autocomplete="id" value="<?php echo $id?>">
                </div>


                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">name</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="name" id="name" autocomplete="name" value="<?php echo $result['name'] ?>"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 value:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 grid col-span-4 grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="creator"
                                class="block text-sm font-medium leading-6 text-gray-900">creator</label>
                            <div class="mt-2">
                                <div
                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                    <input type="text" name="creator" id="creator" autocomplete="creator" value="<?php echo ($result['creator']) ?>"
                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 value:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 grid col-span-4 grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="category"
                                    class="block text-sm font-medium leading-6 text-gray-900">category</label>
                                <div class="mt-2">
                                    <div
                                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                        <input type="text" name="category" id="category" autocomplete="category" value="<?php echo ($result['category']) ?>"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 value:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-10 grid col-span-4 grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    <label for="est_time"
                                        class="block text-sm font-medium leading-6 text-gray-900">est_time</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                            <input type="text" name="est_time" id="est_time" autocomplete="est_time" value="<?php echo ($result['est_time']) ?>"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 value:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-10 grid col-span-4 grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <label for="real_time"
                                            class="block text-sm font-medium leading-6 text-gray-900">real_time</label>
                                        <div class="mt-2">
                                            <div
                                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">

                                                <input type="text" name="real_time" id="real_time"
                                                    autocomplete="real_time" value="<?php echo($result['real_time']) ?>"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 value:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                            </div>
                                        </div>
                                    </div>





                                </div>
                            </div>


                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <button type="button"
                                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </div>
                        </div>
                    </div>
                </div>

    </form>


</body>

</html>