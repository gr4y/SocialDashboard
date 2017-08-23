@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../mf2/mf2/bin/parse-mf2
php "%BIN_TARGET%" %*
