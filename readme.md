# Test Form
<img width="100%" alt="testform-1" src="https://user-images.githubusercontent.com/61730661/87874031-61a1e780-ca01-11ea-9a58-b6eed63fb903.png">



## :globe_with_meridians:URL
http://testform-s.herokuapp.com/ <br>
※反映に少し時間がかかります。少々お待ちください。

## :office:機能
- フォームの投稿/詳細/編集/削除
- CSVのインポート
- CSVのエクスポート

## :pencil:使い方 
初めに、苗字、名前、メールアドレス、コメントを入力して下さい。<br>
上記内容を2〜3件程、フォームの入力をして下さい。<br>
次に、Exportのボタンを押して下さい、CSVのデータが出力されます。<br><br>
※出力されたデータは、編集しないとインポートには使用できませんのでご了承下さい。<br>
インポート使用の場合は、id、create_at,update_atの列の削除が必要です。<br>
メールアドレスは同じ内容が不可に設定してありますので、入力と同じデータは使用できません<br>
CSVファイルのメールアドレスを修正するか、Formに入力したデータを編集して下さい。<br>

インポートする場合<br>
(例)インポートするCSVデータ:page_facing_up:<br>
<img width="500" alt="testform-2" src="https://user-images.githubusercontent.com/61730661/87875007-2efbed00-ca09-11ea-99fa-45e8b878dde2.png">
お手数ですが、上記CSVファイルの内容でしたら、インポートすることができます。
全部消えましたら、保留にしていたCSVをインポートのファイルでセレクトして下さい。<br>
その後、Inportのボタンを押して下さい。<br>
CSVのデータが反映されます。

## :computer:使用技術
### 使用言語
- PHP:7.2
- Laravel:6.0
- HTML/CSS

### 環境
- MAMP
- phpmyAdmin
- Heroku
- postgres

## :ballot_box_with_check:条件
- 苗字,名前,メールアドレス 必須入力
- コメント                 任意入力
- 苗字,名前                カタカナ不可
- メールアドレス           @マークなし不可                

## :black_square_button:データベース設計 
### postsテーブル
|Column|Type|Options|
|------|----|-------|
|id|bigIncrements|
|lastname|string|
|firstname|string|
|email|string|unique|
|text|string|nullable|
