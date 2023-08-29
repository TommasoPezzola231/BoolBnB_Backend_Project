<?php

namespace Database\Seeders;

use App\Models\ApartemntSponsorship;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\CommonMark\Node\Query\OrExpr;
use Carbon\Carbon;

class ApartemntSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartmentsID = Apartment::all(["id"]);
        $sponsorshipID = Sponsorship::all(["id"]);

        $sponsorshipDurations = [
            1 => 24,   // 24 ore
            2 => 72,   // 72 ore
            3 => 144,  // 144 ore
        ];

        for ($i = 0; $i < 5; $i++) {

            $ApartmentSponsorship = new ApartemntSponsorship();

            $ApartmentSponsorship->apartment_id = $apartmentsID->random()->id;
            $ApartmentSponsorship->sponsorship_id = $sponsorshipID->random()->id;

            $selectedSponsorshipID = $ApartmentSponsorship->sponsorship_id;
            $durationInHours = $sponsorshipDurations[$selectedSponsorshipID];

            $ApartmentSponsorship->start_time = Carbon::now();

            $ApartmentSponsorship->end_time = Carbon::now()->addHours($durationInHours);

            $ApartmentSponsorship->save();
        }
    }
}
