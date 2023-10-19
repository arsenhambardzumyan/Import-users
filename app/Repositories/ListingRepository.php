<?php

namespace App\Repositories;

use App\Models\Listing;

class ListingRepository
{
    public function createOrUpdateListing($importData)
    {
        return Listing::updateOrCreate(
            ['first_name' => $importData['first_name'], 'last_name' => $importData['last_name']],
            $importData
        );
    }
}
