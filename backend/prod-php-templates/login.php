<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
            //Ok we got a POST, probably from a FORM, read from $_POST.
          //$creds = var_dump($_POST); //Use this to see what info we got!
          if( $_POST["<username field name>"] || $_POST["<password field name>"] )
          {
                  $s = $_POST["<username field name>"].$_POST["<password field name>"];
                  echo " $s ";
                  // Process info here
          }
    }
    else
    {
       //You could assume you got a GET
       //var_dump($_GET); //Use this to see what info we got!
    }