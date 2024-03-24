<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\IUrlRepository;
use App\Models\Url;


class UrlRepository implements IUrlRepository
{

    public function generateUrlShortener(Url $url)
    {
       return $url->save();
    }

    public function handel(Request $request, $url)
    {

    }
}
