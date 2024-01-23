<?php

class CommentDatabase
{
    private $database;

    public function __construct()
    {
        require_once 'db.php';
        $this->database = new Database();
    }

    public function getAllComments()
    {
        $conn = $this->database->getConnection();

        $query = "SELECT * FROM comments";
        $result = $conn->query($query);

        if ($result) {
            $comments = $result->fetch_all(MYSQLI_ASSOC);
            $this->database->closeConnection();
            return $comments;
        } else {
            // Handle query error
            $this->database->closeConnection();
            return ['error' => 'Unable to fetch comments'];
        }
    }
}

// Create an instance of the CommentDatabase class
$commentDatabase = new CommentDatabase();

// Fetch all comments and return them as JSON
header('Content-Type: application/json');
echo json_encode($commentDatabase->getAllComments());
