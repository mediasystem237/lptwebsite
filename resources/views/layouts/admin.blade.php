<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    <aside class="w-64 h-screen bg-gray-900 text-white p-4 fixed top-0 left-0 flex flex-col">
        <div class="flex items-center mb-8">
            <i class="fas fa-cogs text-3xl mr-3"></i>
            <h1 class="text-2xl font-semibold">LPT Admin</h1>
        </div>
        <nav class="flex-1">
            <ul>
                <li class="mb-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center py-2 px-4 rounded hover:bg-gray-700">
                        <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.officers.index') }}" class="flex items-center py-2 px-4 rounded hover:bg-gray-700">
                        <i class="fas fa-users mr-3"></i> Officiers
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.articles.index') }}" class="flex items-center py-2 px-4 rounded hover:bg-gray-700">
                        <i class="fas fa-newspaper mr-3"></i> Articles
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.events.index') }}" class="flex items-center py-2 px-4 rounded hover:bg-gray-700">
                        <i class="fas fa-calendar-alt mr-3"></i> Événements
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('admin.settings.index') }}" class="flex items-center py-2 px-4 rounded hover:bg-gray-700">
                        <i class="fas fa-cog mr-3"></i> Paramètres
                    </a>
                </li>
            </ul>
        </nav>
        <footer class="mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center w-full py-2 px-4 text-gray-400 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-3"></i> Déconnexion
                </button>
            </form>
        </footer>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 ml-64 flex flex-col">
        <!-- Top Navbar -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    @yield('header')
                </h2>
                <div class="flex items-center">
                    <span class="text-gray-600 mr-4">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900 flex items-center">
                            <i class="fas fa-sign-out-alt mr-1"></i> Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
    
  <!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-...your-integrity-here..." crossorigin="anonymous"></script>

<!-- jQuery (if needed) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-oP7na4HDh7xxjZ0CkUjIu0mENkCibZ5F5F+XWZ4BQd4Q1Xw5PXXLPg0MZw5AowqT" crossorigin="anonymous"></script>

<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Initialiser TinyMCE pour le champ de contenu dans la modal
    tinymce.init({
      selector: '#content',
      plugins: 'code table lists link image',
      toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image code',
      height: 300,
      menubar: false,
      image_caption: true,
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
  });
</script>

    
    @yield('scripts')
</body>
</html>
