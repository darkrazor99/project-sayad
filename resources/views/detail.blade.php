<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Startup - Startup Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('storage/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i
                            class="fa fa-map-marker-alt me-2"></i>{{ $getInTouch->address }}</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>{{ $getInTouch->phone }}</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>{{ $getInTouch->email }}</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                        href="{{ $getInTouch->twitter }}"><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                        href="{{ $getInTouch->facebook }}"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                        href="{{ $getInTouch->linkedIn }}"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                        href="{{ $getInTouch->instagram }}"><i class="fab fa-instagram fw-normal"></i></a>
                    {{-- <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="{{$getInTouch->address}}"><i
                                class="fab fa-youtube fw-normal"></i></a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 p-4"
                style="max-height:170px; max-width:161px ">
                <a href="{{ url('/') }}" class="navbar-brand p-0">
                    <img src="{{ asset('storage/img/logo.png') }}" class="img-fluid w-100">
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                @if ($isArabic)
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ url('/index-ar') }}" class="nav-item nav-link">Home</a>
                        <a href="{{ url('/about-ar') }}" class="nav-item nav-link">About</a>
                        <a href="{{ url('/service-ar') }}" class="nav-item nav-link">Services</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                            <div class="dropdown-menu m-0">
                                {{-- books --}}
                                <a href="{{ url('/books-ar') }}" class="dropdown-item">books</a>
                                {{-- photos --}}
                                <a href="{{ url('/art-ar') }}" class="dropdown-item">art</a>
                                {{-- pdf --}}
                                <a href="{{ url('/pdf-ar') }}" class="dropdown-item">pdf</a>
                                {{-- videos --}}
                                <a href="{{ url('/vid-ar') }}" class="dropdown-item">videos</a>
                                {{-- normale blogs --}}
                                <a href="{{ url('/blog-ar') }}" class="dropdown-item">Blog</a>
                            </div>
                        </div>
                        <a href="{{ url('/contact-ar') }}" class="nav-item nav-link">Contact</a>
                    </div>
                @else
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                        <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
                        <a href="{{ url('/service') }}" class="nav-item nav-link">Services</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Blog</a>
                            <div class="dropdown-menu m-0">
                                {{-- books --}}
                                <a href="{{ url('/books') }}" class="dropdown-item">books</a>
                                {{-- photos --}}
                                <a href="{{ url('/art') }}" class="dropdown-item">art</a>
                                {{-- pdf --}}
                                <a href="{{ url('/pdf') }}" class="dropdown-item">pdf</a>
                                {{-- videos --}}
                                <a href="{{ url('/vid') }}" class="dropdown-item">videos</a>
                                {{-- normale blogs --}}
                                <a href="{{ url('/blog') }}" class="dropdown-item">Blog</a>
                            </div>
                        </div>
                        <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                    </div>
                @endif
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px; min-height:100px">
            <div style="height:50px;">

            </div>
            {{-- <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">About Us</h1>
                    <a href="" class="h5 text-white">Home</a>
                    <i class="far fa-circle text-white px-2"></i>
                    <a href="" class="h5 text-white">About</a>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Navbar End -->



    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    @if ($isStory)
                        <div class="mb-5">
                            @if ($articals[0]->img != null)
                                <img class="img-fluid w-100 rounded mb-5"
                                    src="{{ asset('storage/' . $articals[0]->img) }}" alt="">
                            @endif


                            <h1 class="mb-4">{{ $articals[0]->header }}</h1>
                            <p>{{ $articals[0]->body }}</p>


                        </div>
                        <div class="col-12 wow slideInUp" data-wow-delay="0.1s">
                            {{-- paging the css and the html comes from Resources/vendor/livewire/bootstrap.blade.php --}}
                            {{ $articals->links() }}
                        </div>
                    @else
                        <div class="mb-5">
                            @if ($hasVid)
                                {{-- display video here --}}
                                <video width="800" height="800" controls>
                                    <source src="{{ asset('storage/' . $focus[0]->vid) }}" type="video/mp4">
                                    <source src="{{ asset('storage/' . $focus[0]->vid) }}" type="video/ogg">
                                    <source src="{{ asset('storage/' . $focus[0]->vid) }}" type="video/webm">

                                    Your browser does not support the video tag.
                                </video>
                            @else
                                @if ($focus[0]->img != null)
                                    <img class="img-fluid w-100 rounded mb-5"
                                        src="{{ asset('storage/' . $focus[0]->img) }}" alt="">
                                @endif
                            @endif

                            <h1 class="mb-4">{{ $focus[0]->header }}</h1>
                            <p>{{ $focus[0]->body }}</p>

                            @if ($hasPdf)
                                {{-- display pdf --}}
                                <object data="{{ asset('storage/' . $focus[0]->pdf) }}" type="application/pdf"
                                    width="600" height="700">

                                </object>
                            @endif

                        </div>

                    @endif

                    <!-- Blog Detail End -->
                    {{-- comments make them work later monkey --}}

                    {{-- <!-- Comment List Start -->
                    <div class="mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">3 Comments</h3>
                        </div>
                        <div class="d-flex mb-4">
                            <img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                <button class="btn btn-sm btn-light">Reply</button>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                <button class="btn btn-sm btn-light">Reply</button>
                            </div>
                        </div>
                        <div class="d-flex ms-5 mb-4">
                            <img src="img/user.jpg" class="img-fluid rounded" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6><a href="">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed eirmod</p>
                                <button class="btn btn-sm btn-light">Reply</button>
                            </div>
                        </div>
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class="bg-light rounded p-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Leave A Comment</h3>
                        </div>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-white border-0"
                                        placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-white border-0"
                                        placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control bg-white border-0"
                                        placeholder="Website" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Leave Your
                                        Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End --> --}}
                </div>

                <!-- Sidebar Start -->
                <div class="col-lg-4">

                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Categories</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            @foreach ($category as $item)
                                @if ($isArabic)
                                    @if ($hasPdf)
                                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2"
                                            href="{{ url('/pdfcategory-ar/' . $item->id) }}"><i
                                                class="bi bi-arrow-right me-2"></i>{{ $item->name_ar }}</a>
                                    @elseif ($hasVid)
                                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2"
                                            href="{{ url('/vidcategory-ar/' . $item->id) }}"><i
                                                class="bi bi-arrow-right me-2"></i>{{ $item->name_ar }}</a>
                                    @elseif($isArt)
                                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2"
                                            href="{{ url('/artcategory-ar/' . $item->id) }}"><i
                                                class="bi bi-arrow-right me-2"></i>{{ $item->name_ar }}</a>
                                    @elseif($isStory)
                                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2"
                                            href="{{ url('/category-ar/' . $item->id) }}"><i
                                                class="bi bi-arrow-right me-2"></i>{{ $item->name_ar }}</a>
                                    @else
                                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2"
                                            href="{{ url('/blogcategory-ar/' . $item->id) }}"><i
                                                class="bi bi-arrow-right me-2"></i>{{ $item->name_ar }}</a>
                                    @endif
                                @else
                                    @if ($hasPdf)
                                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2"
                                            href="{{ url('/pdfcategory/' . $item->id) }}"><i
                                                class="bi bi-arrow-right me-2"></i>{{ $item->name_ar }}</a>
                                    @elseif ($hasVid)
                                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2"
                                            href="{{ url('/vidcategory/' . $item->id) }}"><i
                                                class="bi bi-arrow-right me-2"></i>{{ $item->name_ar }}</a>
                                    @elseif($isArt)
                                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2"
                                            href="{{ url('/artcategory/' . $item->id) }}"><i
                                                class="bi bi-arrow-right me-2"></i>{{ $item->name_ar }}</a>
                                    @elseif($isStory)
                                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2"
                                            href="{{ url('/category/' . $item->id) }}"><i
                                                class="bi bi-arrow-right me-2"></i>{{ $item->name_ar }}</a>
                                    @else
                                        <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2"
                                            href="{{ url('/blogcategory/' . $item->id) }}"><i
                                                class="bi bi-arrow-right me-2"></i>{{ $item->name_ar }}</a>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- Category End -->
                    @if ($isStory)
                        <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">

                                <h3 class="mb-0">Quick Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2"
                                    href="{{ url('/books') }}"><i class="bi bi-arrow-right me-2"></i>return</a>

                            </div>
                        </div>
                    @endif

                    @if (!$isStory)
                        <!-- Recent Post Start -->
                        <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="mb-0">Recent Post</h3>
                            </div>
                            @if ($articals->count() < 6)
                                @foreach ($articals as $artical)
                                    <div class="d-flex rounded overflow-hidden mb-3">
                                        <img class="img-fluid" src="{{ asset('storage/' . $artical->img) }}"
                                            style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                        @if ($isArabic)
                                            {{-- /books-ar/{id} --}}
                                            @if ($hasPdf)
                                                <a href="{{ url('/pdf-ar/' . $artical->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $artical->header }}
                                                </a>
                                            @elseif ($hasVid)
                                                <a href="{{ url('/vid-ar/' . $artical->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $artical->header }}
                                                </a>
                                            @elseif($isArt)
                                                <a href="{{ url('/art-ar/' . $artical->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $artical->header }}
                                                </a>
                                            @else
                                                <a href="{{ url('/blog-ar/' . $artical->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $artical->header }}
                                                </a>
                                            @endif
                                        @else
                                            {{-- /books-ar/{id} --}}

                                            @if ($hasPdf)
                                                <a href="{{ url('/pdf/' . $artical->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $artical->header }}
                                                </a>
                                            @elseif ($hasVid)
                                                <a href="{{ url('/vid/' . $artical->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $artical->header }}
                                                </a>
                                            @elseif($isArt)
                                                <a href="{{ url('/art/' . $artical->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $artical->header }}
                                                </a>
                                            @else
                                                <a href="{{ url('/blog/' . $artical->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $artical->header }}
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                @for ($i = 0; $i < 6; $i++)
                                    <div class="d-flex rounded overflow-hidden mb-3">
                                        <img class="img-fluid" src="{{ asset('storage/' . $articals[$i]->img) }}"
                                            style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                        @if ($isArabic)
                                            {{-- /books-ar/{id} --}}

                                            @if ($hasPdf)
                                                <a href="{{ url('/pdf-ar/' . $articals[$i]->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $articals[$i]->header }}
                                                </a>
                                            @elseif ($hasVid)
                                                <a href="{{ url('/vid-ar/' . $articals[$i]->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $articals[$i]->header }}
                                                </a>
                                            @elseif($isArt)
                                                <a href="{{ url('/art-ar/' . $artical->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $artical->header }}
                                                </a>
                                            @else
                                                <a href="{{ url('/blog-ar/' . $artical->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $artical->header }}
                                                </a>
                                            @endif
                                        @else
                                            @if ($hasPdf)
                                                <a href="{{ url('/pdf/' . $articals[$i]->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $articals[$i]->header }}
                                                </a>
                                            @elseif ($hasVid)
                                                <a href="{{ url('/vid/' . $articals[$i]->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $articals[$i]->header }}
                                                </a>
                                            @elseif($isArt)
                                                <a href="{{ url('/art/' . $artical->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $artical->header }}
                                                </a>
                                            @else
                                                <a href="{{ url('/blog/' . $artical->id) }}"
                                                    class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">
                                                    {{ $artical->header }}
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                @endfor
                            @endif
                        </div>
                        <!-- Recent Post End -->
                    @endif

                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->



    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div
                        class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="{{ url('/') }}" class="navbar-brand">
                            {{-- <h1 class="m-0 text-white"><i class="fa fa-user-tie me-2"></i>Startup</h1> --}}
                            <img src="{{ asset('storage/img/logo.png') }}" class="img-fluid w-100">
                        </a>
                        {{-- <p class="mt-3 mb-4">Lorem diam sit erat dolor elitr et, diam lorem justo amet clita stet eos
                            sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam amet erat lorem stet eos. Diam amet
                            et kasd eos duo.</p> --}}
                        {{-- <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                                <button class="btn btn-dark">Sign Up</button>
                            </div>
                        </form> --}}
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Get In Touch</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">{{ $getInTouch->address }}</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">{{ $getInTouch->email }}</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">{{ $getInTouch->phone }}</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="{{ $getInTouch->twitter }}"><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="{{ $getInTouch->facebook }}"><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="{{ $getInTouch->linkedIn }}"><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="{{ $getInTouch->Instagram }}"><i
                                        class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Quick Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="{{ url('/') }}"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="{{ url('/about') }}"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="{{ url('/service') }}"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                                <a class="text-light mb-2" href="{{ url('/blog') }}"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Latest Blogs</a>
                                <a class="text-light" href="{{ url('/contact') }}"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            {{-- <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Popular Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                                <a class="text-light" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white bg-dark">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Your Site
                                Name</a>. All Rights Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed by <a class="text-white border-bottom" href="https://htmlcodex.com">HTML
                                Codex</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
