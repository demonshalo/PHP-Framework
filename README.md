# Ionian - The Micro-services REST framework for PHP 5.5+

Ionian is a framework that was born out of frustration with almost all current frameworks out there.

The idea behind Ionian is that micro-services are small by definition. Therefor, the last thing a framework needs to be
is a huge cluster of classes that no one understand how they work together.

At its core, Ionian is nothing more than a container that instantiates the right classes for the requested resource.
If needs be, the developer can extend and override ANY part of the framework to make it work in whatever way he/she deems fit.


## IMPORTANT NOTICE

For **POST** and **PUT** requests, the proper **Content-Type** header must be sent by the client in order for the framework to parse
the data correctly. Currently, the supported types are:

- application/x-www-form-urlencoded
- multipart/form-data
- application/json


## How everything works:

There is a simple project available that shows you how to setup your own project using this framework.
You can find it here: https://github.com/WesamMikhail/Ionian_Sample_Project


## TODO

- check how Response handles HTTPs in APP as well as ErrrorHandler
- show in samples how you can wrap your own router and use it with Ionian instead of using defined
- fix IDE method hinting on dynamically loaded classes without @var set
- add methods in Core\Controller for $this->response using __get() magic