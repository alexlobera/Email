<?php

namespace Email\Mailer\SendGrid;

use SendGrid\Email as SendGridEmail;
use Email\EmailInterface;

class SendGridEmailFactory implements SendGridEmailFactoryInterface
{
    /**
     * @param EmailInterface $email
     * @param array          $options
     *
     * @return Email
     */
    public function createSendGridEmail(EmailInterface $email, array $options)
    {
        $sendGridEmail = new SendGridEmail();
        $sendGridEmail->addTo($email->getTo());
        $sendGridEmail->setFrom($email->getFrom());
        $sendGridEmail->setSubject($email->getSubject());
        $sendGridEmail->setText($email->getText());
        $sendGridEmail->setHtml($email->getHtml());

        if (array_key_exists('categories', $options)) {

            foreach ($options['categories'] as $category) {
                $sendGridEmail->addCategory($category);
            }
        }
    }
}
