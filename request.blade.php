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
        'date_time' => date("Y/m/d h:i:a")
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
        'date_time' => date("Y/m/d h:i:a")
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rent Request</title>
    <style>
        table { width: max-content; border-collapse: collapse; background: white; border-color: black;}
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

<h1>Rent Request</h1>
<form method="POST" action="librarian_request.php"> <table>
        <thead>
            <tr>
                <th>Staff name</th>
                <th>Book title</th>
                <th>Book author</th>
                <th>Book number</th>
                <th>Date and Time</th>
                <th>Student ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="requestform">
            <?php foreach ($request as $item): ?>
            <tr data-item-id="<?php echo $item['id']; ?>" data-current-status="<?php echo $item['status']; ?>">
                <td><input type="text" id="staffname" autocomplete="off" required /></td>
                <td><?php echo $item['title']; ?></td>
                <td><?php echo $item['author']; ?></td>
                <td><?php echo $item['number']; ?></td>
                <td><?php
                    echo $item['date_time'];
                    ?>
                </td>
                <td><?php echo $item['student_id']; ?></td>
                <td><?php echo $item['first_name']; ?></td>
                <td><?php echo $item['last_name']; ?></td>
                <td class="status-cell <?php echo $item['status']; ?>"><?php echo ucfirst($item['status']); ?></td>
                <td>
                    <?php if ($item['status'] === 'pending'): ?>
                        <button type="button" onclick="changeStatus('<?php echo $item['id']; ?>', 'borrowed', this)">Book</button>
                    <?php elseif ($item['status'] === 'borrowed'): ?>
                        <button type="button" onclick="changeStatus('<?php echo $item['id']; ?>', 'returned', this)">Returned</button>
                        <button type="button" onclick="changeStatus('<?php echo $item['id']; ?>', 'overdue', this)">Overdue</button>
                    <?php elseif ($item['status'] === 'overdue'): ?>
                        <button type="button" onclick="changeStatus('<?php echo $item['id']; ?>', 'returned', this)">Returned</button>
                    <?php elseif ($item['status'] === 'returned'): ?>
                        <button type="button" onclick="removeRequest('<?php echo $item['id']; ?>', this)">Remove</button>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>

<script>
function changeStatus(itemId, newStatus, btn) {
    const row = document.querySelector(`tr[data-item-id="${itemId}"]`);
    const statusCell = row.querySelector('.status-cell');
    row.dataset.currentStatus = newStatus;
    statusCell.textContent = capitalize(newStatus);
    statusCell.className = 'status-cell ' + newStatus;

    const actionCell = row.querySelector('td:last-child');
    actionCell.innerHTML = '';

    if (newStatus === 'borrowed') {
        actionCell.innerHTML = `
            <button type="button" onclick="changeStatus('${itemId}', 'returned', this)">Returned</button>
            <button type="button" onclick="changeStatus('${itemId}', 'overdue', this)">Overdue</button>`;
    } else if (newStatus === 'pending') {
        actionCell.innerHTML = `
            <button type="button" onclick="changeStatus('${itemId}', 'borrowed', this)">Book</button>
            <button type="button" onclick="changeStatus('${itemId}', 'overdue', this)">Overdue</button>
            <button type="button" onclick="removeRequest('${itemId}', this)">Returned</button>`;
    } else if (newStatus === 'overdue') {
        actionCell.innerHTML = `
            <button type="button" onclick="changeStatus('${itemId}', 'returned', this)">Returned</button>`;
    } else if (newStatus === 'returned') {
        actionCell.innerHTML = `
            <button type="button" onclick="removeRequest('${itemId}', this)">Remove</button>`;
    } else {
        actionCell.innerHTML = `<span></span>`;
    }
}

function removeRequest(itemId, btn) {
    const rowToRemove = btn.closest('tr');
    if (confirm(`Remove table ${itemId}?`)) { 
        if (rowToRemove) {
            rowToRemove.remove();
            console.log(`Request for item ID ${itemId} removed.`);
        }
    }
}

function capitalize(word) {
    return word.charAt(0).toUpperCase() + word.slice(1);
}
</script>

</body>
</html>