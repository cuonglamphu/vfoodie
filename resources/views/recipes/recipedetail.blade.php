<x-app-layout>

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="../styles/style.css">
    <body>

    <!-- Preloader -->
    <div id="preloader" >
        <i class="circle-preloader"></i>
        <img src="../img/core-img/logoFD.png" style="width: 60px" alt="" />
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="receipe-post-area section-padding-80">
        <!-- Receipe Slider -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="receipe-slider owl-carousel">
                        @foreach($recipe->images as $image)
                            @foreach ($recipe->images as $image)
                                @php
                                    // Loại bỏ 'public/' từ đầu đường dẫn và thêm '/storage/' để tạo URL đúng
                                    $imageUrl = Str::replaceFirst('public/', '/storage/', $image->image);
                                @endphp
                                <div ><img  style="max-width: 75%; margin: 0px auto" src="{{ url($imageUrl) }}" alt="Image description" class="object-cover"></div>
                            @endforeach
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <!-- Receipe Content Area -->
        <div class="receipe-content-area">
            <div class="container">

                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="receipe-headline my-5">
                            <span>{{ $recipe->created_at->format('Y-m-d') }}</span>
                            <h5>{{ $userFullName }}</h5>
                            <h2>{{ $recipe->title }}</h2>
                            <div class="receipe-duration">
                                <h6>Prep: {{ $recipe->prep_time }} mins</h6>
                                <h6>Cook: {{ $recipe->cook_time }} mins</h6>
                                <h6>Yields: {{ $recipe->servings }} Servings</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="receipe-ratings text-right my-5">
                            <div class="ratings">
                                @for ($i = 0; $i < $recipe->rating; $i++)
                                    <i class="uil uil-star"></i>
                                @endfor
                            </div>
                            <a href="#" class="btn delicious-btn">For Beginners</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8">
                        @foreach($recipeSteps as $step)
                            <div class="single-preparation-step d-flex">
                                <h4>{{ $step->step_number }}.</h4>
                                <p>{{ $step->description }}</p>
                            </div>
                        @endforeach
                    </div>

                    <!-- Ingredients -->
                    <div class="col-12 col-lg-4">
                        <div class="ingredients">
                            <h4>Ingredients</h4>

                            @foreach($recipeIngredients as $ingredient)
                                <!-- Custom Checkbox -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck{{ $loop->index + 1 }}" />
                                    <label class="custom-control-label" for="customCheck{{ $loop->index + 1 }}">{{$ingredient->quantity}} {{$ingredient->unit}} {{ $ingredient->name }}  </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container"><div class="col-12 md:col-8 my-2 ">
            <div class="row">Tag:
                @foreach($recipeTags as $tag)
                    <a class="btn btn-success mx-1 py-0 opacity-50">{{$tag->name}}</a>
                @endforeach
            </div>
        </div>
    </div>
    <!--Comments-->
    <div class="py-5 flex justify-center">
        <div class="w-11/12 md:w-7/10 md:mx-8 md:flex md:max-w-5xl shadow-lg rounded-lg">
            <form class="w-full bg-white rounded-lg px-4 pt-2">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg font-medium">Add a new comment</h2>
                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                        <textarea id="dish-new-comment-text" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-regular placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
                    </div>
                    <div class="w-full md:w-full flex items-start md:w-full px-3">
                        <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                            <svg fill="none" class="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-xs md:text-sm pt-px">You must be logged in to comment.</p>
                        </div>
                        <div class="-mr-1">
                            <input onClick="onCommentSubmitted()" type='submit' class="primary-btn py-2 text-white font-medium py-1 px-4 border rounded-lg tracking-wide mr-1 hover:bg-blue-700 cursor-pointer" value='Post Comment'>
                        </div>
                    </div>

            </form>


            <!--Previously added comments-->
            <p id="dish-no-comments" class="mx-auto text-center text-sm font-medium text-gray-400 mt-4">No Comments</p>
            <div id="dish-comments" class="w-full px-4 pt-2 pb-2 mt-4">
                <!-- You can add previously added comments here using PHP loops -->
            </div>
        </div>
    </div>


    <!-- ##### Follow Us Instagram Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="../js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="../js/active.js"></script>
    </body>
</x-app-layout>
