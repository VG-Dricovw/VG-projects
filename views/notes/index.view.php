<?php require base_path('views/partials/head.php'); ?>

<body class="h-full">

  <div class="min-h-full">
    <?php view('partials/nav.php'); ?>

    <?php require base_path('views/partials/header.php'); ?>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        notes.
        <ul> 
          <?php foreach ($notes as $note): ?>
          <li><a href="/note?id=<?= $note['id'] ?>"
              class="text-blue-500 hover:underline hover:text-darkblue-500">
              <?= htmlspecialchars($note['body']) ?></a></li>
        <?php endforeach; ?>
      </ul>

      <p class="mt-6">
        <a href="/notes/create" class="button bg-blue-500 rounded-md text-white  p-2">new note</a></p>
      </div>
    </main>
  </div>

  <?php require base_path('views/partials/footer.php'); ?>