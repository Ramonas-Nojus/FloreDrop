<?php include "includes/header.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/add_product.css">
</head>

<?php 

if(isset($_SESSION['id']) && $_SESSION['id'] == 1){
    header("Location: index.php");
}

$products = new Products();

if(isset($_POST['submit'])){
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $description = $_POST['product_description'];
    $category = $_POST['product_category'];
    $image = $_FILES['product_image']['name'];
    $image_temp = $_FILES["product_image"]["tmp_name"];


    $products->postProduct($_SESSION['username'], $price, $name, $category, $image, $description, $image_temp);

}

?>

<body>
    <form action="add_product.php" method="post" enctype="multipart/form-data">
        <h2>Add Product</h2>

        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>

        <label for="product_price">Price:</label>
        <input type="number" id="product_price" name="product_price" step="0.01" required>

        <label for="product_description">Description:</label>
        <textarea id="product_description" name="product_description" rows="4" required></textarea>

        <!-- Add a label for the file input -->
        <label for="product_image">Product Image:</label>

        <!-- Create a custom file upload button -->
        <label class="custom-file-upload">
            Choose Image
            <input type="file" id="product_image" name="product_image" accept="image/*" onchange="previewImage(this);">
        </label>

        <!-- Display the image preview -->
        <img src="#" alt="Image Preview" class="image-preview" id="imagePreview" style="display: none;">

        <label for="product_category">Category:</label>
        <select id="product_category" name="product_category" required>
            <option value="rings">Rings</option>
            <option value="necklaces">necklaces</option>
            <option value="bracelets">bracelets</option>
        </select>

        <input type="submit" name="submit" value="Add Product">
    </form>

    <footer>
        <p>&copy; 2024 FloreDrop.</p>
    </footer>

    <script>
        function previewImage(input) {
            var imagePreview = document.getElementById('imagePreview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.style.display = 'block';
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                imagePreview.style.display = 'none';
            }
        }
    </script>
</body>

</html>
