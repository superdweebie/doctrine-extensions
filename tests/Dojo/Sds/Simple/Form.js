// This code generated by Sds\DoctrineExtensions\Dojo
define([
    'dojo/_base/declare',    
    'Sds/Form/ValidationControlGroup',
    'Sds/Simple/MultiFieldValidator',
    'Sds/DoctrineExtensions/Test/Dojo/TestAsset/Document/Simple/Id/Input',
    'Sds/Simple/NameInput',
    'Sds/DoctrineExtensions/Test/Dojo/TestAsset/Document/Simple/Country/Input',
    'Sds/DoctrineExtensions/Test/Dojo/TestAsset/Document/Simple/CamelCaseField/Input'
],
function(
    declare,    
    ValidationControlGroup,
    MultiFieldValidator,
    IdInput,
    NameInput,
    CountryInput,
    CamelCaseFieldInput
){
    // Will return a form for Sds\DoctrineExtensions\Test\Dojo\TestAsset\Document\Simple

    return declare(
        [            
            ValidationControlGroup        
        ],
        {
            validator: new MultiFieldValidator,
            
            inputs: [
            	new IdInput,
            	new NameInput,
            	new CountryInput,
            	new CamelCaseFieldInput
            ]
        }
    );
});