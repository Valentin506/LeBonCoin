<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;


class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');
   
        // $botman->hears('{message}', function($botman, $message) {
   
        //     if ($message == 'Bonjour' || $message == 'bonjour') {
        //         $this-> askQuestion($botman);
	    //     }
            
        //     else{
        //         $botman->reply("Commencez la conversation par un Bonjour");
        //     }
   
        // });
   

        $botman->hears('.*problème.*chargement.*|chargement.*page.*', function (BotMan $bot) {
            $response = "Je suis désolé d'entendre que vous rencontrez des problèmes de chargement de pages. Voici quelques suggestions :
                1. Assurez-vous d'avoir une connexion Internet stable.
                2. Essayez de rafraîchir la page.
                3. Vérifiez si d'autres navigateurs ou appareils fonctionnent correctement.";
            $bot->reply($response);
        });

        $botman->hears('.*problème.*navigation.*|navigation.*|section.*promotions.*', function (BotMan $bot) {
            $response = "Si vous avez des problèmes de navigation ou si vous ne trouvez pas la section des promotions, essayez ceci :
                1. Vérifiez le menu de navigation principal.
                2. Utilisez la barre de recherche pour trouver des promotions spécifiques.
                3. Essayez de vider le cache de votre navigateur.";

            $bot->reply($response);

        }) ;

        $botman->hears('.*problème.*photos.*|photo.*|ajout.*photos.*|ajouter.*photos.*|format.*|format.*photos.*', function (BotMan $bot) {
            $response = "Si vous rencontrez des problèmes pour ajouter des photos à votre annonce ou pour votre photo de profil.  
            - Vérifiez que votre photo soit bien au format .png ou .jpg ou .gif, le format de votre photo se trouve juste après le nom de celle-ci.  
            - Si vous n’arrivez pas à ajouter plusieurs photos à votre annonce : cliquer sur le bouton 'Sélect. Fichier', sélectionnez directement sur la fenêtre qui est apparue plusieurs photos avec CTRL + clic gauche ou en maintenant clic gauche et glissez votre souris.
            - Si le problème persiste vous pouvez vous référencez au guide d’aide :  http://51.83.36.122:2004/help, dans la section 'Déposer une annonce'." ;

            $bot->reply($response);

        }) ;
        $botman->hears('.*problème.*.réservation.*annonce.*|réservation.*|réserver.*annonce.*', function (BotMan $bot) {
            $response = "Si vous avez des problèmes pour réserver une annonce, essayez les constructions suivantes: <br>".
            "- Vous pouvez réserver une annonce seulement si vous avez un compte. Vous pouvez créer votre compte via ce lien : <a href='http://51.83.36.122:2004/create-account'>http://51.83.36.122:2004/create-account</a><br>".
            "- Vérifiez bien que l’annonce choisie est bien disponible, pour cela vous pouvez consulter notre page d’aide : <a href='http://51.83.36.122:2004/help'>http://51.83.36.122:2004/help</a>, dans la section “Réserver une annonce”.<br>". 
            "- Vérifiez bien que vous ayez choisissez une date d’arrivée et une date de départ avant de cliquer sur “Vérifier la disponibilité” pour réserver. ";

            $bot->reply($response);

        }) ;

        $botman->hears('.*retrouver.*référence.*|retrouver.*référence.*', function (BotMan $bot) {
            $response = "Pour retrouver une référence, vous devez vous connecter, allez dans <strong> Mon Compte -> Réservation de vacances </strong>.
            Vous retrouvez ensuite vos annonces réservées avec leurs numéros de réservation. ";

            $bot->reply($response);

        }) ;

        $botman->hears('.*rechercher.*.type hébergement.*|recherche.*rien.*|rien.*type hébergement.*', function (BotMan $bot) {
            $response = "Si vous avez des problèmes pour faire une recherche par type d’hébergement, essayez nos solutions suivantes : <br>".
            "- Comme la recherche de type d’hébergement est basée à la fois sur la destination et le type d’hébergement, vérifiez que <strong> la destination soit bien remplie </strong> car cela est <strong> obligatoire. </strong> <br>".
            "- Si vous ne trouvez rien quand vous faites une recherche par type d’hébergement, cela veut dire qu’il n’y a pas encore une annonce avec ce type d’hébergement. Veuillez chercher par un autre type d’hébergement.";

            $bot->reply($response);

        }) ;



        $botman->hears('.*pourquoi.*je.*ne.*peux.*pas.*ajouter.*une.*annonce.*en.*favoris.*', function (BotMan $bot) {
            $response = "Si vous avez des problèmes pour réserver une annonce, essayez les constructions suivantes: 
            - Vous pouvez réserver une annonce seulement si vous avez un compte. Vous pouvez créer votre compte via ce lien : http://51.83.36.122:2004/create-account 
            - Vérifiez bien que l’annonce choisie est bien disponible, pour cela vous 	pouvez consulter notre page d’aide : http://51.83.36.122:2004/help, dans la section “Réserver une annonce”. 
            - Vérifiez bien que vous ayez choisissez une date d’arrivée et une date de 	départ avant de cliquer sur “Vérifier la disponibilité” pour réserver. ";

            $bot->reply($response);

        }) ;

        $botman->listen();


    }
   
    /**
     * Place your BotMan logic here.
     */
    // public function askQuestion($botman)
    // {
    //     $botman->ask('Bonjour, comment puis-je vous aider aujourd’hui ?', function(Answer $answer) {
   
    //         $question = $answer->getText();
   
    //         $this->say('Votre question est bien la suivante : '.$question);
    //     });
    // }

}
