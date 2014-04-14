<?php
//require_once LIBS_PATH.'filter.input.php';
//require_once LIBS_PATH.'mailer.php';
//require_once LIBS_PATH.'ParserTemplate.php';

class Review extends Model {
    
    private $_PDOConn = null;
    
    public function __construct( $conn, $db_table )  {
        $this->_tableName = $db_table;
        $this->_primaryKey = '';
        $this->setMysqlConn( $conn );
        $this->_PDOConn = $conn;
    }
    public function sendContact ( $info, $template, $subject, $correo, $cc = array() ) {
        
        //  Validación de los datos
        $parameters = array(
            'soona_name' => array(
                'requerido' => 1, 'validador' => 'esAlfaNumerico', 'mensaje' => utf8_encode( 'El nombre es obligatorio.' ) ),
            'soona_mail' => array( 
                'requerido' => 1, 'validador' => 'esEmail', 'mensaje' => utf8_encode( 'El mail es obligatoria.' ) ),
            'soona_subject' => array(
                'requerido' => 1, 'validador' => 'esAlfaNumerico', 'mensaje' => utf8_encode( 'El asunto es obligatoria.' ) ),
            'soona_message' => array(
                'requerido' => 1, 'validador' => 'esAlfaNumerico', 'mensaje' => utf8_encode( 'El mensaje es obligatorio.' ) ),
        );
        
        $form = new Validator( $info, $parameters );
        
        // Si el formulario no es válido
        if ( !$form->validate() ) {
            
            $response = array( 
                'success' => 'false',
                'message'=> $form->getMessage() 
            );
        } else {
            
            try {
                
                $emails = explode( ',' , $correo );
                $to     = array();
                
                foreach ($emails as $email) {
                        
                        $params = array(
                            'mail' => array(
                                'requerido' => 1 ,'validador' => 'esEmail', 'mensaje' => utf8_encode( 'El correo no es v&aacute;lido.' ) )
                        );
                        
                        $destinatario = array(
                            'name' => $email,
                            'mail' => $email
                        );
                        
                        $form   = new Validator( $destinatario, $params );
                        if ( ( $form->validate() ) === false ) {
                            
                            throw new Exception('El correo ' . $email . ' no es v&aacute;lido.');
                        }
                        $to[] = $destinatario;
                    }
                
                $vars = array(
                        'name'      => $info[ 'soona_name' ],
                        'mail'      => $info[ 'soona_mail' ],
                        'subject'   => $info[ 'soona_subject' ],
                        'message'   => $info[ 'soona_message' ]
                    );
                $tpl = ParserTemplate::parseTemplate( $template, $vars );
                
                $_cc    = $cc;
                
                if ( Mailer::sendMail( $subject, $tpl, $to , '' , $_cc ) ) {
                    
                    $response       = array (
                        'success' => 'true',
                        'message' => utf8_encode( 'Muchas gracias por ponerse en contacto con nosotros.' )
                    );
                } else {
                    
                    $response = array (
                        'success'=>'false',
                        'message'=>utf8_encode( 'El servicio de correo no esta disponible' )
                    );
                }
            } catch ( phpmailerException $e ) {
                
                $this->_PDOConn->rollBack();
                $response   = array ( 'success'=>'false', 'msg'=>'el servicio de correo no esta disponible' );
            }
        }
        return $response;
    }
}
