@echo off
@echo Arguments that contain spaces spaces must me enclosed in "".

:promptowner
set /p Ow= Enter owner name (e.g. NPEU):

if [%Ow%]==[] goto checkowner

:promptname
set /p Nm= Enter new component name (e.g. Alerts, Data):

if [%Nm%]==[] goto checksingular

:promptsingular
set /p Sn= Enter new component singular name (e.g. Alert, Datum):

if [%Sn%]==[] goto checksingular

:promptdesc
set /p Ds= Enter new component description (e.g. "User alerts component"):

if [%Ds%]==[] goto checkdesc

php -f _build-new-bones/index.php owner=%Ow% name=%Nm% singular=%Sn% description=%Ds%

pause
goto :eof


:checkowner
@echo You must enter an owner name
pause
goto :promptowner

:checkname
@echo You must enter a name
pause
goto :promptname

:checksingular
@echo You must enter a singular name
pause
goto :promptsingular

:checkdesc
@echo You must enter a description
pause
goto :promptdesc

