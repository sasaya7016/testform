# Test Form
<img width="100%" alt="testform-1" src="https://user-images.githubusercontent.com/61730661/87874031-61a1e780-ca01-11ea-9a58-b6eed63fb903.png">

(例1)インポートするCSVデータ:page_facing_up:<br>
<img width="500" alt="testform-2" src="https://user-images.githubusercontent.com/61730661/87875007-2efbed00-ca09-11ea-99fa-45e8b878dde2.png">


## :globe_with_meridians: URL
http://testform-s.herokuapp.com/ <br>
※反映に少し時間がかかります。少々お待ちください。

## :office: 機能
- フォームの投稿/詳細/編集/削除
- CSVのインポート
- CSVのエクスポート

## :pencil: 使い方 
初めに、苗字、名前、メールアドレス、コメントを入力して投稿の確認をして下さい。<br>
上記内容を2〜3件程、フォームの入力をしていただけれ幸いです。<br>
次に、Exportのボタンを押して下さい、先程投稿した内容が、CSVのデータがで出力されますのでご確認下さい。<br>
お手数ですが、出力されたデータは一旦そのままにして下さい。（※インポートの確認にも使用いたします。）<br>
そして、フォームに入力した内容を「アクションボタン」の削除を押して、全投稿削除して下さい。※インポートの確認の際、同じデータが入っていないようにする為<br>
※その際、詳細確認、編集機能もご確認いただければ幸いです。<br>
全部消えたことが確認できましたら、CSVの編集
インポートボタンの上の「ファイルボタン」を押して、保留にしていたCSVをセレクトして下さい。<br>
Inportのボタンを押すことで、CSVのデータが反映されます。<br>
上記手順以外のCSVデーターを使用の場合は、上記画像のCSV例を参考にデーターを入れていただけると、インポートされます。

## :computer: 使用技術
### 使用言語
- PHP:7.2
- Laravel:6.0
- HTML/CSS

### 環境
- MAMP
- phpmyAdmin
- Heroku
- postgres



## :ballot_box_with_check: 条件
- 苗字,名前,メールアドレス 必須入力
- コメント                 任意入力
- 苗字,名前                カタカナ不可
- メールアドレス           @マークなし不可                

## :black_square_button: データベース設計 
### postsテーブル
|Column|Type|Options|
|------|----|-------|
|id|bigIncrements|
|lastname|string|
|firstname|string|
|email|string|unique|
|text|string|nullable|
