<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticaão</title>
</head>
<body class="is-unlogged powerzap_body_overflow">

    <h1>Hi there!</h1>

    <p>
      I'm your cool new webpage. Made with
      <a href="https://glitch.com">Glitch</a>!
    </p>

    <button class="login-btn" onclick="login1()">
      login user 1
    </button>

    <button class="logout-btn" onclick="logout()">
      logout
    </button>

    <button class="login-btn" onclick="login2()">
      login user 2
    </button>

    <h1>user: <b id="user">Not Logged</b></h1>
    <script src="https://js.beta.huggy.chat/widget.min.js"></script>
<!-- Init code Huggy.chat
scretKEY: 7f6933f3da43a422b7ba0c45e6f60fbc
<script>
var $_Huggy = 
{ 
  defaultCountry: '+55', 
uuid: '94e97551-b2e9-4254-829d-14278a49b7b0' , 
company: '10755' 
}; 
(function(i,s,o,g,r,a,m){ i[r]={context:{id:'e440337fe701f0beb447eae849bc8e9c'}};a=o;o=s.createElement(o); o.async=1;o.src=g;m=s.getElementsByTagName(a)[0];m.parentNode.insertBefore(o,m); })(window,document,'script','https://js.huggy.chat/widget.min.js','pwz');</script>End code Huggy.chat  //-->
 
<?php

function generateUserHash($userIdentifier, $huggyChatSecretKey) {
    // Create token header as a JSON string
    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
    // Create token payload as a JSON string
    $payload = json_encode(['jti' => $userIdentifier]);
    // Encode Header to Base64Url String
    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    // Encode Payload to Base64Url String
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
    // Create Signature Hash
    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $huggyChatSecretKey, true);
    // Encode Signature to Base64Url String
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
    // Create JWT
    $jwtToken = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    return $jwtToken;
}
//email of logged-in customers
$userIdentifier1 = 'susi2@company.com'; 
$userIdentifier2 ='lucas2@company.com';
$huggyChatSecretKey = 'YourSecretKey';
$userHash1 = generateUserHash($userIdentifier1, $huggyChatSecretKey);
$userHash2 = generateUserHash($userIdentifier2, $huggyChatSecretKey);


?>
       <script>

    userHash1 = "<?=$userHash1?>";   
    userHash2 = "<?=$userHash2?>";      
    userIdentifier1 = "<?=$userIdentifier1?>"; 
    userIdentifier2 = "<?=$userIdentifier2?>"; 

    function login1() {
      document.getElementById("user").innerHTML=userIdentifier1;
            window.huggyData = {
                userHash: userHash1,
                userIdentifier: userIdentifier1
            }
          Huggy.init({
              defaultCountry: "+55",
              uuid: "YourUUID",
              company: "YourCompanyID",
              contextID: 'YourContextID',
             
        })
            setTimeout(() => {
              console.log("userHash1 "+ userHash1)
        }, 1000);
      }

      

      function login2() {
        document.getElementById("user").innerHTML=userIdentifier2;
        window.huggyData = {
          userHash: userHash2,
          userIdentifier: userIdentifier2
        }
        Huggy.init({
              defaultCountry: "+55",
              uuid: "YourUUID",
              company: "YourCompanyID",
              contextID: 'YourContextID',
             
        })
        setTimeout(() => {
          console.log("userHash2 "+ userHash2)
        }, 1000);
      }
    

      function logout() {
        document.getElementById("user").innerHTML='not logged'
        Huggy.logout(false)
      }
    
    </script>

</body>
</html>
      
      
      
      
      
      
      