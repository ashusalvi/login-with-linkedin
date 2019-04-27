# login-with-linkedin
Implement login with linkedin(New vertion API)


1) Authenticating Members 
When requesting an authorization code in Step 2 of the OAuth 2.0 Guide, make sure to request the r_liteprofile and/or r_emailaddress scopes!
After successful authentication, you will acquire an access token that can be used in the next step of the sign-in process.

****************************************
2)Retrieving Member Profiles
With your newly acquired access token for the authenticated member, you can using the following API request to retrieve the member's profile information. 
//API -> 
GET https://api.linkedin.com/v2/me

******************************************
3)Retrieving Member Profile Picture
In order to retrieve the member's profile picture, you will need to use decoration. Use the API request below to retrieve the member's id, first name, last name, and profile picture.
//API ->
GET https://api.linkedin.com/v2/me?projection=(id,firstName,lastName,profilePicture(displayImage~:playableStreams))

*****************************************
4)Retrieving Member Email Address
In addition to the member's profile, you may be interested in retrieving the member's email address. The r_emailaddress permission scope allows usage of the following API:
///API->
GET https://api.linkedin.com/v2/emailAddress?q=members&projection=(elements*(handle~))

*****************************************
My directory Structure
login-with-linkedin-
    -index.php
    -init.php
    -callback.php
    -landing.php
    -logout.php
