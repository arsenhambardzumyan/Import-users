<?php

namespace App\Services;

use App\Repositories\ListingRepository;
use Illuminate\Support\Facades\Http;

class ImportService
{
    protected $listingRepository;

    public function __construct(ListingRepository $listingRepository)
    {
        $this->listingRepository = $listingRepository;
    }

    public function importListing()
    {
        $response = Http::get('https://randomuser.me/api/?results=5000');
        $data = $response->json()['results'];

        $total = 0;
        $added = 0;
        $updated = 0;

        foreach ($data as $item) {
            $listingData = [
                'first_name' => $item['name']['first'],
                'last_name' => $item['name']['last'],
                'email' => $item['email'],
                'age' => $item['dob']['age'],
            ];

            $result = $this->listingRepository->createOrUpdateListing($listingData);

            if ($result->wasRecentlyCreated) {
                $added++;
            } else {
                $updated++;
            }

            $total++;
        }

        return [
            'total' => $total,
            'added' => $added,
            'updated' => $updated,
        ];
    }
}
