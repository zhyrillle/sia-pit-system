<?php
session_start();

include('books.php');

$book_id = isset($_GET['book_id']) ? $_GET['book_id'] : null;

// pampa check if ga exist ang book id
if ($book_id && isset($books[$book_id])) {
    $book = $books[$book_id];
} else {
    $book = null; 
}

// Add to cart function
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
    $book_id = $_POST['book_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!in_array($book_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $book_id;
    }

    header("Location: book-details.php?book_id=" . $book_id);
    exit();
}

// Add to bookmarks function
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_bookmarks') {
    $book_id = $_POST['book_id'];

    if (!isset($_SESSION['bookmarks'])) {
        $_SESSION['bookmarks'] = [];
    }

    if (!in_array($book_id, $_SESSION['bookmarks'])) {
        $_SESSION['bookmarks'][] = $book_id;
    } else {
        $_SESSION['bookmarks'] = array_diff($_SESSION['bookmarks'], [$book_id]);
    }

    header("Location: book-details.php?book_id=" . $book_id);
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Book Details</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="js/script.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<?php include 'routes/navbar.php'; ?>

<main class="min-h-screen flex justify-center items-start p-5 bg-[#BF9264]">
  <?php if ($book): ?>
    <div class="flex gap-10 bg-white p-8 rounded shadow w-full max-w-4xl">

    <!-- Book Cover-->
      <div class="flex-none text-center">
        <img src="<?= $book['image']; ?>" alt="<?= $book['title']; ?>" class="w-72 h-auto object-cover rounded">
        
    <!-- Rating--> 
        <p class="mt-4 text-sm">How was your reading?</p>
        <div class="flex items-center justify-center space-x-1 text-2xl text-gray-400" id="starRating">
          <span class="cursor-pointer" data-value="1">☆</span>
          <span class="cursor-pointer" data-value="2">☆</span>
          <span class="cursor-pointer" data-value="3">☆</span>
          <span class="cursor-pointer" data-value="4">☆</span>
          <span class="cursor-pointer" data-value="5">☆</span>
        </div>
        <input type="hidden" id="ratingValue" name="rating" />
      </div>

      <!-- Book Details -->
      <div class="flex-1">
        <h2 class="text-2xl font-bold mb-2"><?= $book['title']; ?></h2>
        <p class="text-sm text-gray-600 mb-1">By <span class="font-medium"><?= $book['author']; ?></span></p>
        <p class="text-sm text-gray-500 italic mb-2"><?= $book['genre']; ?></p>
        <p class="text-gray-700 mb-4 text-sm max-h-40 overflow-y-auto"><?= $book['description']; ?></p>

        <!-- Add to Bookmarks Button -->
        <div class="space-y-4">
            <form action="book-details.php?book_id=<?= $book['book_id']; ?>" method="POST">
            <input type="hidden" name="book_id" value="<?= $book['book_id']; ?>" />
            <input type="hidden" name="action" value="add_to_bookmarks" />
        
        <?php $in_bookmarks = in_array($book['book_id'], $_SESSION['bookmarks'] ?? []); ?>

        <button 
            type="submit" 
            class="w-64 py-2 text-white font-semibold rounded flex items-center justify-center space-x-2 transition 
            <?= $in_bookmarks ? 'bg-gray-400 cursor-not-allowed' : 'bg-[#BF9264] hover:bg-[#a8774f]' ?>"
            <?= $in_bookmarks ? 'disabled' : '' ?>
        >
            <i class="fas fa-heart text-white"></i>
            <span><?= $in_bookmarks ? 'Added to Bookmark' : 'Add to Bookmark' ?></span>
        </button>
    </form>

    <!-- Add to cart Button  -->
    <?php $in_cart = in_array($book['book_id'], $_SESSION['cart'] ?? []); ?>
    <form action="book-details.php?book_id=<?= $book['book_id']; ?>" method="POST">
        <input type="hidden" name="book_id" value="<?= $book['book_id']; ?>" />
        <input type="hidden" name="action" value="add_to_cart" />
        <button 
            type="submit" 
            class="w-64 py-2 font-semibold rounded 
            <?= $in_cart ? 'bg-gray-400 cursor-not-allowed text-white' : 'bg-green-400 text-white' ?>"
            <?= $in_cart ? 'disabled' : '' ?>>
            <?= $in_cart ? 'Pending Request' : 'Borrow Book' ?>
        </button>
    </form>
</div>
</div>
        <?php else: ?>
            <p>Book not found.</p>
        <?php endif; ?>
    </main>

<script src="script.js"></script>
</body>
</html>
