{{-- viewcontent.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contents</title>
    <link href="{{ asset('css/viewcontent.css') }}" rel="stylesheet">
</head>
<body>

<div class="search-container">
    <form action="{{ route('contents.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari berdasarkan nama...">
        <button type="submit">Cari</button>
    </form>
</div>



<div class="content-list">
    @foreach ($contents as $content)
        <div class="content-item">

                <!-- Logo kecil bulat -->
                @if ($content->logo_path)
                    <img src="{{ asset($content->logo_path) }}" alt="{{ $content->name }}" class="content-logo">
                @endif

            <h3>{{ $content->name }}</h3>
            <p>{{ Str::limit($content->desc, 100) }}</p>
            <button class="btn btn-view-more" onclick="location.href='{{ route('contents.show', $content->id) }}'">View More</button>

            @if (Auth::id() == $content->id_users)
            <button class="btn btn-edit" onclick="location.href='{{ route('contents.edit', $content->id) }}'">Edit</button>

        <!-- Formulir Hapus -->
            <form action="{{ route('contents.destroy', $content->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus konten ini?')" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>


    @endif
        </div>
    @endforeach
</div>

</body>
</html>
