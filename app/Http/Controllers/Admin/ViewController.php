<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\view;
use App\Http\Requests\StoreviewRequest;
use App\Http\Requests\UpdateviewRequest;
use App\Models\Apartment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $userApartments = Apartment::where('user_id', $user->id)->get();
        $userApartmentIds = $userApartments->pluck('id')->toArray();

        $views = View::whereIn('apartment_id', $userApartmentIds)->get();

        // Calcola le visualizzazioni totali per ciascun appartamento
        $apartmentViews = $views->groupBy('apartment_id')->map(function ($views) {
            // calcola le visualizzazioni per ogni anno e mese per ciascun appartamento
            $viewsByYear = $views->groupBy(function ($view) {
                $viewedAt = $view->viewed_at;
                if (is_string($viewedAt)) {
                    $viewedAt = Carbon::parse($viewedAt);
                }
                return $viewedAt->format('Y');
            });

            $yearlyViews = $viewsByYear->map(function ($views) {
                return count($views);
            });

            // calcola le visualizzazioni per ogni mese per ciascun appartamento
            $viewsByMonth = $views->groupBy(function ($view) {
                $createdAt = $view->created_at;
                if (is_string($createdAt)) {
                    $createdAt = Carbon::parse($createdAt);
                }
                return $createdAt->format('F Y');
            });

            $monthlyViews = $viewsByMonth->map(function ($views) {
                return count($views);
            });

            // calcola le visualizzazioni per ogni anno e mese per ciascun appartamento
            $yearlyMonthlyViews = $viewsByYear->map(function ($views) use ($viewsByMonth) {
                $yearlyMonthlyViews = [];
                foreach ($viewsByMonth as $month => $monthViews) {
                    $yearlyMonthlyViews[$month] = count($monthViews);
                }
                return $yearlyMonthlyViews;
            });

            return [
                'total_views' => count($views),
                'yearly_views' => $yearlyViews,
                'monthly_views' => $monthlyViews,
                'yearly_monthly_views' => $yearlyMonthlyViews,
            ];
        });

        $viewsByApartmentAndYear = $views->groupBy('apartment_id')
            ->map(function ($apartmentViews) {
                return $apartmentViews->groupBy(function ($view) {
                    $viewedAt = $view->viewed_at;
                    if (is_string($viewedAt)) {
                        $viewedAt = Carbon::parse($viewedAt);
                    }
                    return $viewedAt->format('Y'); // Raggruppa per anno
                })->map(function ($viewsByYear) {
                    return $viewsByYear->groupBy(function ($view) {
                        $viewedAt = $view->viewed_at;
                        if (is_string($viewedAt)) {
                            $viewedAt = Carbon::parse($viewedAt);
                        }
                        return $viewedAt->format('F Y'); // Raggruppa per mese e anno
                    })->map(function ($viewsByMonth) {
                        return count($viewsByMonth);
                    });
                });
            });

        // / calcola le visualizzazioni per ogni anno e mese per ciascun appartamento
        $yearlyMonthlyViews = $apartmentViews->map(function ($apartmentViews) {
            $yearlyMonthlyViews = [];
            foreach ($apartmentViews['yearly_monthly_views'] as $yearlyMonthlyView) {
                foreach ($yearlyMonthlyView as $month => $views) {
                    if (!isset($yearlyMonthlyViews[$month])) {
                        $yearlyMonthlyViews[$month] = 0;
                    }
                    $yearlyMonthlyViews[$month] += $views;
                }
            }
            return $yearlyMonthlyViews;
        });


        $viewsByYear = $views->groupBy(function ($view) {
            $viewedAt = $view->viewed_at;
            if (is_string($viewedAt)) {
                $viewedAt = Carbon::parse($viewedAt);
            }
            return $viewedAt->format('Y');
        });

        $yearlyViews = $viewsByYear->map(function ($views) {
            return count($views);
        });


        $viewsByMonth = $views->groupBy(function ($view) {
            $createdAt = $view->created_at;
            if (is_string($createdAt)) {
                $createdAt = Carbon::parse($createdAt);
            }
            return $createdAt->format('F Y');
        });

        $monthlyViews = $viewsByMonth->map(function ($views) {
            return count($views);
        });

        $years = [];

        // Loop per ogni visualizzazione per trovare l'anno
        foreach ($views as $view) {
            $viewedAt = $view->viewed_at;
            if (is_string($viewedAt)) {
                $viewedAt = Carbon::parse($viewedAt);
            }
            $year = $viewedAt->format('Y');

            // Se l'anno non è già stato aggiunto, aggiungilo
            if (!in_array($year, $years)) {
                $years[] = $year;
            }
        }

        // Ordina gli anni in ordine crescente
        rsort($years);

        return view('admin.stats.index', compact('views', 'user', 'years', 'userApartmentIds', 'apartmentViews', 'userApartments', 'yearlyViews', 'monthlyViews', 'yearlyMonthlyViews',  'viewsByApartmentAndYear'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\view  $view
     * @return \Illuminate\Http\Response
     */
    public function show(view $view)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\view  $view
     * @return \Illuminate\Http\Response
     */
    public function edit(view $view)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateviewRequest  $request
     * @param  \App\Models\view  $view
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateviewRequest $request, view $view)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\view  $view
     * @return \Illuminate\Http\Response
     */
    public function destroy(view $view)
    {
        //
    }
}
