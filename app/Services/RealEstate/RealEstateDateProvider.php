<?php
declare(strict_types = 1);

namespace App\Http\Services\RealEstate;

use App\Http\Requests\RealEstateRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\District;
use App\Models\RealEstate;
use App\Models\Region;
use App\Models\Street;
use App\Models\Village;


class RealEstateDateProvider
{

    /**
     * @var array
     */
    private $modelName = [
        'Area'     => Area::class,
        'City'     => City::class,
        'District' => District::class,
        'Region'   => Region::class,
        'Village'  => Village::class,
    ];

    /**
     * RealEstateDateProvider constructor.
     *
     * @param RealEstateRequest $request
     */
    public function __construct(RealEstateRequest $request)
    {
        $this->request = $request;
    }

    private function getModel(string $modelName): String
    {
        return $this->modelName[$modelName];
    }

    /**
     * @param string $inputId
     * @param string $inputName
     * @param array  $dependentData
     * @param string $modelName
     *
     * @return int|null
     */
    private function inputAddressHandler(string $inputId, string $inputName, array $dependentData, string $modelName): ?int
    {
        if ($this->request->filled($inputId)) {
            return (int)$this->request->input($inputId);
        }
        if ($this->request->filled($inputName)) {
            $dependentData['name'] = $this->request->input($inputName);
            $model                 = app($this->getModel($modelName))->firstOrCreate($dependentData);
            return $model->id;
        }
        return null;
    }

    /**
     * @param string     $inputId
     * @param string     $inputName
     * @param RealEstate $realEstate
     *
     * @return int|null
     */
    private function inputStreetHandler(string $inputId, string $inputName, RealEstate $realEstate): ?int
    {
        if ($this->request->filled($inputId)) {
            return (int)$this->request->input($inputId);
        }

        if ($this->request->filled($inputName)) {
            $street = Street::firstOrCreate([
                'name' => $this->request->input($inputName)
            ]);

            if ($realEstate->city_id) {
                $street->cities()->syncWithoutDetaching($realEstate->city_id);
            }
            if ($realEstate->village_id) {
                $street->villages()->syncWithoutDetaching($realEstate->village_id);
            }
            return $street->id;
        }
        return null;
    }

    /**
     * @param RealEstate $realEstate
     *
     * @return RealEstate
     */
    public function fill(RealEstate $realEstate): RealEstate
    {
        $realEstate->rubric_id        = $this->request->input('rubric_id');
        $realEstate->type_id          = $this->request->input('type_id');
        $realEstate->region_id        = $this->request->input('region_id');
        $realEstate->area_id          = $this->inputAddressHandler('area_id',
            'area_name', ['region_id' => $realEstate->region_id], 'Area');
        $realEstate->city_id          = $this->inputAddressHandler('city_id',
            'city_name', ['region_id' => $realEstate->region_id], 'City');
        $realEstate->district_id      = $this->inputAddressHandler('district_id',
            'district_name', ['city_id' => $realEstate->city_id], 'District');
        $realEstate->village_id       = $this->inputAddressHandler('village_id',
            'village_name', ['area_id' => $realEstate->area_id], 'Village');
        $realEstate->street_id        = $this->inputStreetHandler('street_id',
            'street_name', $realEstate);
        $realEstate->house_number     = $this->request->input('house_number');
        $realEstate->floors           = $this->request->input('floors');
        $realEstate->floor            = $this->request->input('floor');
        $realEstate->balcony          = $this->request->input('balcony');
        $realEstate->loggia           = $this->request->input('loggia') ?? null;
        $realEstate->rooms            = $this->request->input('rooms');
        $realEstate->land_square      = $this->request->input('land_square');
        $realEstate->total_square     = $this->request->input('total_square');
        $realEstate->description      = $this->request->input('description');
        $realEstate->status           = $this->request->input('status');
        $realEstate->cadastral_number = $this->request->input('cadastral_number');
        $realEstate->price            = (int)$this->request->input('price');
        $realEstate->year             = $this->request->input('year');
        return $realEstate;
    }
}
