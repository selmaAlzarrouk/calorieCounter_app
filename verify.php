<?php
// function to sanitise (clean) user data:
function sanitise($str, $connection)
{
    // escape any dangerous characters, e.g. quotes:
    $str = mysqli_real_escape_string($connection, $str);
    // ensure any html code is safe by converting reserved characters to entities:
    $str = htmlentities($str);
    // return the cleaned string:
    return $str;
}

// if the data is valid return an empty string, if the data is invalid return a help message
function validateString($field, $minlength, $maxlength)
{
    if (strlen($field)<$minlength)
    {
        // wasn't a valid length, return a help message:
        return "Minimum length: " . $minlength;
    }
    elseif (strlen($field)>$maxlength)
    {
        // wasn't a valid length, return a help message:
        return "Maximum length: " . $maxlength;
    }
    // data was valid, return an empty string:
    return "";
}



function validateImage($imageFileType){


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {

    return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
return "";
}

// if the data is valid return an empty string, if the data is invalid return a help message
function validateInt($field, $min, $max)
{
    // see PHP manual for more info on the options: http://php.net/manual/en/function.filter-var.php
    $options = array("options" => array("min_range"=>$min,"max_range"=>$max));

    if (!filter_var($field, FILTER_VALIDATE_INT, $options))
    {
        // wasn't a valid integer, return a help message:
        return "Not a valid number (must be whole and in the range: " . $min . " to " . $max . ")";
    }
    // data was valid, return an empty string:
    return "";
}

function validateEmail($field)
{
    // Remove all illegal characters from email
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);

    // Check to see if the email address conforms to the expected format
    if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
                // data was valid, return an empty string:
                return "";
    }

    else {
        return "Email address is not valid ";
    }

}

?>