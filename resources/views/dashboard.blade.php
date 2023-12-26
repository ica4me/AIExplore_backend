<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Selamat datang, {{ Auth::user()->fullname }}
        </h2>
    </x-slot>


{{-- dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>
<body>

<div class="dashboard-container">

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="dashboard-buttons">
        <a href="{{ url('/contents/add') }}" class="btn">Add Content</a>
        <a href="{{ url('/viewcontent') }}" class="btn">View Content</a>
    </div>

    {{-- Konten lain dari dashboard --}}
</div>

<script>
    setTimeout(function() {
        const alertBox = document.querySelector('.alert-success');
        if (alertBox) {
            alertBox.style.display = 'none';
        }
    }, 3000);
</script>

</body>
</html>

</x-app-layout>