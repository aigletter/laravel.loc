<?php

namespace App\Http\Controllers;

//use App\Services\Math\Math;
//use App\Services\Math\MathFacade;
//use Hello\World\Math;
use Illuminate\Support\Facades\Cache;
use Ithillel\Cource\Math\MathInterface;
use Psr\SimpleCache\CacheInterface;

class TestController extends Controller
{
    public function __construct()
    {
        Cache::put('test', 'Blablabla');
    }

    public function index(CacheInterface $cacheDi)
    {
        // где-то взяли
        $app = app();

        $cache1 = $app->get('cache');
        $str = $cache1->get('test');

        $cache2 = app('cache');

        $str2 = Cache::get('test');

        return '';
    }

    public function useCustomService(MathInterface $math)
    {
        /*$math11 = app('math2');
        $math12 = app('math2');

        $math21 = app('math1');
        $math22 = app('math1');*/

        $test = app('bla');
        $test->sum(5, 6);

        //$result = MathFacade::sum(3, 4);
        $result =$math->sum(3, 4);

        return '';
    }
}
