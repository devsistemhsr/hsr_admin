@echo off
color 0B
echo ====================================
echo = ACCESO RAPIDO A UN COMMIT DE GIT =
echo ====================================
git status
echo .
echo .
echo Estos son los cambios
echo .
echo .
set /p COMMIT=Descripcion del commit: 
git add -A
git commit -m "%COMMIT%"
echo COMMIT CREADO CON EXITO
echo .
pause
exit