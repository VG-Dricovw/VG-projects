<?php require base_path('views/partials/head.php'); ?>

<body class="h-full">

  <div class="min-h-full">
    <?php require base_path('views/partials/nav.php'); ?>

    <?php require base_path('views/partials/header.php'); ?>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p>
          <a href="/notes" class="button bg-blue-500 rounded-md text-white p-2">go back</a>
        </p>
        <br>
        <?= htmlspecialchars($note['body']) ?>

        <form method="POST" class="mt-6">
          <input type="hidden" name="id" value="<?=$note ?>">
          <button type="" class="text-red-500">delete</button>
        </form>
      </div>
    </main>
  </div>

  <?php require base_path('views/partials/footer.php'); ?>