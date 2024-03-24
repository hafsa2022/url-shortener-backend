<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\Interfaces\IUrlService;
use App\Repositories\Interfaces\IUrlRepository;
use App\Models\Url;

class UrlService implements IUrlService
{
    private IUrlRepository $repository;
    public function __construct(IUrlRepository $repository)
    {
        $this->repository = $repository;
    }

    public function generateUrlShortener(Request $request)
    {
        $oldUrl = $request->get('old_url');
        $newUrl = $request->get('new_url');

        if($oldUrl != "" && $newUrl != "")
        {
            $urlFound = Url::where('old_url',$oldUrl)->get(['id','new_url'])->toArray();

            if(!empty($urlFound))
            {

                return response()->json(['new_url'=> $urlFound[0]['new_url']]);

            }
            else
            {
                $url = new Url();
                $url->new_url = $newUrl;
                $url->old_url = $oldUrl;

                if($this->repository->generateUrlShortener($url))
                {
                    return response()->json(['new_url'=> $url->new_url]);
                }
            }
        }


    }

    public function handel(Request $request,$newUrl)
    {

        $uri = $_SERVER['REQUEST_URI'];

        if($uri == "" )
        {
            return abort(404);
        }else
        {
            $url = Url::where('new_url','like','%'.$uri.'%')->get('old_url');
            if($url == '' || count($url) == 0)
            {
                return abort(404);
            }else
            {
                return redirect($url[0]['old_url']);
            }
        }



    }

}
