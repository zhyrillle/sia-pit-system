<?php
session_start();
include('books.php');

$genre = $_GET['genre'] ?? null;

$filtered_books = [];

if ($genre) {
    foreach ($books as $id => $book) {
        if (isset($book['genre']) && $book['genre'] === $genre) {
            $filtered_books[$id] = $book;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($genre) ?> Books</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="js/script.js"></script>
</head>
<body>

<?php include 'routes/navbar.php'; ?>

<main class="p-8">
    <h1 class="text-2xl font-semibold mb-4">*Introduction here*</h1>
    <section class="py-6 px-4">
    <h2 class="text-2xl font-bold mb-4"><?= htmlspecialchars($genre) ?> Books</h2>

    <!-- dani ma change ang column sa container atong books -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-2">
        <?php if ($filtered_books): ?>
            <?php foreach ($filtered_books as $book): ?>
                <a href="book-details.php?book_id=<?= $book['book_id'] ?>" class="block">
                <div class="bg-[#BF9264] p-2 rounded shadow w-48 mx-auto hover:shadow-lg transition">
                    <img src="<?= $book['image'] ?>" alt="<?= $book['title'] ?>" class="w-40 h-61 object-cover rounded mb-2 mx-auto">
                    <h3 class="font-bold text-lg text-white"><?= $book['title'] ?></h3>
                    <p class="text-sm text-gray-300"><?= $book['author'] ?></p>
                </div>
            </a>
        <?php endforeach; ?>
        <?php else: ?>
            <p>No books found in this category.</p>
        <?php endif; ?>
    </div>
</main>
</body>
</html>
