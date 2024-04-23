<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- ... -->
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="../styles/main.css" rel="stylesheet" type="text/css">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>

    <!-- jQuery -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- for icons  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Bootstrap Tags Input CSS -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- fancy box  -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <style>
        .primary-color {
            color: #E36414;
        }

        .primary-color:hover {
            color: #fc5900;
        }

        .text-primary-color {
            text-decoration-color: #E36414;
        }

        [type=text]:focus, input:where(:not([type])):focus, [type=email]:focus, [type=url]:focus, [type=password]:focus, [type=number]:focus, [type=date]:focus, [type=datetime-local]:focus, [type=month]:focus, [type=search]:focus, [type=tel]:focus, [type=time]:focus, [type=week]:focus, [multiple]:focus, textarea:focus, select:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: #E36414;
            --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
            --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
            box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
            border-color: #E36414
        }

        .bg-primary-color {
            background-color: #E36414;
        }

        .bootstrap-tagsinput {
            background-color: #f3f3f3;
            border-radius: 4px;
            padding: 6px;
            line-height: 22px;
        }

        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white;
            background-color: #ff8140;
            padding: 0.2em 0.6em;
            border-radius: 4px;
            display: inline-block;
            margin-top: 5px;
        }

        .bootstrap-tagsinput .tag [data-role="remove"] {
            margin-left: 8px;
            cursor: pointer;
        }

        .list-items {
            overflow-y: auto; /* Cho phép cuộn theo chiều dọc */
            max-height: 100px; /* Giới hạn chiều cao tối đa của container */
            width: 90%; /* Hoặc kích thước cụ thể tùy theo thiết kế của bạn */
            margin: 0 auto; /* Để container ở giữa */
            padding: 5px; /* Khoảng cách xung quanh nội dung */
        }

        .file-name {
            background-color: #f0f0f0;
            margin: 5px 0;
            padding: 5px;
            border-radius: 5px;
            font-size: 14px;
            white-space: nowrap; /* Đảm bảo tên tệp không bị bao */
            overflow: hidden; /* Ẩn nội dung vượt quá kích thước */
            text-overflow: ellipsis; /* Thêm dấu ... nếu tên tệp dài */
        }

    </style>

    {{--    favicon--}}
    <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    @vite('resources/js/app.js')

</head>
