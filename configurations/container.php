<?php

use RobertWesner\SimpleMvcPhp\Configuration;
use RobertWesner\SimpleMvcPhp\Handler\PrintThrowableHandler;
use RobertWesner\SimpleMvcPhp\Handler\ThrowableHandlerInterface;

Configuration::CONTAINER
    ::instantiate(ThrowableHandlerInterface::class, PrintThrowableHandler::class);
