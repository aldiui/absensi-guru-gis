<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use App\Models\EmailModel;

class Email extends BaseConfig
{
    public string $fromEmail;
    public string $fromName;
    public string $recipients;
    public string $userAgent;
    public string $protocol;
    public string $mailPath;
    public string $SMTPHost;
    public string $SMTPUser;
    public string $SMTPPass;
    public int $SMTPPort;
    public int $SMTPTimeout;
    public bool $SMTPKeepAlive;
    public string $SMTPCrypto;
    public bool $wordWrap;
    public int $wrapChars;
    public string $mailType;
    public string $charset;
    public bool $validate;
    public int $priority;
    public string $CRLF;
    public string $newline;
    public bool $BCCBatchMode;
    public int $BCCBatchSize;
    public bool $DSN;

    public function __construct()
    {
        $emailModel = new EmailModel();
        $email = $emailModel->find(1);

        $this->fromEmail = $email['from_email'];
        $this->fromName = $email['from_name'];
        $this->recipients = $email['recipients'];
        $this->userAgent = $email['user_agent'];
        $this->protocol = $email['protocol'];
        $this->mailPath = $email['mail_path'];
        $this->SMTPHost = $email['smtp_host'];
        $this->SMTPUser = $email['smtp_user'];
        $this->SMTPPass = $email['smtp_pass'];
        $this->SMTPPort = $email['smtp_port'];
        $this->SMTPTimeout = $email['smtp_timeout'];
        $this->SMTPKeepAlive = $email['smtp_keep_alive'];
        $this->SMTPCrypto = $email['smtp_crypto'];
        $this->wordWrap = $email['word_wrap'];
        $this->wrapChars = $email['wrap_chars'];
        $this->mailType = $email['mail_type'];
        $this->charset = $email['charset'];
        $this->validate = $email['validate'];
        $this->priority = $email['priority'];
        $this->CRLF = $email['crlf'];
        $this->newline = $email['newline'];
        $this->BCCBatchMode = $email['bcc_batch_mode'];
        $this->BCCBatchSize = $email['bcc_batch_size'];
        $this->DSN = $email['dsn'];
    }
}