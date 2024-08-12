<?php require 'partials/head.php'; ?>

<body class="h-full">

  <div class="min-h-full">
    <?php require 'partials/nav.php'; ?>

    <?php require 'partials/header.php'; ?>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        je moet me niet bellen
      </div>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <button class="mt-6 bg-red-500" onclick="<?php stopSession() ?>">no more session </button>
        </button>
      </div>
    </main>
  </div>

  <?php require 'partials/footer.php'; ?>