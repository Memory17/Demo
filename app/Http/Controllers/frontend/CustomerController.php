<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Helpers\SeoHelper;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\CouponModel;
use App\Models\UserModel;
use App\Models\CommentModel;
use App\Models\OrderModel;
use App\Models\OrderdetailModel;
use App\Models\WishlistModel;
use App\Models\Ship\CityModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function __construct(){
        $dataCategory = CategoryModel::all();
        $dataBrand = BrandModel::all();
        $this->data_seo = new SeoHelper('Kính chào quý khách', 'Bàn decor, gương decor, thảm decor, ghể decor, tranh decor', 'VINANEON - Chuyên cung cấp những vật phẩm decor uy tín, chất lượng, giá rẻ', 'http://127.0.0.1:8000/customer');

        view()->share(['dataCategory' => $dataCategory, 'dataBrand' => $dataBrand, 'data_seo' => $this->data_seo]);
    }

    //Kiểm tra login hay chưa nếu chưa thì đẩy về login
    //Login rồi thì sang trang profile
    public function index(){
        if(Auth::check()){
            return redirect('/customer/profile');
        }
        else{
            return view('frontend.customer.login');
        }
    }

    public function customerLogin(Request $request){

        $request->validate([
            'user_email' => 'required',
            'user_password' => 'required',
        ],[
            'user_email.required' => 'Email không được để trống',
            'user_password.required' => 'Mật khẩu không được để trống',
        ]);

        if(Auth::attempt(['user_email' => $request->user_email, 'password' => $request->user_password])){
            return redirect('customer/profile')->with('msgSuccess', 'Đăng nhập thành công');
        }
        else{
            return redirect('customer')->with('msgError', 'Đăng nhập thất bại');
        }
    }

    public function customerRegister(Request $request){
        $data = new UserModel();
        $request->validate([
            'user_name' => 'required|min:5|max:50',
            'user_email' => 'required|email:rfc,dns|max:30|unique:users,user_email',
            'user_password' => 'required|min:5|max:20',
            'user_password_again' => 'required|same:user_password',
        ],[
            'user_name.required' => 'Họ tên không được để trống',
            'user_email.required' => 'Email không được để trống',
            'user_password.required' => 'Mật khẩu không được để trống',
            'user_password_again.required' => 'Mật khẩu xác nhận không được để trống',
            'user_name.min' => 'Họ tên quá ngắn phải lớn hơn 5 kí tự',
            'user_name.max' => 'Họ tên quá dài phải nhỏ hơn 50 kí tự',
            'user_email.email' => 'Email không đúng định dạng',
            'user_email.unique' => 'Email đã được sử dụng',
            'user_email.max' => 'Email quá dài',
            'user_password.min' => 'Mật khẩu quá ngắn phải lớn hơn 5 kí tự',
            'user_password.max' => 'Mật khẩu quá dài phải nhỏ hơn 20 kí tự',
            'user_password_again.same' => 'Mật khẩu xác nhận không khớp',
        ]);

        $data->user_name = $request->user_name;
        $data->user_email = $request->user_email;
        $data->password = bcrypt($request->user_password);
        $data->role_id = 3;

        if($data->save()){
            return redirect('customer')->with('msgSuccess', 'Đăng kí thành công');
        }
        else{
            return redirect('customer')->with('msgError', 'Đăng kí thất bại');
        }
    }

    public function customerLogout(){
        Auth::logout();
        return redirect('/customer')->with('msgSuccess', 'Đã đăng xuất thành công');
    }

    public function customerProfile(){
        $data = Auth::user();
        $dataCity = CityModel::all();

        return view('frontend.customer.profile', ['data' => $data, 'dataCity' => $dataCity]);
    }

    public function customerShipAddres(){
        $data = Auth::user();
        $dataCity = CityModel::all();

        return view('frontend.customer.shipaddres', ['data' => $data, 'dataCity' => $dataCity]);
    }

    public function customerChangeProfile(Request $request){
        $data = UserModel::find(Auth::id());
        $vali = Validator::make($request->all(),[
            'user_name' => 'required|min:5|max:20',
            'user_password_old' => [
                'required',
                function ($attribute, $user_password_old, $fail) {
                    if (!Hash::check($user_password_old, Auth::user()->password)) {
                        $fail('Mật khẩu chưa đúng');
                    }
                },
            ],
            'user_password' => 'required|min:5|max:20',
            'user_password_again' => 'required|same:user_password',
        ],[
            'user_name.required' => 'Họ tên không được để trống',
            'user_password.required' => 'Mật khẩu không được để trống',
            'user_password_again.required' => 'Mật khẩu xác nhận không được để trống',
            'user_name.min' => 'Họ tên quá ngắn phải lớn hơn 5 kí tự',
            'user_name.max' => 'Họ tên quá dài phải nhỏ hơn 20 kí tự',
            'user_password.min' => 'Mật khẩu quá ngắn phải lớn hơn 5 kí tự',
            'user_password.max' => 'Mật khẩu quá dài phải nhỏ hơn 20 kí tự',
            'user_password_again.same' => 'Mật khẩu xác nhận không khớp',
        ]);
        if ($vali->fails()) {
            return redirect('customer/profile')
                        ->withErrors($vali);
        }

        $data->user_name = $request->user_name;
        $data->password = bcrypt($request->user_password);

        if($data->save()){
            return redirect('customer/profile')->with('msgSuccess', 'Đổi thông tin thành công');
        }
        else{
            return redirect('customer/profile')->with('msgError', 'Đổi thông tin thất bại');
        }
    }

    public function customerChangeProfileMore(Request $request){
        $data = UserModel::find(Auth::id());

        $vali = Validator::make($request->all(),[
            'user_name' => 'required|min:5|max:20',
        ],[
            'user_name.required' => 'Họ tên không được để trống',
            'user_name.min' => 'Họ tên quá ngắn phải lớn hơn 5 kí tự',
            'user_name.max' => 'Họ tên quá dài phải nhỏ hơn 20 kí tự',
        ]);

        if ($vali->fails()) {
            return redirect('customer/profile')
                        ->withErrors($vali);
        }

        $data->user_name = $request->user_name;

        if($data->save()){
            return redirect('customer/profile')->with('msgSuccess', 'Đổi thông tin thành công');
        }
        else{
            return redirect('customer/profile')->with('msgError', 'Đổi thông tin thất bại');
        }
    }

    public function customerChangeAddres(Request $request){
        $request->validate([
            'user_phone' => 'required|min:10|max:10',
            'user_addres' => 'required',
        ],[
            'user_addres.required' => 'Địa chỉ không được để trống',
            'user_phone.required' => 'Số điện thoại không được để trống',
            'user_phone.min' => 'Số điện thoại sai định dạng',
            'user_phone.max' => 'Số điện thoại sai định dạng',
        ]);
        $data = UserModel::find(Auth::id());
        $data->user_phone = $request->user_phone;
        $data->user_addres = $request->user_addres;
        $data->user_district = $request->user_district;
        $data->user_city = $request->user_city;

        if($data->save()){
            return redirect('customer/shipaddres')->with('msgSuccess', 'Đổi thông tin địa chỉ thành công');
        }
        else{
            return redirect('customer/shipaddres')->with('msgError', 'Đổi thông tin địa chỉ thất bại');
        }
    }

    public function customerOrder(){
        $data = OrderModel::where('user_id', Auth::id())->get();
        $dataUser = Auth::user();

        return view('frontend.customer.order', ['data' => $data, 'dataUser' => $dataUser]);
    }

    public function customerOrderDetail($id){
        $dataOrder = OrderModel::find($id);
        $dataUser = Auth::user();
        $data = OrderdetailModel::where('order_id', $id)->get();

        return view('frontend.customer.orderdetail', ['data' => $data, 'dataOrder' => $dataOrder, 'dataUser' => $dataUser]);
    }

    public function customerWishList(){
        $data = WishlistModel::where('user_id', Auth::id())->get();

        return view('frontend.customer.wishlist', ['data' => $data]);
    }

    public function handleWishList(Request $request){
        $data = new WishlistModel;
        $check = WishlistModel::where('product_id', $request->product_id)->where('user_id', Auth::id())->first();
        $message = '';
        if(Auth::check()){
            if($check){
                $check->delete();
                return $message = 'Đã xóa sản phẩm ra danh sách yêu thích';
            }
            else{
                $data->product_id = $request->product_id;
                $data->user_id = Auth::id();
                $data->save();
                return $message = 'Đã thêm sản phẩm vào danh sách yêu thích';
            }
        }
        else{
            return $message = 'Bạn cần đăng nhập để thực hiện chức năng này';
        }
    }

    public function addCommentUser(Request $request){
        $data = new CommentModel;

        $data->product_id = $request->product_id;
        $data->user_id = Auth::id();
        $data->comment_customer = $request->comment_customer;
        $data->comment_rating = $request->comment_rating;
        $data->comment_status = 1;

        $data->save();
        $rating = CommentModel::where('product_id', $request->product_id)->avg('comment_rating');
        $rating = round($rating);
        if($data->comment_customer == ''){
            $data->comment_customer = '';
        }
        $date = date('d/m/Y',strtotime($data->created_at));
        return $result = [$data->comment_id, $data->user->user_name, $data->comment_customer,$data->comment_rating, $date, $rating];
    }

    public function getDataSearch(Request $request){
        $like = $request->all();
        $data = ProductModel::where('product_name', 'LIKE', '%'.$like['query'].'%')->get();

        $output = '<ul class="dropdown-menu" style="display:block;width: 100%; position:relative">';

        foreach($data as $item){
            $output .= '<li class="choose" style="width: 100%; cursor: pointer">'.$item->product_name.'</li>';
        }

        $output .= '</ul>';

        echo $output;
    }
}
