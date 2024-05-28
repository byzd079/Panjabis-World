<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
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
            <form action="{{ route('items.update', $item->itemID) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="name">Item Name:</label>
                    <input type="text" id="name" name="name" value="{{ $item->name }}">
                </div>
                <div>
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" value="{{ $item->description }}">
                </div>
                <div>
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" value="{{ $item->price }}">
                </div>
                <div>
                    <label for="photo">Photo:</label>
                    <input type="file" id="photo" name="photo">
                </div>
                <button type="submit">Update Item</button>
            </form>
        </div>
    </div>
</body>

</html>