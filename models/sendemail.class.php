<?php

/**
*
*/
class Sendmailweb extends PHPMailer
{

	public function sendMail($htmlMail,$mails,$subject)
	{

		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth=true;
		$mail->SMTPSecure=MAIL_SECURE;
		//$mail->SMTPDebug=1;
		$mail->Host=MAIL_HOST;
	//	echo 'HOST:'.MAIL_HOST;
		$mail->Port=MAIL_PORT;
		$mail->Username=MAIL_USER;
		$mail->Password=MAIL_USER_PASS;
	    $mail->From=MAIL_USER;
		$mail->FromName=MAIL_USER_NAME;
		$mail->Subject=$subject;
		$mail->AltBody=MAIL_ALTBODY;
		//$mail->AddAttachment($file['file_tmp_name'],$file['file_name']);
		$mail->CharSet="UTF-8";
		$mail->MsgHTML($htmlMail);


		$cantMail1 = count($mails['AddAddress']);
		$cantMail2 = count($mails['AddCC']);
		$cantMail3 = count($mails['AddBCC']);

		if($cantMail1>0){
			for($i=0;$i<$cantMail1;$i++){
				$mail->AddAddress($mails['AddAddress'][$i],$mails['AddAddress'][$i]);
			}
		}

		if($cantMail2>0){
			for($f=0;$f<$cantMail2;$f++){
				$mail->AddCC($mails['AddCC'][$f],$mails['AddCC'][$f]);
			}
		}

		if($cantMail3>0){
			for($g=0;$g<$cantMail3;$g++){
				$mail->AddBCC($mails['AddBCC'][$g],$mails['AddBCC'][$g]);
			}
		}

		$mail->IsHTML(true);
		$mailSended = $mail->Send();

		return $mailSended;
	}


	/***** MAILING EJEMPLO ********/
	public function htmlMailContacto($data)
	{

		$proyecto= $data[0];
		$nombres = $data[1];
		$apellidos = $data[2];
		$celular = $data[3];
		$correo = $data[4];
		$distrito = $data[5];
		$comentario = $data[6];
		$checky = $data[7];
	//	echo 'CHECKBOX->'.$checky;

	//	echo $nombre.'//'.$mensaje;

		$htmlMail = '
			<!DOCTYPE html>
			<html>
			<head>
				<meta charset="UTF-8">
			</head>
			<body style="background: #ccc;">
				<center>
				    <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="hdc_ac">
				        <tbody>
				        	<tr>
				                <td align="center" valign="top" id="hdc_ac">
				                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif;">
										<tbody>
											<tr>
												<td align="center" bgcolor="#eb2929" valign="top" id="" style="background-color:#d82221;padding-right:30px;padding-left:30px">
													<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:400px" class="">
														<tbody>
			                                                <tr>
			                                                    <td align="center" valign="top" id="" style="padding-top:40px;padding-bottom:40px;color:#fff;font-size:22px;">
			                                                        <h3>CLIENTE QUIERE CONTACTARSE</h3>
			                                                    </td>
														     </tr>
													      </tbody>
			                                        </table>
												</td>
				                        	</tr>
											<tr>
												<td align="center" bgcolor="#eb2929" valign="top" id="" style="background-color:#d82221;padding-right:30px;padding-left:30px">
													<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
														<tbody>
															<tr>
																<td align="center" valign="top">
																	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:720px" class="">
																		<tbody>
																			<tr>
																				<td align="center" valign="top">
																					<table align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="100%" id="" style="background-color:#ffffff;border-collapse:separate;border-top-left-radius:4px;border-top-right-radius:4px">
																						<tbody>
																							<tr>
																								<td align="center" valign="top" width="100%" style="padding-top:40px;padding-bottom:0">&nbsp;</td>
																							</tr>
																						</tbody>
																					</table>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
				                        	</tr>
											<tr>
												<td align="center" valign="top" id="">
													<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
														<tbody>
															<tr>
															<td align="center" valign="top">

																<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:720px;background:#fff;" class="">
																	<tbody>
																		<tr>
																			<td valign="top" width="100%" style="padding-right:70px;padding-left:40px" id="">
																				<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
																					<tbody>
																						<tr>
																							<td align="left" valign="top" id="" style="padding-bottom:40px">
																								<ul>
																									<li style="width: 100%;padding:10px;background:#eee;margin-top:5px;"><div style="width:120px;float:left;"><b>Proyecto:</b></div>'.$proyecto.'</li>
																									<li style="width: 100%;padding:10px;background:#eee;margin-top:5px;"><div style="width:120px;float:left;"><b>Nombre:</b></div>'.$nombres.'.'.$apellidos.'</li>
																									<li style="width: 100%;padding:10px;background:#eee;margin-top:5px;"><div style="width:120px;float:left;"><b>Celular:</b></div>'.$celular.'</li>
																									<li style="width: 100%;padding:10px;background:#eee;margin-top:5px;"><div style="width:120px;float:left;"><b>Correo:</b></div>'.$correo.'</li>
																									<li style="width: 100%;padding:10px;background:#eee;margin-top:5px;"><div style="width:120px;float:left;"><b>Distrito:</b></div>'.$distrito.'</li>
																									<li style="width: 100%;padding:10px;background:#eee;margin-top:5px;"><div style="width:120px;float:left;"><b>Comentario:</b></div>'.$Comentario.'</li>
																									<li style="width: 100%;padding:10px;background:#eee;margin-top:5px;"><div style="width:120px;float:left;"><b>Acepto Términos y Condiciones:</b></div>SI</li>
																								</ul>
																							</td>
																						</tr>
																					</tbody>
																				</table>
																			</td>
																		</tr>
																	</tbody>
																</table>

															</td>
														</tr>
													</tbody></table>
												</td>
				                        	</tr>
				                    	</tbody>
				                    </table>
				                </td>
				        	</tr>
				    	</tbody>
				    </table>
				</center>
			</body>
			</html>

		';

		return $htmlMail;
	}
	/******************************/

}

 ?>
