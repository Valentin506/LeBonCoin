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
