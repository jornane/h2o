<?php
/**
 * Example configuration file
 */

return (object)[

	'storage' => 
		new ExampleStorage(/* params */),

	'preprocessor' => 
		new ExamplePreprocessor(/* params */),

	'postprocessor' => 
		new ExamplePostprocessor(/* params */),

	'authenticationConnector' => 
		new ExampleAuthenticationController(/* params */),

];
