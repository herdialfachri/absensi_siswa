<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome, <?= session()->get('username') ?></h1>
        <h2>Dashboard Admin</h2>
        <p>This is the Admin dashboard. Manage your site here.</p>
        <a href="/auth/logout" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
