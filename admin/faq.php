<?php
include 'session.php';
include 'connection.php';
include 'header.php'; 
// Add FAQ
if (isset($_POST['add_faq'])) {
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $category = $_POST['category'];

    $question = mysqli_real_escape_string($conn, $question);
$answer = mysqli_real_escape_string($conn, $answer);
$category = mysqli_real_escape_string($conn, $category);


    $sql = "INSERT INTO faq (question, answer, category) VALUES ('$question', '$answer', '$category')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>New FAQ added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

// Edit FAQ
if (isset($_POST['edit_faq'])) {
    $id = $_POST['id'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    $category = $_POST['category'];

    $question = mysqli_real_escape_string($conn, $question);
$answer = mysqli_real_escape_string($conn, $answer);
$category = mysqli_real_escape_string($conn, $category);


    $sql = "UPDATE faq SET question='$question', answer='$answer', category='$category' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>FAQ updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Delete FAQ
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM faq WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>FAQ deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Get all FAQs
$sql = "SELECT * FROM faq";
$result = $conn->query($sql);
?>
    <div class="content">
        <h2 class="mb-4">FAQ Management</h2>
        
        <!-- Button to trigger Add FAQ modal -->
        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addFaqModal">Add New FAQ</button>

        <!-- FAQ List -->
        <div class="card">
            <div class="card-header">
                <h4>FAQ List</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['question']; ?></td>
                                <td><?php echo $row['answer']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td>
                                    <!-- Button to trigger Edit FAQ modal -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editFaqModal" data-id="<?php echo $row['id']; ?>" data-question="<?php echo $row['question']; ?>" data-answer="<?php echo $row['answer']; ?>" data-category="<?php echo $row['category']; ?>">Edit</button>
                                    <!-- Delete Button -->
                                    <a href="faq.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add FAQ Modal -->
        <div class="modal fade" id="addFaqModal" tabindex="-1" aria-labelledby="addFaqModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addFaqModalLabel">Add New FAQ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="faq.php" method="POST">
                            <div class="mb-3">
                                <label for="question" class="form-label">Question</label>
                                <input type="text" class="form-control" name="question" required>
                            </div>
                            <div class="mb-3">
                                <label for="answer" class="form-label">Answer</label>
                                <textarea class="form-control" name="answer" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" class="form-control" name="category">
                            </div>
                            <button type="submit" class="btn btn-primary" name="add_faq">Add FAQ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit FAQ Modal -->
        <div class="modal fade" id="editFaqModal" tabindex="-1" aria-labelledby="editFaqModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editFaqModalLabel">Edit FAQ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="faq.php" method="POST">
                            <input type="hidden" name="id" id="editId">
                            <div class="mb-3">
                                <label for="editQuestion" class="form-label">Question</label>
                                <input type="text" class="form-control" name="question" id="editQuestion" required>
                            </div>
                            <div class="mb-3">
                                <label for="editAnswer" class="form-label">Answer</label>
                                <textarea class="form-control" name="answer" id="editAnswer" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editCategory" class="form-label">Category</label>
                                <input type="text" class="form-control" name="category" id="editCategory">
                            </div>
                            <button type="submit" class="btn btn-success" name="edit_faq">Update FAQ</button>
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
        // Populate Edit Modal with selected FAQ details
        const editFaqModal = document.getElementById('editFaqModal');
        editFaqModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const question = button.getAttribute('data-question');
            const answer = button.getAttribute('data-answer');
            const category = button.getAttribute('data-category');

            const modalBody = editFaqModal.querySelector('.modal-body');
            modalBody.querySelector('#editId').value = id;
            modalBody.querySelector('#editQuestion').value = question;
            modalBody.querySelector('#editAnswer').value = answer;
            modalBody.querySelector('#editCategory').value = category;
        });
    </script>
<?php include 'footer.php'; ?>
