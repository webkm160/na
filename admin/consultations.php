<?php
include 'session.php'; // Include session handling
include 'connection.php'; // Include your database connection
include 'header.php'; // Include your header

// Fetch all consultation requests from the database
$sql_consultation = "SELECT * FROM consultations ORDER BY created_at DESC"; // Fetch messages with the most recent first
$consultation_result = $conn->query($sql_consultation);

// Mark messages as read (optional, depending on your requirements)
$query = "UPDATE consultations SET status = 'read' WHERE status = 'unread'";
$conn->query($query);
?>

<div class="content mt-5">
    <h2 class="mb-4">Consultation Requests</h2>
    <?php
    // Delete Consultation Request
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $sql = "DELETE FROM consultations WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>Consultation request deleted successfully!</div>";
            // Refresh the page after deletion
            echo "<script>setTimeout(function(){ window.location.href = 'consultations.php'; }, 1000);</script>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    }
    ?>

    <!-- Consultation Requests List -->
    <div class="card">
        <div class="card-header">
            <h4>Consultation Requests</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Whatsapp Number</th>
                        <th>Country</th>
                        <th>Case Detail</th>
                        <th>Consultation Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $consultation_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['contact_number']; ?></td>
                            <td><?php echo $row['whatsapp_number']; ?></td>
                            <td><?php echo $row['country']; ?></td>
                            <td>
                                <!-- Display a short preview of the case detail -->
                                <?php echo nl2br(strlen($row['case_detail']) > 50 ? substr($row['case_detail'], 0, 50) . '...' : $row['case_detail']); ?>
                            </td>
                            <td><?php echo $row['date']; ?> <?php echo $row['hour'] . ' ' . $row['ampm']; ?></td>
                            <td>
                                <!-- You can add a delete button if you want to remove requests -->
                                <a href="consultations.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this request?')">Delete</a>
                                <!-- Trigger the modal to show full consultation request -->
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#consultationModal_<?php echo $row['id']; ?>">View</button>
                            </td>
                        </tr>

                        <!-- Modal for full consultation request -->
                        <div class="modal fade" id="consultationModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="consultationModalLabel_<?php echo $row['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="consultationModalLabel_<?php echo $row['id']; ?>">Consultation Request from <?php echo $row['name']; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Full consultation request details -->
                                        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                        <p><strong>Case Detail:</strong></p>
                                        <p><?php echo nl2br($row['case_detail']); ?></p>
                                        <p><strong>Consultation Date:</strong> <?php echo $row['date']; ?> <?php echo $row['hour'] . ' ' . $row['ampm']; ?></p>
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
