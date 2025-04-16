<?php
session_start();
include 'books.php'; // Make sure this file has your $books array

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_book_id'])) {
    $remove_id = $_POST['remove_book_id'];
    if (!empty($_SESSION['cart'])) {
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function($id) use ($remove_id) {
            return $id != $remove_id;
        });
    }
    // Optional: Redirect to avoid form resubmission
    header("Location: cart.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Borrowed Books</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="js/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<?php include 'routes/navbar.php'; ?>

<main class="p-8">
    <h1 class="text-2xl font-bold mb-6">Borrowed Books</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php foreach ($_SESSION['cart'] as $book_id): ?>
    <?php $book = $books[$book_id]; ?>
    <div class="bg-white p-4 rounded shadow">
      <h3 class="font-bold text-lg"><?= $book['title']; ?></h3>
      <p class="text-sm text-gray-600"><?= $book['author']; ?></p>

      <!-- Remove Button -->
      <form action="cart.php" method="POST" class="mt-2">
        <input type="hidden" name="remove_book_id" value="<?= $book_id; ?>" />
        <button type="submit" class="text-sm text-red-500 hover:underline">Remove</button>
      </form>

      <!-- Pending Request Label -->
      <p class="text-xs text-yellow-600 mt-1 italic">Pending Request</p>
    </div>
  <?php endforeach; ?>
</div>

        </main>
</body>
</html>
