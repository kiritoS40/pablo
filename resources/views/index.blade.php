<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio</title>
    <link rel="icon" href="{{ asset('assets/pics/qt-removebg.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="header">
            <a href="#"><img src="{{ asset('storage/' . $settings->header_logo) }}" alt="logo"></a>
            <nav>
                <ul id="sidemenu">
                    <li><a href="#banner">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#contact">Contact</a></li>

                    <i class='bx bx-x' onclick="closemenu()"></i>
                </ul>
                <i class='bx bx-menu' onclick="openmenu()"></i>
            </nav>
        </div>

        <div id="banner">
            <div class="left">
                <div class="header-text">
                    <p>{{ $home->designation }}</p>
                    <h1>{{ $home->intro }} <span>{{ $home->name }}</span> <br>{{ $home->outro }}</h1>
                    <p>a 2nd Year BSIT <span class="typing-span" style="color: rgb(53, 163, 152);"></span></p>
                    <a href="{{ asset('assets/pics/' . $home->button_link) }}" download class="btn">Download CV</a>
                </div>
                <div class="home-sci">
                    @foreach ($socials as $social)
                        <a href="{{ $social->link }}"><i class="{{ $social->icon }}"></i></a>
                    @endforeach
                </div>
            </div>

            <div class="right">
                <img src="{{ asset('storage/' . $home->photo) }}" alt="me">
            </div>
        </div>

        <!-- ABOUT PAGE -->
        <div id="about">
            <div class="container">
                <div class="row">
                    <div class="about-col-1">
                        <img src="{{ asset('storage/' . $about->photo) }}">
                    </div>
                    <div class="about-col-2">
                        <h1 class="subtitle">{{ $about->title }} <span>{{ $about->span }}</span></h1>
                        <p>{{ $about->description }}
                        </p>

                        <div class="tab-title">
                            <p class="tab-links active link" onclick="opentab('skills')">Skills</p>
                            <p class="tab-links" onclick="opentab('experience')">Experience</p>
                            <p class="tab-links" onclick="opentab('education')">Education</p>
                        </div>

                        <div class="tab-contents active-tab" id="skills-content">
                            <ul>
                                @foreach ($skillItems as $skillItem)
                                    <li><span>{{ $skillItem->name }}</span><br>{{ $skillItem->short_description }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="tab-contents" id="experience-content">
                            <ul>
                                @foreach ($experienceItems as $experienceItem)
                                    <li><span>{{ $experienceItem->timespan }}</span><br>{{ $experienceItem->title }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="tab-contents" id="education-content">
                            <ul>
                                <li><span>2022 - Current</span><br>University of Southeastern Philippines</li>
                                <li><span>2021</span><br>Maryknoll College of Panabo Inc.</li>
                                <li><span>2016</span><br>Maryknoll College of Panabo Inc.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Services Page -->

        <div id="services">
            <div class="container">
                <h1 class="sub-title">{{ $services->title }}</h1>
                <div class="services-list">
                    @foreach ($serviceItems as $serviceItem)
                        <div class="service-item">
                            <img src="{{ asset('storage/' . $serviceItem->photo) }}" class="service-image"
                                alt="{{ $serviceItem->title }}">
                            <div class="content">
                                <i class='{{ $serviceItem->icon }}'></i>
                                <h2>{{ $serviceItem->title }}</h2>
                                <p>{{ $serviceItem->description }}</p>
                                <a href="{{ $serviceItem->button_link }}">{{ $serviceItem->button_text }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>



        <!-- Portfolio Page -->

        <div id="portfolio">
            <div class="container">
                <h1 class="sub-title"><span>{{ $portfolio->span }} </span>{{ $portfolio->title }}</h1>
                <div class="proj-list">
                    <button id="prev-btn"><i class='bx bxs-chevron-left'></i></button>
                    <div class="proj-slider">
                        @foreach ($portfolioItems as $portfolioItem)
                            <div class="proj">
                                <img src="{{ asset('storage/' . $portfolioItem->photo) }}" alt="Project 1">
                                <div class="proj-hover">{{ $portfolioItem->title }}</div>
                            </div>
                        @endforeach
                    </div>
                    <button id="next-btn"><i class='bx bxs-chevron-right'></i></button>
                </div>
            </div>
        </div>



        <!-- CONTACT PAGE -->
        <div id="contact">
            <div class="container">
                <div class="row">
                    <div class="contact-left">
                        <div class="center-text">
                            <h1 class="sub-title">{{ $contact->title }} <span>{{ $contact->span }}</span></h1>
                            <p><i class='{{ $contact->email_icon }}' style='color: turquoise'></i>
                                {{ $contact->email }}</p>
                            <p><i class='{{ $contact->mobile_no_icon }}' style='color: turquoise'></i>
                                {{ $contact->mobile_no }}
                            </p>
                        </div>
                    </div>
                    <div class="contact-right">
                        <form name="{{ $contact->submit_link }}">
                            <input type="text" name="Name" placeholder="Full Name" required>
                            <input type="email" name="Email" placeholder="Email Address" required>
                            <textarea name="Message" rows="6" placeholder="Your Message"></textarea>
                            <button type="submit" class="btn btn2">{{ $contact->button_text }}</button>
                            <span id="msg"></span>
                            <div class="social-icons">
                                @foreach ($socials as $social)
                                    <a href="{{ $social->link }}"><i class="{{ $social->icon }}"></i></a>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="copyright">
        <p>{{ $settings->footer_text }}</p>
    </div>




    <!-- Script for the portfolio page -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const prevBtn = document.getElementById("prev-btn");
            const nextBtn = document.getElementById("next-btn");
            const projects = document.querySelectorAll(".proj");
            let currentIndex = 0;

            // Function to show the current image
            function showImage(index) {
                projects.forEach((project, i) => {
                    if (i === index) {
                        project.classList.add("active");
                    } else {
                        project.classList.remove("active");
                    }
                });
            }

            // Initial display of the first image
            showImage(currentIndex);

            nextBtn.addEventListener("click", function() {
                currentIndex = (currentIndex + 1) % projects.length;
                showImage(currentIndex);
            });

            prevBtn.addEventListener("click", function() {
                currentIndex = (currentIndex - 1 + projects.length) % projects.length;
                showImage(currentIndex);
            });
        });
    </script>


    <!-- Script for the about page -->
    <script>
        var tablinks = document.getElementsByClassName("tab-links");
        var tabcontents = document.getElementsByClassName("tab-contents");

        function opentab(tabname) {
            // Loop through tab links
            for (var i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active-link");
            }

            // Loop through tab contents
            for (var i = 0; i < tabcontents.length; i++) {
                tabcontents[i].classList.remove("active-tab");
            }

            // Add active class to clicked tab link
            for (var i = 0; i < tablinks.length; i++) {
                if (tablinks[i].textContent.toLowerCase() === tabname) {
                    tablinks[i].classList.add("active-link");
                    break;
                }
            }

            // Add active class to corresponding tab content
            document.getElementById(tabname + '-content').classList.add("active-tab");
        }
    </script>

    <script>
        var sidemenu = document.getElementById("sidemenu");

        function openmenu() {
            sidemenu.style.right = "0";
        }

        function closemenu() {
            sidemenu.style.right = "-200px";
        }
    </script>


    <!-- script for the typing effects -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const texts = {!! json_encode(json_decode($home->tags)) !!};
            let index = 0;
            let currentText = "";
            let letterIndex = 0;

            function typeText() {
                if (index === texts.length) {
                    index = 0;
                }
                currentText = texts[index];
                letterIndex = 0;
                type();
                index++;
            }

            function type() {
                if (letterIndex < currentText.length) {
                    document.querySelector('.typing-span').textContent += currentText.charAt(letterIndex);
                    letterIndex++;
                    setTimeout(type, 200);
                } else {
                    setTimeout(erase, 1000);
                }
            }

            function erase() {
                if (letterIndex > 0) {
                    let text = currentText.substring(0, letterIndex - 1);
                    document.querySelector('.typing-span').textContent = text;
                    letterIndex--;
                    setTimeout(erase, 100);
                } else {
                    setTimeout(typeText, 500);
                }
            }

            typeText();
        });
    </script>

    <!-- Script for the contact form -->
    <script>
        const scriptURL =
            'https://script.google.com/macros/s/AKfycby-PAFw9wnNCC7tJwNvS1l_bSL1x1KtlYSwZlWA2JTi5j1SSqAd-9HAW3b7D8bVAo8L/exec'
        const form = document.forms['submit-to-google-sheet']
        const msg = document.getElementById("msg")

        form.addEventListener('submit', e => {
            e.preventDefault()
            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(response => {
                    msg.innerHTML = "Message sent successfuly!"
                    setTimeout(function() {
                        msg.innerHTML = ""
                    }, 5000)
                    form.reset()
                })
                .catch(error => console.error('Error!', error.message))
        })
    </script>


    <!-- Script for the header -->
    <script>
        window.addEventListener('scroll', function() {
            var header = document.querySelector('.header');
            var scrollPosition = window.pageYOffset;

            if (scrollPosition > 0) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>

    <script>
        document.querySelectorAll('nav ul li a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>


</body>

</html>
