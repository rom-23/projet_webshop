<?php


namespace App\Notification;
use App\Entity\Contact;
use Swift_Mailer;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class ContactNotif
{
    /**
     * @var Swift_Mailer
     */
    private $mailer;
    /**
     * @var Environment
     */
    private $renderer;

    /**
     * ContactNotification constructor.
     * @param Swift_Mailer $mailer
     * @param Environment $renderer
     */
    public function __construct( Swift_Mailer $mailer, Environment $renderer )
    {
        $this -> mailer = $mailer;
        $this -> renderer = $renderer;
    }

    public function notify( Contact $contact )
    {
        var_dump(mail("romain.laurent23@gmail.com","Question sur article","le corps du message"));
        try {
            $message = (new \Swift_Message( 'Agence : ' . $contact -> getProduct() -> getName() ))
                -> setFrom( 'noreply@agence.fr' )
                -> setTo( 'romain.laurent23@gmail.com' )
                -> setReplyTo( $contact -> getEmail() )
                -> setBody( $this -> renderer -> render( 'emails/contacts.html.twig', [
                    'contact' => $contact
                ] ), 'text/html' );
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
        $this -> mailer -> send( $message );
    }
}