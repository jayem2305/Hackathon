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
            <img src="profiles/{{ Auth::user()->profile_image }}" alt="Profile" class="img-fluid rounded-circle">
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
                <li><a href="/"><i class="bi bi-house navicon"></i>Dashboard</a></li>
                <li>
                    <p class="text-secondary navicon">Faculty Account Management</p>
                </li>
                <li><a href="/register" class="active"><i class="bi bi-person navicon"></i> Account Creation</a></li>
                <li><a href="/listofaccount"><i class="bi bi-people-fill navicon"></i></i>List of
                        Account</a></li>
                <li>
                    <p class="text-secondary navicon">Verification and Approval</p>
                </li>
                <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Approval of Submision</a></li>
                <li><a href="#portfolio"><i class="bi bi-shield-check navicon"></i> Tracking of Liscenses</a></li>
                <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Audit logs</a></li>
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
                    <a href="#contact" class="text-danger text-decoration-none" style="transition: color 0.3s;"
                        onmouseover="this.style.color='#ff0000'" onmouseout="this.style.color=''">
                        <i class="bi bi-door-open navicon"></i> Logout
                    </a>
                </li>

                </li>
            </ul>
        </nav>

    </header>
    <main class="main py-3">

        <section id="about" class=" section">
            <div class="container">
                <h2 class="mb-4">Create Account</h2>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="row g-3">
                    @csrf

                    <div class="col-md-4">
                        <label for="first_name" class="form-label fw-bold">First Name <span
                                class="text-danger">*</span></label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label for="last_name" class="form-label fw-bold">Last Name <span
                                class="text-danger">*</span></label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>

                    <div class="col-md-2">
                        <label for="middle_name" class="form-label fw-bold">Middle Name</label>
                        <input type="text" name="middle_name" class="form-control">
                        <p class="font-monospace text-secondary">If Applicable</p>
                    </div>

                    <div class="col-md-2">
                        <label for="ext_name" class="form-label fw-bold">Extension Name</label>
                        <input type="text" name="ext_name" class="form-control">
                        <p class="font-monospace text-secondary">If Applicable</p>

                    </div>

                    <div class="col-md-4">
                        <label for="role" class="form-label fw-bold">Role <span class="text-danger">*</span></label>
                        <select name="role" class="form-select" required>
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="faculty_member">Faculty Member</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="dob" class="form-label fw-bold">Date of Birth <span
                                class="text-danger">*</span></label>
                        <input type="date" name="dob" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="phone_number" class="form-label fw-bold">Phone Number <span
                                class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">+63</span>
                            <input type="text" name="phone_number" id="phone_number" class="form-control" maxlength="12"
                                required>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label fw-bold">Address <span
                                class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label for="profile_image" class="form-label fw-bold">Profile Image <span
                                class="text-danger">*</span></label>
                        <input type="file" name="profile_image" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="col-md-6">

                        <label for="password" class="form-label fw-bold">Password <span
                                class="text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control" required>
                            <span class="input-group-text" id="togglePassword"><i class="bi bi-eye-fill"
                                    id="eyeIconPassword"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label fw-bold">
                            Confirm Password <span class="text-danger">*</span>
                        </label>
                        <div class="input-group mb-3">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" required>
                            <span class="input-group-text" id="togglePasswordConfirm" style="cursor: pointer;">
                                <i class="bi bi-eye-fill" id="eyeIconConfirm"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>

            </div>
        </section>

    </main>


    <footer id="footer" class="footer position-relative light-background">

        <div class="container">
            <div class="copyright text-center ">
                <p>© <span>Copyright</span> <strong class="px-1 sitename">iPortfolio</strong> <span>All Rights
                        Reserved</span></p>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a
                    href="https://themewagon.com">ThemeWagon</a>-->
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

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
    <script src="assets/js/custom.js"></script>

</body>

</html>