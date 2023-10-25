<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/all.min.css" />
    <link rel="stylesheet" href="/css/homepage.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>@yield('title', 'Display All Products')</title>
    <link rel="icon" type="image/x-icon" href="/images/about-medicine.png">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/homepage.css" />

    <script src="js/all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <title>Display All Products</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }


        /* Apply styles to the body and overall layout */
        body {
            background-color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        /* Style the product container */
        .disp {
            background-color: #000039;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            text-align: center;
            /* width: 300px; */
            transition: box-shadow 0.3s ease-in-out;
        }

        /* Add hover effect to the product container */
        .disp:hover {
            box-shadow: 10px 10px 20px 7px rgb(10, 10, 10);
        }

        /* Style the product name */
        .hed2 {
            color: #fff;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        /* Style the product description and price */
        .pr {
            color: #fff;
            font-size: 1rem;
            margin-bottom: 15px;
        }

        /* Style the product image */
        img {
            border-radius: 5px;
            margin-bottom: 15px;
        }

        /* Style the action buttons */
        .sbt {
            background-color: #1c1cf0;
            flex-direction: row;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 1rem;
            margin: 5px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
        }

        /* Add hover effect to the buttons */
        .sbt:hover {
            background-color: #0000cd;
        }

        .big {
            display: flex;
            flex-direction: row;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .disp {
                width: 90%;
            }

        }
    </style>
</head>

<body>
    @include('layout.header')
    <div class="big row">
        @foreach ($products as $product)
            <div class="disp col-3">
                <h2 class="hed2">{{ $product->name }}</h2>
                <p class="pr">Description: {{ $product->desciption }}</p>
                <p class="pr">Price: {{ $product->price }}</p>
                <img src="{{ Storage::url($product->image) }}" width="80" alt="Product Image">
                <a href="{{ route('addtocart', ['id' => $product->id]) }}"><button class="sbt">Add to
                        cart</button></a>
            </div>
        @endforeach
    </div>
    @include('layout.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
