<?php
if (isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
    header('Location: /home');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="/favicon.png">
    <title>COSC 4806</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">COSC 4806</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#publicNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="publicNavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
      </ul>
    </div>
  </div>
</nav>
