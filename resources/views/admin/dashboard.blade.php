<!-- resources/views/admin/dashboard.blade.php -->
@extends('layouts.admin')

@section('header', 'Tableau de Bord')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Card 1: Statistiques des Officiers -->
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold mb-2">Officiers</h3>
        <p class="text-2xl font-bold">{{ App\Models\Officer::count() }}</p>
        <p class="text-gray-600">Nombre total d'officiers</p>
    </div>
    
    <!-- Card 2: Statistiques des Articles -->
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold mb-2">Articles</h3>
        <p class="text-2xl font-bold">{{ App\Models\Article::count() }}</p>
        <p class="text-gray-600">Nombre total d'articles</p>
    </div>
    
    <!-- Card 3: Statistiques des Événements -->
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold mb-2">Événements</h3>
        <p class="text-2xl font-bold">{{ App\Models\Event::count() }}</p>
        <p class="text-gray-600">Nombre total d'événements</p>
    </div>
</div>

<!-- Chart.js Example -->
<div class="bg-white p-4 rounded-lg shadow-md mt-6">
    <h3 class="text-lg font-semibold mb-4">Statistiques Mensuelles</h3>
    <canvas id="monthlyStatsChart"></canvas>
    <script>
        var ctx = document.getElementById('monthlyStatsChart').getContext('2d');
        var monthlyStatsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Nombre d\'articles',
                    data: [12, 19, 3, 5, 2, 3, 7, 8, 4, 6, 9, 10],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
@endsection
