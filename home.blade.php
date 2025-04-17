<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<!-- Sidebar -->
<div class="button">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
</div>
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close</button>
  <a href="home" class="w3-bar-item w3-button">Home</a>
  <a href="login" class="w3-bar-item w3-button">Logout</a>
</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
<body>
    <h1>Welcome</h1>
<form method="POST" action="{{ route('librarian.home') }}"></form>
<a href="dashboard">
  <button type="button"class="homebutton">Book Borrowing Overview</button>
</a>
<a href="request">
  <button type="button"class="homebutton">Book Pending Requests</button>
</a>
</body>