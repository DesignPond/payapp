<?php

$I = new WebGuy($scenario);
$I->wantTo('see if the subscriptions page is working');
$I->amOnPage('/subscriptions');

// You might not have wording that says Home so change this to something that you use in your home page. 
$I->see('Subscriptions');