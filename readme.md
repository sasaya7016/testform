# Test Form
<img width="1158" alt="testform-1" src="https://user-images.githubusercontent.com/61730661/87874031-61a1e780-ca01-11ea-9a58-b6eed63fb903.png">

## URL
http://testform-s.herokuapp.com/

## 使い方 
2〜3つ程、フォームの入力をして下さい。
次に、Exportのボタンを押して下さい、CSVのデータが出力されます。
出力されたデータは一旦そのままにして下さい。
まずは、フォームに入力した内容を「アクションボタン」の削除で全部消して下さい。
全部消えましたら、保留にしていたCSVをインポートのファイルでセレクトして下さい。
その後、Inportのボタンを押して下さい。
CSVのデータが反映されます。


## 開発環境
- PHP
- MAMP
- Laravel
- phpmyAdmin

## 本番環境
- Heroku
- postgres

## 機能
- フォームの投稿/詳細/編集/削除
- CSVのインポート
- CSVのエクスポート

## 条件
苗字,名前,メールアドレス 必須入力
コメント                 任意入力
苗字,名前                カタカナ不可
メールアドレス           @マークなし不可                

## データベース設計 
### postsテーブル
|Column|Type|Options|
|------|----|-------|
|id|bigIncrements|
|lastname|string|
|firstname|string|
|email|string|unique|
|text|string|nullable|
