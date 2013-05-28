// This code generated by Sds\DoctrineExtensions\Dojo
define([
    'dojo/_base/declare',    
    'Sds/Validator/Model',
    'Sds/Simple/MultiFieldValidator',
    'Sds/Simple/NameValidator',
    'Sds/DoctrineExtensions/Test/Dojo/TestAsset/Document/Simple/Country/Validator'
],
function(
    declare,    
    Model,
    MultiFieldValidator,
    NameValidator,
    CountryValidator
){
    // Will return a validator to validate a complete model for Sds\DoctrineExtensions\Test\Dojo\TestAsset\Document\Simple

    return declare(
        [            
            Model        
        ],
        {
            validators: [
            	new MultiFieldValidator,
            	new NameValidator,
            	new CountryValidator
            ]
        }
    );
});