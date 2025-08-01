# Re-attendance

## 作成目的
Laravelのアウトプット学習の一環

## アプリケーションURL
http://localhost/

## 機能一覧
ログイン・ログアウト機能、新規会員登録機能、出勤機能、休憩機能、退勤機能、勤怠一覧情報取得機能、勤怠詳細編集機能、修正申請機能、ユーザー情報取得機能、修正申請承認機能

## テーブル設計書/ER図
<img width="758" height="192" alt="スクリーンショット (5)" src="https://github.com/user-attachments/assets/116dcf94-0136-42bc-a1fb-2fa66b6b7631" />
<img width="792" height="211" alt="スクリーンショット (6)" src="https://github.com/user-attachments/assets/e5fc0e8a-dc54-4833-a001-6e22ff0037dc" />
<img width="758" height="230" alt="スクリーンショット 2025-08-01 134603" src="https://github.com/user-attachments/assets/c4ac057a-9596-4169-a508-86ddf53a115e" />
<img width="757" height="167" alt="スクリーンショット 2025-08-01 134625" src="https://github.com/user-attachments/assets/484e343e-cd9e-44f0-a4a8-4d21362acba4" />
<img width="915" height="519" alt="スクリーンショット (7)" src="https://github.com/user-attachments/assets/cd25ce28-29f0-4066-850f-72248bacddb4" />



## 環境構築
- Dockerビルド(ターミナル・cmd内)
- 1.git clone https://github.com/vvennahuh/Re-attendance.git
- 2.docker-compose up -d --build
- 3.docker-compose exec php bash（ターミナル・cmd→PHPコンテナにログイン）

- Laravel環境構築
- 1.composer install(PHPコンテナ内)
- 2.Free-market/src内で.env.exampleファイルから.env作成後、環境変数を以下のように編集
- （DB_DATABASE=laravel_db/DB_USERNAME=laravel_user/DB_PASSWORD=laravel_pass）
- 3.php artisan key:generate(PHPコンテナ内・アプリケーションキー作成)
- 4.php artisan migrate --seed（PHPコンテナ内・データベースの作成）
- 5.composer require laravel/fortify(PHPコンテナ内・Fortifyのインストール)
- 6.composer require laravel-lang/lang:~7.0 --dev（PHPコンテナ内・Laravelのインストール）
- 7.cp -r ./vendor/laravel-lang/src/ja ./resources/lang/（PHPコンテナ内・会員登録および認証用の日本語ファイルの追加）
- 8.Windows環境でhttp://localhost/attendanceにエラーでアクセスできない場合はターミナルでsudo chmod -R 777 src/*を実行する

## 使用技術(実行環境)
- PHP 3.8
- Laravel 8.x
- Mysql 8.0.26
