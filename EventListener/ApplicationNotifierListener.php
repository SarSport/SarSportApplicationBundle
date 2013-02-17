<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\SarSportApplicationBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Swift_Mailer;
use Twig_Environment;
use SarSport\Bundle\SarSportApplicationBundle\Events;
use SarSport\Bundle\SarSportApplicationBundle\Event\ApplicationEvent;
use SarSport\Bundle\SarSportApplicationBundle\Model\ApplicationInterface;

/**
 * Updates date and time in the application
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationNotifierListener implements EventSubscriberInterface
{
    const FROM_EMAIL = 'noreplay@sarsport.ru';

    /**
     * @var Swift_Mailer
     */
    protected $mailer;

    /**
     * @var UrlGeneratorInterface
     */
    protected $router;

    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * @var array
     */
    protected $emails;

    /**
     * Constructor.
     *
     * @param Swift_Mailer $mailer
     * @param UrlGeneratorInterface $router
     * @param Twig_Environment $twig
     * @param array $emails
     */
    public function __construct(Swift_Mailer $mailer, UrlGeneratorInterface $router, Twig_Environment $twig, $emails)
    {
        $this->mailer = $mailer;
        $this->router = $router;
        $this->twig = $twig;
        $this->emails = $emails;
    }

    /**
     * Update DateTime value in application
     *
     * @param ApplicationEvent $event
     */
    public function notify(ApplicationEvent $event)
    {
        if (count($this->emails)) {
            $application = $event->getApplication();

            $url = $this->router->generate('application_show', array('id' => $application->getId()), true);
            $context = array('application' => $application, 'url' => $url);
            if ($this->isNewApplication($application)) {
                $templateName = 'SarSportApplicationBundle:Application:emailNewApplication.txt.twig';
            } else {
                $templateName = 'SarSportApplicationBundle:Application:emailUpdateApplication.txt.twig';
            }

            foreach ($this->emails as $email) {
                $this->sendMessage($templateName, $context, static::FROM_EMAIL, $email);
            }
        }
    }

    /**
     * {@inheritDoc}
     *
     * @return array
     */
    static public function getSubscribedEvents()
    {
        return array(
            Events::APPLICATION_POST_PERSIST => 'notify',
        );
    }

    /**
     * @param ApplicationInterface $application
     * @return bool
     */
    private function isNewApplication(ApplicationInterface $application)
    {
        if ($application->getUpdatedAt() == null) {
            return true;
        }

        return false;
    }

    /**
     * @param string $templateName
     * @param string $context
     * @param string $fromEmail
     * @param string $toEmail
     */
    private function sendMessage($templateName, $context, $fromEmail, $toEmail)
    {
        $template = $this->twig->loadTemplate($templateName);
        $subject = $template->renderBlock('subject', $context);
        $textBody = $template->renderBlock('body_text', $context);
        $htmlBody = $template->renderBlock('body_html', $context);

        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($fromEmail)
            ->setTo($toEmail);

        if (!empty($htmlBody)) {
            $message->setBody($htmlBody, 'text/html')
                ->addPart($textBody, 'text/plain');
        } else {
            $message->setBody($textBody);
        }

        $this->mailer->send($message);
    }
}
