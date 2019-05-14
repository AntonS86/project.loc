<?php


namespace App\Services;


use Illuminate\Http\Request;

class CookieFavService
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var string|array|null
     */
    private $dataCookie = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $name
     *
     * @return CookieFavService
     */
    public function searchCookie($name): CookieFavService
    {

        $this->dataCookie = $this->request->cookie($name);
        if (empty($this->dataCookie)) {
            $this->dataCookie = [];
        } else {
            $this->dataCookie = json_decode($this->dataCookie, true);
        }
        return $this;
    }


    /**
     * @param int $value
     *
     * @return CookieFavService
     */
    public function toggle(int $value): CookieFavService
    {
        if (($key = array_search($value, $this->dataCookie, true)) !== false) {
            array_splice($this->dataCookie, $key, 1);
        } else {
            $this->dataCookie[] = $value;
        }
        return $this;
    }

    /**
     * @return array|null
     */
    public function get()
    {
        return $this->dataCookie;
    }

    /**
     * @return string
     */
    public function encode(): string
    {
        return json_encode($this->dataCookie);
    }

}
