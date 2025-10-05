<header id="site-header" class="fixed-top shadow">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="home.php">
                <span>B</span>lood-Bank <i class="fa fa-tint"></i>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/bloodbank/home.php'){echo 'active';}?>" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/bloodbank/donor.php'){echo 'active';}?>" href="donor.php">Donor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/bloodbank/my-request.php'){echo 'active';}?>" href="my-request.php">My Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($_SERVER['REQUEST_URI'] == '/bloodbank/about.php'){echo 'active';}?>" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>