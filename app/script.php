<?php

require_once __DIR__ . '/../vendor/autoload.php';


use Parse\ParseObject;
use Parse\ParseClient;

// Inicializar Parse SDK
Parse\ParseClient::initialize('hLArMOSXrZ9or9PebZPuEaX5Hfi7vZ7v1C4O3Dkd', 'N3bhD8NOothVvx2JFB9xpc1jaeCyjUdQSnj68dsh', '4UsTXfZxD4eisd0Q5OWU1EV18KmlTBri4NL4Y4X6');
ParseClient::setServerURL('https://parseapi.back4app.com/', '/');
ParseClient::setMasterKey('4UsTXfZxD4eisd0Q5OWU1EV18KmlTBri4NL4Y4X6');


// Crear un objeto de prueba en una clase de Parse
$testObject = ParseObject::create('TestObject');
$testObject->set('name', 'John Doe');
$testObject->set('age', 30);
$testObject->save();

echo 'El objeto se ha creado correctamente en Parse.';
