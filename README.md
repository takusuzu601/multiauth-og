laravel multi Auth 11で参考URL:https://laranote.jp/laravel-11-breeze-multi-auth-user-admin-example/#toc17

NewPasswordController.phpでもPassword::reset →  Password::broker('admins')->resetしないとAdmin RestPasswordが機能しない
