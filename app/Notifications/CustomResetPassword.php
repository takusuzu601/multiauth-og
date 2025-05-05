<?php

namespace App\Notifications;

// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Notifications\Messages\MailMessage;
// use Illuminate\Notifications\Notification;

// 追加
use Illuminate\Auth\Notifications\ResetPassword as BaseResetPassword;

class CustomResetPassword extends BaseResetPassword
{
    // use Queueable;

    /**
     * コンストラクタを置く場合は
     * 親のコンストラクタを呼ばないとエラーになるので
     * コメントアウトしておく
     */
    // public function __construct()
    // {
        //
    // }

    /**
     * Get the reset URL for the given notifiable (user or admin).
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function resetUrl($notifiable)
    {
        // 管理者の場合は admin のルート、それ以外のユーザーの場合は user のルートを使用
        if (request()->routeIs('admin.*')) {
            return url(route('admin.password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
        } else {
            return url(route('user.password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
        }
    }
}
