<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Content</title>
</head>

<style>

    /* style.css */

/* Styling umum untuk body */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background: #f4f4f4;
    color: #333;
}

/* Styling untuk header */
header {
    background: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
}

/* Styling utama */
main {
    padding: 20px;
}

/* Styling untuk section */
section {
    background: #fff;
    padding: 20px;
    margin: 20px 0;
}

/* Styling untuk form group */
.form-group {
    margin-bottom: 15px;
}

/* Styling label */
label {
    display: block;
    margin-bottom: 5px;
}

/* Styling input fields dan textarea */
input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Styling untuk textarea */
textarea {
    height: 100px;
    resize: vertical;
}

/* Styling untuk button */
button {
    display: block;
    width: 100%;
    padding: 10px;
    border: none;
    background: #333;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
}

/* Styling hover untuk button */
button:hover {
    background: #555;
}

/* Styling untuk footer */
footer {
    text-align: center;
    padding: 20px 0;
    background: #333;
    color: #fff;
}


</style>



<body>

<header>
    <!-- Bagian header situs Anda (opsional) -->
    <h1>Edit Content Page</h1>
</header>

<main>
    <section class="content-edit-form">
        <form action="{{ route('contents.update', $content->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Form group untuk nama -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $content->name }}" required>
            </div>

            <!-- Form group untuk deskripsi -->
            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea id="desc" name="desc" required>{{ $content->desc }}</textarea>
            </div>

            <!-- Form group untuk mengunggah logo baru -->
            <div class="form-group">
                <label for="logo">Logo Baru:</label>
                <input type="file" id="logo" name="logo" accept=".jpeg, .jpg, .png">
                <small>Biarkan kosong jika tidak ingin mengubah logo</small>
            </div>

            <!-- Menampilkan logo saat ini -->
            @if ($content->logo_path)
                <div class="form-group">
                    <label>Logo Saat Ini:</label>
                    <img src="{{ asset($content->logo_path) }}" alt="Current Logo" style="max-width: 200px; height: auto;">
                </div>
            @endif

            <!-- Form group untuk link -->
            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" id="link" name="link" value="{{ $content->link }}">
            </div>

            <!-- Tombol submit -->
            <div class="form-group">
                <button type="submit">Update Konten</button>
            </div>
        </form>
    </section>
</main>

<footer>
    <p>&copy; AIExplore 2023</p>
</footer>

</body>
</html>