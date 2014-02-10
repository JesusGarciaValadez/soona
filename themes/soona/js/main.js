( function () {
    
    if ( $( '.product-inner > div' ).exists() ) {
        
        $( '.product-inner' ).on( {
            mouseover: function ( e ) {
                e.preventDefault();
                e.stopPropagation();
                $( e.currentTarget ).children( 'div' ).animate( {
                    bottom: '0px',
                }, 200 );
            },
            mouseleave: function ( e ) {
                e.preventDefault();
                e.stopPropagation();
                $( e.currentTarget ).children( 'div' ).animate( {
                    bottom: '-106px',
                }, 200 );
            }
        } );
    }
    if ( $( '.catalog_list li article' ).exists() ) {
        
        $( '.catalog_list li article' ).on( {
            mouseover: function ( e ) {
                e.preventDefault();
                e.stopPropagation();
                $( e.currentTarget ).children( '.product_information_wrapper' ).animate( {
                    bottom: '0px',
                }, 100 );
            }, 
            mouseleave: function ( e ) {
                e.preventDefault();
                e.stopPropagation();
                $( e.currentTarget ).children( '.product_information_wrapper' ).animate( {
                    bottom: '-105px', 
                }, 100 );
            }
        } );
    }
    if ( $( '.catalog_list' ).exists() ) {
        $( '.catalog_list li' ).last().addClass( 'last_item' );
    }
} )();