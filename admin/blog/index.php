<?php
include '../session.php';
include '../connection.php';
include '../header.php';
// Get all Blog Posts
$sql_blog = "SELECT * FROM blog";
$blog_result = $conn->query($sql_blog);

// Get all Categories for Blog
$sql_category = "SELECT * FROM categories";
$category_result = $conn->query($sql_category);

// Delete Blog Post
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM blog WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Blog post deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}
?>


    <div class="content mt-5">
        <h2 class="mb-4">Blog Post Management</h2>

        <!-- Button to trigger Add Blog page -->
        <a href="add.php" class="btn btn-primary mb-4">Add New Blog Post</a>

        <!-- Blog Post List -->
        <div class="card">
            <div class="card-header">
                <h4>Blog Post List</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $blog_result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php 
                                    $category_id = $row['category_id'];
                                    $category_query = "SELECT name FROM categories WHERE id = $category_id";
                                    $category_result = $conn->query($category_query);
                                    $category = $category_result->fetch_assoc();
                                    echo $category['name']; 
                                    ?></td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <!-- Delete Button -->
                                    <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog post?')">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <?php include '../footer.php'; ?>