<?php
if(!empty($_GET['tab']))  { $tab = $_GET['tab'];
?>
<ul>
<?php
if($tab == 1)
print <<<END
<li class="current"><a href="index.php" >Projects</a></li>
<li><a href="publish_category.php">Publish Category</a></li>
<li><a href="home.php">Home</a></li>
<li><a href="About.php">About Us</a></li>
<li><a href="manage_users.php">Users</a></li>
<li><a href="login.php?do=logout">Logout</a></li>
END;


if($tab == 2)
print <<<END
<li><a href="index.php" >Projects</a></li>
<li><a href="publish_category.php">Publish Category</a></li>
<li><a href="home.php">Home</a></li>
<li class="current"><a href="About.php">About Us</a></li>
<li><a href="manage_users.php">Users</a></li>
<li><a href="login.php?do=logout">Logout</a></li>
END;


if($tab == 3)
print <<<END
<li><a href="index.php" >Projects</a></li>
<li><a href="publish_category.php">Publish Category</a></li>
<li><a href="home.php">Home</a></li>
<li><a href="About.php">About Us</a></li>
<li class="current"><a href="manage_users.php">Users</a></li>
<li><a href="login.php?do=logout">Logout</a></li>
END;

if($tab == 4)
print <<<END
<li><a href="index.php" >Projects</a></li>
<li><a href="publish_category.php">Publish Category</a></li>
<li class="current"><a href="home.php">Home</a></li>
<li><a href="About.php">About Us</a></li>
<li><a href="manage_users.php">Users</a></li>
<li><a href="login.php?do=logout">Logout</a></li>
END;

if($tab == 5)
print <<<END
<li><a href="index.php" >Projects</a></li>
<li class="current"><a href="publish_category.php">Publish Category</a></li>
<li><a href="home.php">Home</a></li>
<li><a href="About.php">About Us</a></li>
<li><a href="manage_users.php">Users</a></li>
<li><a href="login.php?do=logout">Logout</a></li>
END;



}
?>
</ul>