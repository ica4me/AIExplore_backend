{{-- createcontent.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Content</title>
    <link href="{{ asset('css/createcontent.css') }}" rel="stylesheet">
</head>
<body>

<div class="form-container">
    <h1>Add New Content</h1>

    <form action="{{ route('contents.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="desc">Description:</label>
            <textarea id="desc" name="desc" required></textarea>
        </div>

        <div class="form-group">
            <label for="logo">Logo:</label>
            <input type="file" id="logo" name="logo" accept=".jpeg, .jpg, .png">
        </div>

        <div class="form-group">
            <label for="link">Link:</label>
            <input type="text" id="link" name="link">
        </div>

        <button type="submit" class="btn-submit">Add Content</button>
    </form>
</div>

</body>
</html>
