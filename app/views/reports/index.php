<?php require_once 'app/views/templates/header.php'; ?>

<div class="container">
    <h1>Admin Reports</h1>

    <h2>All Reminders</h2>
    <ul>
        <?php foreach ($data['reminders'] as $reminder): ?>
            <li><?= htmlspecialchars($reminder['subject']) ?> (User ID: <?= $reminder['user_id'] ?>)</li>
        <?php endforeach; ?>
    </ul>

    <h2>User with Most Reminders</h2>
    <p>
        User ID: <?= $data['mostReminders']['user_id'] ?? 'N/A' ?><br>
        Total Reminders: <?= $data['mostReminders']['total'] ?? '0' ?>
    </p>

    <h2>Total Logins by Username</h2>
    <ul>
        <?php foreach ($data['loginCounts'] as $login): ?>
            <li><?= htmlspecialchars($login['username']) ?>: <?= $login['count'] ?> logins</li>
        <?php endforeach; ?>
    </ul>

    <h2>Total Logins Chart</h2>
    <canvas id="loginChart" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const usernames = <?= json_encode(array_column($data['loginCounts'], 'username')); ?>;
const loginCounts = <?= json_encode(array_column($data['loginCounts'], 'count')); ?>;

const ctx = document.getElementById('loginChart').getContext('2d');
const loginChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: usernames,
        datasets: [{
            label: 'Number of Logins',
            data: loginCounts,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                precision: 0
            }
        }
    }
});
</script>

<?php require_once 'app/views/templates/footer.php'; ?>
