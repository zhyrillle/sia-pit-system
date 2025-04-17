<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarian Login</title>
</head>
<body>
    <h1 class="header-line">Librarian Login</h1>
    <form method="POST" action="{{ route('librarian.login') }}">
        @csrf
        <div class="form-group">
            <label>Enter Username</label>
            <input class="form-control" type="text" name="username" autocomplete="off" required />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" autocomplete="off" required />
        </div>
        <button type="submit" name="login" class="btn btn-info">Login</button>
    </form>
</body>
</html>
