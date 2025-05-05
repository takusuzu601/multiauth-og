laravel multi Auth 11で参考URL:https://laranote.jp/laravel-11-breeze-multi-auth-user-admin-example/#toc17

NewPasswordController.phpでもPassword::reset →  Password::broker('admins')->resetしないとAdmin RestPasswordが機能しない

日本語化すると上記のリセットが機能しないので以下の日本語化の手順で解決しました
https://prettytabby.com/laravel-auth/
