<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
    <link rel="stylesheet" href="{{asset('css/table.css')}}">
</head>

<body>
    <div class="content">
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
        <div class="item">
            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name">Item Name:</label>
                    <input type="text" id="name" name="name">
                </div>
                <div>
                    <label for="description">description:</label>
                    <input type="text" id="description" name="description">
                </div>
                <div>
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price">
                </div>
                <div>
                    <label for="photo">Photo:</label>
                    <input type="file" id="photo" name="photo">
                </div>
                <button type="submit">Add Item</button>
            </form>
        </div>
    </div>
</body>

</html>