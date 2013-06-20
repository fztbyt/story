<?php

return array(

	/*
	|----------------------------------------------------------------------
	| Default Page
	|----------------------------------------------------------------------
	|
	| Default Page.
	|
	*/
	'default_page'  => '_posts_',

	/*
	|----------------------------------------------------------------------
	| Per Page Limit
	|----------------------------------------------------------------------
	|
	| Set pagination count.
	|
	*/
	'per_page'  => 10,


	'permalink' => array(

		/*
		|------------------------------------------------------------------
		| Page Slug Format
		|------------------------------------------------------------------
		|
		| Define Page URI references to (:handle).
		| - {slug}
		| - {id}
		|
		*/
		'page' => '{slug}',

		/*
		|------------------------------------------------------------------
		| Post Slug Format
		|------------------------------------------------------------------
		|
		| Define Post permalink format:
		| - {slug}
		| - {id}
		|
		*/

		'post' => 'posts/{slug}',
	),
);
