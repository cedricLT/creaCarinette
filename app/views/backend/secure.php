<?php
function isConnect()
{
    if (!isset($_SESSION ['firstname'])) throw new Exception('vous n etes pas administrateur');

}