<?php 

	$random = array("You won't find anything in here, better check the github link :P", 'Go Get a life buddy', "Look, It's come", 'Finally :D', 'You found the secret, now go get some work done :P', 'Hello There, Curious Guy/Gal :p', "Yep! You guessed it right this quote changes by itself. It's Magickan :P", 'There are more important things in life than just reading these random quotes', 'Seriously, get some work done', 'StopStalking now');
	echo "<!--".$random[mt_rand(0, count($random)-1)]."-->";

?>