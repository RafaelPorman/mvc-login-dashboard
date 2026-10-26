<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main class="card">
        <h1>Dashboard</h1>
        <p>Selamat datang, <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?>!</p>
        <p class="muted">Anda berhasil login sebagai <?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?>.</p>

        <form method="post">
            <input type="hidden" name="action" value="logout">
            <button class="secondary" type="submit">Keluar</button>
        </form>
    </main>
</body>
</html>
