<?php
    namespace Controllers;
    use FPDF\fpdf;
    use DAO\StudentPDO;
    use Models\PDF;
    use DAO\ApplicationPDO;
    use DateTime;

    class HomeController{
        public static function Index(){
            
            require_once(VIEWS_PATH."select-nav.php");
            require(VIEWS_PATH."home.php");

            //$apliPDO = new ApplicationPDO();
            //$data = $apliPDO->GetAllApplications();
            //var_dump($data);

            /*
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            //$fecha_actual = date("Y-m-d H:i");
            $fecha_actual = date("c");
            echo "<br> FECHA Y HORA DE AHORA -------> ".$fecha_actual;

            $culmination = "2021-11-26T11:11";
            echo "<br> FECHA DE CULIMINACION -------> ".$culmination;

            if($fecha_actual >= $culmination){

                echo "<br> Ya paso la culminacion";

            }else{

                
                echo "<br> Todavia falta para la culmination.";
            }
               

            
            
            if(str_contains($fecha_actual, $culmination)){

                echo "<br>contiene la fecha de la base de datos";
            }
            else{
                echo "<br>no con tiene la fecha de la base de datos";
            }

             */

            /*
            if($date == $culmination){
                echo "<br>iguales ";
            }
            else{
                echo "<br> distintos";
            }
            */

           // var_dump($date);

            /*
            $pdf = new PDF();

            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            $pdf->Cell(40,10,'¡Hola, Mundo!');
            $pdf->Output();
    
            // Creación del objeto de la clase heredada
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Times','',12);
            for($i=1;$i<=40;$i++)
                $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
            $pdf->Output();
            */

        
            /*
            $html = '

            <html>
            <head>
                <meta charset="UTF-8">
            </head>
            <body>
                <main>
                    <div>
                        <header>
                            <nav class="nav">
                                <h1> ¡Bienvenido/a! </h1>
                            </nav>
                        </header>        
                        <section class="presentacion">
                            <h3 class="titulo"> Biografia </h3>                            
                                <p class="biografia" id="biografia">
                                    Mi nombre es Alex Nahuel Echeverria, naci el 1 de marzo de 1998, vivo en la ciudad de
                                    Mar del Plata, Buenos Aires, Argentina.                      
                                </p>
                            <h3 class="titulo"> Formación Escolar </h3> 
                                <p>
                                    Finalice mis estudios primario y secundarios en el colegio Instituto Inmaculada 
                                    Concepción.
                                </p>
                            <h3 class="titulo"> Formación Universitaria </h3>
                                <p>
                                    En el año 2016 comence a estudiar Tecnicatura Superior en Programacion (TSP)
                                    en la Universidad Tecnologica Nacional (UTN) de Mar del Plata, actualmente, 
                                    2021, me faltan 3 materias para recibirme.
        
                                    Tambien realice un curso de redes en el año 2019. 
                                </p>     
                        </section>
                        <footer>
                            <div class="panel-redes-sociales">
                                <div class="red-social">
                                    <a class="link-red-social" href="https://www.facebook.com/AlexNahuelEcheverriaa/"> <img class="imagenes-redes-sociales" src="iconos/fb-logo.png"> <!--Alex Nahuel Echeverria --></a>
                                </div>
                            </div>
                        </footer>
                    </div>
                </main>
            </body>
            </html> ';
            */

            /*
            phpinfo();
            
            require_once(PDF_PATH."autoload.inc.php");
            //require_once 'dompdf/autoload.inc.php';
            
            $dompdf = new Dompdf();
            $options = $dompdf->getOptions();
            $options->set(array('isRemoteEnabled'=> true));
            $dompdf->setOptions($options);
            $dompdf->loadHtml("hola pdf");
            $dompdf->setPaper('A4', 'portrait');
            
            $dompdf->render();
            $dompdf->stream('archivo.pdf', array("Attachment"=> false));

            var_dump($dompdf);
            

            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(40,10,'¡Hola, Mundo!');
            $pdf->Output();

            */
            /*
            
            require_once('fpdf/fpdf.php');
            $pdf = new PDF();
            $pdf->AliasNbPages();
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(80,10,'¡Hola, Mundo!');
            $pdf->Cell(50,10,'1000');
            $pdf->Cell(50,10,'952');

            $pdf->Cell(80,10,'¡Globant!');
            $pdf->Cell(50,10,'99999');
            $pdf->Cell(50,10,'888888');

            $pdf->Cell(40,10,'¡Accenture!');
            $pdf->Cell(40,10,'¡Facebook!');
            $pdf->Cell(40,10,'¡Twitter!');
            $pdf->Cell(40,10,'¡TIK tok!');
            $pdf->Output();
            */




            /*
            $nombreCompleto = "Alex Nahuel Echeverria";
            $buscar = "x";

            if(str_contains($nombreCompleto, $buscar)){

                echo $nombreCompleto;
            }
            */



            //StudentPDO::getStudentApi();

            //$studentPDO = new StudentPDO();
            //$result = $studentPDO->SearchStudent("ddouthwaite0@goo.gl");

            //echo "el resultado es: <br><br>";
            //var_dump($result);

            /*
            $emailDestino = "aleex.naahuel@outlook.com";
            $titulo = "Mail enviado desde xampp con php";
            $mensaje = "dale que hay que aprobar metodologia y recibirse";
            $header= "Enviado desde la pagina de alexnahuelecheverria@gmail.com";

            //$email = mail($emailDestino, $titulo, $mensaje, $header); 
            //mail($emailDestino, $titulo, $mensaje, $header);

            echo "<script>alert('Email enviado correctamente.');</script>";
        
            
            //var_dump($email);

            if(mail($emailDestino, $titulo, $mensaje, $header)){

                echo "<br>Email enviado con exito";
            }
            else{
                echo "<br> No se pudo enviar email :(";
            }
            */
            





                /*
                $email = "aleex.naahuel@outlook.com";
                $total = "1000 pesos argentinos";
                $cantidadEntradas = "4 entradas";
                $tituloPelicula= "rapidos y furiosos";
                $Funcion = "funcion 4 PM";
                $directorio_qr = "QR";
   
                // Instantiation and passing `true` enables exceptions
                 $mail = new PHPMailer(true);
                 $fecha= time();
                 $fechaFormato = date("j/n/Y",$fecha);
         
                 try {
                     $mail->SMTPDebug = 0;                      // Enable verbose debug output
                     $mail->isSMTP();                                            // Send using SMTP
                     $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                     $mail->Username   = 'moviepassrsml@gmail.com';                     // SMTP username
                     $mail->Password   = 'Moviepass2020';                               // SMTP password
                     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                     $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
         
                      //Recipients
                      $MI_MAIL = "moviepassrsml@gmail.com";
                      $mail->setFrom($MI_MAIL, 'Movie Pass');
                      $mail->addAddress($email);     // Add a recipient
         
                     // Attachments
                   //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                   //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                   $mail->addEmbeddedImage( ROOT  .$directorio_qr , 'qrcode');    // Optional nameC:\wamp64\www\MoviePass\Views\img\qrs
         
         
                     $dia = $Funcion->getDia();
                     $hora = $Funcion->getHora();
                     $nombreCine = $Funcion->getClassCine()->getNombre();
                     $direccion = $Funcion->getClassCine()->getCalle() ." ". $Funcion->getClassCine()->getNumero();
                     // Content
                     $mail->isHTML(true);                                  // Set email format to HTML
                     $mail->Subject = 'Compra de entradas en Movie Pass'.$fechaFormato ;
                     $mail->Body    = 'Usted ha comprado '.$cantidadEntradas." entradas, con un total de: $".$total."<br> .Para ver la pelicula:".$tituloPelicula."<br>" 
                     ."La funcion de la pelicula es el dia: ".$dia." a las: ".$hora." horas<br>. Cine: ".$nombreCine ." (Direccion: ".$direccion.")".'<br><img src="cid:qrcode" />';
         
                     $mail->send();
                   
                 } catch (Exception $e) {
                     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                 }
                 */
            

        }
    }      
?>