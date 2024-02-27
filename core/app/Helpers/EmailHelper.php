<?php
/**
 * Created by UniverseCode.
 */

namespace App\Helpers;

use App\{
    Models\EmailTemplate,
    Models\Setting
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\{
    PHPMailer,
    Exception
};

class EmailHelper
{

    public $mail;
    public $setting;

    public function __construct()
    {
        $this->setting = Setting::first();

        $this->mail = new PHPMailer(true);

        if($this->setting->smtp_check == 1){

            $this->mail->isSMTP();
            $this->mail->Host       = $this->setting->email_host;
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = $this->setting->email_user;
            $this->mail->Password   = $this->setting->email_pass;
            if ($this->setting->email_encryption == 'ssl') {
                 $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            } else {
                 $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            }
            $this->mail->Port           = $this->setting->email_port;
            $this->mail->CharSet        = 'UTF-8';
          
        }
    }

    public function sendTemplateMail(array $emailData)
    {
        $template = EmailTemplate::whereType($emailData['type'])->first();
        try{
            $email_body = preg_replace("/{user_name}/", $emailData['user_name'] ,$template->body);
            $email_body = preg_replace("/{order_cost}/", $emailData['order_cost'] ,$email_body);
            $email_body = preg_replace("/{orderNumber}/", $emailData['orderNumber'] ,$email_body);
            $email_body = preg_replace("/{site_title}/", $this->setting->title ,$email_body);
            $routeName = "user.profile";
            
            $this->mail->setFrom($this->setting->email_from, $this->setting->email_from_name);
            $this->mail->addAddress($emailData['to']);
            $this->mail->isHTML(true);
            $this->mail->Subject = $template->subject;
            $this->mail->Body = $email_body;
           
            $this->mail->send();
        }

      
        catch (Exception $e){
           // dd($e->getMessage());
        }

        return true;

    }
   public function sendRegistrationMail(array $emailData)
    {
        $template = EmailTemplate::whereType($emailData['type'])->first();
        try{
            $email_body = preg_replace("/{user_name}/", $emailData['user_name'] ,$template->body);
            $email_body = preg_replace("/{order_cost}/", $emailData['order_cost'] ,$email_body);
            $email_body = preg_replace("/{orderNumber}/", $emailData['orderNumber'] ,$email_body);
            $email_body = preg_replace("/{site_title}/", $this->setting->title ,$email_body);
            $routeName = "user.account.verify";
            $routeLink = route($routeName, ['token' => $emailData['token']]);
            $this->mail->setFrom($this->setting->email_from, $this->setting->email_from_name);
            $this->mail->addAddress($emailData['to']);
            $this->mail->isHTML(true);
            $this->mail->Subject = $template->subject;
           $this->mail->Body = $email_body .
                "</br> Please click link below and add password to your account :<br><a href=\"$routeLink\">Please click on the link to verify your account</a>";
            $this->mail->send();
        }



      
        catch (Exception $e){
           // dd($e->getMessage());
        }

        return true;

    }


    public function sendCustomMail(array $emailData)
    {
        try{
            $this->mail->setFrom($this->setting->email_from, $this->setting->email_from_name);
            $this->mail->addAddress($emailData['to']);
            $this->mail->isHTML(true);
            $this->mail->Subject = $emailData['subject'];
            $this->mail->Body = $emailData['body'];
            $this->mail->send();
        }
        catch (Exception $e){
           // dd($e->getMessage());
        }

        return true;
    }
 public function Shiprocket(array $emailData)
    {

                $template = EmailTemplate::whereType($emailData['type'])->first();

        try{

              $email_body = preg_replace("/{user_name}/", $emailData['user_name'] ,$template->body);
            $email_body = preg_replace("/{track_id}/", $emailData['track_id'] ,$email_body);
            $email_body = preg_replace("/{site_title}/", $this->setting->title ,$email_body);

            $this->mail->setFrom($this->setting->email_from, $this->setting->email_from_name);
            $this->mail->addAddress($emailData['to']);
            $this->mail->isHTML(true);
            $this->mail->Subject = $template->subject;
            $this->mail->Body = $email_body;
            $this->mail->send();

        }
        catch (Exception $e){
           // dd($e->getMessage());
        }

        return true;
    }


    
 public function ShiprocketReturn(array $emailData)
    {

                $template = EmailTemplate::whereType($emailData['type'])->first();

        try{

              $email_body = preg_replace("/{user_name}/", $emailData['user_name'] ,$template->body);
            $email_body = preg_replace("/{track_id}/", $emailData['track_id'] ,$email_body);
            $email_body = preg_replace("/{site_title}/", $this->setting->title ,$email_body);

            $this->mail->setFrom($this->setting->email_from, $this->setting->email_from_name);
            $this->mail->addAddress($emailData['to']);
            $this->mail->isHTML(true);
            $this->mail->Subject = $template->subject;
            $this->mail->Body = $email_body;
            $this->mail->send();

        }
        catch (Exception $e){
           // dd($e->getMessage());
        }

        return true;
    }

    public static function getEmail()
    {
        $user = Auth::user();
        if(isset($user)){
            $email = $user->email;
        }else{
            $email = Session::get('billing_address')['bill_email'];
        }
        return $email;
    }

}
