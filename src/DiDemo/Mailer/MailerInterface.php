<?php

namespace DiDemo\Mailer;

interface MaierInterface {

  public function sendMessage($recipientEmail, $subject, $message, $from);

}
