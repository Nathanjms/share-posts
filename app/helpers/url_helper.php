<?php

function redirect($redirectUrl)
{
    header('location: ' . URLROUTE . '/' . $redirectUrl);
}