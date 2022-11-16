<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\RequirementRequest;
use App\Models\RequirementModel;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    public function send(RequirementRequest $request)
    {
        $data = new RequirementModel();

        $data->requirement_name = $request->name;
        $data->requirement_email = $request->email;
        $data->requirement_title = $request->title;
        $data->requirement_value = $request->value;
        $data->requirement_active = 1;

        $data->save();

        return redirect()->back()->with('msgSuccess', 'Gửi lời nhắn thành công');
    }
}
