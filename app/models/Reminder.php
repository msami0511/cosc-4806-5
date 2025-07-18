<?php

class Reminder {

    public function get_all_reminders() {
        $db = db_connect();
        $stmt = $db->prepare("SELECT * FROM reminders ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_reminder_by_id($id) {
        $db = db_connect();
        $stmt = $db->prepare("SELECT * FROM reminders WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create_reminder($user_id, $subject) {
        $db = db_connect();
        $stmt = $db->prepare("INSERT INTO reminders (user_id, subject, created_at) VALUES (:user_id, :subject, NOW())");
        $stmt->bindValue(':user_id', $user_id);
        $stmt->bindValue(':subject', $subject);
        $stmt->execute();
    }

    public function update_reminder($id, $subject) {
        $db = db_connect();
        $stmt = $db->prepare("UPDATE reminders SET subject = :subject WHERE id = :id");
        $stmt->bindValue(':subject', $subject);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function delete_reminder($id) {
        $db = db_connect();
        $stmt = $db->prepare("DELETE FROM reminders WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public function get_user_with_most_reminders() {
        $db = db_connect();
        $stmt = $db->prepare("SELECT user_id, COUNT(*) as total 
                              FROM reminders 
                              GROUP BY user_id 
                              ORDER BY total DESC 
                              LIMIT 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
