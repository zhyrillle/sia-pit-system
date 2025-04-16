<?php
session_start();

// Include the books array
include('books.php');

// Get the book ID from the URL
$book_id = isset($_GET['book_id']) ? $_GET['book_id'] : null;

// Check if the book exists in the array
if ($book_id && isset($books[$book_id])) {
    $book = $books[$book_id];  // Set the book based on the ID
} else {
    $book = null;  // If no book found
}

// Add to cart logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
    $book_id = $_POST['book_id'];

    // Ensure the cart session is initialized if not already
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add the book to the cart only if it's not already in the cart
    if (!in_array($book_id, $_SESSION['cart'])) {
        $_SESSION['cart'][] = $book_id;
    }

    // Redirect back to the book details page after adding to cart
    header("Location: book-details.php?book_id=" . $book_id);
    exit();  // Always call exit after a redirect to stop further code execution
}

// Add to bookmarks logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_bookmarks') {
    $book_id = $_POST['book_id'];

    // Ensure the bookmarks session is initialized if not already
    if (!isset($_SESSION['bookmarks'])) {
        $_SESSION['bookmarks'] = [];
    }

    // Add the book to the bookmarks if it's not already bookmarked
    if (!in_array($book_id, $_SESSION['bookmarks'])) {
        $_SESSION['bookmarks'][] = $book_id;
    } else {
        // If the book is already bookmarked, remove it from bookmarks
        $_SESSION['bookmarks'] = array_diff($_SESSION['bookmarks'], [$book_id]);
    }

    // Redirect back to the book details page after adding/removing from bookmarks
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

      <!-- Book Image + Rating -->
      <div class="flex-none text-center">
        <img src="<?= $book['image']; ?>" alt="<?= $book['title']; ?>" class="w-72 h-auto object-cover rounded">
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

        <!-- Description with max height for long texts -->
        <p class="text-gray-700 mb-4 text-sm max-h-40 overflow-y-auto"><?= $book['description']; ?></p>


        <!-- Add to Bookmarks Button -->
        <div class="space-y-4">
    <!-- Bookmarks Button Form -->
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

    <!-- Cart Button Form (with gap between buttons) -->
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