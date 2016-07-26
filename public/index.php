<?php

require(__DIR__ . '/../vendor/autoload.php');

use LARASMS\SMSManager as Manager;

$bo = new Bot\BotDay();

/*
    {
    "token":"ZalA1WQV7ZZ6LSJ6v5ZkIvpp",
    "team_id":"T0001",
    "team_domain":"example",
    "channel_id":"C2147483705",
    "channel_name":"test",
    "timestamp":"1355517523.000005",
    "user_id":"U2147483697",
    "user_name":"Steve",
    "text":"googlebot: What is the air-speed velocity of an unladen swallow?",
    "trigger_word":"googlebot:"
    }
*/

/*
    token=ZalA1WQV7ZZ6LSJ6v5ZkIvpp
    team_id=T0001
    team_domain=example
    channel_id=C2147483705
    channel_name=test
    timestamp=1355517523.000005
    user_id=U2147483697
    user_name=Steve
    text=googlebot: What is the air-speed velocity of an unladen swallow?
    trigger_word=googlebot:
*/


// var_dump($_POST['text']);

// $bo->send("Sending");
// echo "sending";

// $bo->send("Hey @chijioke , did you see my file?");

// $bo->send("Sent");
// echo "Sent";

class Response
{
    private $data = [];

    public $originalText = '';

    public function __construct()
    {
        foreach( $_POST as $key => $value )
        {
            $this->{$key} = $value;
        }

        $this->originalText = $this->text;

        $this->prepareText($this->text);
    }

    private function prepareText($sentence)
    {
        // $words=array_shift(explode(' ', $sentence));
        $sentence = preg_replace("/^\Wsms/", "", $sentence); // Remove the command for the bot. (sms)
        $sentence = preg_replace("/\s+/", " ", $sentence); // remove unneccesary white space.
        $sentence = trim($sentence); // trim the sentence.
        $sentence = preg_replace("/&+/", "&amp;", $sentence); // change the & to html entities.
        $sentence = preg_replace("/>+/", "&gt;", $sentence); // change the > to html entities.
        $sentence = preg_replace("/<+/", "&lt;", $sentence); // change the < to html entities.
        $words = explode(' ', $sentence);
        // $number = array_shift($words);
        // verify the $number is valid and it is not text. $w
        // var_dump($words);
        // die("hihi");
        $this->text = implode(' ', $words);
    }
}

$res = new Response();
// var_dump($res->text);

// // var_dump($_POST);
// foreach($_POST as $key => $value) {
//     // $bo->send( (string) $value);
// }
// die("here");

// $bo->send($res->text);
$bo->send("<@$res->user_id|$res->user_name> sent you this message : " . $res->text . "");
$manager = new Manager();

$manager->message($res->user_name.": ".$res->text)->to(2347033235351)->from($res->user_name)->go();


// die("");

// $bo->send($_POST['text']);

// $bo->send("herloo");