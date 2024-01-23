<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dabrs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">
        <div class="box">
            <form id="commentForm">
                <label for="name">Name:</label>
                <input type="text" name="name">
                <span id="nameError" class="error"></span><br><br>

                <label for="email">Email:</label>
                <input type="email" name="email">
                <span id="emailError" class="error"></span><br><br>

                <label for="message">Message:</label>
                <textarea name="message"></textarea>
                <span id="messageError" class="error"></span><br><br>

                <input type="submit" value="Submit">
            </form>
        </div>

        <input type="text" id="searchInput" placeholder="Search by Name">
                <button type="button" id="searchButton">Search</button>


        <button id="sortButton">Sort Alphabetically</button>
        <div id="commentsContainer"></div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
        $(document).ready(function () {
            // Submit form using AJAX
            $("#commentForm").submit(function (e) {
                e.preventDefault();
                  
               
                $(".error").text("");

                
                var name = $("input[name='name']").val();
                var email = $("input[name='email']").val();
                var message = $("textarea[name='message']").val();
                 ///validacijas
                if (name.trim() === "") {
                    $("#nameError").text("Name is required.");
                    return;
                }

                if (email.trim() === "") {
                    $("#emailError").text("Email is required.");
                    return;
                }
                
                
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    $("#emailError").text("Please enter a valid email address.");
                    return;
                }

                if (message.trim() === "") {
                    $("#messageError").text("Message is required.");
                    return;
                }
                
                
                var htmlSpecialCharsRegex = /[<>]/;
                if (htmlSpecialCharsRegex.test(name) || htmlSpecialCharsRegex.test(message)) {
                    $("#nameError").text("Name and message cannot contain HTML special characters.");
                    return;
                }

                // inserts
                $.ajax({
                    type: "POST",
                    url: "http://localhost/darbs/insert.php",
                    data: $(this).serialize(),
                    success: function (response) {
                       
                        console.log(response); 
                        alert("Submission successful!");

                        // Clear input fields
                        $("input[name='name']").val("");
                        $("input[name='email']").val("");
                        $("textarea[name='message']").val("");

                        // Fetch and display comments again
                        fetchComments();
                    },
                    error: function (error) {
                        
                        console.error(error);
                        alert("An error occurred while submitting the form. Please try again later.");
                    }
                });
            });
              //fecth comments
            function fetchComments() {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/darbs/select.php",
                    dataType: "json",
                    success: function (comments) {
                        
                        comments.sort(function (a, b) {
                            var nameA = a.name.toUpperCase();
                            var nameB = b.name.toUpperCase(); 
                            return nameA.localeCompare(nameB);
                        });

                       
                        var commentsContainer = $("#commentsContainer");
                        commentsContainer.empty();

                        $.each(comments, function (index, comment) {
                            commentsContainer.append('<div><strong>Name:</strong> ' + comment.name + '<br><strong>Email:</strong> ' + comment.email + '<br><strong>Message:</strong> ' + comment.message + '<br><br></div>');
                        });
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            }

                    //seacrch


                    $("#searchButton").click(function () {
                var searchTerm = $("#searchInput").val();
                searchComments(searchTerm);
            });

            function searchComments(searchTerm) {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/darbs/search.php",
                    data: { searchTerm: searchTerm },
                    dataType: "json",
                    success: function (searchResults) {
                        displayComments(searchResults);
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            }






        

              // Event listener for the sort button
              $("#sortButton").click(function () {
    sortOrder = (sortOrder === 'asc') ? 'desc' : 'asc';
    if (searchTerm) {
        searchComments(searchTerm);
    } else {
        fetchComments();
    }
});

            fetchComments();

            
        });
    </script>

</body>
</html>
