<?php

namespace DiDemo;

use DiDemo\Mailer\MailerInterface;

/**
 *  i'm a service ... because i perform an action
 */

class FriendHarvester {
  private $pdo;
  private $mailer;

  public function __construct(\PDO $pdo, MailerInterface $mailer) {
    $this->pdo = $pdo;
    $this->mailer = $mailer;
  }

  public function emailFriends() {

    $sql = 'SELECT * FROM people_to_spam';
    foreach ($pdo->query($sql) as $row) {
        $this->$mailer->sendMessage(
            $row['email'],
            'Yay! We want to send you money for no reason!',
            sprintf(<<<EOF
    Hi %s! We've decided that we want to send you money for no reason!

    Please forward us all your personal information so we can make a deposit and don't ask any questions!
    EOF
            , $row['name']),
            'YourTrustedFriend@SendMoneyToStrangers.com'
        );
    }
  }
}
