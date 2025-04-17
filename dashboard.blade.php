<?php
date_default_timezone_set('Asia/Manila');

$request = [
    1 => [
        'id' => 1,
        'title' => 'Harry Potter',
        'author' => 'JK Rowling',
        'number' => '1',
        'student_id' => '001',
        'first_name' => 'Nikol',
        'last_name' => 'Liebling',
        'status' => 'pending',
        'date_time' => now()->format('Y/m/d h:i:a') 
    ],
    2 => [
        'id' => 2,
        'title' => 'The Hobbit',
        'author' => 'J.R.R. Tolkien',
        'number' => '2',
        'student_id' => '002',
        'first_name' => 'Jane',
        'last_name' => 'Bernice',
        'status' => 'pending',
        'date_time' => now()->format('Y/m/d h:i:a')
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        table { width: max-content; border-collapse: collapse; background: white; }
        th, td { padding: 12px; border: 1px solid #ccc; text-align: center; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .borrowed { background-color: lightblue; }
        .pending { background-color: lightyellow; }
        .overdue { background-color: lightcoral; }
        .returned { background-color: lightgreen; }
    </style>
</head>
<body>
    <div class="button">
        <button onclick="w3_open()">☰</button>
    </div>
    <div style="display:none" id="mySidebar">
        <button onclick="w3_close()" >Close</button>
        <a href="home" >Home</a>
        <a href="login" >Logout</a>
    </div>

    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
        }
        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>
    <h1>Library Summary Dashboard</h1>
    <form method="POST" action="{{ route('librarian.dashboard') }}"></form>

    <table class="status">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($request as $item)
            <tr>
                <td>{{ $item['student_id'] }}</td>
                <td>{{ $item['first_name'] }} {{ $item['last_name'] }}</td>
                <td class="status-cell {{ $item['status'] }}">{{ ucfirst($item['status']) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>