<?php
include 'session.php';
include 'connection.php';
include 'header.php';

// Add Category
if (isset($_POST['add_category'])) {
    $name = $_POST['category_name'];
    $description = $_POST['category_description'];

    $sql = "INSERT INTO categories (name, description) VALUES ('$name', '$description')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Category added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Update Category
if (isset($_POST['update_category'])) {
    $id = $_POST['category_id'];
    $name = $_POST['category_name'];
    $description = $_POST['category_description'];

    $sql = "UPDATE categories SET name='$name', description='$description' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Category updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Get all Categories
$sql_category = "SELECT * FROM categories";
$category_result = $conn->query($sql_category);

// Delete Category
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM categories WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Category deleted successfully!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Get category details for editing
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $edit_sql = "SELECT * FROM categories WHERE id = $edit_id";
    $edit_result = $conn->query($edit_sql);
    $edit_row = $edit_result->fetch_assoc();
}
?>

<div class="content mt-5">
    <h2 class="mb-4">Category Management</h2>

    <!-- Button to trigger Add Category modal -->
    <button class="btn btn-info mb-4" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add New Category</button>

    <!-- Category List -->
    <div class="card">
        <div class="card-header">
            <h4>Category List</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $category_result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <a href="category.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="category.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="category.php" method="POST">
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="category_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="category_description" class="form-label">Description</label>
                            <textarea class="form-control" name="category_description" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="add_category">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal (only shown when editing) -->
    <?php if (isset($_GET['edit'])): ?>
        <div class="modal fade show" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true" style="display: block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="category.php" method="POST">
                            <input type="hidden" name="category_id" value="<?php echo $edit_row['id']; ?>">
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="category_name" value="<?php echo $edit_row['name']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_description" class="form-label">Description</label>
                                <textarea class="form-control" name="category_description" required><?php echo $edit_row['description']; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="update_category">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include 'footer.php'; ?>
