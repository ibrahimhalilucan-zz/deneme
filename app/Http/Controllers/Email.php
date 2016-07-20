<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class Email extends Controller
{
    public function mailgonder(Request $request) {
        $adi = $request->get('name');
        $email = $request->get('email');
        $mesaj = $request->get('mesaj');


        $data = array(
            'adi' => $adi,
            'email' => $email,
            'mesaj' => $mesaj,
        );
        $ok = Mail::send('panel.iletisimformu-maili', $data, function($message) {
                    $message->to('info@didemmodaevi.com', 'Didem Modaevi')->subject('İletişim Formu');
                });

        if ($ok==1) {
            session()->flash('mailsucces', 'Mesajınız iletildi.');
            return redirect()->back();
            
        } else {
            session()->flash('mailhata', 'Mesajınız gönderilirken hata oluştu.');
            return redirect()->back();
        }
    }
}
