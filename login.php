<?php

session_start();

    if($_POST)
    { // ako ima ista post podataka odradi ovo
        $email = $_POST['email']; // izvadi mail iz zahtjeva (requesta)
        $password = $_POST['password']; // izvadi password iz zahtjeva
        
        $handle= mysqli_connect('localhost', 'root', '', 'testdb'); // povezi me pls s bazom koju sam malopriej napravio
        
        $result_set = mysqli_query($handle, "SELECT * FROM users"); // mazni sve iz users tabele
        
        $loggedIn = false; // pretpostavka je da nisam logovan
        
        while($row = mysqli_fetch_assoc($result_set)) // za svaki red (na fazon for-a)
        {
            if ($row['password'] == $password && $row['email'] == $email) // ako ima ijedan korisnik kojem odgovara email i password koji sam proslijedio kroz request
            {
                $loggedIn = true; // oznaci da sam logovan
                
                $_SESSION['user_id'] = $row['id'];
                
                // vi ste pravili sve u fajl (obicni txt)
                
                // ja sam brzinski napravio bazu podataka
                
                
                // omg sec, ne radim ja vise nistavako pa sam malo zabb xd
                header('Location: nekaDrugaSkripta.php');
                
                break; // ne moras gledat ostale usere
            }
        }
        
        if($loggedIn == false) // ako se nisam uspio logovat
            echo "Ne valja ti email/pw"; // ne vlaja... staj a znam... eto... login example na steroidima, ovaj kod je katastrofa, samo da vidis da radi sta je ovaj prvi dio html/a
    } ?>
 
<html>

<head>
</head>

<body>

    <form method="POST">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control">
        <label for="email">Password</label>
        <input type="password" id="password" name="password" class="form-control">
        <input type="submit" value="Submit">
    </form>
    
</div>

</body>
</html>