<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

</head>
<body>
<h1>List of Users</h1>

<ul>
    <?php foreach ($users as $user): ?>
        <li><?= $user['username']; ?></li>
    <?php endforeach; ?>
</ul>


</body>
</html>
