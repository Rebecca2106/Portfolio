

            <?php
    
                $webmaster_email = "DEINE MAILADRESSE";

                $name = $_REQUEST['client_name'] ;
                $email_address = $_REQUEST['client_email'] ;
                $subject = $_REQUEST['subject'] ;
                $message = $_REQUEST['client_message'] ;
                $msg =  "Name: " . $name . "\r\n" . 
                        "Email: " . $email_address . "\r\n" . 
                        "Subject: " . $subject . "\r\n" . 
                        "Message: " . $message ;

                function isInjected($str) {
                    $injections = array('(\n+)',
                    '(\r+)',
                    '(\t+)',
                    '(%0A+)',
                    '(%0D+)',
                    '(%08+)',
                    '(%09+)'
                    );
                    $inject = join('|', $injections);
                    $inject = "/$inject/i";
                    if(preg_match($inject,$str)) {
                        return true;
                    }
                    else {
                        return false;
                    }
                }
                if (empty($name) || empty($email_address)) {
                    ?>
                        <h1>Oops!</h1>
                        <p>Please ensure you have completed all fields before submitting the form. </p>
                    <?php
                }
                elseif ( isInjected($email_address) || isInjected($name)  || isInjected($message) ) {
                    ?>
                        <h1>Oops!</h1>
                        <p>Please ensure you have completed all fields before submitting the form. </p>
                        <p>Also ensure that there is only one valid email address.</p>
                    <?php
                }
                else {
                    mail( "$webmaster_email", "Message from Portfolio contact form", $msg );
                    ?>
                        <h1>Thanks for Contacting me!</h1>
                        I appreciate that you took the time to send me a message. <br>
                        I am getting back to you as soon as possible.
                    <?php
                }
            ?>