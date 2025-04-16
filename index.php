<?php include('books.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Library</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="js/script.js"></script>
</head>
<body>
  
<?php include 'routes/navbar.php'; ?>

  <main class="p-8">
    <h1 class="text-2xl font-semibold mb-4">*Introduction here*</h1>
    <section class="py-6 px-4">
    <h2 class="text-2xl font-bold mb-4">Trending books</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-2">
    <?php foreach ($books as $book_id => $book): ?>
        <a href="book-details.php?book_id=<?= $book_id ?>">
            <div class="bg-[#BF9264] p-2 rounded shadow w-48 mx-auto">
                <img src="<?= $book['image'] ?>" alt="<?= $book['title'] ?>" class="w-40 h-61 object-cover rounded mb-2 mx-auto">
                <h3 class="font-bold text-lg text-white"><?= $book['title'] ?></h3>
                <p class="text-sm text-gray-300"><?= $book['author'] ?></p>
            </div>
        </a>
    <?php endforeach; ?>
</div>

    
  </main>
</body>
</html>
