# laravel11-template
git cloneしたらやること  
docker-compose up -d --build  
docker-compose exec php bash  
composer install  
.env ファイルの作成  
cp .env.example .env  
テキストを参照
データベースが存在しているかを確認　　
画面表示する前にマイグレーションしておくこと  
## 追加機能の実装  
1. コントローラの設定  
リクエストを受け取る  
データの保存  
/にリダイレクト  
2. データベースのデータを表示  
コントローラの修正 indexアクションでは、allメソッドを使用することでtodosテーブルを全て取得し、 $todosに格納  
compact関数は、viewに変数を送信する  
3. View の修正  
## メッセージの送信  表示させる「メッセージ」の処理を実装  
「/にリダイレクト」するタイミングで、メッセージを送る  
redirectメソッドに対してwithメソッドを活用すると、セクションに値が保存される  
return redirect('ルート')->with('キー','値');
blade.phpを編集して、メッセージを表示  
値は、セッションに保存されているので、セッションから値を取り出す処理を記述  
## 更新機能の実装  
Todo を書き換える  
書き換えられた Todo の id を取得する  
Todoのidは、inputタグのhidden属性を指定して、コントローラに値を渡す。  
特定の id を元に content の内容を書き換える  
    updateアクションを作成  
    更新したい Todo をフォームから送信されたidで検索し、updateメソッドでcontentを更新  
    モデルクラス::find(主キー)->update(更新するキー => 値);  
## 削除機能の実装  
削除」ボタンを押す 
(idは、inputタグのhidden属性を指定して、コントローラに値を渡す。)  
対象の Todo の id を取得する 
削除したい Todo をフォームから送信されたidで検索し、deleteメソッドで Todoを削除  
モデルクラス::find(主キー)->delete();  
id を元にデータを削除する  
## Todoアプリ中級で使用するテーブルの作成とリレーションの設定(１対 N)   
マイグレーションファイル編集  
外部キーの設定  
foreignId('category_id')外部IDcategory_idを設定  
constrained() laravelの規約に則り、自動でテーブルを紐づけてくれる  
cascadeOnDelete() 参照先のidが削除された時に、その外部idを持つレコードも削除される  
マイグレーションファイル名の変更  
マイグレーションの実行 php artisan migrate:fresh  
モデルの作成  
 todosテーブルに紐づくcategoryを取り出すために、モデルでbelongsTo結合を使用  
belongsToは、外部キーで関連付けられているテーブルのレコードを取り出すメソッド  



