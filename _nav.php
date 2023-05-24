<link rel="stylesheet" href="styles/nav.css" />
<?php require_once('functions.php'); 
$bdd = connect();

$sql = "SELECT * FROM users";
$sth = $bdd->prepare($sql);
$sth->execute();
$users = $sth->fetchAll();



?>


<style>

.nav-avatar {
    background-image: url(img/<?php echo $_SESSION['user']->picture; ?>);
    position: absolute;
    top: 50%;
    left: -40px;
    transform: translateY(-50%);
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #ffffff;
    color: #333333;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    transition: background-color 0.3s ease; /* Ajout de la transition de couleur de fond */
}


</style>

<nav class="navbar">
    <ul>
        <?php if (!isset($_SESSION['user'])){ ?>
            <li><a href="register.php">Créer un compte</a></li>
            <li><a href="login.php">Connexion</a></li>
        <?php } else { ?>
            
        <li>
        <a href="account.php">
        <span class="nav-avatar">
        <div class="avatar-container">
        <?php foreach ($users as $user) { ?>
         <img src="Images/<?php echo $user['avatar']; ?>" alt="Avatar" />
        <?php } ?>
        </div>
        </span>

        <span class="nav-account">Mon Compte</span>
        </a>
        </li>               
        <li><a href="boutique.php">Boutique</a></li>
        <li><a href="logout.php">Logout</a></li>
        <?php } ?>
    </ul>
   

  
</nav>
