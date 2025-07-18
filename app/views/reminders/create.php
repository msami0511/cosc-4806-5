<?php require_once 'app/views/templates/header.php'; ?>

<h2>Create New Reminder</h2>

<form method="post" action="/reminders/create">
    <label for="subject">Subject:</label><br>
    <input type="text" name="subject" id="subject" required><br><br>
    <button type="submit">Create</button>
</form>

<?php require_once 'app/views/templates/footer.php'; ?>
