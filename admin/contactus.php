<?php
include 'session.php'; // Include session handling
include 'connection.php'; // Include your database connection
include 'header.php'; // Include your header

// Fetch all contact messages from the database
$sql_contact = "SELECT * FROM contact_us ORDER BY created_at DESC"; // Fetch messages with recent first
$contact_result = $conn->query($sql_contact);
$query = "UPDATE contact_us SET status = 'read' WHERE status = 'unread'";
$conn->query($query);
?>

<div class="content mt-5">
    <h2 class="mb-4">Contact Us Messages</h2>
    <?php
    // Delete Contact Message
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql = "DELETE FROM contact_us WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Message deleted successfully!</div>";
            // Refresh the page after deletion
            echo "<script>setTimeout(function(){ window.location.href = 'contactus.php'; }, 1000);</script>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    }
    ?>
    <!-- Contact Messages List -->
    <div class="card">
        <div class="card-header">
            <h4>Contact Messages</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date Submitted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $contact_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <!-- Display a short preview of the message -->
                                <?php echo nl2br(strlen($row['message']) > 50 ? substr($row['message'], 0, 50) . '...' : $row['message']); ?>
                            </td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <!-- You can add a delete button if you want to remove messages -->
                                <a href="contactus.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this message?')">Delete</a>
                                <!-- Trigger the modal to show full message -->
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#messageModal_<?php echo $row['id']; ?>">View</button>
                            </td>
                        </tr>

                        <!-- Modal for full message -->
                        <div class="modal fade" id="messageModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="messageModalLabel_<?php echo $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="messageModalLabel_<?php echo $row['id']; ?>">Message from <?php echo $row['name']; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Full message content -->
                                        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                        <p><strong>Message:</strong></p>
                                        <p><?php echo nl2br($row['message']); ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'footer.php'; // Include footer ?>
