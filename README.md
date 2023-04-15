# アプリケーション名
・RESE 飲食店予約システム
![2023-04-15 (1)](https://user-images.githubusercontent.com/118151019/232185185-ab5aa72e-a6ec-4086-a2d1-a3693679b933.png)

# 作成目的
・自社予約サービスの運用とその管理のため。

# URL
[メインページ] (https://rese-booking-app.herokuapp.com/shops)
※予約はコースを選ばなければバリデーション通らないのでコースが作成されている店舗（店舗一覧の一番最初に来ている仙人という店舗）で試してみてください。
※サイト管理者で店舗代表者を作成し、店舗運営者ページでコースを作成する形になっています。

[店舗代表者画面] (https://rese-booking-app.herokuapp.com/admin/login)
ログインメールアドレス：sennminn@outlook.jp
パスワード：senninn1476

[サイト管理者画面] (https://rese-booking-app.herokuapp.com/site_manager/register)

# 機能一覧
### ユーザー関連
・ログイン機能
・メール認証機能
・お気に入り機能
・予約機能
・評価機能
・ジャンル、エリア、店名での検索
・決済機能
・リマインダー

### 管理画面（店舗代表者）
・ログイン機能
・予約一覧
・店舗情報更新
・コース作成
・予約者にメール送信

### 管理画面
・ログイン機能
・店舗代表者作成
・店舗作成

# 環境
・Laravel 8,Jquery

#テーブル設計書
![2023-04-15 (3)](https://user-images.githubusercontent.com/118151019/232185352-470b94a0-10ad-402d-98b5-bf86e10c23e9.png)
![2023-04-15 (4)](https://user-images.githubusercontent.com/118151019/232185355-ae380d06-d73e-402c-ae7a-339a1fb9dbfb.png)
![2023-04-15 (5)](https://user-images.githubusercontent.com/118151019/232185358-fafd2975-a854-4b6f-ae18-73ee8df355d7.png)

#ER図
![2023-04-15 (2)](https://user-images.githubusercontent.com/118151019/232185349-1efa823a-316b-4153-a0a6-75dba089c2ba.png)

# その他
・決済機能は本番環境での利用申請はしておりません。
・メール認証はユーザー登録時のみ適用しました。
・ストレージに保存する場合のコードは本番環境で画像表示できなかったのでコメントアウトしています。
