  <?php
  class Reminders extends Controller {

      public function index() {
          if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
              header('Location: /login');
              exit;
          }

          $reminderModel = $this->model('Reminder');
          $reminders = $reminderModel->get_all_reminders();
          $this->view('reminders/index', ['reminders' => $reminders]);
      }

          public function create() {
              if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
                  header('Location: /login');
                  exit;
              }

              if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  $subject = trim($_POST['subject']);
                  $userId = $_SESSION['user_id'];

                  $reminderModel = $this->model('Reminder');
                  $reminderModel->create_reminder($userId, $subject);


              } else {
                  $this->view('reminders/create');
              }
          }

      public function edit($id) {
          if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
              header('Location: /login');
              exit;
          }

          $reminderModel = $this->model('Reminder');
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              $subject = trim($_POST['subject']);
              $reminderModel->update_reminder($id, $subject);

              header('Location: /reminders');
              exit();
          } else {
              $reminder = $reminderModel->get_reminder_by_id($id);
              $this->view('reminders/edit', ['reminder' => $reminder]);
          }
      }

      public function delete($id) {
          if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
              header('Location: /login');
              exit;
          }

          $reminderModel = $this->model('Reminder');
          $reminderModel->delete_reminder($id);

          header('Location: /reminders');
          exit();
      }
  }
