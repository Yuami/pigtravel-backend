<?php
/**
 * Created by PhpStorm.
 * User: j_for
 * Date: 09/01/2019
 * Time: 11:25
 */

namespace Config;


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mail {
    private $mail;

    public function __construct(string $body, bool $html = true) {
        $mail = new PHPMailer();
        $mail->isHTML($html);
        $mail->isSMTP();
        $this->mail = $mail;
        $this->mail->Body = $body;
    }

    public function username(string $username) : self {
        $this->mail->Username = $username;
        return $this;
    }

    public function password(string $password) : self {
        $this->mail->Password = $password;
        return $this;
    }

    public function port(int $port) : self {
        $this->mail->Port = $port;
        return $this;
    }

    public function from($email, $name = '') : self {
        try {
            $this->mail->setFrom($email, $name);
        } catch (Exception $e) {
            throw new $e;
        }
        return $this;
    }

    public function addAddress($mail, $name = '') : self {
        $this->mail->addAddress($mail, $name);
        return $this;
    }

    public function addAddresses(array $addresses) : self {
        foreach ($addresses as $address) {
            if (isset($address['mail'])) {
                $mail = $address['mail'];
                $name = isset($address['name']) ? $address['name'] : '';
                $this->addAddress($mail, $name);
            }
        }
        return $this;
    }

    public function BCC(string $mail) : self {
        $this->mail->addBCC($mail);
        return $this;
    }

    public function subject(string $subject) : self {
        $this->mail->Subject = $subject;
        return $this;
    }

    public function altBody($altBody) : self {
        $this->mail->AltBody = $altBody;
        return $this;
    }

    public function send() {
        try {
            return $this->mail->send();
        } catch (Exception $e) {
             throw new $e;
        }
    }
}