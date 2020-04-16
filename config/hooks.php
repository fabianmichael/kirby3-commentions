<?php

namespace sgkirby\Commentions;

return [

	'route:after' => function ( $route, $path, $method, $result ) {

		// create the feedback message
		if ( get('thx') ) {

			if ( Commentions::defaultstatus( 'comment' ) != 'approved' )
				Commentions::$feedback = [ 'success' => 'Thank you! Please be patient, your comment has has to be approved by the editor.' ];

			else
				Commentions::$feedback = [ 'success' => 'Thank you for your comment!' ];

			Commentions::$feedback['accepted'] = 'Thank you, your webmention has been queued for processing. Please be patient, your comment has has to be approved by the editor.';

		}

		// process form submission
		if ( get('commentions') && get('submit') )
			Commentions::queueComment( $path, $result );

	}

];
