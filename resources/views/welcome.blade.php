<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - iPortfolio Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: iPortfolio
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header dark-background d-flex flex-column">
        <i class="header-toggle d-xl-none bi bi-list"></i>

        <div class="profile-img">
            <img src="{{ Auth::user()->profile_image }}" alt="Profile" class="img-fluid rounded-circle">
        </div>

        <a href="/" class="logo d-flex align-items-center justify-content-center">
            <h1 class="sitename">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
            <!--<p>{{ ucfirst(Auth::user()->role) }}</p>-->
        </a>

        <!--<div class="social-links text-center">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>-->

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" class="active"><i class="bi bi-house navicon"></i>Dashboard</a></li>
                <li>
                    <p class="text-secondary navicon">Faculty Account Management</p>
                </li>
                <li><a href="/register"><i class="bi bi-person navicon"></i> Account Creation</a></li>
                <li><a href="/listofaccount"><i class="bi bi-people-fill navicon"></i></i>List of
                        Account</a></li>
                <li>
                    <p class="text-secondary navicon">Verification and Approval</p>
                </li>
                <li><a href="/certificate"><i class="bi bi-file-earmark-text navicon"></i> Approval of Submision</a>
                </li>
                <li><a href="/track"><i class="bi bi-shield-check navicon"></i> Tracking of Liscenses</a></li>
                <li><a href="/audit"><i class="bi bi-hdd-stack navicon"></i> Audit logs</a></li>
                <!--<li class="dropdown"><a href="#"><i class="bi bi-menu-button navicon"></i> <span>Dropdown</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Dropdown 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Dropdown 2</a></li>
                        <li><a href="#">Dropdown 3</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li>-->
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        onsubmit="return confirmLogout()">
                        @csrf
                        <button type="submit" class="btn btn-link text-danger text-decoration-none p-0"
                            style="transition: color 0.3s;" onmouseover="this.style.color='#ff0000'"
                            onmouseout="this.style.color=''">
                            <i class="bi bi-door-open navicon"></i> Logout
                        </button>
                    </form>
                </li>

                </li>
            </ul>
        </nav>

    </header>

    <main class="main">

        <!-- Stats Section -->
        <section id="stats" class="stats section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-people"></i>
                            <span id="userCount" data-purecounter-start="0" data-purecounter-end="0"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Total Number of Members</strong></p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-emoji-smile"></i>
                            <span id="userCountfaculty" data-purecounter-start="0" data-purecounter-end="0"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Total Number of Faculty Members</strong></p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-headset"></i>
                            <span id="userCountadmin" data-purecounter-start="0" data-purecounter-end="0"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Total Number of Admin members</strong></p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item">
                            <i class="bi bi-journal-richtext"></i>
                            <span id="userCountactive" data-purecounter-start="0" data-purecounter-end="0"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Total Number of Active Certificate</strong>
                            </p>
                        </div>
                    </div><!-- End Stats Item -->
                </div>

            </div>

        </section><!-- /Stats Section -->

        <!-- Skills Section -->
        <section id="skills" class="skills section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Daily Upload Report</h2>
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row skills-content skills-animation">
                        <div class="col-lg-12">
                            <canvas id="uploadChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- End Section Title -->
        </section><!-- /Skills Section -->

    </main>

    <footer id="footer" class="footer position-relative light-background">

        <div class="container">
            <div class="copyright text-center ">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">Hackstreetboys</strong> <span>All Rights
                        Reserved</span></p>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">Hackstreetboys</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/typed.js/typed.umd.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/user-count')
                .then(response => response.json())
                .then(data => {
                    const countElement = document.getElementById('userCount');
                    countElement.setAttribute('data-purecounter-end', data.count);
                    new PureCounter(); // re-initiate the counter
                })
                .catch(error => console.error('Error fetching user count:', error));
        });

        document.addEventListener('DOMContentLoaded', function () {
            fetch('/user-count-admin')
                .then(response => response.json())
                .then(data => {
                    const countElement = document.getElementById('userCountadmin');
                    countElement.setAttribute('data-purecounter-end', data.count);
                    new PureCounter(); // re-initiate the counter
                })
                .catch(error => console.error('Error fetching user count:', error));
        });
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/user-count-faculty')
                .then(response => response.json())
                .then(data => {
                    const countElement = document.getElementById('userCountfaculty');
                    countElement.setAttribute('data-purecounter-end', data.count);
                    new PureCounter(); // re-initiate the counter
                })
                .catch(error => console.error('Error fetching user count:', error));
        });
    </script>
    <script>
        const ctx = document.getElementById('uploadChart').getContext('2d');
        const uploadChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['May 1', 'May 2', 'May 3', 'May 6', 'May 7'],
                datasets: [{
                    label: 'Uploads per Day',
                    data: [12, 20, 8, 16, 25],
                    backgroundColor: [
                        '#0d6efd',
                        '#198754',
                        '#dc3545',
                        '#ffc107',
                        '#0dcaf0'
                    ],
                    borderRadius: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    title: {
                        display: true,
                        text: 'Daily Upload Statistics'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 5
                    }
                }
            }
        });
    </script>

</body>

</html>