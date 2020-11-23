<?php

use App\Accomodation;
use App\UserMessage;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // Prendiamo tutti i record di Accomodation
        $accomodations = Accomodation::all();
        // Cicliamo per ogni elemento presente in $accomodation
        foreach ($accomodations as $accomodation) {
            // MESSAGGI: crea un max di 5 messaggi per accomodation
            $randomMsgNumber = rand(0,5);
            // Cicliamo per un numero di volte pari a $randomMsgNumber
            for ($i=0; $i < $randomMsgNumber; $i++) {
                // Creiamo un'istanza di UserMessage
                $newMessage = new UserMessage();
                // Riempiamo i campi di $newMessage
                $newMessage->accomodation_id = $accomodation->id;
                // EMAIL
                if (rand(0,4)==0) {
                    // 20% di possibilità che prenda in automatica l'email dell'UPR,
                    // altrimenti genera l'email con il Faker
                    $newMessage->email = $accomodation->user->email;
                } else {
                    $newMessage->email = $faker->freeEmail;
                }
                // NICKNAME
                if (rand(0,4)>0) {
                    // 80% di possibilità che scriva il nickname col Faker,
                    // altrimenti prenderà 'guest' cme default dal DB
                    $newMessage->nickname = $faker->userName;
                }
                $newMessage->text_message = $faker->realText(200);
                // Salviamo il tutto
                $newMessage->save();
            }
        }
    }
}
