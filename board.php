<?php
include 'style.html';
$name = $_GET['name'];
?>
<title>Board</title>
<body>
     <div class="flex-center position-ref full-height">
                <div class="top-right home">
                        <a href='view.php?name=<?=$name?>'>View</a>
                        <a href="index.php">Logout</a>
                        <a href="register.php">Register</a>
                </div>
      <div class="content">
                <div class="m-b-md">
                    <form name="form1" action="board.php" method="post">
                        <input type="hidden" name="name" value="<?=$name?>"> 
                        	<p><strong><?="Hi, " . $name?></strong></p>
                        	<p>SUBJECT</p>
                        	<p><input type="text" name="subject"></p>
                        	<p>CONTENT</p>
                        	<p><textarea style="font-family: 'Nunito', sans-serif; font-size:20px; width:550px;height:100px;" name="content"></textarea></p>
                        	<p><input type="submit" name="submit" value="SEND">
                    <style>
                        input {padding:5px 15px; background:#FFCCCC; border:0 none;
                        cursor:pointer;
                        -webkit-border-radius: 5px;
                        border-radius: 5px; }
                    </style>
                        <input type="reset" name="Reset" value="RESET">
                    <style>
                        input {
                            padding:5px 15px;
                            background:#FFCCCC;
                            border:0 none;
                            cursor:pointer;
                            -webkit-border-radius: 5px;
                            border-radius: 5px;
                            font-family: 'Nunito', sans-serif;
                            font-size: 19px;
                        }
                    </style>
                    </form>
                </div>

</body>
</html>

<?php
//éċşçè¨ċ?ĉċ·èĦä¸é˘éĉ?µç¨ċĵç˘ĵ
if (isset($_POST['submit'])) {
	include "db.php";
	echo '<div class="success">Added successfully ïĵ</div>';
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$content = $_POST['content'];
	$sql = "INSERT guestbook(name, subject, content, time) VALUES ('$name', '$subject', '$content', now())";

	if (!mysqli_query($db, $sql)) {
		die(mysqli_error($db));
	} else {
    //è?ĉċċ°çè¨ċ­é²è³ĉċşĞïĵĉèŞċè·³è½ċ°éĦŻç¤şçè¨çé é˘
		echo "
                <script>
                setTimeout(function(){window.location.href='view.php?name=" . $name . "';},500);
                </script>";

	}
} else {
	echo '<div class="success">Click <strong>Send</strong> when you\'re done.</div>';
}
?>