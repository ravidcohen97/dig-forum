<?php 

session_start();
require_once 'app/helpers.php';
$page_title = 'Blog Page';
$link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PWD, MYSQL_DB);
$sql = "SELECT u.name,u.profile_image,p.* FROM posts p 
        JOIN users u ON u.id = p.user_id 
        ORDER BY p.date DESC";

$result = mysqli_query($link, $sql);

?>

<?php include('tpl/header.php'); ?>

<main class="min-h-900">
  <div class="container mt-3">
    <div class="row">
      <div class="col-12">
        <h1 class="display-4">DIGG Blog Page</h1>
        <p>We digg and digg and digg...</p>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <?php if( isset($_SESSION['user_id']) ): ?>
        <a class="btn btn-primary" href="add_post.php">+ Add New Post</a>
        <?php else: ?>
        <span>Want to start digg?</span><br>
        <a href="signup.php">signup now!</a>
        <?php endif; ?>
      </div>
    </div>
    <?php if( mysqli_num_rows($result) > 0 ): ?>
    <div class="row">
      <?php while($post = mysqli_fetch_assoc($result)): ?>
      <div class="col-12 mt-3">
        <div class="card">
          <div class="card-header">
            <img class="rounded-circle" src="images/<?= $post['profile_image']; ?>" width="50">
            <span><?= htmlentities($post['name']); ?></span>
            <span class="float-end"><?= date('d/m/Y H:i:s', strtotime($post['date'])); ?></span>
          </div>
          <div class="card-body">
            <h5 class="card-title"><?= htmlentities($post['title']); ?></h5>
            <p class="card-text"><?= str_replace("\n", '<br>', htmlentities($post['article'])); ?></p>
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $post['user_id'] ): ?>
            <div class="dropdown float-end">
              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                aria-expanded="false">
                Post Options
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li>
                  <a class="dropdown-item" href="edit_post.php?pid=<?= $post['id']; ?>">Edit</a>
                </li>
                <li>
                  <a id="delete-post-btn" class="dropdown-item" href="delete_post.php?pid=<?= $post['id']; ?>">
                    Delete
                  </a>
                </li>
              </ul>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
</main>

<?php include('tpl/footer.php'); ?>