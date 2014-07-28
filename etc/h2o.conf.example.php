<?php
/**
 * Example configuration file
 */

return (object)[

	'storage' => 
		new ExampleStorage(/* params */),

	'preprocessor' => 
		new ExamplePreprocessor(/* params */),

	'authenticationConnector' => 
		new ExampleAuthenticationController(/* params */),

];
