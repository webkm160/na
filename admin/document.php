<?php
include 'session.php';
include 'connection.php';
include 'header.php';

// Add Document
if (isset($_POST['upload_document'])) {
    $file = $_FILES['document_file'];
    $file_name = basename($file['name']);
    $target_dir = "../documents/";
    $target_file = $target_dir . $file_name;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<div class='alert alert-danger'>Sorry, file already exists.</div>";
    } else {
        // Upload file
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            $sql = "INSERT INTO documents (document_name, document_path) VALUES ('$file_name', '$target_file')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'>Document uploaded successfully!</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
        }
    }
}

// Get all Documents
$sql_documents = "SELECT * FROM documents";
$document_result = $conn->query($sql_documents);

// Delete Document
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    // Get the document file path before deleting
    $sql = "SELECT document_path FROM documents WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $file_path = $row['document_path'];

    // Delete the file from server
    if (file_exists($file_path)) {
        unlink($file_path); // Delete file
    }

    // Delete the document record from database
    $sql = "DELETE FROM documents WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Document deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>

<div class="content mt-5">
    <h2 class="mb-4">Document Management</h2>

    <!-- Button to trigger Upload Document modal -->
    <button class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#uploadDocumentModal">Upload New Document</button>

    <!-- Document List -->
    <div class="card">
        <div class="card-header">
            <h4>Document List</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Document Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $document_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['document_name']; ?></td>
                            <td>
                            <a href="<?php echo $row['document_path']; ?>" target="_blank" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i> View</a>
                                <a href="document.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this document?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Upload Document Modal -->
    <div class="modal fade" id="uploadDocumentModal" tabindex="-1" aria-labelledby="uploadDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadDocumentModalLabel">Upload New Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="document.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="document_file" class="form-label">Choose Document</label>
                            <input type="file" class="form-control" name="document_file" required>
                        </div>
                        <button type="submit" class="btn btn-success" name="upload_document">Upload Document</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'footer.php'; ?>
