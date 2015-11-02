<?php
    if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $human = intval($_POST['human']);
        $from = 'Contact Form'; 
        $to = 'sarahgriswold@outlook.com'; 
        $subject = 'Message from Contact Form ';
        
        $body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
        if (!$_POST['name']) {
            $errName = 'Please enter your name';
        }
        
        
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        
       
        if (!$_POST['message']) {
            $errMessage = 'Please enter your message';
        }
        
        if ($human !== 4) {
            $errHuman = 'Your anti-spam is incorrect';
        }

if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
    if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
    } else {
        $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
    }
}
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sarah Griswold</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <link rel="stylesheet" href="bootstrap3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

 <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
  <div class="container-fluid"> 
    <div class="navbar-header">
<a class ="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span> Sarah Griswold</a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
	  </div>

	    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#section2"><span class="glyphicon glyphicon-user"></span> About Me</a></li>
          <li><a href="#section3"><span class="glyphicon glyphicon-asterisk"></span> Projects</a></li>
          <li><a href="#section4"><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
        </ul>	  
</div>
</div>
</nav>


<div class="row centered">

<div id="section1" class="container-fluid">
<div class="col-lg-12 col-sm-12 col-xs-12 nopadding">
<img src="offside5.jpg" class="img-responsive">
  </div>
</div>
</div>

    <div id="section2" class="container-fluid">
<div id="more2"> 
 <h2 class="hello">Hello! I'm Sarah.</h2><h3>I'm a nutrition enthusiast who recently re-kindled my love of coding and web design.</h3>
 <p>My childhood basically consisted of playing Everquest and watching anime. Around the age of 8, I taught myself HTML and CSS so I could build websites devoted to my favorite anime characters. Some girls had dolls...I had my computer.</p>
<p>As you might imagine, growing up in front of a computer monitor meant I didn't socialize much (outside of Everquest of course!) or move around much.... I was a bit of a chunky monkey.</p>
<p>As I grew older I became fascinated with nutrition science and even obtained a degree in dietetics. I had changed my life and I wanted to help others achieve a healthy lifestyle as well!</p>
<p>I still have a desire to help others, but I've come to realize that I don't have to be a full-time dietitian to do that. The truth is, I love being in front of a computer and I always wondered what my life would look like if I had pursued computer science instead of dietietcs.</p>
<p>SO! I made the very scary plunge to devote myself full-time to studying computer programming...and I am so grateful that I did! I'm enjoying every bit of the journey and I can't wait to see what the future holds.</p>
 </div>
</div>

<div class="row centered">
<div id="section3" class="container-fluid">
<div class="col-lg-4 col-sm-4 col-xs-12">
       
             <img id="pk1" src="package.png" class="img-responsive">
        
    </div>
<div id="comingsoon" class="col-lg-4 col-sm-4 col-xs-12">
       <p> I'm still getting back into the groove, but soon there will be links to projects here. For now, you can check out my Github!</p>
		<br><p><a href="https://github.com/sarahgriswold"><img src="git.png"></img></a></p>
    </div>
			<div class="col-lg-4 col-sm-4 col-xs-12">
         <img id = "pk2" src="package.png" class="img-responsive">
        
    </div>
</div>
</div>

<div id="section4" class="container-fluid">
 <h4>Contact<br>Me</h4> 
 </div>
 <div id="section5" class="col-md-4 col-md-push-4">
 
 <form role="form" action="index.php" method="post">
        
        <div class="form-group">
    
		<input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
           <?php echo "<p class='text-danger'>$errName</p>";?>
         </div>
   
      <div class="form-group">
		 <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
      <?php echo "<p class='text-danger'>$errEmail</p>";?>
      </div>
	
      <div class="form-group">
	   <label for="message">Message</label>

          <textarea name="message" class="form-control" rows="5"><?php echo htmlspecialchars($_POST['message']); ?></textarea>     
	 <?php echo "<p class='text-danger'>$errMessage</p>";?>
         </div>

<div class ="form-group">	
   
   <label>*What is 2+2? (Anti-spam)</label>

<input type="text" class="form-control" name="human" placeholder="Answer"><?php echo "<p class='text-danger'>$errHuman</p>";?>
     </div>
     
     <input type="submit" name="submit" value="Submit" class="btn btn-default">
      
      <div class="form-group">
        <div id ="response" class="col-lg-12 col-sm-12 col-xs-12">
            <?php echo $result; ?>    
        </div>
        </div>
  </form>
 </div> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

</body>
</html>
