<!DOCTYPE html>
<html lang="en" class="bg-gray-100">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Profile - MyLibrary</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="js/script.js"></script>
</head>
<body>

  <?php include 'routes/navbar.php'; ?>

  <main class="p-8">
    <h2 class="text-2xl font-bold mb-6">Edit Profile</h2>
  <form action="#" method="POST" class="max-w-xl bg-white p-6 rounded shadow">
    <div class="mb-4">
      <label class="block mb-1 font-medium">Full Name</label>
      <input type="text" class="w-full border rounded p-2" required />
    </div>
    <div class="mb-4">
      <label class="block mb-1 font-medium">Email</label>
      <input type="email" class="w-full border rounded p-2" required />
    </div>
    <div class="mb-6">
      <label class="block mb-1 font-medium">New Password</label>
      <input type="password" class="w-full border rounded p-2" />
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Changes</button>
  </form>
  </main>
</body>
</html>
