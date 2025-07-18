    <?php
    if (!isset($_SESSION['auth'])) {
        header('Location: /login');
        exit();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>COSC 4806</title>
        <link rel="icon" href="/favicon.png" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">COSC 4806</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/reminders">Reminders</a></li>
            <li class="nav-item"><a class="nav-link" href="/reminders/create">Create Reminder</a></li>
            <li class="nav-item"><a class="nav-link" href="/about">About Me</a></li>
            <?php if (function_exists('is_admin') && is_admin()): ?>
              <li class="nav-item"><a class="nav-link" href="/reports">Reports</a></li>
            <?php endif; ?>
            <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
