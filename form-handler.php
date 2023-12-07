<?php



require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function sendingEmail($fullname, $emailaddress, $newphonenumber, $geturl, $current_year)
{
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        // $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtpout.secureserver.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'register@psi.properties';
        $mail->Password = 'register@ps#567$$';
        $mail->SMTPSecure = 'ssl'; // or 'tls'
        $mail->Port = 465; // or 587

        // HTML content
        $body = '
        <div>
        <br class="">

        <div class="">
            <div class="">
                <table align="center" cellpadding="0" cellspacing="0" width="550">
                    <tbody class="">
                        <tr class="">
                            <td class="">
                                <table align="center" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody class="">
                                        <tr class="">
                                            <td align="center" bgcolor="#FFFFFF" class="" height="80" style="text-align: center;" width="550">
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <td class="" height="20">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table align="center" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody class="">
                                        <tr class="">
                                            <td bgcolor="#02344A" class="" colspan="3" height="10">&nbsp;</td>
                                        </tr>

                                        <tr class="">
                                            <td class="" style="color: #fdfdfd; font-size: 16px; background: #02344a;" width="10">&nbsp;</td>

                                            <td class="" height="30" style="color: #fff; font-size: 16px; background: #02344a; font-weight: bold; font-family: Arial, Helvetica, sans-serif;"> Nad Al Shiba Gardens - Registration</td>

                                            <td class="" style="color: #ffffff; font-size: 16px; background: #02344a;" width="10">&nbsp;</td>
                                        </tr>

                                        <tr class="">
                                            <td bgcolor="#02344A" class="" colspan="3" height="10">&nbsp;</td>
                                        </tr>

                                        <tr class="">
                                            <td class="" height="20">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table align="center" cellpadding="5" cellspacing="3" style="border: 1px solid #e8e6e6;" width="100%">
                                    <tbody class="">
                                        <tr class="">
                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">Name:</td>

                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">'.$fullname.'</td>
                                        </tr>

                                        <tr class="">
                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">Email:</td>

                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">'.$emailaddress.'</td>
                                        </tr>

                                        <tr class="">
                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">Phone:</td>

                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">'.$newphonenumber.'</td>
                                        </tr>

                                        <tr class="">
                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">URL coming from:</td>

                                            <td class="" style="background-color: #f4f3f3; color: #8b8b8b; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold;">'.$geturl.'</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table>
                                    <tbody class="">
                                        <tr class="">
                                            <td class="" height="10" style="line-height: 9px;">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <table align="center" cellpadding="0" cellspacing="0" width="550">
                                    <tbody class="">
                                        <tr class="">
                                            <td align="center" class="" headers="20" style="background: #02344a; color: #fff; font-size: 11px; line-height: 9px; font-family: Arial,Helvetica, sans-serif;">Copyright &copy; '.$current_year.' | All
                                            Rights Reserved | Property Shop Investment</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <p>&nbsp;</p>';

        if (!empty($body)) {
            $mail->msgHTML($body);

            // Email content
            $mail->setFrom('register@psi.properties');
            $mail->addAddress('amer@psidubai.com','');
            $mail->addAddress('callcenter@psidubai.com','');


            $mail->Subject = 'Nad Al Shiba Gardens - Registration';
            $mail->Body = $body;

            // Send the email
            $mail->send();
            return 'sent';
        } else {
            return 'not sent';
        }
    } catch (Exception $e) {
        return 'Email could not be sent. Error: ' . $mail->ErrorInfo;
    }
}


