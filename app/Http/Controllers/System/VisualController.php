<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Article;
use Cache;
use DB;
class VisualController extends CommonController
{
    //本周起止时间unix时间戳
    private $week_start;
    private $week_end;

    //本月起止时间unix时间戳
    private $month_start;
    private $month_end;

    function __construct()
    {
        $this->week_start = mktime(0, 0, 0, date("m"), date("d") - date("w") + 1, date("Y"));
        $this->week_end = mktime(23, 59, 59, date("m"), date("d") - date("w") + 7, date("Y"));

        $this->month_start = mktime(0, 0, 0, date("m"), 1, date("Y"));
        $this->month_end = mktime(23, 59, 59, date("m"), date("t"), date("Y"));
    }

    /**
     * 本周新增
     * @return array
     */
    function sales_amount()
    {
        return Cache::remember('visual_sales_amount', 60, function () {
            $count = [];
            for ($i = 0; $i < 7; $i++) {
                $start = date('Y-m-d H:i:s', strtotime("+" . $i . " day", $this->week_start));
                $end = date('Y-m-d H:i:s', strtotime("+" . ($i + 1) . " day", $this->week_start));
                $count['sum'][] = Article::whereBetween('created_at', [$start, $end])->count();
            }

            $data = [
                'week_start' => date("Y年m月d日", $this->week_start),
                'week_end' => date("Y年m月d日", $this->week_end),
                'count' => $count,
            ];
            return $data;
        });
    }


    /**
     * 本月热门销量
     */
    function top()
    {
        return Cache::remember('visual_top', 60, function () {
            // DB::enableQueryLog();
            $start = date("Y-m-d H:i:s", $this->month_start);
            $end = date("Y-m-d H:i:s", $this->month_end);
            //本月广告的id
            $article = Article::whereBetween('created_at', [$start, $end])->lists('id');
            //return $article;
            //对应热门商品,前10名.
            $articles = Article::with('category')
                ->select('category_id', DB::raw('count(id) as sum_num'))
                ->whereIn('id', $article)
                ->groupBy('category_id')
                ->orderBy(DB::raw('count(id)'), 'desc')
                ->take(5)
                ->get();
          // return DB::getQueryLog();
            $data = [
                'month_start' => date("Y年m月d日", $this->month_start),
                'month_end' => date("Y年m月d日", $this->month_end),
                'articles' => $articles,
            ];
            return $data;
        });

    }

}
