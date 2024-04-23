<x-app-layout>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            {{$errors->first()}}
        </div>
    @endif

    <section class="relative">
        <div class="container mx-auto flex flex-col lg:flex-row items-center gap-12 mt-10">
            <!-- Content -->

            <div class="flex flex-1 flex-col items-center lBrog:items-start overflow-hidden">
                <h2 class="primary-linear font-bold text-3xl md:text-4 lg:text-6xl text-center lg:text-center mb-2 py-2 slideUp">
                    Learn. Cook. Share.<br/>Cooking Made Easy.
                </h2>
                <div class="overflow-hidden">
                    <p class="font-thin text-xl md:text-3xl text-center lg:text-left slideUp">
                        Say good bye to long and frustrating
                    </p>
                    <p class="font-thin text-xl md:text-3xl text-center lg:text-left slideUp">
                        food blogs and recipe videos. Access </p>
                    <p class="font-thin text-xl md:text-3xl text-center lg:text-left slideUp">
                        our recipe cards to prepare any dish </p>
                    <p class="font-thin text-xl md:text-3xl text-center lg:text-left slideUp">
                        in minutes.</p>
                    </p>
                </div>
                <div class="flex mx-auto md:mx-40 mt-6 justify-center flex-wrap gap-6">
                    <a href="#search-dish-call">
                        <button type="button"
                                class="primary-btn text-white text-xl font-regular py-2 px-4 rounded transition duration-500 ease-in-out bg-blue-600 hover:bg-red-600 transform hover:-translate-y-1 hover:scale-110 ...">
                            Browse Dish
                        </button>
                    </a>
                </div>
            </div>
            <!-- Image -->
            <div class="flex justify-center flex-1 mb-10 md:mb-16 lg:mb-0 z-10">
                <img class="w-5/6 h-5/6 sm:w-3/4 sm:h-3/4 md:w-full md:h-full fadeInRotate" src="/img/PhoGanh.png"
                     alt="Bun Thit Nuong"/>
            </div>
        </div>
        <!-- Rounded Rectangle -->
        <div
            class="
			hidden
			md:block
			overflow-hidden
			bg-bookmark-purple
			rounded-l-full
			absolute
			h-80
			w-2/4
			top-32
			right-0
			lg:
			-bottom-28
			lg:-right-36
		  "
        ></div>
    </section>

    <!--Browse Dish Section-->
    <section class="relative md:m-10">
        <div id="search-dish-call" class="font-medium text-2xl md:text-4xl text-center mb-6">Search Your Favorite Dish
        </div>
        <div class="bg-white p-3 shadow-sm rounded-sm">
            <!--Search bar-->
            <div class="border rounded overflow-hidden flex mb-4">
                <input id="home-dish-search-bar" type="text"
                       class="w-11/12 px-4 py-2 border-gray-300 input-primary font-regular"
                       placeholder="What are you looking for?">
                <button class="flex w-1/12 items-center justify-center md:px-4 border-l">
                    <svg class="h-4 w-4 text-grey-dark" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24">
                        <path
                            d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"/>
                    </svg>
                </button>

            </div>
            <div id="search-live-result"></div>

            <!--Recent Posts-->
            <p id="home-no-posts" class="hidden text-center my-4 text-sm font-medium text-gray-400">No Dishes Found</p>
            <div id="home-posts" class="grid grid-cols-1 md:grid-cols-4 gap-3">

            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="viewport">
                <section
                    style="background-image: url('assets/images/menu-bg.png')"
                    class="our-menu section bg-light repeat-img"
                    id="menu"
                >
                    <div class="sec-wp">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="sec-title text-center mb-5">
                                        <p class="sec-sub-title mb-3">Top Recipe</p>
                                        <h2 class="h2-title">
                                            wake up early,
                                            <span>eat fresh & healthy</span>
                                        </h2>
                                        <div class="sec-title-shape mb-4">
                                            <img
                                                src="assets/images/title-shape.svg"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-tab-wp">
                                <div class="row">
                                    <div class="col-lg-12 m-auto">
                                        <div class="menu-tab text-center">
                                            <ul class="filters">
                                                <div class="filter-active"></div>
                                                <li class="filter" data-filter=".all, .breakfast, .lunch, .dinner">
                                                    <img src="assets/images/menu-1.png" alt=""/>
                                                    All
                                                </li>
                                                <li class="filter" data-filter=".breakfast">
                                                    <img src="assets/images/menu-2.png" alt=""/>
                                                    Breakfast
                                                </li>
                                                <li class="filter" data-filter=".lunch">
                                                    <img src="assets/images/menu-3.png" alt=""/>
                                                    Lunch
                                                </li>
                                                <li class="filter" data-filter=".dinner">
                                                    <img src="assets/images/menu-4.png" alt=""/>
                                                    Dinner
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-list-row">
                                <div class="row g-xxl-5 bydefault_show" id="menu-dish">
                                    @foreach($recipes as $recipe)

                                        <div class="col-lg-4 col-sm-6 dish-box-wp breakfast" data-cat="breakfast">
                                            <div class="dish-box text-center">
                                                <div class="dist-img">
                                                    <img src="assets/images/dish/1.png" alt=""/>
                                                </div>
                                                <div class="dish-rating">
                                                    5
                                                    <i class="uil uil-star"></i>
                                                </div>
                                                <div class="dish-title">
                                                    <h3 class="h3-title">
                                                        <a href="/recipedetail/{{$recipe->id}}"
                                                           class="primary-link">{{$recipe->title}}</a>
                                                    </h3>
                                                    <p>120 calories</p>
                                                </div>
                                                <div class="dish-info">
                                                    <ul>
                                                        <li>
                                                            <p>Type</p>
                                                            <b>Non Veg</b>
                                                        </li>
                                                        <li>
                                                            <p>Persons</p>
                                                            <b>{{$recipe->servings}}</b>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="dist-bottom-row">
                                                    <ul>
                                                        <li>
                                                            <b>{{$recipe->cook_time}} Phút</b>
                                                        </li>
                                                        <li>
                                                            <form action="{{route('favorite.store')}}">
                                                                @csrf
                                                                @auth
                                                                    <input type="hidden" name="user_id"
                                                                           value="{{auth()->user()->id}}">
                                                                @endauth
                                                                <input type="hidden" name="recipe_id"
                                                                       value="{{$recipe->id}}">
                                                                @auth
                                                                    <button type="submit" class="dish-add-btn">
                                                                        <i class="uil uil-bookmark-full"></i>
                                                                    </button>
                                                                @else

                                                                    <a href="{{route('login')}}"
                                                                       class="dish-add-btn p-2"><i
                                                                            class="uil uil-bookmark-full"></i></a>
                                                                @endauth
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <!-- jquery  -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!-- fontawesome  -->
    <script src="assets/js/font-awesome.min.js"></script>

    <!-- swiper slider  -->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!-- mixitup -- filter  -->
    <script src="assets/js/jquery.mixitup.min.js"></script>

    <!-- fancy box  -->
    <script src="assets/js/jquery.fancybox.min.js"></script>

    <!-- parallax  -->
    <script src="assets/js/parallax.min.js"></script>

    <!-- gsap  -->
    <script src="assets/js/gsap.min.js"></script>

    <!-- scroll trigger  -->
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <!-- scroll to plugin  -->
    <script src="assets/js/ScrollToPlugin.min.js"></script>
    <!-- rellax  -->
    <!-- <script src="assets/js/rellax.min.js"></script> -->
    <!-- <script src="assets/js/rellax-custom.js"></script> -->
    <!-- smooth scroll  -->
    <script src="assets/js/smooth-scroll.js"></script>
    <!-- custom js  -->
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function () {
            $('#home-dish-search-bar').on('keyup', function () {
                var query = $(this).val();
                $.ajax({
                    url: "/search",
                    type: "GET",
                    data: {'search': query},
                    success: function (data) {
                        $('#search-live-result').html(data);
                    }
                });
            })
        })
    </script>
</x-app-layout>
