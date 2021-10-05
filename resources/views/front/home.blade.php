<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="description" content="Updates and statistics">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/normalize.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" >
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>


{{--start landing page--}}
    <div class="landing-page">
        <div class="overlay"></div>
        <div class="container">
            <div class="header-area">
                <div class="logo">
                    special logo
                </div>
                <ul class="links">
                    <li><a href="#" class="active">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

        </div>
        <div class="introduction-text">
            <h1>We Are <span >Creativity</span> Company</h1>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec qu</p>

        </div>
    </div>
    {{--ending landing page--}}
    {{--start settings box--}}
    <div class="settings-box">
        <!--dsadsa-->
        <div class="toggle-settings">
            <i class="fa fa-gear"></i>
        </div>
        <div class="settings-container">
            <div class="option-box">
                <h4>Colors</h4>
                <ul class="colors-list">
                    <li class="active" data-color="#ffc905"></li>
                    <li data-color="#0b3cb8"></li>
                    <li data-color="#5f3f3f"></li>
                    <li data-color="#ffda8c"></li>
                    <li data-color="#fd09e8"></li>
                </ul>
            </div>
            <div class="option-box">
                <h4>Random Background</h4>
                <div class="random-background">
                    <span class="yes active" data-background="yes">Yes</span>
                    <span class="no" data-background="no">No</span>
                </div>
            </div>
        </div>
    </div>
    {{--end settings box--}}

    {{--start about us--}}
    <div class="container">
        <div class="about-us">
            <div class="info-box">
                <h2>About us</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate
                </p>

            </div>
            <div class="image-box">
                <img src="{{asset('front/images/about-us.jpg')}}">
            </div>
        </div>
    </div>
    {{--end about us--}}

    <!-- start out skills-->
    <div class="skills">
        <div class="container">
            <h2>Our Skills</h2>
            <div class="skill-box">
                <div class="skill-name">HTML</div>
                <div class="skill-progress">
                    <span data-progress="90%"></span>
                </div>
            </div>
            <div class="skill-box">
                <div class="skill-name">Css</div>
                <div class="skill-progress">
                    <span data-progress="80%"></span>
                </div>
            </div>
            <div class="skill-box">
                <div class="skill-name">JavaScript</div>
                <div class="skill-progress">
                    <span data-progress="70%"></span>
                </div>
            </div>
            <div class="skill-box">
                <div class="skill-name">PYTHON</div>
                <div class="skill-progress">
                    <span data-progress="65%"></span>
                </div>
            </div>
            <div class="skill-box">
                <div class="skill-name">JAVA</div>
                <div class="skill-progress">
                    <span data-progress="90%"></span>
                </div>
            </div>
            <div class="skill-box">
                <div class="skill-name">Android</div>
                <div class="skill-progress">
                    <span data-progress="90%"></span>
                </div>
            </div>
        </div>

    </div>
<!-- end out skills-->
<!-- start our gallery-->
    <div class="gallery">
        <div class="container">
            <h2>Our Gallery</h2>
            <div class="image-box">
                <img src="{{asset('front/images/school1.jpg')}}" alt="School">
                <img src="{{asset('front/images/school2.jpg')}}">
                <img src="{{asset('front/images/school3.jpeg')}}">
                <img src="{{asset('front/images/school4.jpg')}}">
                <img src="{{asset('front/images/school5.jpg')}}">
                <img src="{{asset('front/images/school6.jpg')}}">
                <img src="{{asset('front/images/school7.jpeg')}}">
                <img src="{{asset('front/images/school8.jpg')}}">
            </div>
        </div>
    </div>
<!-- end our gallery-->
<!-- start timeline-->

    <div class="timeline">
        <div class="container">
            <h2>Timeline</h2>
            <div class="timeline-content">
                <div class="year">2018</div>
                <div class="left">
                    <div class="content">
                        <h3>Testing Heading</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec qu</p>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="right">
                    <div class="content">
                        <h3>Testing Heading</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec qu</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- end timeline-->
<!-- start ourfeatures-->
    <div class="features">
        <h2>Our Features</h2>
        <div class="container">
            <div class="feat-box">
                <img src="{{asset('front/images/feature1.jpg')}}" alt="">
                <h4>Development</h4>
                <p>We are professional markters,we will do anothing you imagine in no time</p>
            </div>
            <div class="feat-box">
                <img src="{{asset('front/images/feature2.jpg')}}" alt="">
                <h4>Development</h4>
                <p>We are professional markters,we will do anothing you imagine in no time</p>
            </div>
            <div class="feat-box">
                <img src="{{asset('front/images/feature3.jpg')}}" alt="">
                <h4>Development</h4>
                <p>We are professional markters,we will do anothing you imagine in no time</p>
            </div>
            <div class="feat-box">
                <img src="{{asset('front/images/feature4.jpg')}}" alt="">
                <h4>Development</h4>
                <p>We are professional markters,we will do anothing you imagine in no time</p>
            </div>
            <div class="feat-box">
                <img src="{{asset('front/images/feature2.jpg')}}" alt="">
                <h4>Development</h4>
                <p>We are professional markters,we will do anothing you imagine in no time</p>
            </div>
            <div class="feat-box">
                <img src="{{asset('front/images/feature3.jpg')}}" alt="">
                <h4>Development</h4>
                <p>We are professional markters,we will do anothing you imagine in no time</p>
            </div>
        </div>
    </div>
<!-- end ourfeatures-->

<script type="text/javascript" src="{{asset('front/js/script.js')}}" ></script>

</body>
</html>
