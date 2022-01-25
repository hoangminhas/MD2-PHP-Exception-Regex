<?php

class DevideByZeroExcept extends Exception
{
    public function __toString()
    {
        return "Cannot devide by zero!";
    }

}