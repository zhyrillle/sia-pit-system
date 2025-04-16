  <!-- Navbar -->
  <nav class="bg-white shadow p-4 flex justify-between items-center">
    <a href="index.php" class="text-xl font-bold text-[#754E1A]">iduno sa title</a>

    <div class="flex items-center gap-4 -ml-10">
      <input type="text" placeholder="Search..." class="border p-2 rounded-lg w-[400px]" />

      <!-- Category Dropdown -->
      <div class="relative">
        <button id="categoryBtn" class="bg-[#754E1A] text-white px-4 py-2 rounded">Category</button>
        <ul id="categoryMenu" class="absolute hidden bg-white border mt-2 rounded shadow" style="width: 180px;" z-10>
          <!-- Original Categories -->
          <li class="p-2 font-semibold text-gray-700">By Genre:</li>
          <a href="category.php?genre=Literature">
            <li class="p-2 hover:bg-blue-100 cursor-pointer">Literature</li></a>
          <a href="category.php?genre=Philosophy">
            <li class="p-2 hover:bg-blue-100 cursor-pointer">Philosophy</li></a>
          <a href="category.php?genre=Mathematics">
            <li class="p-2 hover:bg-blue-100 cursor-pointer">Mathematics</li></a>
          <a href="category.php?genre=Science">
            <li class="p-2 hover:bg-blue-100 cursor-pointer">Science</li></a>
          <a href="category.php?genre=History">
            <li class="p-2 hover:bg-blue-100 cursor-pointer">History</li></a>
          <a href="category.php?genre=Computer Science">
            <li class="p-2 hover:bg-blue-100 cursor-pointer">Computer Science</li></a>
          <a href="category.php?genre=Engineering">
            <li class="p-2 hover:bg-blue-100 cursor-pointer">Engineering</li></a>
          <a href="category.php?genre=Medicine">
            <li class="p-2 hover:bg-blue-100 cursor-pointer">Medicine</li></a>
        </ul>
      </div>
      <script src="finals/js/script.js"></script>
      
      <!-- Bookmark -->
      <a href="bookmarks.php" title="Bookmarks">
        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" class="w-6 h-6" />
      </a>

      <!-- Cart -->
      <a href="cart.php" title="Cart">
        <img src="https://pic.onlinewebfonts.com/thumbnails/icons_556065.svg" class="w-6 h-6" />
      </a>

      <!-- New Contact Page Link -->
      <a href="contact.php" class="text-blue-500 hover:text-blue-700 flex items-center gap-2">
      <img src="https://cdn-icons-png.flaticon.com/512/724/724664.png" class="w-6 h-6" />
      </a>

      <!-- Profile Dropdown -->
      <div class="relative">
        <button id="profileBtn" class="bg-gray-200 px-3 py-2 rounded-full">👤</button>
        <ul id="profileMenu" class="absolute hidden right-0 bg-white mt-2 shadow rounded w-40">
          <li><a href="profile.php" class="block px-4 py-2 hover:bg-gray-100">Edit Profile</a></li>
          <li><a href="login.html" class="block px-4 py-2 hover:bg-gray-100">Logout</a></li>
        </ul>
      </div>

      <script src="finals/js/script.js"></script>

    </div>
  </nav>