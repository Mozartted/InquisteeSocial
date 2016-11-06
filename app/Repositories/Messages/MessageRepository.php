<?php
/**
 * Created by PhpStorm.
 * User: mozart
 * Date: 11/6/16
 * Time: 6:50 AM
 */

namespace App\Repositories\Messages;


interface MessageRepository
{
    public function getMessagesForUser();
    public function getMessagesForParticularResponder();
}