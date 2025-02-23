<?php
include '../session.php';
include '../connection.php';
include '../header.php';

// Add Blog Post
if (isset($_POST['add_blog'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['blog_category_id'];
    
    // Handle Image Upload
    $imagePath = ''; // Default to empty if no image is uploaded
    if (isset($_FILES['blog_image']) && $_FILES['blog_image']['error'] == 0) {
        // Get image details
        $imageName = $_FILES['blog_image']['name'];
        $imageTmpName = $_FILES['blog_image']['tmp_name'];
        $imageSize = $_FILES['blog_image']['size'];
        $imageError = $_FILES['blog_image']['error'];
      
        // Ensure the uploaded file is an image
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array($imageExt, $allowedExts)) {
            // Generate a unique name for the image to avoid conflicts
            $imageNewName = uniqid('', true) . '.' . $imageExt;
            $imageDestination = '../uploads/' . $imageNewName;
            
            // Move the uploaded image to the "uploads" folder
            if (move_uploaded_file($imageTmpName, $imageDestination)) {
                $imagePath = $imageDestination; // Store the image path to save in the database
            } else {
                $errorMessage = "Error uploading the image!";
            }
        } else {
            $errorMessage = "Invalid image type! Only jpg, jpeg, png, and gif are allowed.";
        }
    }
    
    // Insert blog post data along with the image path
    $sql = "INSERT INTO blog (title, content, category_id, image_path) VALUES ('$title', '$content', '$category_id', '$imagePath')";
    if ($conn->query($sql) === TRUE) {
        $successMessage = "Blog post added successfully!";
    } else {
        $errorMessage = "Error: " . $conn->error;
    }
}

// Get all Categories for Blog (same as before)
$sql_category = "SELECT * FROM categories";
$category_result = $conn->query($sql_category);
?>

<!-- Add Blog Form and content here... -->

    <div class="content mt-5">
        <h2 class="mb-4">Add New Blog Post</h2>

        <?php
        if (isset($successMessage)) {
            // Display success message if blog is added
            echo "<div class='alert alert-success'>$successMessage</div>";
        }
        if (isset($errorMessage)) {
            // Display error message if there was a problem
            echo "<div class='alert alert-danger'>$errorMessage</div>";
        }
        ?>

        <!-- Add Blog Form -->
        <form action="add.php" method="POST" id="addBlogForm" enctype="multipart/form-data" onsubmit="return saveContentBeforeSubmit()">
            <div class="mb-3">
                <label for="title" class="form-label">Blog Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" required></textarea>
            </div>
            <!-- Image Upload Field -->
        <div class="mb-3">
            <label for="blog_image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" name="blog_image" accept="image/*">
        </div>
            <div class="mb-3">
                <label for="blog_category_id" class="form-label">Category</label>
                <select class="form-control" name="blog_category_id" required>
                    <?php while($category = $category_result->fetch_assoc()): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="add_blog">Add Blog Post</button>
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

        // Redirect to blog listing page after successful addition with a delay
        <?php if (isset($successMessage)) { ?>
            setTimeout(function() {
                window.location.href = 'index.php'; // Redirect to blog listing page
            }, 3000); // Redirect after 3 seconds
        <?php } ?>
    </script>
 <?php include '../footer.php'; ?>