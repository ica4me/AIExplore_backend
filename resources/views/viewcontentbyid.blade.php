{{-- viewcontentbyid.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Detail</title>
    <link href="{{ asset('css/contentdetail.css') }}" rel="stylesheet">
</head>
<body>

<div class="content-detail">
    <h1>{{ $content->name }}</h1>
    <p>Dibagikan Oleh: {{ $content->user->fullname }} ({{ $content->user->email }})</p>
    <p>Tanggal Dibagikan: {{ $content->created_at->format('d M Y H:i') }}</p>
    <p>Terakhir Diedit: {{ $content->updated_at->format('d M Y H:i') }}</p>

      <!-- Tampilkan gambar dalam bentuk bulat -->
      @if ($content->logo_path)
      <img src="{{ asset($content->logo_path) }}" alt="{{ $content->name }}" class="rounded-image">
  @else
      <p>No image available</p>
  @endif
    
    <p>
        @php
        // Cek apakah link sudah memiliki 'http://' atau 'https://'
        $link = $content->link;
        if (!preg_match("~^(?:f|ht)tps?://~i", $link)) {
            $link = "http://" . $link;
        }
        @endphp
        <a href="{{ $link }}" target="_blank" style="color: green; text-decoration: none;">{{ $link }}</a>
    </p>

    <p>{{ $content->desc }}</p>

    <!-- Tampilkan detail lainnya sesuai kebutuhan -->




    <!-- Tombol Edit dan Delete -->
    @if (Auth::id() == $content->id_users)
        <button class="btn btn-edit" onclick="location.href='{{ route('contents.edit', $content->id) }}'">Edit</button>
        
        <!-- Formulir Hapus -->
        <form action="{{ route('contents.destroy', $content->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus konten ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete">Delete</button>
        </form>
    @endif
</div>

</body>
</html>
