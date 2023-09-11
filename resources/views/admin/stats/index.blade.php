@extends('layouts.admin')

@section('content')
    <section class="p-4">
        <div class="row">
            <h2 class="my-3 text-center bold">Statistiche</h2>
            <hr>
        </div>

        @if ($views->isEmpty())
            <div class="col-12 text-center">
                <h3 class="text-white">Non hai nessuna statistica da visualizzare</h3>
                <div class="d-flex justify-content-center align-items-center gap-3 flex-column flex-md-row mt-2">
                    <button class="btn my_btn"><a class="text-decoration-none my_link" href="{{ route('admin.apartments.create') }}">Aggiungi un appartamento</a></button>
                    <button class="btn my_btn"><a class="text-decoration-none my_link" href="{{ route('admin.sponsorships.index') }}">Sponsorizza i tuoi appartamenti</a></button>
                </div>
                <div class="col-12 mx-auto">
                    <div class="d-flex justify-center">
                        <img src="http://localhost:8000/images/logo/Bool_Bnb_Black.png" alt="logo" class="img-fluid mx-auto">
                    </div>
                </div>
            </div>

        @else

            <div class="col-12">
                <div class="col-12 col-lg-8 col-xxl-5 mx-auto text-center my-5">
                    <div class="card p-2 my-3 shadow my_bg_chart">
                        <div>
                            <h2>Statistiche Generali</h2>
                            <p class="text-white">Statistiche per anno di tutti i tuoi appartamenti</p>
                        </div>
                        {{-- stats tutti appartamenti e tutti gli anni dello user --}}
                        <canvas class="px-4" id="myYearlyChart" width="400" height="400"></canvas>
                    </div>
                </div>

                <div class="col-12 col-lg-8 col-xxl-5 mx-auto text-center my-5">
                    <div class="card p-2 my-3 shadow my_bg_chart">
                        <div>
                            <h2>Statistiche Singolo Appartamento</h2>
                            <p class="text-white">Statistiche per anno di tutti i tuoi appartamenti</p>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                            <select id="apartmentFilter" class="my_select form-select-sm">
                                @foreach ($userApartments as $apartment)
                                    <option value="{{ $apartment->id }}">{{ $apartment->title }}</option>
                                @endforeach
                            </select>
                            <select id="yearFilter" class="my_select form-select-sm">
                                <option value="all">Tutti gli anni</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- stats singolo appartamento e tutti gli anni dello user --}}
                        <canvas class="px-4" id="myYearlyApartmentChart" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>
        @endif
    </section>

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
                    label: 'Visualizzazioni',
                    data: Object.values(dataYearly),
                    backgroundColor: 'rgba(255, 90, 96, 0.953)',
                    color: 'rgb(255,255,255)',
                    borderColor: 'rgb(72, 72, 72)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },

            }
        });

        // Chart per singolo appartamento e tutti gli anni dello user
        var ctxYearlyApartment = document.getElementById('myYearlyApartmentChart').getContext('2d');

        var myYearlyApartmentChart = new Chart(ctxYearlyApartment, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Visualizzazioni',
                    data: [],
                    backgroundColor: 'rgb(255, 205, 86)',
                    borderColor: 'rgb(72, 72, 72)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
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
