<?php
require_once 'app/core/functions.php';

class reports extends Controller {

    public function __construct() {
        if (!is_admin()) {
            header('Location: /home');
            exit();
        }
    }

    public function index() {
        $reminderModel = $this->model('Reminder');
        $logModel = $this->model('Log');

        $reminders = $reminderModel->get_all_reminders();
        $mostReminders = $reminderModel->get_user_with_most_reminders();
        $loginCounts = $logModel->get_login_counts();

        $this->view('reports/index', [
            'reminders' => $reminders,
            'mostReminders' => $mostReminders,
            'loginCounts' => $loginCounts
        ]);
    }
}
