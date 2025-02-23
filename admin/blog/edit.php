<?php
include '../session.php';
include '../connection.php';
include '../header.php';

// Fetch the blog post data based on the id
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_blog = "SELECT * FROM blog WHERE id = $id";
    $result = $conn->query($sql_blog);
    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        // Redirect if the post is not found
        header('Location: index.php');
        exit();
    }
}

// Update the blog post
if (isset($_POST['edit_blog'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['blog_category_id'];

    // Check if a new image has been uploaded
    if (isset($_FILES['blog_image']) && $_FILES['blog_image']['error'] == 0) {
        // Handle Image Upload
        $imageName = $_FILES['blog_image']['name'];
        $imageTmpName = $_FILES['blog_image']['tmp_name'];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageExt, $allowedExts)) {
            // Generate a unique name for the image to avoid conflicts
            $imageNewName = uniqid('', true) . '.' . $imageExt;
            $imageDestination = '../uploads/' . $imageNewName;

            // Move the uploaded image to the "uploads" folder
            if (move_uploaded_file($imageTmpName, $imageDestination)) {
                $imagePath = $imageDestination;
            } else {
                $errorMessage = "Error uploading the image!";
            }
        } else {
            $errorMessage = "Invalid image type! Only jpg, jpeg, png, and gif are allowed.";
        }
    } else {
        // If no new image, retain the old image
        $imagePath = $post['image_path'];
    }

    // Update the blog post including the image path
    $sql_update = "UPDATE blog SET title = '$title', content = '$content', category_id = '$category_id', image_path = '$imagePath' WHERE id = $id";
    if ($conn->query($sql_update) === TRUE) {
        $successMessage = "Blog post updated successfully!";
    } else {
        $errorMessage = "Error: " . $conn->error;
    }
}

// Get all Categories for Blog (same as before)
$sql_category = "SELECT * FROM categories";
$category_result = $conn->query($sql_category);
?>

<div class="content mt-5">
    <h2 class="mb-4">Edit Blog Post</h2>

    <?php
    if (isset($successMessage)) {
        // Display success message if blog is updated
        echo "<div class='alert alert-success'>$successMessage</div>";
    }
    if (isset($errorMessage)) {
        // Display error message if there was a problem
        echo "<div class='alert alert-danger'>$errorMessage</div>";
    }
    ?>

    <!-- Edit Blog Form -->
    <form action="edit.php?id=<?php echo $id; ?>" method="POST" id="editBlogForm" enctype="multipart/form-data" onsubmit="return saveContentBeforeSubmit()">
        <div class="mb-3">
            <label for="title" class="form-label">Blog Title</label>
            <input type="text" class="form-control" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="content" required><?php echo htmlspecialchars($post['content']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="blog_category_id" class="form-label">Category</label>
            <select class="form-control" name="blog_category_id" required>
                <?php while ($category = $category_result->fetch_assoc()): ?>
                    <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $post['category_id']) ? 'selected' : ''; ?>>
                        <?php echo $category['name']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <!-- Display existing image if available -->
        <div class="mb-3">
            <label for="blog_image" class="form-label">Upload Image (Optional)</label>
            <?php if (!empty($post['image_path'])): ?>
                <div>
                    <img src="<?php echo $post['image_path']; ?>" alt="Current Image" style="max-width: 100px; height: auto; margin-bottom: 10px;">
                    <p>Current Image</p>
                </div>
            <?php endif; ?>
            <input type="file" class="form-control" name="blog_image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary" name="edit_blog">Update Blog Post</button>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

<!-- TinyMCE Initialization Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"></script>
<script>
    // Initialize TinyMCE editor
    tinymce.init({
        selector: 'textarea[name="content"]',
        height: 300,
        plugins: 'link image table code',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | link image | code',
        setup: function(editor) {
            editor.on('change', function() {
                tinymce.triggerSave(); // Ensure content is saved when changed
            });
        }
    });

    // Function to save TinyMCE content back to textarea before submitting
    function saveContentBeforeSubmit() {
        tinymce.triggerSave(); // Forces the editor to save content back into the textarea
        return true;
    }

    // Redirect to blog listing page after successful update with a delay
    <?php if (isset($successMessage)) { ?>
        setTimeout(function() {
            window.location.href = 'index.php'; // Redirect to blog listing page
        }, 3000); // Redirect after 3 seconds
    <?php } ?>
</script>

<?php include '../footer.php'; ?>
