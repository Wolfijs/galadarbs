<?php
require_once 'db.php';

class CommentHandler {
    private $db;

    public function __construct() {
        // Create a new Database instance
        $this->db = new Database();
    }

    public function submitComment($name, $email, $message) {
        // Get database connection
        $conn = $this->db->getConnection();

        // Prepare and execute the SQL query
        $stmt = $conn->prepare("INSERT INTO comments (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        $stmt->execute();

        // Close the statement
        $stmt->close();

        // Close the database connection
        $this->db->closeConnection();

        return "Comment submitted successfully!";
    }
}

// Check if the request is made via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Create a new CommentHandler instance
    $commentHandler = new CommentHandler();

    // Submit the comment
    $result = $commentHandler->submitComment($name, $email, $message);

    // Return the result
    echo json_encode(['message' => $result]);
}
?>