if (isset($_POST['firstname'])){

$FirstName = $_POST['firstname'];
$lastname = $_POST['lastname'];	    
$emailaddress = $_POST['Emailaddress'];
$fullname = $FirstName . " " . $lastname;
$MobilePhone = $_POST['Phonenumber'];
$refNo = '1234567';
$geturl = $_POST['url'];
$countrycode = $_POST['countrycode'];
$newphonenumber = "(" . $countrycode . ")" . $MobilePhone;

$getsource = parse_url($geturl, PHP_URL_QUERY);
parse_str($getsource, $output);

$source = strtolower($output['utm_source']);
if (empty($source)) {
    $source = 'direct';
}

$mediatype = "";
$medianame = "";
$remarks = "Client Name: " . $fullname . "
	Client Email: " . $emailaddress . "
	Client Phone: " . $newphonenumber . "
	URL coming from: " . $geturl;
$remarks = urlencode($remarks);
// $remarks = 'testing';


$ip_address = $_SERVER['REMOTE_ADDR'];
$date_of_submit = date("Y-m-d h:i:sa");
$date_of_submit_month = date("Y-m-d H:i:s");
$current_year = date("Y");

parse_url($geturl, PHP_URL_HOST);
$args = array(
    'phone' => $newphonenumber,
    'email' => $emailaddress,	
    'name' => $fullname,
    'url' => $geturl,
    'utm_source' => $source,
    'website' => str_replace('https://', '', $_SERVER['HTTP_HOST'])
);


switch ($source) {
	case 'newsletter':
		$mediatype = 166277;
		$medianame = 166071;
		break;
	case 'sms':
		$mediatype = 129474;
		$medianame = 129200;
	   break;
   case 'google':
		$mediatype = 167218;
		$medianame = 128727;
	   break;
   case 'google_adwords_banner':
   case 'google_adwords':
   case 'google_adword':
   case 'google_ads':
		$mediatype = 167218;
		$medianame = 128455;
	   break;
   case 'snapchat':
		$mediatype = 165269;
		$medianame = 166858;
	   break;
   case 'facebook':
		$mediatype = 165269;
		$medianame = 131010;
	   break;
   case 'blog':
		$mediatype = 167313;
		$medianame = 167314;
	   break;
   case 'instagram':
		$mediatype = 165269;
		$medianame = 166728;
	   break;
   case 'linkedin':
		$mediatype = 165269;
		$medianame = 165070;
	   break;
   case 'whatsapp':
		$mediatype = 165269;
		$medianame = 166453;
	   break;
   case 'youtube':
	   $mediatype = 165269;
	   $medianame = 166053;
	   break;
	default:
		$mediatype = 129475;
		$medianame = 165233;
		break;
}


 
// echo $response;
$curl = curl_init();
// Set the URL with variables
$url = 'https://api.portal.dubai-crm.com/leads/query/create?TitleID=129929&FirstName='.$FirstName.'&FamilyName='.$lastname.'&MobileCountryCode=&MobileAreaCode=0&MobilePhone='.$newphonenumber.'&TelephoneCountryCode=na&TelephoneAreaCode=na&Telephone=na&Email='.$emailaddress.'&NationalityID=65946&Remarks=&RequirementType=91212&ContactType=3&CountryID=65946&StateID=91578&CityID=91578&DistrictID=&CommunityID=&SubCommunityID&PropertyID=20380&UnitType=20&PropertyCampaignId=&LanguageID=115915&MethodOfContact=115747&MediaType='.$mediatype.'&MediaName='.$medianame.'&Bedroom=&Bathroom=&Budget=&Budget2=&RequirementCountryID=65946&ReferredToID=4421&ReferredByID=4421&IsBulkUpload=false&ActivityAssignedTo=4421&ActivityDate=&ActivityTypeId=167234&ActivitySubject=Email%20Inquiry%20Copy&ActivityRemarks='.$remarks.'&Phone=&APIKey=d301dba69732065cd006f90c6056b279fe05d9671beb6d29f2d9deb0206888c38239a3257ccdf4d0';

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
if (curl_errno($curl)) {
    $response = curl_error($curl);
}

curl_close($curl);

 
$data = json_decode($response, true); // convert JSON string to associative array
$status = $data['status']; // get the value of the 'status' key
 

if ($status == 'Success'){

	
			$emailResult = 'not sent';

			$emailResult = sendingEmail($fullname, $emailaddress, $newphonenumber, $geturl,$current_year);
			$data["result"] = $emailResult;
			echo json_encode($data);

}

	 
}
?>
