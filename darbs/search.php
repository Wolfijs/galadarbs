<?php

class CommentSearch {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function searchComments($searchTerm) {
        $conn = $this->db->getConnection();

        // Prepare and execute the search query
        $stmt = $conn->prepare("SELECT * FROM comments WHERE name LIKE ?");
        $searchTerm = "%" . $searchTerm . "%";
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch and return search results as JSON
        $searchResults = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();
        $this->db->closeConnection();

        return $searchResults;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $commentSearch = new CommentSearch();

    // Get search term from the query string
    $searchTerm = $_GET['searchTerm'];

    // Perform the search and return results as JSON
    $searchResults = $commentSearch->searchComments($searchTerm);
    echo json_encode($searchResults);
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Method not allowed."));
}
?>
