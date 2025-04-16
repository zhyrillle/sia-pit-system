<?php
session_start();  // Start the session to track bookmarks

// Include the books array
include('books.php');

// Remove book from bookmarks if "remove" button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_book_id'])) {
    $book_id_to_remove = $_POST['remove_book_id'];

    // Remove book from session bookmarks
    if (($key = array_search($book_id_to_remove, $_SESSION['bookmarks'] ?? [])) !== false) {
        unset($_SESSION['bookmarks'][$key]);
    }
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

<main class="min-h-screen flex justify-center items-start p-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php if (!empty($_SESSION['bookmarks'])): ?>
                <?php foreach ($_SESSION['bookmarks'] as $book_id): ?>
                    <?php if (isset($books[$book_id])): ?>
                        <div class="bg-white p-4 rounded shadow">
                            <img src="<?= $books[$book_id]['image']; ?>" alt="<?= $books[$book_id]['title']; ?>" class="w-40 h-61 object-cover rounded">
                            <h3 class="font-bold text-lg"><?= $books[$book_id]['title']; ?></h3>
                            <p class="text-sm text-gray-600"><?= $books[$book_id]['author']; ?></p>
                            <p class="mt-2 text-sm"><?= $books[$book_id]['description']; ?></p>

                            <!-- Remove from bookmarks using bookmark icon -->
                            <form action="bookmarks.php" method="POST">
                                <input type="hidden" name="remove_book_id" value="<?= $book_id; ?>" />
                                <button type="submit" class="text-red-500 flex items-center space-x-2">
                                    <i class="fas fa-bookmark"></i>
                                    <span>Remove</span>
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No bookmarks found.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
