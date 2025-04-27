
<?php    
$servername = "localhost";
$username = "root";
$password = "";
$db = "cms";
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
	$tag="";
	if (isset($_GET['tag']))
	$tag=$_GET['tag'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>MARWADI UNIVERSITY</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="jquery-1.11.0.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>
<link rel="icon" type="image/jpg" href="images/fab.jpg">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css"/>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/hoome.css" />
</head>

<body>
    
    <div class="logout_btn">
        <a href="index.php" class="btnis">Logout <i class="icon-white icon-check"></i></a>
    </div>
    
    <div class="img_home_pos">
        <a href="header.php"><img src="images/logo.png" height="40"/></a>
    </div><br>
                        
                        <div class="dropdownmenu_container">
                            <?php        
                            include './drop_down_menu.php';
                            ?>
                        </div>
		
		<div class="container_middle">		
			
			<div class="container_show_post">
				<?php
   						if($tag=="home" or $tag=="")
							include("home.php");
                        elseif($tag=="student_entry")
							include("pages/students/Students_Entry.php");
                        elseif($tag=="teachers_entry")
                            // include("Teachers_Entry.php");
							include("pages/teacher/Teachers_Entry.php");
                        elseif($tag=="score_entry")
                            // include("Score_Entry.php");	
							include("pages/grades/Score_Entry.php");
                        elseif($tag=="subject_entry")
                            // include("Subject_Entry.php");
							include("pages/courses/Subject_Entry.php");
                        elseif($tag=="faculties_entry")
                            // include("Faculties_Entry.php");
							include("pages/faculties/Faculties_Entry.php");
                        elseif($tag=="susers_entry")
                            include("Users_Entry.php");	
                        elseif($tag=="view_students")
                            include("pages/students/View_Students.php");
						elseif($tag=="view_teachers")
							include("pages/teacher/View_Teachers.php");
						elseif($tag=="view_subjects")
							include("pages/courses/View_Subjects.php");
						elseif($tag=="view_scores")
							include("pages/grades/View_Scores.php");
						elseif($tag=="view_users")
							include("View_Users.php");
						elseif($tag=="view_faculties")
							include("pages/faculties/View_Faculties.php");
						elseif($tag=="test_score")
							include("test_Scores.php");	
							/*$tag= $_REQUEST['tag'];
							
							/*if(empty($tag)){
								include ("Students_Entry.php");
							}
							else{
								include $tag;
							}*/
									
                        ?>
                    </div>
		</div>                
	</div>
</body>
</html>