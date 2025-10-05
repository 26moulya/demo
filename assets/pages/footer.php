
    <footer class="w3l-footer-29-main">
        <div class="footer-29-w3l pb-5">
            <div class="container pt-4">
                <div class="row footer-top-29 pt-lg-5 pt-sm-4">
                    <div class="col-lg-3 col-sm-6">
                        <div class="address-grid">
                            <h5>Shree Devi Institute of Technology, <br> Kenjar.<br><br>PIN 574142</h5>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mt-sm-0 mt-4">
                        <div class="address-grid">
                            <h5 class="top-bold">Phone</h5>
                            <h5 class="phone-number-text mt-2">+91(21) 112 7368</h5>
                        </div>
                        <div class="address-grid mt-sm-5 mt-4">
                            <h5 class="top-bold">E-mail</h5>
                            <h5 class="email-cont-text mt-1"> <a
                                    class="mail">zakiyagolden@gmail.com</a></h5>
                                    <h5 class="email-cont-text mt-1"> <a
                                    class="mail">kbmoulya84@gmail.com</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-5 footer-list-menu ps-lg-0 mt-lg-0 mt-sm-5 mt-4">
                        <div class="address-grid">
                            <h5 class="mb-sm-4 mb-3 pb-lg-2 top-bold">Support Links</h5>
                            <ul>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="index.php">Login</a></li>
                                <li><a href="about.php">About Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-5 footer-list-menu ps-lg-0 mt-lg-0 mt-sm-5 mt-4">
                        <div class="address-grid">
                            <h5 class="mb-sm-4 mb-3 pb-lg-2 top-bold">Support Links</h5>
                            <ul>
                                <!-- <li><a href="request.php">View Request</a></li> -->
                                <li><a href="donor.php">Donor</a></li>
                                <li><a href="my-request.php">My Request</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="w3l-copyright text-center mt-lg-5 mt-4 pt-sm-4 pt-3">
                    <p class="copy-footer-29">© 2023 Online Blood Bank Management System. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fas fa-level-up-alt" aria-hidden="true"></span>
    </button>
    <script>
        
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }
        
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    
    <script src="assets/js/theme-change.js"></script>
    
    <script>
        $(window).on("scroll", function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });
        
        $(".navbar-toggler").on("click", function () {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function () {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function () {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>