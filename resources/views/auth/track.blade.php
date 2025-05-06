<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - iPortfolio Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.dataTables.css" />

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
                <li><a href="/"><i class="bi bi-house navicon"></i>Dashboard</a></li>
                <li>
                    <p class="text-secondary navicon">Faculty Account Management</p>
                </li>
                <li><a href="/register"><i class="bi bi-person navicon"></i> Account Creation</a></li>
                <li><a href="/listofaccount"><i class="bi bi-people-fill navicon"></i></i>List of
                        Account</a></li>
                <li>
                    <p class="text-secondary navicon">Verification and Approval</p>
                </li>
                <li><a href="/certificate"><i class="bi bi-file-earmark-text navicon"></i> Approval of
                        Submision</a></li>
                <li><a href="/track" class="active"><i class="bi bi-shield-check navicon"></i> Tracking of Liscenses</a>
                </li>
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

                <script>
                    function confirmLogout() {
                        return confirm("Are you sure you want to log out?");
                    }
                </script>


                </li>
            </ul>
        </nav>

    </header>

    <main class="main py-3">

        <section id="about" class=" section">
            <div class="container">
                <h2 class="mb-4">Tracking of Liscence</h2>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-bordered table-striped" id="myTable">
                    <thead class="table-dark">
                        <tr>
                            <th>Profile</th>
                            <th>Full Name</th>
                            <th>Liscence</th>
                            <th>Date Issued</th>
                            <th>Expiration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
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
    <!-- View Modal -->

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>



    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
            responsive: true
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.edit-user-form');

            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const userId = this.dataset.id;
                    const url = `/users/${userId}`; // Laravel's route('users.update', id)
                    const formData = new FormData(this);

                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: formData
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                alert('User updated successfully.');

                                // Dynamically update the DOM with the new user data
                                const userRow = document.querySelector(`#user-${userId}`);

                                // Update user details in the DOM (assuming these fields are in the row)
                                userRow.querySelector('.user-name').textContent = data.user.name;
                                userRow.querySelector('.user-email').textContent = data.user.email;
                                userRow.querySelector('.user-role').textContent = data.user.role;

                                // Or other fields based on your data structure
                                // If you want to update other elements, repeat the above pattern

                            } else {
                                alert('Update failed.');
                            }
                        })
                        .catch(err => {
                            console.error(err);
                            //  alert('An error occurred.');
                        });
                });
            });
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deactivateForms = document.querySelectorAll('.deactivate-user-form');

            deactivateForms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    if (!confirm('Are you sure you want to deactivate this user?')) return;

                    const userId = this.dataset.id;
                    const url = `/users/${userId}/deactivate`; // Make sure your route matches this

                    // Ensure the CSRF token is present before making the request
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    if (!csrfToken) {
                        console.error('CSRF token not found!');
                        return;
                    }

                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                alert('User deactivated successfully.');
                                // Reload the DataTable
                                location.reload(); // This will reload the entire page

                                var table = $('#myTable').DataTable();
                                table.ajax.reload(null, false);  // Refresh the table and keep the current page
                            } else {
                                alert('Failed to deactivate user.');
                            }
                        })
                        .catch(err => {
                            console.error(err);
                            //alert('An error occurred during deactivation.');
                        });
                });
            });
        });

        // Handle the admin role form submission
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.admin-user-form');

            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    if (!confirm('Are you sure you want to set admin role on this user?')) return;

                    const userId = this.dataset.id;
                    const url = `/users/${userId}/admin`;
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                    if (!csrfToken) {
                        console.error('CSRF token not found!');
                        return;
                    }

                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                alert('Updated successfully.');
                                location.reload(); // This will reload the entire page
                                //fetchAndPopulateUsers(); // Refresh table after update
                            } else {
                                alert('Failed to update user.');
                            }
                        })
                        .catch(err => {
                            console.error('Update error:', err);
                        });
                });
            });

            // Initialize DataTable once DOM is ready
            $('#myTable').DataTable();
            // fetchAndPopulateUsers(); // Load initial data
        });
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.faculty-user-form');

            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    // if (!confirm('Are you sure you want to set admin role on this user?')) return;

                    const userId = this.dataset.id;
                    const url = `/users/${userId}/faculty`;
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                    if (!csrfToken) {
                        console.error('CSRF token not found!');
                        return;
                    }

                    fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                alert('Updated successfully.');
                                location.reload(); // This will reload the entire page
                                // Refresh table after update
                            } else {
                                alert('Failed to update user.');
                            }
                        })
                        .catch(err => {
                            console.error('Update error:', err);
                        });
                });
            });

            // Initialize DataTable once DOM is ready
            $('#myTable').DataTable();
            // fetchAndPopulateUsers(); // Load initial data
        });
        function fetchAndPopulateUsers() {
            $.ajax({
                url: "/users/data", // Adjust your endpoint
                type: 'GET',
                success: function (response) {
                    console.log('Users response:', response); // debug
                    const table = $('#myTable').DataTable();

                    table.clear();

                    response.forEach(function (user) {
                        const createdAt = new Date(user.created_at).toLocaleString();
                        const actions = `
                    <form class="admin-user-form" data-id="${user.id}">
                        <button class="btn btn-sm btn-primary">Set Admin</button>
                    </form>`;

                        table.row.add([
                            user.name,
                            user.email,
                            user.role,
                            createdAt,
                            actions
                        ]);
                    });

                    table.draw();
                },
                error: function (err) {
                    console.error('Error:', err);
                }
            });
        }

    </script>

</body>

</html>