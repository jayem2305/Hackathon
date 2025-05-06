<<<<<<< HEAD <!-- Code from main branch -->
    =======
    <!-- Code from feature-branch -->
    >>>>>>> feature-branch

    <html>

    <head>
        <script>
        const cache = {};
        let currentPage = "";

        const pages = [
            "preload/certificate.html",
            "preload/dashboard.html",
            "preload/educationBackground.html",
            "preload/facultyEval.html",
            "preload/generateCV.html",
            "preload/personalInfo.html",
            "preload/professionalLicenses.html",
            "preload/uploadSupportingDocs.html",
            "preload/workExperience.html",
        ];

        window.onload = () => {
            pages.forEach((page) => preloadContent(page)); <<
            << << < HEAD
            document.body.classList.add("loaded");
            if (currentPage != "preload/dashboard.html") {
                document.body.classList.add("loaded");
                loadContent("preload/dashboard.html");
            } ===
            === =

            document.body.classList.add("loaded"); >>>
            >>> > 4926e48 e21d3ebcb1437e56d0720c362f15d1c3b
        };

        function preloadContent(page) {
            fetch(page)
                .then((response) => response.text())
                .then((data) => {
                    cache[page] = data;
                    console.log(`Preloaded: ${page}`);
                })
                .catch((error) => console.error("Error preloading content:", error));
        }

        function loadContent(page) {
            console.log(page);
            if (currentPage === page) {
                console.log(`"${page}" is already loaded, skipping reload.`);
                console.log("testing this " + page);
                return;
            }

            const container = document.getElementById("main");

            if (cache[page]) {
                container.innerHTML = cache[page];
                afterContentLoad(page);
            } else {
                fetch(page)
                    .then((response) => response.text())
                    .then((data) => {
                        cache[page] = data;
                        container.innerHTML = data;
                        afterContentLoad(page);
                    })
                    .catch((error) => console.error("Error loading content:", error));
            }

            currentPage = page;
        }

        function afterContentLoad(page) {
            console.log("Content loaded");
            if (page === "preload/personalInfo.html") {
                function formatPhoneNumber(input) {
                    // Ensure the input starts with '+63'
                    if (!input.value.startsWith("+63")) {
                        input.value = "+63" + input.value.replace(/\D/g, "");
                    } else {
                        input.value = "+63" + input.value.substring(4).replace(/\D/g, "");
                    }
                }
            }
            // Add animations or other behavior if needed
        }
        </script>
    </head>

    <body>
        <link href="lib/animate/animate.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="main-css.css" />
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
            crossorigin="anonymous" />
        <link rel="stylesheet" href="personalInfo.css" />
        <nav class="nav-bar">
            <div class="navigation-bar">
                <div class="branding">
                    <img src="Imgs/ACAD_PORT.png" class="img-branding" alt="" />
                    <div class="brand-name">
                        <h1>Acad</h1>
                        <h1>PORT</h1>
                    </div>
                </div>
                <ul class="nav-list">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <!-- My Personal Profile -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed no-arrow" type="button"
                                    onclick="loadContent('preload/dashboard.html')">
                                    Dashboard
                                </button>
                            </h2>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    My Personal Profile
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="list">
                                        <a onclick="loadContent('preload/personalInfo.html')">Personal
                                            Information</a><br />
                                        <a onclick="loadContent('preload/educationBackground.html')">Education
                                            Background</a><br />
                                        <a onclick="loadContent('preload/workExperience.html')">Work
                                            Experience</a><br />
                                        <a onclick="loadContent('preload/professionalLicenses.html')">Professional
                                            Licenses</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Certificates and Credentials -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed no-arrow" type="button"
                                    onclick="loadContent('preload/certificate.html')">
                                    Certificates & Credentials
                                </button>
                            </h2>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed no-arrow" type="button">
                                    Faculty Evaluation
                                </button>
                            </h2>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed no-arrow" type="button">
                                    Upload Supporting Documents
                                </button>
                            </h2>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed no-arrow" type="button">
                                    Generate CV
                                </button>
                            </h2>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed no-arrow" type="button">
                                    Notifications / Reminders
                                </button>
                            </h2>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="logout-layout p-3">
                <button class="btn btn-danger w-100">Logout</button>
            </div>
        </nav>

        <!-- Template Javascript -->
        <script src="JS/main.js"></script>

        <div class="show main">
            <div class="top">
                <div class="acc">
                    <div class="acc-name">Dominic G. Casinto</div>
                    <img src="https://scontent.fmnl33-5.fna.fbcdn.net/v/t39.30808-6/481259781_1223400092634847_3204620503352458800_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeHZACEINnBnOrF1DLBqxRv8QLF8AAMgPLVAsXwAAyA8tdpFvBFsXdrJPvv9o0Y_Tq4HjVv6ppFipVjYxAMs4bdJ&_nc_ohc=ByY3m6rsXOYQ7kNvwH2OCc0&_nc_oc=AdlCLCA7UhVa4Ws0IXfy9vcGW6UU7wcimbcBbKbOnpHtbXNh7uP8-BzyGwFlRhuDw1U&_nc_zt=23&_nc_ht=scontent.fmnl33-5.fna&_nc_gid=BF08RXsO6raedb78H4URNA&oh=00_AfJE_RnbKtI0oqoLeFsm-iFwz4FP6TGIpou-ZTGZlCZxTw&oe=681FC201"
                        alt="" class="acc-profile-img" />
                    <img src="Imgs/notification-bell.png" alt="" class="notification" />
                </div>
            </div>
            <div id="main"></div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
    </body>

    </html>