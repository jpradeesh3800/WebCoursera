<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WebCoursera</title>
    <link rel="icon" type = "image/jpg" href="../images/wc.png" />
    <link rel="stylesheet" href="home.css">
    <script src="home.js"></script>
</head>
<body>

    <div class="container">
        <div class="heading">WebCoursera</div>
        <button type="button" class="button"><a href="../login.html"><div style="color: white">Log Out</div></a></button>
        <input type="text" placeholder="Search.." name="search" onkeyup="myFunction()" class="input_box">
        <h2 style="color:white">Hi, <?php session_start();  echo $_SESSION["username"]; ?></h2>
        <a href="registered_users.php">Look for your friends</a>
    </div>

    <div class="courseList">
        <div class="courseTile" value="HTML">
                <a href="../coursePage/course_page.php?course_id=1">
                
                    <img src="../images/html_image.png" alt="HMTL" class="courseImage">
                    <div class="courseDetails">
                        <p class="courseTitle">HTML Course</p>
                        <p class="courseDescription">
                            Learn the basics of HTML5 and web development in this awesome course for beginners. 
                            If you are interested in learning HTML but know nothing, then you are in the right place.
                        </p>
                    </div>
                </a>
        </div>

        <div class="courseTile" value="CSS">
            <a href="../coursePage/course_page.php?course_id=2">
                
                <img src="../images/css_image.png" alt="CSS" class="courseImage">
                <div class="courseDetails">
                    <p class="courseTitle">CSS Course</p>
                    <p class="courseDescription">
                        Learn CSS in this full course for beginners. CSS, or Cascading Style Sheet, is responsible for the styling and looks of a website. 
                        In this course, we cover CSS from the ground up. You will learn everything from basic skills, such as coloring and text, to highly advanced skills, like custom animations.    
                    </p>
                </div>
            </a>
        </div>

        <div class="courseTile" value="JAVASCRIPT">
            <a href="../coursePage/course_page.php?course_id=3">
                
                <img src="../images/javascript_image.png" alt="JavaScript"class="courseImage">
                <div class="courseDetails">
                    <p class="courseTitle">JavaScript Course</p>
                    <p class="courseDescription">
                        In this crash course we will go over the fundamentals of JavaScript including more modern syntax like classes, arrow functions, etc.
                        This is the starting point on my channel for learning JS.
                    </p>
                </div>
            </a>
        </div>

        <div class="courseTile" value="JAVA">
            <a href="../coursePage/course_page.php?course_id=4">
                
                <img src="../images/java_image.png" alt="Java" class="courseImage">
                <div class="courseDetails">
                    <p class="courseTitle">Java Course</p>
                    <p class="courseDescription">
                        Java is a general-purpose programming language. Learn how to program in Java in this full tutorial course. 
                        This is a complete Java course meant for absolute beginners. 
                        No prior programming experience is required.                        </p>
                </div>
            </a>
        </div>

        <div class="courseTile" value="AJAX">
            <a href="../coursePage/course_page.php?course_id=5">
                
                <img src="../images/ajax_image.png" alt="Ajax"class="courseImage">
                <div class="courseDetails">
                    <p class="courseTitle">Ajax Course</p>
                    <p class="courseDescription">
                        In this Course we will dive into AJAX with Vanilla JS and NO JQUERY.
                            We will examine the XHR object and how it works. 
                            This is a beginner friendly tutorial for anyone that  has very basic JavaScript knowledge. 
                            We will make xhr requests to a txt file, local json files, an external API and even PHP files.                        </p>
                </div>
            </a>
        </div>

        <div class="courseTile" value="PYTHON">
            <a href="../coursePage/course_page.php?course_id=6">
                
                <img src="../images/python_image.png" alt="Python" class="courseImage">
                <div class="courseDetails">
                    <p class="courseTitle">Python Course</p>
                    <p class="courseDescription">
                        In this crash course we will be going over Python programming basics like variables, data types and structures, functions, loops, classes and more.                        </p>
                </div>
            </a>
        </div>
    </div>

    <footer>
        <div class="topic">
            <div >About us</div>
                <p>
                we are a global online learning platform that offers anyone, anywhere access to online courses for free of cost. 
                We strongly believe that learning is the source of human progress.
                Learning is a right, not a privilege  and we contribute our part for this initiative.
                </p>
            <div>Contact us</div>
                <p>
                <div class="phone">+91 9028936767</div>
                <div class="email">abcdefg@gmail.com</div>
                </p>
        </div>
        
        <div class="terms"><a href="../privacypolicy.html">Privacy Policy</a></div>
        <div class="policy"><a href="../terms.html">Terms And Conditions</a></div>
        
        
        <div class="help">
            <div>Help and support</div>
            <form action="#">
                <input type="text" placeholder="Describe your Issue" class="description">
                <input type="submit" name="" value="Send" class="send">
            </form>
        </div>
    </footer>

    <!-- <footer>
        <div class="content">
          <div class="left box">
            <div class="upper">
              <div class="topic">About us</div>
              <p>
              we are a website that is dedicated to providing quality courses for free of cost.</p>
            </div>
            <div class="lower">
              <div class="topic">Contact us</div>
              <div class="phone">
                <a href="#"><i class="fas fa-phone-volume"></i>+91 9028936767</a>
              </div>
              <div class="email">
                <a href="#"><i class="fas fa-envelope"></i>abcdefg@gmail.com</a>
              </div>
                
            </div>
          </div>
          <div class="middle box">
            
            <div class="topic" ></div>
            <div><a href="privacypolicy.html">Privacy Policy</a></div>
            <div class="topic"></div>
            <div><a href="terms.html">Terms And Conditions</a></div>
            
          </div>
          <div class="right box">
            <div class="topic">Help and support</div>
            <form action="#">
              <input type="text" placeholder="Describe your Issue">
              <input type="submit" name="" value="Send">
              
                
              
            </form>
          </div>
        </div>
       
      </footer> -->
    
</body>
</html>