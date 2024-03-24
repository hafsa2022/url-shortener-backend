<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Interfaces\IUrlService;

class UrlController extends Controller
{
    private IUrlService $urlService;

    public function __construct(IUrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    public function generateUrlShortener(Request $request)
    {
        $newUrl = $this->urlService->generateUrlShortener($request);
        return $newUrl;

    }


    public function handel(Request $request , $newUrl)
    {
        $oldUrl = $this->urlService->handel($request, $newUrl);
        return $oldUrl;


    }
}
