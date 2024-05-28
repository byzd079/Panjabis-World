<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Dress Shop</title>
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>

<body>
    <header>
        <div class="container">
            <img src="{{asset('icons/logo.jpg')}}" alt="Online Dress Shop Logo">
            <nav>
                <ul>
                    <li><a href="/profile">{{auth()->user()->name}}</a></li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="banner">
        <div class="container">
            <h2>Discover Latest Trends</h2>
            <p>Explore our collection of trendy dresses</p>
        </div>
    </section>

    <section class="products">
        <div class="container">
            <h2>Featured Products</h2>
            @foreach($items as $item)
            <div class="product">
                <img src="{{ asset('uploads/products/'.$item->photo) }}">
                <h3>{{ $item->name }}</h3>
                <p>Description: {{ $item->description }}</p>
                <p>Price: ${{ $item->price }}</p>
                <button onclick="window.location='{{route('example2', $item->itemID)}}'">Checkout</button>
            </div>
            @endforeach
        </div>
    </section>

    <section class="blogs">
    <h2 class="featured">Some related Blogs here</h2>

    <div class="blog">
        <h3>5 Fashion Trends for this Season</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum lacus eget blandit fermentum. Nulla facilisi. Nullam maximus varius lorem, nec gravida justo bibendum vel.</p>
        <a href="#">Read more</a>
    </div>

    <div class="blog">
        <h3>How to Choose the Perfect Dress for Your Body Type</h3>
        <p>Curabitur vel ligula quis ipsum sagittis gravida non eget nisi. Donec dignissim nunc at magna efficitur, eu fermentum risus sollicitudin.</p>
        <a href="#">Read more</a>
    </div>

    <div class="blog">
        <h3>The Importance of Accessories in Completing Your Look</h3>
        <p>Phasellus feugiat, risus sit amet tincidunt efficitur, eros magna eleifend velit, vel placerat nisi purus id urna. Nam interdum velit at feugiat dictum.</p>
        <a href="#">Read more</a>
    </div>
</section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Online Dress Shop. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>