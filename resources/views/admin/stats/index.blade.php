@extends('layouts.admin')

@section('content')

    <div class="col-12">
        <h1 class="text-center my-3">Statistiche</h1>
    </div>
    <div class="col-12">
        <div class="col-6 mx-auto text-center">
            <h2>Statistiche Generali</h2>
            <p>Statistiche per anno di tutti i tuoi appartamenti</p>
        </div>
        {{-- stats tutti appartamenti e tutti gli anni dello user --}}
        <div class="col-6 mx-auto my-5">
            <canvas id="myYearlyChart" width="400" height="400"></canvas>
        </div>
    </div>

    {{-- stats singolo appartamento e tutti gli anni dello user --}}
    <div class="col-12">
        <select id="apartmentFilter">
            @foreach ($userApartments as $apartment)
                <option value="{{ $apartment->id }}">{{ $apartment->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-12">
        <select id="yearFilter">
            <option value="all">Tutti gli anni</option>
            @foreach ($years as $year)
                <option value="{{ $year }}">{{ $year }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-6 mx-auto my-5">
        <canvas id="myYearlyApartmentChart" width="400" height="400"></canvas>
    </div>

    <script>

        // Chart per tutti gli appartamenti e tutti gli anni dello user
        var ctxYearly = document.getElementById('myYearlyChart').getContext('2d');
        var dataYearly = @json($yearlyViews);
        var apartmentViews = @json($apartmentViews);

        var myYearlyChart = new Chart(ctxYearly, {
            type: 'bar',
            data: {
                labels: Object.keys(dataYearly),
                datasets: [{
                    label: 'Visualizzazioni totali dei tuoi appartamenti per anno',
                    data: Object.values(dataYearly),
                    backgroundColor: 'rgba(255, 90, 96, 0.953)',
                    borderColor: 'rgb(72, 72, 72)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Chart per singolo appartamento e tutti gli anni dello user
        var ctxYearlyApartment = document.getElementById('myYearlyApartmentChart').getContext('2d');

        var myYearlyApartmentChart = new Chart(ctxYearlyApartment, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Visualizzazioni dell\'appartamento per totale di anni e mesi',
                    data: [],
                    backgroundColor: 'rgba(255, 90, 96, 0.953)',
                    borderColor: 'rgb(72, 72, 72)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Event listeners cambiare appartamento
        document.getElementById('apartmentFilter').addEventListener('change', function () {
            updateYearlyApartmentChart();
        });

        // Event listeners per cambiare anno
        document.getElementById('yearFilter').addEventListener('change', function () {
            updateYearlyApartmentChart();
        });

        // Funzione per aggiornare il grafico dei singoli appartamenti
        function updateYearlyApartmentChart() {
            var selectedApartmentId = document.getElementById('apartmentFilter').value;
            var selectedYear = document.getElementById('yearFilter').value;
            var yearlyMonthlyViews = @json($viewsByApartmentAndYear);

            var isAllApartments = selectedApartmentId === 'all';
            var isAllYears = selectedYear === 'all';

            var filteredDataYearly = isAllApartments ? dataYearly : apartmentViews[selectedApartmentId].yearly_views;

            if (!isAllYears) {

                var filteredDataForYear = {};

                if (yearlyMonthlyViews[selectedApartmentId] && yearlyMonthlyViews[selectedApartmentId][selectedYear]) {
                    filteredDataForYear = yearlyMonthlyViews[selectedApartmentId][selectedYear];
                }

                // update dell'asse x per mostrare i mesi
                var months = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
                myYearlyApartmentChart.data.labels = months;
                myYearlyApartmentChart.data.datasets[0].data = Object.values(filteredDataForYear);
            } else {
                // Reset dell'asse x per mostrare gli anni
                myYearlyApartmentChart.data.labels = Object.keys(filteredDataYearly);
                myYearlyApartmentChart.data.datasets[0].data = Object.values(filteredDataYearly);
            }

            myYearlyApartmentChart.update(); // Update del grafico
        }

        // Chiamata alla funzione per aggiornare il grafico dei singoli appartamenti
        updateYearlyApartmentChart();
    </script>
@endsection
