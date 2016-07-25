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

// $manager = new Manager();

// $manager->message($_POST['text'])->to(+2347038423581)->from($_POST['user_name'])->go();

// var_dump($_POST['text']);

var_dump($_POST);

die("here");



$bo->send($_POST['text']);

$bo->send("herloo");