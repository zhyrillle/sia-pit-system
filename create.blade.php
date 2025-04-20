<!-- First Add User Form -->
<h1>Add New User</h1>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Add User</button>
</form>

<!-- Second Add User Form -->
<h1>Add New User</h1>

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label>Name:</label>
    <input type="text" name="name"><br>

    <label>Email:</label>
    <input type="email" name="email"><br>

    <label>Password:</label>
    <input type="password" name="password"><br>

    <button type="submit">Save</button>
</form>
