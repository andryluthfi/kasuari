<?php

class SendEmail {

    /**
     * Get email sender identity
     * @return string[]
     */
    public static function getSenderIdentity() {
        return array(Yii::app()->params['emails']['noReply'] => 'Kost-Kostan');
    }

    /**
     * @param Order $order
     */
    public static function checkoutOrder($order) {
        $view = 'checkoutEmail';
        $subject = 'Notifikasi Order Kost-Kostan';

        $message = new EmailSender;
        $message->view = $view;
        $message->setBody(array('order' => $order), 'text/html');
        $message->setSubject($subject);
        $message->setTo(array($order->email => $order->name));
        $message->from = SendEmail::getSenderIdentity();
        Yii::app()->mail->send($message);
    }

    /**
     * @param Subscriber $subscriber
     */
    public static function subscriber($subscriber) {
        $view = 'allowSubscribe';
        $subject = 'Notifikasi Subscribe Kost-Kostan';

        $message = new EmailSender;
        $message->view = $view;
        $message->setBody(array('subscriber' => $subscriber), 'text/html');
        $message->setSubject($subject);
        $message->setTo(array($subscriber->email => $subscriber->email));
        $message->from = SendEmail::getSenderIdentity();
        Yii::app()->mail->send($message);
    }

    /**
     * @param Subscriber $subscriber
     */
    public static function unsubscribe($subscriber) {
        $view = 'unsubscribe';
        $subject = 'Notifikasi Unsubscribe Kost-Kostan';

        $message = new EmailSender;
        $message->view = $view;
        $message->setBody(array('subscriber' => $subscriber), 'text/html');
        $message->setSubject($subject);
        $message->setTo(array($subscriber->email => $subscriber->email));
        $message->from = SendEmail::getSenderIdentity();
        Yii::app()->mail->send($message);
    }

    /**
     * @param Subscriber $subscriber
     * @param Rent[][] $rents index on Rent::RENT_FEATURED and Rent::RENT_REGULAR
     */
    public static function subscribeRent($subscriber, $rents) {
        $view = 'subscribe';
        $subject = 'Informasi Kost-Kostan';

        $message = new EmailSender;
        $message->view = $view;
        $message->setBody(array('subscriber' => $subscriber, 'rents' => $rents), 'text/html');
        $message->setSubject($subject);
        $message->setTo(array($subscriber->email => $subscriber->email));
        $message->from = SendEmail::getSenderIdentity();
        Yii::app()->mail->send($message);
    }

    /**
     * @param AvailableOrder $availableOrder
     */
    public static function availableRent($availableOrder) {
        $view = 'availableEmail';
        $subject = 'Notifikasi Ketersediaan Kost-Kostan';

        $message = new EmailSender;
        $message->view = $view;
        $message->setBody(array('availableOrder' => $availableOrder), 'text/html');
        $message->setSubject($subject);
        $message->setTo(array($availableOrder->acceptOrder->order->email => $availableOrder->acceptOrder->order->name));
        $message->from = SendEmail::getSenderIdentity();
        $message->setCc(Yii::app()->params['emails']['customerService']);
        Yii::app()->mail->send($message);
    }

    /**
     * @param Order $order
     */
    public static function unavailableRent($order) {
        $view = 'unavailableEmail';
        $subject = 'Notifikasi Ketidaktersediaan Kost-Kostan';

        $message = new EmailSender;
        $message->view = $view;
        $message->setBody(array('order' => $order), 'text/html');
        $message->setSubject($subject);
        $message->setTo(array($order->email => $order->name));
        $message->from = SendEmail::getSenderIdentity();
        Yii::app()->mail->send($message);
    }

    /**
     * @param PaymentFinalization $paymentFinalization
     */
    public static function finalizationRent($paymentFinalization) {
        $view = 'finalizationEmail';
        $subject = 'Serah Terima Ketersediaan Kost-Kostan';

        $message = new EmailSender;
        $message->view = $view;
        $message->setBody(array('paymentFinalization' => $paymentFinalization), 'text/html');
        $message->setSubject($subject);
        $message->setTo(array($paymentFinalization->paymentConfirmation->availableOrder->acceptOrder->order->email => $paymentFinalization->paymentConfirmation->availableOrder->acceptOrder->order->name));
        $message->from = SendEmail::getSenderIdentity();
        $message->setCc(Yii::app()->params['emails']['customerService']);
        Yii::app()->mail->send($message);
    }

    /**
     * @param Order $order
     */
    public static function notificationOrderAdministrator($order) {
        $view = 'notification-order-administration';
        $subject = sprintf('Notifikasi Pesanan Pelanggan koskostan.com dari %s', $order->name);

        $message = new EmailSender;
        $message->view = $view;
        $message->setBody(array('order' => $order), 'text/html');
        $message->setSubject($subject);
        $message->setTo(array(Yii::app()->params['emails']['customerService'] => 'Customer Service'));
        $message->from = SendEmail::getSenderIdentity();
        Yii::app()->mail->send($message);
    }

    /**
     * @param PaymentConfirmation $paymentConfirmation
     */
    public static function notificationPaymentAdministrator($paymentConfirmation) {
        $view = 'notification-payment-administration';
        $subject = sprintf('Notifikasi Pembayaran Pelanggan koskostan.com dari %s', $paymentConfirmation->availableOrder->acceptOrder->order->name);

        $message = new EmailSender;
        $message->view = $view;
        $message->setBody(array('paymentConfirmation' => $paymentConfirmation), 'text/html');
        $message->setSubject($subject);
        $message->setTo(array(Yii::app()->params['emails']['customerService'] => 'Customer Service'));
        $message->from = SendEmail::getSenderIdentity();
        Yii::app()->mail->send($message);
    }

}

?>
