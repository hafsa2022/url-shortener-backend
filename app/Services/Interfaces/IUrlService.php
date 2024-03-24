<?php
namespace App\Services\Interfaces;


use Illuminate\Http\Request;

interface IUrlService
{
    public function generateUrlShortener(Request $request);
    public function handel(Request $request, $newUrl);
}

