<x-app-layout>
    <style>
        html {
            scroll-behavior: smooth;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
            background-color: white;
        }

        .title {
            color: grey;
            font-size: 18px;
        }

        button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        a {
            text-decoration: none;
            font-size: 22px;
            color: black;
        }

        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }

    </style>

    <body class="bg-blue-50">
    <!-- Header Navigation Section -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="relative flex items-top justify-center min-h-screen sm:items-down sm:pt-0" style="margin-top: 50px;">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-8 overflow-hidden">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6 mr-2 bg-blue-50 dark:bg-blue-500 sm:rounded-lg">
                        <h1 class="text-4xl sm:text-5xl primary-color dark:text-white font-extrabold tracking-tight">
                            Get in touch
                        </h1>
                        <p class="bg-primary-linear ,text-normal text-lg sm:text-2xl font-medium text-white-500 dark:text-white-500 mt-2">
                            Fill in the form to start a conversation
                        </p>


                        <div class="flex items-center mt-8 text-gray-600 dark:text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                19 Nguyen Huu Tho,
                                Tan Hung, District 7
                                Ho Chi Minh City
                            </div>
                        </div>

                        <div class="flex items-center mt-4 text-gray-600 dark:text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                +84 984 00 8888
                            </div>
                        </div>

                        <div class="flex items-center mt-2 text-gray-600 dark:text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <div class="ml-4 text-md tracking-wide font-semibold w-40">
                                foodie@foodlovers.com
                            </div>
                        </div>
                    </div>

                    <form class="p-6 flex flex-col justify-center" action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="flex flex-col">
                            <label for="name" class="hidden">Full Name</label>
                            <input type="name" name="name" id="name" placeholder="Full Name"
                                   class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                        </div>

                        <div class="flex flex-col mt-2">
                            <label for="email" class="hidden">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email"
                                   class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                        </div>

                        <div class="flex flex-col mt-2">
                            <label for="Note" class="hidden">Note</label>
                            <textarea type="Note" name="note" id="Note" placeholder="Add a note"
                                      class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none"></textarea>
                        </div>

                        <div class="flex flex-col mt-3">
                            <button name="btn-send" type="submit"
                                    class="primary-linear-btn md:w-100 text-white font-bold py-3 px-6 rounded-lg  transition ease-in-out duration-300">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <span style="float: left;margin-left: 20%;margin-top: -20%;margin-bottom: 100px">
     <div class="card w-96 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 ...">
  <img class="h-70 object-cover" src="../img/anh/cuonglamphu.jpg" alt="Cuong Lam Phu" style="width:100%">
  <h1 class="font-medium">Cuong Lam Phu</h1>
  <p class="title font-regular">Creator</p>
  <p class="font-light mx-3">We started Foodie as a project to learn something but now, we want to take it to a product level which we can release in the market.</p>






</div>
</span>
    <span style="float: right;margin-right: 20%;margin-top: -20%;margin-bottom: 100px">
	<div class="card w-96 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 ...">
  <img class="h-70 object-cover" src="../img/anh/huytong.jpg" alt="Huy Tong" style="width:100%">
  <h1 class="font-medium">Huy Tong</h1>
  <p class="title font-regular">Creator</p>
  <p class="font-light mx-3">Foodie taught us many things not just about tech, but also about business model and marketing. Looking forward to grow it.</p>







</div>
</span>
    <div class="mb-8" id="map"></div>
    </body>
</x-app-layout>
