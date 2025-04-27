<?php
$id1 = "";
$id2 = "";
$opr = "";

if (isset($_GET['opr'])) {
    $opr = $_GET['opr'];
}

if (isset($_GET['rs_id'])) {
    $id1 = $_GET['rs_id'];
}
if (isset($_GET['dd_id'])) {
    $id2 = $_GET['dd_id'];
}

// -------- Insert Data --------
if (isset($_POST['btn_sub'])) {
    $grade = $_POST['gradetxt'];
    $credits = $_POST['credits'];
    $s_id = $_POST['sid'];
    $c_id = $_POST['cid'];

    $sql_ins1 = mysqli_query($conn, "INSERT INTO gradecard VALUES('$grade', '$credits', '$s_id', '$c_id')");
    $sql_ins2 = mysqli_query($conn, "INSERT INTO register VALUES('$s_id', '$c_id')");

    if ($sql_ins1 && $sql_ins2) {
        $msg = "1 Row Inserted";
    } else {
        $msg = "Insert Error: " . mysqli_connect_error();
    }
}

// -------- Update Data --------
if (isset($_POST['btn_upd'])) {
    $grade = $_POST['gradetxt'];
    $credits = $_POST['credits'];
    $s_id = $_POST['sid'];
    $c_id = $_POST['cid'];

    $sql_update1 = mysqli_query($conn, "UPDATE gradecard SET grade='$grade', credits='$credits', s_id='$s_id', c_id='$c_id' WHERE s_id='$id1' AND c_id='$id2'");
    $sql_update2 = mysqli_query($conn, "UPDATE register SET s_id='$s_id', c_id='$c_id' WHERE s_id='$id1' AND c_id='$id2'");

    if ($sql_update1 && $sql_update2) {
        echo "<div style='background-color: white; padding: 20px; border: 1px solid black; margin-bottom: 25px;'>
                <span class='p_font'>Record Updated Successfully...!</span>
              </div>";
    } else {
        $msg = "Update Failed...!";
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style_entry.css" />
    <title>Grade Card Management</title>
</head>
<body>

<?php
if ($opr == "upd") {
    $sql_upd = mysqli_query($conn, "SELECT * FROM gradecard WHERE s_id='$id1' AND c_id='$id2'");
    
    if (!$sql_upd) {
        printf("Error: %s\n", mysqli_connect_error($conn));
        exit();
    }
    
    $rs_upd = mysqli_fetch_array($sql_upd);
?>
    <div class="panel panel-default" style="background-color: #00a8b432;">
        <div class="panel-heading">
            <h1><span class="glyphicon glyphicon-star-empty"></span> Grade's Update Form</h1>
        </div>
        <div class="panel-body">
            <form method="post">
                <div class="teacher_note_pos" style="margin:auto; width:350px;">
                    <input type="text" name="gradetxt" class="form-control" id="textbox" value="<?php echo $rs_upd['grade']; ?>" />
                </div><br>

                <div class="teacher_note_pos" style="margin:auto; width:350px;">
                    <input type="text" name="credits" class="form-control" id="textbox" value="<?php echo $rs_upd['credits']; ?>" />
                </div><br>

                <div class="teacher_note_pos" style="margin:auto; width:350px;">
                    <input type="text" name="sid" class="form-control" id="textbox" value="<?php echo $rs_upd['s_id']; ?>" />
                </div><br>

                <div class="teacher_note_pos" style="margin:auto; width:350px;">
                    <input type="text" name="cid" class="form-control" id="textbox" value="<?php echo $rs_upd['c_id']; ?>" />
                </div><br>

                <div>
                    <input type="submit" class="btn btn-primary btn-large" name="btn_upd" value="Update" id="button-in" title="Update" />
                    <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in" />
                </div>
            </form>
        </div>
    </div>

<?php
} else {
?>

    <div class="panel panel-default" style="background-color: #00a8b432;">
        <div class="panel-heading">
            <h1><span class="glyphicon glyphicon-star-empty"></span> Grade's Entry Form</h1>
        </div>
        <div class="panel-body">
            <form method="post">
                <div class="teacher_note_pos" style="margin:auto; width:350px;">
                    <input class="form-control" type="text" name="gradetxt" id="textbox" placeholder="Grade" />
                </div><br>

                <div class="teacher_note_pos" style="margin:auto; width:350px;">
                    <input class="form-control" type="text" name="credits" id="textbox" placeholder="Credits" />
                </div><br>

                <div class="teacher_note_pos" style="margin:auto; width:350px;">
                    <input type="text" class="form-control" name="sid" id="textbox" placeholder="Student ID" />
                </div><br>

                <div class="teacher_note_pos" style="margin:auto; width:350px;">
                    <input type="text" class="form-control" name="cid" id="textbox" placeholder="Course ID" />
                </div><br>

                <div>
                    <input type="submit" class="btn btn-primary btn-large" name="btn_sub" value="Add Now" id="button-in" />
                    <input type="reset" style="margin-left: 9px;" class="btn btn-primary btn-large" value="Cancel" id="button-in" />
                </div>
            </form>
        </div>
    </div>

<?php
}
?>

</body>
</html>
