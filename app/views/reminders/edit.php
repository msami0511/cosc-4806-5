<?php require_once 'app/views/templates/header.php'; ?>

<div class="container">
  <h2>Edit Reminder</h2>

  <form method="post" action="/reminders/edit/<?= htmlspecialchars($data['reminder']['id']) ?>">
    <label for="subject">Subject:</label><br>
    <input type="text" name="subject" id="subject" required value="<?= htmlspecialchars($data['reminder']['subject']) ?>"><br><br>
    <button type="submit">Update</button>
  </form>

  <p><a href="/reminders">Back to Reminders</a></p>
</div>

<?php require_once 'app/views/templates/footer.php'; ?>
