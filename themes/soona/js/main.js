//  @codekit-prepend "plugins.js";

( function ( $, window, document, undefined ) {
    
    if ( $( '.product-inner > div' ).exists() ) {
        
        $( '.product-inner' ).on( {
            mouseover: function ( e ) {
                e.preventDefault();
                e.stopPropagation();
                $( e.currentTarget ).children( 'div' ).dequeue().animate( {
                    bottom: '0px',
                }, 200 );
            },
            mouseleave: function ( e ) {
                e.preventDefault();
                e.stopPropagation();
                $( e.currentTarget ).children( 'div' ).dequeue().animate( {
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
                $( e.currentTarget ).children( '.product_information_wrapper' ).dequeue().animate( {
                    bottom: '0px',
                }, 100 );
            },
            mouseleave: function ( e ) {
                e.preventDefault();
                e.stopPropagation();
                $( e.currentTarget ).children( '.product_information_wrapper' ).dequeue().animate( {
                    bottom: '-105px',
                }, 100 );
            }
        } );
    }
    if ( $( '.catalog_list' ).exists() ) {
        $( '.catalog_list li' ).last().addClass( 'last_item' );
    }
    
    //  Botón de cierre de overlay
    if ( $( ".close" ).exists() ) {
        $( ".close" ).on( 'click', function ( e ) {
            
            e.preventDefault();
            e.stopPropagation();
            
            Soona.closeAlert();
        } );
    }
    
    if ( $( '#map_wrapper' ).exists() ) {
        
        Soona.makeMapForContact( 19.3518849, -99.1630739, $( '#map' ), '' );
    }
    
    //  Validación del formulario y recolección de los datos para su envio
    if ( $( '#contact_wrapper' ).exists() ) {
        
        $( '#contact_form_wrapper form' ).on( 'submit', function ( e ) {
            
            e.preventDefault();
            e.stopPropagation();
            
            var soonaName,soonaMail,soonaSubject,soonaMessage;
            
            soonaName       = ( typeof( $( 'form #contact_name' ).val() ) !== 'undefined' ) ? $.trim( $( 'form #contact_name' ).val() ) : "";
            soonaMail       = ( typeof( $( 'form #contact_mail' ).val() ) !== 'undefined' ) ? $.trim( $( 'form #contact_mail' ).val() ) : "";
            soonaSubject    = ( typeof( $( 'form #contact_subject' ).val() ) !== 'undefined' ) ? $.trim( $( 'form #contact_subject' ).val() ) : "";
            soonaMessage    = ( typeof( $( 'form #contact_message' ).val() ) !== 'undefined' ) ? $.trim( $( 'form #contact_message' ).val() ) : "";
            
            var contact             = {};
            contact.soona_name      = soonaName;
            contact.soona_mail      = soonaMail;
            contact.soona_subject   = soonaSubject;
            contact.soona_message   = soonaMessage;
            
            Soona.validateFormsAlter( contact );
        } );
    }
    
    if ( $( '#about_us_wrapper' ).exists() ) {
        
        $( '.about_us a' ).on( 'click', function ( e ) {
            
            e.preventDefault();
            e.stopPropagation();
            
            $( '.about_us_overlay' ).centerWidth();
            $( '.about_us_overlay' ).centerHeight();
            $( '.about_us_overlay' ).fadeIn( 300 );
        } );
        
        $( '.about_us_overlay .close' ).on( 'click', function ( e ) {
            
            e.preventDefault();
            e.stopPropagation();
            
            $( '.about_us_overlay' ).fadeOut( 300 );
        } );
    }
    
})( jQuery, window, document );