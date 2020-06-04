<?php
    error_reporting( E_ERROR );
    if(!session_id()) session_start();
    
    if( isset( $_POST['request'] ) ) {
        $function = $_POST['request'];
        echo $function();
    }

    /*  */
    function orderFormSend()
	{
		$result = 'manager: '.sendMailToManager( 'llc@lotusmove.com', $_POST['data'] );   
		return $result;
	}

    /* Отправить сообщение о заказе менеджеру */    
    function sendMailToManager( $email, $data )
    {
        $msg = "<div>"; //Начали тело письма
            $msg .= "<p>First Name: ".$data['name']."</p>";
            $msg .= "<p>Last Name: ".$data['lname']."</p>";
            $msg .= "<p>E-mail: ".$data['email']."</p>";
            $msg .= "<p>Phone Number: ".$data['phone']."</p>";
            $msg .= "<p>Date: ".$data['date']."</p>";
            
            $msg .= "<p>Size of move: ".$data['size_move']."</p>";
            $msg .= "<p>Type from: ".$data['from']."</p>";
            $msg .= "<p>Type to: ".$data['to']."</p>";
            $msg .= "<p>From: ".$data['from_sity']. ", " .$data['from_state']. "</p>";
            $msg .= "<p>To: ".$data['from_sity']. ", " .$data['from_state']. "</p>";
            $msg .= "<p>Comments: ".$data['comments']."</p>";
            $msg .= '</p>';
        $msg .= "</div>"; //Закончили письмо
        $head = "Content-type: text/html; charset=utf-8 \r\n"; //Тех. заголовки
        $head .= "From: lotus move\r"; //Тех. заголовки
        $subj = "Moving request";//Тема письма
        return mail( $email, $subj, $msg, $head );
	}