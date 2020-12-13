<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Infrastructure\Primary\Http;

use Fredoddou\Resume\Domain\Profile\Profile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

final class ContactController extends AbstractController
{
    private \Swift_Mailer $mailer;
    private Profile $profile;
    private TranslatorInterface $translator;

    public function __construct(
        \Swift_Mailer $mailer,
        TranslatorInterface $translator,
        Profile $profile
    ) {
        $this->mailer = $mailer;
        $this->profile = $profile;
        $this->translator = $translator;
    }

    /**
     * @Route("/contact", name="contact", methods={"POST"})
     */
    public function __invoke(Request $request): JsonResponse
    {
        if (!$this->captchaVerify($request)) {
            return $this->json([
                'message' => $this->translator->trans('contact.form.captcha_invalid'),
            ], Response::HTTP_BAD_REQUEST);
        }

        if ($request->request->has('name') && $request->request->has('email') && $request->request->has('message')) {
            $message = (new \Swift_Message('Message received from '. $request->request->get('name')))
                ->setFrom($request->request->get("email"))
                ->setTo($this->profile->getEmail())
                ->setBody(
                    $this->renderView(
                        'emails/contact.html.twig',
                        [
                            'name' => $request->request->get('name'),
                            'email' => $request->request->get('email'),
                            'ip' => $request->getClientIp(),
                            'message' => $request->request->get('message')
                        ]
                    ),
                    'text/html'
                )
            ;

            $sent = $this->mailer->send($message);
            if ($sent === 0) {
                return $this->json([
                    'message' => $this->translator->trans('contact.form.internal_error'),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            return $this->json([
                'message' => $this->translator->trans('contact.form.message_sent'),
            ], Response::HTTP_OK);
        }

        return $this->json([
            'message' => $this->translator->trans('contact.form.missing_field'),
        ], Response::HTTP_BAD_REQUEST);
    }

    private function captchaVerify(Request $request): bool
    {
        $context  = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query([
                    'secret' => $_ENV['GOOGLE_RECAPTCHA3_PRIVATE'],
                    'response' => $request->request->get('g-recaptcha-response'),
                    'remoteip' => $request->server->get('REMOTE_ADDR'),
                ]),
            ],
        ]);
        $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
        $result = \json_decode($response);

        return $result->success;
    }
}
