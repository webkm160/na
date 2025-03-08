<?php
include 'session.php';
include 'connection.php';
include 'header.php'; 
// Add practice_area
if (isset($_POST['add_practice_area'])) {
    $question = $_POST['question'];
    $answer = $_POST['answer'];
 

    $question = mysqli_real_escape_string($conn, $question);
$answer = mysqli_real_escape_string($conn, $answer);



    $sql = "INSERT INTO practice_area (question, answer) VALUES ('$question', '$answer')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>New practice area added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Edit practice_area
if (isset($_POST['edit_practice_area'])) {
    $id = $_POST['id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
  

    $question = mysqli_real_escape_string($conn, $question);
$answer = mysqli_real_escape_string($conn, $answer);



    $sql = "UPDATE practice_area SET question='$question', answer='$answer' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>practice area updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Delete practice_area
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM practice_area WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>practice area deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Get all practice_areas
$sql = "SELECT * FROM practice_area";
$result = $conn->query($sql);
?>
    <div class="content">
        <h2 class="mb-4">Practice Area Management</h2>
        
        <!-- Button to trigger Add practice_area modal -->
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addpractice_areaModal">Add New Practice Area</button>

        <!-- practice_area List -->
        <div class="card">
            <div class="card-header">
                <h4>Practice Area List</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['question']; ?></td>
                                <td><?php echo $row['answer']; ?></td>
                               
                                <td>
                                    <!-- Button to trigger Edit practice_area modal -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editpractice_areaModal" data-id="<?php echo $row['id']; ?>" data-question="<?php echo $row['question']; ?>" data-answer="<?php echo $row['answer']; ?>" data-category="<?php echo $row['category']; ?>">Edit</button>
                                    <!-- Delete Button -->
                                    <a href="pa.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this practice_area?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add practice_area Modal -->
        <div class="modal fade" id="addpractice_areaModal" tabindex="-1" aria-labelledby="addpractice_areaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addpractice_areaModalLabel">Add New practice_area</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="pa.php" method="POST">
                            <div class="mb-3">
                                <label for="question" class="form-label">Question</label>
                                <input type="text" class="form-control" name="question" required>
                            </div>
                            <div class="mb-3">
                                <label for="answer" class="form-label">Answer</label>
                                <textarea class="form-control" name="answer" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="add_practice_area">Add Practice Area</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit practice_area Modal -->
        <div class="modal fade" id="editpractice_areaModal" tabindex="-1" aria-labelledby="editpractice_areaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editpractice_areaModalLabel">Edit Practice Area</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="pa.php" method="POST">
                            <input type="hidden" name="id" id="editId">
                            <div class="mb-3">
                                <label for="editQuestion" class="form-label">Question</label>
                                <input type="text" class="form-control" name="question" id="editQuestion" required>
                            </div>
                            <div class="mb-3">
                                <label for="editAnswer" class="form-label">Answer</label>
                                <textarea class="form-control" name="answer" id="editAnswer" required></textarea>
                            </div>
                           
                            <button type="submit" class="btn btn-success" name="edit_practice_area">Update Practice Area</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script>
        // Populate Edit Modal with selected practice_area details
        const editpractice_areaModal = document.getElementById('editpractice_areaModal');
        editpractice_areaModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const question = button.getAttribute('data-question');
            const answer = button.getAttribute('data-answer');
            const category = button.getAttribute('data-category');

            const modalBody = editpractice_areaModal.querySelector('.modal-body');
            modalBody.querySelector('#editId').value = id;
            modalBody.querySelector('#editQuestion').value = question;
            modalBody.querySelector('#editAnswer').value = answer;
            modalBody.querySelector('#editCategory').value = category;
        });
    </script>
<?php include 'footer.php'; ?>
