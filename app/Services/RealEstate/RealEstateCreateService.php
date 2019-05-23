<?php
declare(strict_types = 1);

namespace App\Http\Services\RealEstate;


use App\Http\Requests\RealEstateRequest;
use App\Models\Price;
use App\Models\RealEstate;

class RealEstateCreateService
{
    /**
     * @var RealEstate
     */
    private $realEstate;
    /**
     * @var RealEstateRequest
     */
    private $request;

    /**
     * @var RealEstateDateProvider
     */
    private $dateProvider;

    /**
     * RealEstateCreateService constructor.
     *
     * @param RealEstateRequest      $request
     * @param RealEstate             $realEstate
     * @param RealEstateDateProvider $dateProvider
     */
    public function __construct(RealEstateRequest $request, RealEstate $realEstate, RealEstateDateProvider $dateProvider)
    {
        $this->realEstate   = $realEstate;
        $this->request      = $request;
        $this->dateProvider = $dateProvider;
    }

    /**
     * @return RealEstate
     */
    public function create(): RealEstate
    {
        $this->dateProvider->fill($this->realEstate);
        $this->realEstate->save();
        $this->inputImagesHandler();
        $this->inputPriceHandler();
        return $this->realEstate;
    }

    /**
     * @param RealEstate $realEstate
     *
     * @return RealEstate
     */
    public function update(RealEstate $realEstate): RealEstate
    {
        $this->realEstate = $realEstate;
        $this->dateProvider->fill($this->realEstate);
        $this->realEstate->save();
        $this->inputImagesHandler();
        $this->inputPriceHandler();
        return $this->realEstate;
    }

    /**
     *
     */
    private function inputImagesHandler(): void
    {
        if ($this->request->filled('images')) {
            $this->realEstate->images()->sync($this->request->input('images'));
        }
    }

    /**
     *
     */
    private function inputPriceHandler(): void
    {
        $lastPrice = Price::where('real_estate_id', $this->realEstate->id)->latest()->first();
        if (! $lastPrice || $lastPrice->value !== $this->realEstate->price) {
            $newPrice                 = new Price();
            $newPrice->value          = $this->realEstate->price;
            $newPrice->real_estate_id = $this->realEstate->id;
            $newPrice->save();
        }
    }
}
