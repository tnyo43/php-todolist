

<header>
    <div>
        <h3><a href="index.php">TODO-List</a></h3>
        <nav id="top-nav">

            <ul>
                <?php
                    session_start();
                    if (empty($_SESSION['user_id'])) {
                ?>
                    <li><a href="signIn.php">sign in / sign up</a></li>
                <?php
                    } else {
                ?>
                    <li><a href="logout.php">log out</a></li>
                <?php
                    } 
                ?>
            </ul>

        </nav>
    </div>
</header>