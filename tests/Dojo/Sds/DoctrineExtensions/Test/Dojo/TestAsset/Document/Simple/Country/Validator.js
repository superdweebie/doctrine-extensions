// This code generated by Sds\DoctrineExtensions\Dojo
define([
    'dojo/_base/declare',    
    'Sds/Test/CountryValidator1'
],
function(
    declare,    
    CountryValidator1
){
    // Will return a validator that can be used to check
    // the country field

    return declare(
        [            
            CountryValidator1        
        ],
        {
            field: 'country'
        }
    );
});
