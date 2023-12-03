<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Island;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PhotoController extends Controller
{
    //写真投稿画面を表示
    public function add()
    {
        return view('island.photo.create');
    }
    
    // 写真投稿
    public function create(Request $request)
    {
        $this->validate($request, Photo::$rules); //$requestの内容がPhotoモデルで設定した$rulesにしたがっているか確認
        
        $photo = new Photo; //新しいPhotoモデルのインスタンスを作成
        
        $user = Auth::user(); // ログインユーザーを取得
        
        if ($user !== null) {   // ログインしている場合
            $photo->user_id = $user->id; //ユーザーのidをphotoテーブルに保存
        }
        
        if ($request->hasFile('img')) {  //画像ファイルがアップロードされていればファイルを保存しpathをphotoテーブルに保存
            $path = $request->file('img')->store('public/img');
            $photo->island_image = basename($path);
        }
        $photo->island_name = $request->input('islands_name'); //フォームから送信された島の名前を取得し、photoモデルのislands_nameに設定
        $photo->genre = $request->input('genre'); //フォームから送信されたジャンルを取得しphotoモデルのgenreに設定
        $photo->text = $request->input('text');  //フォームから入力されたテキストをphotoテーブルに設定
      
        $photo->save(); //データベースに保存
        
        return redirect()->route('island.top', ['name' => $photo->island_name]); //写真が投稿された後、その島のトップページにリダイレクトする
    }
    
    //写真を表示（島個別ページ）
    public function index(Request $request,$id) //$id URLから受け取る島の名前を受け取る.$idに代入される
    {
        $photos = Photo::where('island_name',$id)->get(); //Photoモデルを使用して指定された島の名前に一致する写真データをデータベースから取得し$photosに代入

        return view('island.top', ['photos'=>$photos]);  //island/topに写真を表示する
    }
    
    //写真詳細ページ
    public function show(Request $request) 
    {
        $photo = Photo::withCount('likes')->find($request->id); //リクエストからidを取得しそのidに対応する写真をデータベースから探す。
        if (empty($photo)) { //取得した写真データがない場合
            abort(404); //404エラーを発生させる
        }
        
        $user = User::find($photo->user_id); //写真投稿したユーザーのidを取得し$userに代入
        $user_name = $photo->user_name; //写真のデータからユーザー名を取得し$user_nameに代入
        
        //コメント表示する処理
        
        $comments = $photo->comments; //写真に関連付けされたコメントを取得
        
        
        return view('island.photo.detail',['photo'=>$photo,'user_name'=>$user_name,'user'=>$user,'comments'=>$comments]); //コメント追加
    }
    
    //マイページの写真詳細ページ
    public function detail(Request $request)
    { 
        $photo = Photo::find($request->id); //リクエストからidを取得しそのidに対応する写真をデータベースから探す。
        if (empty($photo)) { //取得した写真データがない場合
            abort(404); //404エラーを発生させる
        }
       
        $user = User::find($photo->user_id); //写真投稿したユーザーのidを取得し$userに代入
        $user_name = $user->name; //写真のデータからユーザー名を取得し$user_nameに代入
        $user_id = $request->user_id; //リクエストからuser_idを取得し$user_idに代入
        
        //コメント表示する処理
        $comments = $photo->comments; //写真に関連付けされたコメントを取得
        
        return view('mypage.mypagedetail',['user_name'=>$user_name,'photo'=>$photo,'user'=>$user,'user_id'=>$user_id,'comments'=>$comments]); //コメント追加
    }
    
    //　コメントを登録する処理
    public function comment(Request $request)
    {
        $this->validate($request, Comment::$rules); //$requestの内容がCommentモデルで設定した$rulesにしたがっているか確認
        
        $comment = new Comment(); //Commentモデルの新しいインスタンスを作成
        
        $user = Auth::user(); //ログインしているユーザーを取得
        if($user){ //ログインしていたら
            $comment->user_id = $user->id; //ユーザーのidをuser_idに設定
        } else { //ログインしていなかったら
            return redirect()->route('login'); //ログインページにリダイレクトする
        }
        
        $comment->photo_id = $request->input('photo_id'); //フォームから送信されたphoto_idを取得しCommentのphoto_idに設定
        $comment->comment = $request->input('comment'); //フォームから送信されたcommentを取得しCommentのcommentに設定
        $comment->save(); //データベースに保存
        
        return redirect()->route('photo.show',['id'=>$comment->photo_id]); //写真詳細ページにリダイレクトするコメントが投稿された写真のidを渡す。
    }
    
    
    //検索画面表示
    public function showSearch(Request $request){
        return view('island.photo.search');
    }
    
    //検索
    public function search(Request $request)
    {
        $island_name = $request->input('island_name'); //リクエストから送信されたislnad_nameを取得
        $genre = $request->input('genre'); //リクエストから送信されたgenreを取得
        
        if($island_name == 'すべての島' && $genre != 'すべてのジャンル'){ //'すべての島'で、'すべてのジャンル'ではない場合
            $photos = Photo::where('genre',$genre)->get();               //ジャンル一致する写真を取得
        }else if ($island_name != 'すべての島' && $genre == 'すべてのジャンル'){ //'すべての島'ではなく、'すべてのジャンル'の場合
            $photos = Photo::where('island_name',$island_name)->get();          //島の名前に一致する写真を取得
        }else if($island_name != 'すべての島' && $genre != 'すべてのジャンル'){ //'すべての島'ではなく、'すべてのジャンル'でない場合
            $photos = Photo::where("island_name", $island_name)->where("genre",$genre)->get(); //両方に一致する写真を取得
        }else{ 
            $photos = Photo::get(); //どの条件にも一致しない場合すべての写真を取得
        }
        
        
        $island = Island::where('island_name',$island_name)->first(); //指定された島の名前に一致するデータをIslandモデルから検索し最初に一致したデータを取得
        return view('island.top', ['island_name' => $island_name, 'genre' => $genre, 'photos' => $photos, 'island' => $island]);
    }


    //削除
    public function delete(Request $request)
    {
        $photo = Photo::find($request -> id); //URLのidを取得し、対応する写真をデータベースから取得
        if (empty($photo)) { //写真が見つからない場合
            abort(404); //404エラーを発生させる
        }
        $photo->delete(); //データベースから写真を削除
        
        return redirect()->route('island.top', ['name' => $photo->island_name]);
    }

}