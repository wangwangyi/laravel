<?php

namespace App\Http\Controllers\System;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\User;
use Auth;
use Hash;
use Cache;
use DB;
use App\Models\System;
use App\Models\Role_user;
class SettingController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_set' => 'am-in']);
    }


    public function create()
    {
        return view('admin.setting.create');
    }
     //新增管理员
    public function do_register(Request $request)
    {
        //验证邮箱是否存在。用户名密码不能为空
        $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
            ]);
        //插入users表

        $users = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'created_at' =>date('Y-m-d H:i:s'),
            'password' => bcrypt($request->input('password')),
        ]);
       // return DB::enableQueryLog();
        $role_id = $request->input('role_id');
        Role_user::insert([
            'role_id' => $role_id,
            'user_id' => $users->id,//获取本条新增id
        ]);
        return back();
    }

    //show修改密码
    public function change_password()
    {
        return view('admin.setting.change_password');
    }

    //update修改密码
    public function update_password(Request $request)
    {
        $admin = Auth::user();

        if(!Hash::check($request->old_password,$admin->password)){
            return back()->with('msg','原始密码错误~');
        }
        $this->validate($request,['old_password' => 'required',
            'password' => 'required|min:6|confirmed']);
        $admin = User::find($admin->id);
        $admin->fill(['password' => bcrypt($request->password)])->save();

        return back()->with('msg','修改成功！');
    }

    public function cache()
    {
        return view('admin.setting.cache');
    }

    /**
     * 清除所有的缓存
     * @return mixed
     */
    public function clear_cache()
    {
        Cache::flush();
        return back()->with('msg', '缓存清除成功~');
    }


    //站点信息
    public function config()
    {
        $system = System::find(1);
        return view('admin.setting.config')->with('system',$system);
    }
    public function update(Request $request)
    {
        $system = System::find(1);
        $system->update($request->all());
        return back()->with('msg', '修改成功~');
    }



    //管理员列表
    public function author()
    {
        $count = count(User::get());
        $users = User::with('role_user')->paginate(15);
      //  return $users;
        return view('admin.setting.author')->with('users',$users)
                                              ->with('count',$count);
    }
    //删除管理员
    public function del_user($id)
    {
        User::destroy($id);
        Role_user::where("user_id","=",$id)->delete();
        return back()->with('msg', '删除成功');
    }

}
