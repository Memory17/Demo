<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\UserRequest;
use App\Http\Requests\Admin\Users\UserUpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\OrderModel;
use App\Models\OrderdetailModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct(){
        $active = "active";
        view()->share('activeUser', $active);
    }
    
    //Danh sách tài khoản
    public function index()
    {
        //
        $data = UserModel::orderBy('user_id', 'DESC')->paginate(5);

        return view('backend.users.list', ['data' => $data]);
    }

    //Form tạo tài khoản
    public function create()
    {
        return view('backend.users.add');
    }

    //Thêm tài khoản
    public function store(UserRequest $request)
    {
        $data = new UserModel();
        
        $data->user_name = $request->user_name;
        $data->user_email = $request->user_email;
        $data->password = bcrypt($request->user_password);//bcrypt mã hóa mật khẩu trước 
        $data->role_id = $request->role_id;

        if($data->save()){
            return redirect('admin/users/create')->with('msgSuccess', 'Đăng kí thành công');
        }
        else{
            return redirect('admin/users/create')->with('msgError', 'Đăng kí thất bại');
        }

    }

    //Form sửa vai trò
    public function edit($id)
    {
        $data = UserModel::find($id);
        return view('backend.users.update', ['data' => $data]);

    }

    //Sửa vai trò
    public function update(Request $request, $id)
    {
        $data = UserModel::find($id);

        $data->role_id = $request->role_id;

        if($data->save()){
            return redirect()->back()->with('msgSuccess', 'Cập nhật thông tin thành công');
        }
        else{
            return redirect()->back()->with('msgError', 'Cập nhật thông tin thất bại');
        }
    }

    //Xóa tài khoản
    public function destroy($id)
    {
        $data = UserModel::find($id);
        $dataOrder = OrderModel::where('user_id', $id)->get();
        foreach($dataOrder as $item){
            $dataOrderdetail = OrderdetailModel::where('order_id', $item->order_id)->get();
            foreach($dataOrderdetail as $val){
                $val->delete();
            }
            $item->delete();
        }
        if($data->delete()){
            return response()->json(['msgSuccess'=>'Xóa người dùng thành công']);
        }
        else{
            return response()->json(['msgError'=>'Xóa người dùng thất bại']);
        }
    }

    //Form login
    public function getLogin(){
        return view('backend.users.login');
    }

    //Xửa lý đăng nhập
    public function postLogin(Request $request){
        $user_email = $request->user_email;
        $password = $request->user_password;

        if(Auth::attempt(['user_email' => $user_email, 'password' => $password])){
            return redirect('admin/dashboard')->with('msgSuccess', 'Đăng nhập thành công');
        }
        else{
            return redirect('admin')->with('msgError', 'Đăng nhập thất bại </br> Tài khoản hoặc mật khẩu không đúng');
        };
    }

    //Xử lý đăng xuất 
    public function logoutAdmin(){
        Auth::logout();

        return redirect('admin')->with('msgSuccess', 'Đăng xuất thành công');
    }

    //Hiển thị thông tin admin đang đăng nhập
    public function showProfileAdmin(){
        if(Auth::check()){
            $data = Auth::user();
            return view('backend.profile.show', ['data' => $data]);
        }
        else{
            return redirect('admin');
        }
    }

    //Form chỉnh sửa thoogn tin admin
    public function showFormUpdateAdmin(){
        $dataUser = Auth::user();

        $data = UserModel::find($dataUser->user_id);

        return view('backend.profile.update', ['data' => $data]);
    }

    //Cập nhật thông tin admin
    public function updateProfileAdmin(UserUpdateProfileRequest $request){
        $dataUser = Auth::user();

        $data = UserModel::find($dataUser->user_id);

        $data->user_name = $request->user_name;
        $data->password = bcrypt($request->user_password);
        
        if($data->save()){
            return redirect('admin/profile/show')->with('msgSuccess', 'Cập nhật thông tin thành công');
        }
        else{
            return redirect()->back()->with('msgError', 'Cập nhật thông tin thất bại');
        }
    }
}
