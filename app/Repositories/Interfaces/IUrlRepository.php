<?php
namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;
use App\Models\Url;

interface IUrlRepository
{
    public function generateUrlShortener(Url $url);
    public function handel(Request $request, $oldUrl);
}
