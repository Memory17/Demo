<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\CouponModel;
use App\Models\UserModel;
use App\Models\CommentModel;
use App\Models\OrderModel;
use App\Models\OrderdetailModel;
use App\Models\PostModel;
use App\Models\WishlistModel;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class DashboardController extends Controller
{
    //
    public $currentWeek;
    public $today;
    public $now;

    public function __construct(){
        $active = "active";
        view()->share('activeDashboard', $active);
    }

    public function setToday(){
        $this->today = Carbon::today('Asia/Ho_Chi_Minh');
    }

    public function getToday(){
        $this->setToday();
        return $this->today;
    }

    public function index(){
        $dataUserTop = $this->getDataUserTop();
        $dataShow = $this->getDataShow();
        $dataTagNav = $this->dataTagProduct();

        return view('backend.dashboard.dashboard',[
            'dataShow' => $dataShow,
            'dataUserTop' => $dataUserTop,
            'dataTagNav' => $dataTagNav,
        ]);
    }

    public function dataTagProduct() {
        $dataTonKho = ProductModel::orderBy('product_amount', 'DESC')->limit(10)->get();
        $dataProductSell = OrderdetailModel::groupBy('product_id')->select('product_id', DB::raw('sum(order_detail_quantity) as qty'))->orderBy('qty', 'DESC')->limit(10)->get();
        $dataProductLike = WishlistModel::groupBy('product_id')->select('product_id', DB::raw('count(product_id) as qty'))->orderBy('qty', 'DESC')->limit(10)->get();

        return [$dataTonKho, $dataProductSell, $dataProductLike];
    }

    public function getDataShow(){
        $dataUser = UserModel::where('role_id', 3)->count();
        $dataProduct = ProductModel::count();
        $dataOrder = OrderModel::where('created_at', $this->getToday())->count();
        $dataPost = PostModel::count();

        return $dataShow = [$dataUser, $dataProduct, $dataOrder, $dataPost];
    }

    public function getDataUserTop(){
        $dataUser = OrderModel::groupBy('user_id')->select('user_id', DB::raw('sum(order_total) as total'))->orderBy('total', 'DESC')->limit(10)->get();
        return $dataUser;
    }

    public function getChartCityBuy(){
        $dataCityBuy = UserModel::where('user_city', '!=', '')->groupBy('user_city')->select('user_city', DB::raw('count(*) as total'))->orderBy('total', 'DESC')->limit(10)->get();
        $city = [];
        $count = [];
        foreach($dataCityBuy as $item){
            array_push($city, $item->City->city_name);
            array_push($count, $item->total);
        }
        return $data = [$city, $count];
    }
    
    public function getDataChartLine(Request $request){
        $day = $request->day;
        $orderDay = Carbon::today('Asia/Ho_Chi_Minh')->subDay($day);//Lấy ngày
        $today = $this->getToday();
        $dataOrderDay = OrderModel::whereBetween('created_at', [$orderDay, $today])->orderBy('created_at', "ASC")->get();

        $dataLabel = array();
        $dataOrder = [];
        $dataProfit = [];
        $dataTotal = [];

        foreach($dataOrderDay as $item){
            $time = $item->created_at;
            
            $time = $time->format('Y-m-d');
            if(!in_array($time, $dataLabel)){
                array_push($dataLabel, $time);

            }
        }

        foreach($dataLabel as $data){
            $orderCount = OrderModel::where('created_at', $data)->count();
            $orderProfit = OrderModel::where('created_at', $data)->sum('order_profit');
            $orderTotal = OrderModel::where('created_at', $data)->sum('order_total');
            array_push($dataOrder, $orderCount);
            array_push($dataProfit, $orderProfit);
            array_push($dataTotal, $orderTotal);
        }

        return $data = [$dataLabel, $dataOrder, $dataProfit, $dataTotal];
    }

    public function getDataChartLineDate(Request $request){
        $day_to = $request->day_to;
        $day_from = $request->day_from;
        $dataOrderDay = OrderModel::whereBetween('created_at', [$day_from, $day_to])->orderBy('created_at', "ASC")->get();

        $dataLabel = array();
        $dataOrder = [];
        $dataProfit = [];
        $dataTotal = [];

        foreach($dataOrderDay as $item){
            $time = $item->created_at;
            
            $time = $time->format('Y-m-d');
            if(!in_array($time, $dataLabel)){
                array_push($dataLabel, $time);

            }
        }

        foreach($dataLabel as $data){
            $orderCount = OrderModel::where('created_at', $data)->count();
            $orderProfit = OrderModel::where('created_at', $data)->sum('order_profit');
            $orderTotal = OrderModel::where('created_at', $data)->sum('order_total');
            array_push($dataOrder, $orderCount);
            array_push($dataProfit, $orderProfit);
            array_push($dataTotal, $orderTotal);
        }

        return $data = [$dataLabel, $dataOrder, $dataProfit, $dataTotal];
    }
}
