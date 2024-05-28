<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <!-- Top Navigation Bar -->
    <div class="navbar">
        <h1>Admin Dashboard</h1>
        <span class="admin-name">Welcome, {{ Auth::user()->username }}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="success">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
            @endif
        </div>
        <div class="header">
            <div class="headerimg"><img src="icons/trolley.png" alt="logo"></div>
            <div class="headercontent">
                <h2>Item Management</h2>
            </div>
        </div>
        <hr class="divide" />
        <div class="main">
            <div class="search">
                <form action="{{ route('items.search') }}" method="GET">
                    <input type="text" name="query" placeholder="Search by name...">
                    <button type="submit"><img src="icons/search.png"></button>
                </form>
            </div>
            <div class="add">
                <h4>Add New Item: </h4>
                <a href="{{ route('items.create') }}"><img src="icons/add.png"></a>
            </div>
            <div class="showitem">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->itemID }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td><img src="{{ asset('uploads/products/' . $item->photo) }}" alt="photo" style="width: 100px; height: 100px;"></td>
                            <td>
                                <a href="{{ route('items.edit', $item->itemID) }}"><img src="icons/edit.png"></a>
                                <form action="{{ route('items.destroy', $item->itemID) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')"><img src="icons/delete.png"></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br><br><br>
        <div class="header">
            <div class="headerimg"><img src="icons/sell.png" alt="logo"></div>
            <div class="headercontent">
                <h2>Sell Record</h2>
            </div>
        </div>
        <hr class="divide" />
        <div class="main">
            <div class="showitem">
                <table>
                    <thead>
                        <tr>
                            <th>Purchase ID</th>
                            <th>Purchase Date</th>
                            <th>Quantity</th>
                            <th>Item Name</th>
                            <th>Customer Name</th>
                            <th>Amount Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchases as $purchase)
                        <tr>
                            <td>{{ $purchase->id }}</td>
                            <td>{{ $purchase->purchaseDate }}</td>
                            <td>{{ $purchase->purchaseQuantity }}</td>
                            <td>{{ $purchase->item->name }}</td>
                            <td>{{ $purchase->user->name }}</td>
                            <td>{{ $purchase->payAmount }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer>
        <div class="fftt">
            <p>&copy; 2024 Online Dress Shop. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>