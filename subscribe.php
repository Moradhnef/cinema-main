<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../cinema-main/subscibe.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="../cinema-main/newsleter.js"></script>
<title>שמירת בסיס נתונים</title>
</head>
<body>
<header>
        <nav>
       
             <li class="logo">
                <a href="../cinema-main/index.html" class="fas fa-film"></a>iSratim</li>
    
            
            <input type="checkbox" id="box-1">
            <label id="toggler" for="box-1">
                <span>תפריט<i class="fas fa-bars"></i></span>
            </label>
    
            
            <ul>
                <li><a href="../cinema-main/index.html">דף בית</a></li>
                <li><a href="../cinema-main/index.html#newsleter">ניוזלטר</a></li>
                <li><a href="../cinema-main/index.html#footer">אודות</a></li>
                
            </ul>
    
            
            <div id="navbar-form">
                <input type="checkbox" id="box-2">
                <form action="" id="search-form">
                    <input type="search" placeholder="חיפוש סרטים" id="search-bar">
                    <button id="search-btn" type="submit">
                        <span><i class="fas fa-search"></i></span>
                    </button>
                </form>
    
                <label for="box-2" id="search-form-opener">
                    <span><i class="fas fa-search"></i></span>
                </label>
    
                <label for="box-2" id="search-form-closer">
                    <span><i class="fas fa-times"></i></span>
                </label>
            </div>
        </nav>  
        
    </header> 





    <main>
        <br>
        <br>
        <br>
        <br>
        <br>
             
      <section>
          <h1 id="inputSQL">
      <?php
    // Connect to the database
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbname = "database";

    // Create connection
    $conn = new mysqli($servername, $user, $password, $dbname);

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "הפרטים התקבלו<br>";

    if (isset($_POST['submit'])) 
    {
        // Get the form data
        $phone = $_POST['phone'];
        $id = $_POST['id'];
        $user = $_POST['username'];
        $password = $_POST['password'];
        $subscription_range = $_POST['subscription_range'];

        // Validate and sanitize the inputs
        if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
            echo "Invalid phone number format";
            exit;
        }
        if (!preg_match("/^[0-9]{9}$/", $id)) {
            echo "Invalid ID format";
            exit;
        }
        if (!preg_match("/^[a-zA-Z0-9]{3,}$/", $user))
        {
            echo "Invalid username format";
            exit;
        }
        if (strlen($password) < 6)
        {
            echo "Password must be at least 6 characters long";
            exit;
        }
        $phone = filter_var($phone, FILTER_SANITIZE_STRING);
        $id = filter_var($id, FILTER_SANITIZE_STRING);
        $user = filter_var($user, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
        $subscription_range = filter_var($subscription_range, FILTER_SANITIZE_STRING);

        // Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO db_form (phone, id, username, password, subscription_range)
                VALUES ('$phone', '$id', '$user', '$hashed_password', '$subscription_range')";

        if ($conn->query($sql) === TRUE) {
            echo ".\n!בוצע רישום בהצלחה";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    /*if (isset($_POST['submitpurchase'])) 
    {
        // Get the form data
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $lctn = $_POST['location'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $zip = $_POST['zip'];
        $cco = $_POST['cco'];
        $ccn = $_POST['ccn'];
        $cvv = $_POST['cvv'];
        $yr = $_POST['year'];
        $mnth = $_POST['month'];

        
        $fullname = filter_var($fullname, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $lctn = filter_var($lctn, FILTER_SANITIZE_STRING);
        $city = filter_var($city, FILTER_SANITIZE_STRING);
        $country = filter_var($country, FILTER_SANITIZE_STRING);
        $zip = filter_var($$zip, FILTER_SANITIZE_STRING);
        $cco = filter_var($cco, FILTER_SANITIZE_STRING);
        $ccn = filter_var($ccn, FILTER_SANITIZE_STRING);
        $ccv = filter_var($ccv, FILTER_SANITIZE_STRING);
        $yr = filter_var($yr, FILTER_SANITIZE_STRING);
        $mnth = filter_var($mnth, FILTER_SANITIZE_STRING);

        

        $sql = "INSERT INTO debit_form (fullname, email, lctn, city, country, zip, cco, ccn, cvv, yr, mnth)
                VALUES ('$fullname', '$email', $lctn', '$city', '$country', '$zip','$cco','$ccn', '$cvv', '$yr', '$mnth')";

        if ($conn->query($sql) === TRUE) {
            echo ".\n!בוצע רישום בהצלחה";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }*/
    if (isset($_POST['submit2'])) 
    {
        // Get the form data
       
        $user = $_POST['username'];
        $email = $_POST['email'];
        if (!preg_match("/^[a-zA-Z0-9]{3,}$/", $user))
        {
            echo "Invalid username format";
            exit;
        }
        if (!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/", $email))
        {
            echo "Invalid email format";
            exit;
        }

        $user = filter_var($user, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $sql = "INSERT INTO newsletter_form (user, email)
        VALUES ('$user', '$email')";
            if ($conn->query($sql) === TRUE) {
                echo ".\n!בוצע רישום בהצלחה";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

    $conn->close();
?>

      </h1>
      <br>
      </section>
      
      <section class="theater">
          
          <img  style="width:380px; height:59px;" src="../cinema-main/images/loadbar.gif" class="img1">
          
      </section>
    </main>
    <br>
    <br>
    <br>
    
    <footer id="footer">
        <div class="container567"> 
            <div class="row">
                <div class="footer-col">
                    <h4>אודות</h4>
                    <ul>
                        <li><a href="">בדיקה/ביטול הזמנה</a></li>
                        <li><a href="">צור קשר</a></li>
                        <li><a href="">iSratim אודות</a></li> 
                        <li><a href="">מידע כללי</a></li>
                        <li><a href="">המתחמים שלנו</a></li>
                    </ul>

                </div> 
                <div class="footer-col">
                    <h4>קישורים</h4>
                    <ul>
                        <li><a href="">כנסים ואירועים</a></li>
                        <li><a href="">דרושים</a></li> 
                        <li><a href="">יום הולדת מהסרטים</a></li> 
                        <li><a href="">פרסום וקד"מ</a></li> 
                        
                        <li><a href=""></a></li>

                        
                    </ul>

                </div> 
                <div class="footer-col">
                    <h4>תנאי שימוש</h4>
                    <ul>
                        <li><a href="">תקנון</a></li> 
                        <li><a href="">זכויות</a></li> 
                        <li><a href="">נגישות</a></li>
                    </ul>

                </div> 
                <div class="footer-col">
                    <h4>הרשם לניוזלטר</h4>
                    <form method="post" action="subscribe.php" id="newsleter">
                        <input type="text" placeholder="שם מלא" name="username" class="inputName" required>
                        <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="דואר אלקטרוני" class="InputMail" required>
                        <input type="submit" name="submit2" value="שלח" class="InputSubmit">

                    </form>

                </div>


            </div>  
            <hr>
            <div class="row">
                <div class="col"> 
                <p>&#169;All Rights Reserved ® 2023 Developed by Kareem & Morad</p>

                </div> 
                <div class="socialIcons"> 
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>  
                    <a href=""><i class="fa-brands fa-tiktok"></i></a>


                </div>

            </div>


        </div>
    </footer>




</body>
</html>
