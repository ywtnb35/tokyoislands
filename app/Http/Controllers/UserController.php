<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    //ユーザーマイページ表示
    public function index(Request $request)
    {
        $user_id = $request->id; //リクエストからidを取得して$user_idに代入
       
        if ($user_id){ //$user_idが存在すれば
            $photos = Photo::where('user_id',$user_id)->get(); //Photoモデルから指定されたuser_idに関連する写真を取得
            $user_name = $request->user_name; //リクエストからuser_nameを取得
            $user = User::find($user_id); //指定されたuser_idに対応するUserをUserモデルから取得
            return view('mypage/mypage',['photos'=>$photos,'user_id'=>$user_id,'user_name'=>$user_name,'user'=>$user]);
        } else { //$user_idが存在しない場合
            $user_id = Auth::id(); //ログインユーザーのidを取得
            $user = User::find($user_id); //Userモデルからユーザー情報を取得し$userに代入
            $user_name = Auth::user() ? Auth::user()->name : null; //ユーザーがログインしている場合、ユーザー名を取得。ログインしていない場合はnullを設定
            
                if($user_name === null) { //$user_name1がnullの場合(ログインしていない場合)
                    return view('auth.login'); //ログインページにリダイレクトされる
                }
        
            $photos = Photo::where('user_id',$user_id)->get(); //'user_id'カラムが$user_idと一致する写真を検索して取得
        
            return view('mypage/mypage',['photos'=>$photos,'user_id'=>$user_id,'user_name'=>$user_name,'user'=>$user]);
        }
        
    }
    
    //プロフィール画像の変更画面を表示
    public function change(Request $request)
    {
        $user_id = Auth::id(); //ログインしているユーザーを取得
    
        if($user_id != $request->user_id){ //ログインしている$user_idとURLのuser_idを比較して一致しない場合
            $user = User::find($request->user_id); //リクエストから取得したユーザーidに対応するユーザーの情報を取得し$userに代入
            $user_name = $user ? $user->name : null; //取得したユーザーが存在する場合そのuser_nameを取得し、存在しない場合nullに設定
            return redirect()->route('mypage.index',['id'=>$request->user_id,'user_name'=>$user_name]); //リクエストから取得した$user_nameとidをビューに渡す
        }
    
        $user = User::find($user_id); //データベースからログインしているユーザーの情報を検索し$userに代入
        $user_name = Auth::user() ? Auth::user()->name : null; //取得したユーザーが存在する場合そのuser_nameを取得し、存在しない場合nullに設定
        
        return view('mypage.change',['user'=>$user,'user_name'=>$user_name,'user_id'=>$user_id]);
        
    }
    
    //プロフィール写真を変更
    public function upload(Request $request)
    {
        $user = Auth::user(); //ログインしているユーザーの情報を$userに代入
    
        if ($request->hasFile('profile_img')) { //リクエスト内にprofile_imgのファイルが含まれていたら
            $path = $request->file('profile_img')->store('public/img'); //その画像を'public/img'に保存
            $user->profile_img = basename($path); //保存されたファイルpathを使用してユーザーのプロフィール画像に設定
        }else{ 
            if(!$user->profile_img){ //アップロードされた画像がなく、プロフィール画像も設定されていない場合
            $user->profile_img = null; //profile_imgをnullに設定
            }
        }
        
        $user->save(); //データベースに保存
        return redirect()->route('mypage.index');
    }
    
    //プロフィール画像削除
    public function delete(Request $request)
    {
        $user = Auth::user(); //ログインしているユーザーを取得
        if(!$user){ //ユーザーが存在しない場合
            abort(404); //404エラーを返す
        }
        
        if($user->profile_img !== 'default.jpeg'){ //ユーザーのプロフィール画像がデフォルト画像ではない場合
            Storage::delete('public/img/'.$user->profile_img); //storageからユーザーのプロフィール画像を削除
    }
    $user->profile_img = null; //ユーザーのプロフィール画像をnullに設定
    $user->save(); //変更をデータベースに保存

    return redirect()->route('mypage.index'); //マイページにリダイレクトする
    }
    
}
