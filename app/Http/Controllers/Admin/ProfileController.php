<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Profile;

class ProfileController extends Controller
{

    public function edit(Request $request)
    {
        if (empty($request->id)) {
            $request->id = 1;
        }
        $profile = Profile::find($request->id);
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
        // Varidationをかける
        $this->validate($request, Profile::$rules);

        // Profileモデルを取り出す
        $profile = new Profile;

        //新しく送信されてきたフォームデータを格納
        $profile_form = $request->all();

        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();

        // admin/profile/editにリダイレクトする
        return redirect('admin/profile/edit');
    }
}
