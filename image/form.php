<?php
$conn = mysqli_connect("localhost", "root", "", "school");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['upload'])){
    $title = $_POST['title'];
    $file = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $folder = "uploads/";
    if(!is_dir($folder)) mkdir($folder);

    $target_file = $folder . basename($file);

    if(move_uploaded_file($tmp, $target_file)){
        $sql = "INSERT INTO image_gallery (title, filename) VALUES ('$title', '$file')";
        if(mysqli_query($conn, $sql)){
            echo "Image uploaded successfully!";
        } else {
            echo "DB Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image!";
    }
}

$images = mysqli_query($conn, "SELECT * FROM image_gallery ORDER BY id DESC");
?>

<h1>Image Gallery</h1>

<!-- Upload Form -->
<form action="" method="post" enctype="multipart/form-data">
    Title: <input type="text" name="title" required>
    Image: <input type="file" name="image" accept="image/*" required>
    <button type="submit" name="upload">Upload</button>
</form>

<hr>

<!-- Display Images -->
<h2>Gallery</h2>
<div style="display:flex; flex-wrap:wrap;">
<?php while($row = mysqli_fetch_assoc($images)): ?>
    <div style="margin:10px; text-align:center;">
        <img src="uploads/<?php echo $row['filename']; ?>" width="150" height="150" alt="<?php echo $row['title']; ?>"><br>
        <?php echo $row['title']; ?>
    </div>
<?php endwhile; ?>
</div>

<?php mysqli_close($conn); ?>

<!-- CREATE TABLE image_gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    filename VARCHAR(255) NOT NULL
); -->