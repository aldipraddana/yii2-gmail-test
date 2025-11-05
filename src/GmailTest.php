<?php
namespace aldi\gmail;

use Yii;
use yii\web\Controller;
use yii\base\DynamicModel;

class GmailTest extends Controller
{
    public static function index()
    {
        $model = new DynamicModel(['smtp_username', 'smtp_password', 'host', 'port', 'encryption', 'from_email', 'from_name', 'to_email', 'subjek', 'pesan']);
        $model->addRule(['smtp_username','smtp_password','host','port','from_email','to_email','subjek','pesan'], 'required');
        $model->addRule(['smtp_username', 'from_email', 'to_email'], 'email');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $input = Yii::$app->request->post();
            $input = $input['DynamicModel'] ?? [];
            Yii::$app->mailer->transport = [
                'scheme' => 'smtp',
                'host' => $input['host'],
                'username' => $input['smtp_username'],
                'password' => $input['smtp_password'],
                'port' => $input['port'],
                'encryption' => $input['encryption'],
            ];

            $sent = Yii::$app->mailer->compose()
                ->setFrom([$input['from_email'] => $input['from_name']])
                ->setTo($input['to_email'])
                ->setSubject($input['subjek'])
                ->setTextBody($input['pesan'])
                ->send();

            if ($sent) {
                Yii::$app->session->setFlash('success', 'Email sent successfully.');
            } else {
                Yii::$app->session->setFlash('danger', 'Failed to send email. Please check your SMTP settings.');
            }

            return Yii::$app->controller->refresh();
        }
        return Yii::$app->getView()->renderFile(__DIR__ . '/../views/gmail-test-view.php', get_defined_vars());
        
    }
}