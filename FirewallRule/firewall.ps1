####################################################################################
# Dedicated for users who can manage it by following provided instructions.
# Excluded from official support.
#
# 				International Gaming Center, copyright 2010-2013
# 							www.igc-network.com
# Script for automatic creation of Windows Firewall Rules for IGCN Server Needs
#															
#  Instruction - Follow carefully:
#-----------------------------------------------------------------------------------
# 	STEP 1:
#-----------------------------------------------------------------------------------
# 		
#		Configure below values for own. Ports are configured for default
#		configuration of IGCN Server, do not change unless you want to set own ones.
#
#-----------------------------------------------------------------------------------
# 	STEP 2: 
#-----------------------------------------------------------------------------------
#		Run PowerShell Console as Administrator and execute following command:
#
#			PS:		Set-ExecutionPolicy unrestricted
# 	
# 		Confirm it by pressing 'Y' and ENTER	
#-----------------------------------------------------------------------------------
#	STEP 3:
#-----------------------------------------------------------------------------------
#		Being in PowerShell console access location of the script then execute it
#		by typing:
#
#			PS:		./CreateFirewallRules.ps1 
#
#		Press Enter
#
#-----------------------------------------------------------------------------------
#	STEP 4:
#-----------------------------------------------------------------------------------
#		Execute following command in PowerShell (run as Administrator):
#
#			PS:		Set-ExecutionPolicy restricted
# 	
# 		Confirm it by pressing 'Y' and ENTER
####################################################################################

param (
# .TCP or .UDP is being added automatically to all rule names
#-----------------------------------------------------------------------------------
# Rule Name & Path to DataServer
#-----------------------------------------------------------------------------------
$DataServerRuleName				= "1. IGC.DataServer",
$PathToDataServer 				= "D:\1. DataServer\IGC.DataServer",
#-----------------------------------------------------------------------------------
# Rule Name & Data Server Ports (\DataServer\IGC.ini), no spaces
#-----------------------------------------------------------------------------------
$DataServerTCPPorts 			= "56960,56970,56906",
#-----------------------------------------------------------------------------------
# Rule Name & Path to ConnectServer
#-----------------------------------------------------------------------------------
$ConnectServerRuleName			= "2. IGC.ConnectServer",
$PathToConnectServer 			= "D:\2. ConnectServer\IGC.ConnectServer.exe",
#-----------------------------------------------------------------------------------
# Connect ServerTCP Port (\ConnectServer\IGCCS.ini), no spaces
#-----------------------------------------------------------------------------------
$ConnectServerTCPPorts 			= "33345",
#-----------------------------------------------------------------------------------
# Rule Name & Path to GameServer_N
#-----------------------------------------------------------------------------------
$GameServerNRuleName			= "3. IGC.GameServer_N",
$PathToGameServerN 				= "D:\3. GameServer_N\IGC.GameServer_N.exe",
#-----------------------------------------------------------------------------------
# Game Server TCP Port (\GameServer_N\GameServer.ini), no spaces
#-----------------------------------------------------------------------------------
$GameServerNTCPPort 			= "56900",
#-----------------------------------------------------------------------------------
# Rule Name & Path to GameServer_A
#-----------------------------------------------------------------------------------
$GameServerARuleName			= "4. IGC.GameServer_A",
$PathToGameServerA 				= "D:\4. GameServer_A\IGC.GameServer_A.exe",
#-----------------------------------------------------------------------------------
# Game Server TCP Port (\GameServer_A\GameServer.ini), no spaces
#-----------------------------------------------------------------------------------
$GameServerATCPPort 			= "56913",
#-----------------------------------------------------------------------------------
# Rule Name & Path to GameServer_CS
#-----------------------------------------------------------------------------------
$GameServerCSRuleName			= "5. IGC.GameServer_CS",
$PathTogameServerCS 			= "D:\5. GameServer_C\IGC.GameServer_CS.exe",
#-----------------------------------------------------------------------------------
# Game Server CS TCP Port (\GameServer_CS\GameServer.ini), no spaces
#-----------------------------------------------------------------------------------
$GameServerCSTCPPort 			= "56914",
#-----------------------------------------------------------------------------------
# Game Servers Auth Port, DO NOT CHANGE UNLESS YOU KNOW WHAT YOU DO, no spaces
#-----------------------------------------------------------------------------------
$GameServerAuthServerPort 		= "52852",
#-----------------------------------------------------------------------------------
# Connect Server Auth Port, DO NOT CHANGE UNLESS YOU KNOW WHAT YOU DO, no spaces
#-----------------------------------------------------------------------------------
$ConnectServerAuthServerPort 	= "52258",
#-----------------------------------------------------------------------------------
# UDP Port used by DataServer, ConnectServer and Game Server for internal Communication
# Configured in IGCCS.ini and GameServer.ini, no spaces
#-----------------------------------------------------------------------------------
$DSCSGSUDPPort 					= "55667",
#-----------------------------------------------------------------------------------
# Interface type, leave by default if do not need to change
#-----------------------------------------------------------------------------------
$InterfaceType 					= "any",
#-----------------------------------------------------------------------------------
# Private profile value, DO NOT CHANGE
#-----------------------------------------------------------------------------------
$profilePrivate 				= "private",
#-----------------------------------------------------------------------------------
# Public Profile value, DO NOT CHANGE
#-----------------------------------------------------------------------------------
$ProfilePublic 					= "public",
#-----------------------------------------------------------------------------------
#Private and Public Profiles together value, DO NOT CHANGE
#-----------------------------------------------------------------------------------
$ProfilePrivatePublic 			= "private,public",
#-----------------------------------------------------------------------------------
# Local IPs with access to SQL Port, no spaces, separate by comma
# Recommended to leave it ON, unless known what you do
#-----------------------------------------------------------------------------------
$CreateSQLProtectRule			= "1",
$SQLRuleName					= "0. IGC.SQLServer Protect",
$SQLLocalIPAccess 				= "127.0.0.1",
#-----------------------------------------------------------------------------------
# SQL Port, default 1433
#-----------------------------------------------------------------------------------
$SQLPort 						= "1433",
#-----------------------------------------------------------------------------------
# Remote IPs with access to SQL Port, no spaces, separate by comma
# To allow remote access from selected IPs first set $SQLLocalIPAccess to "any"
#-----------------------------------------------------------------------------------
$SQLRemoteIPAccess 				= "any",
#
####################################################################################
####################################################################################
#-----------------------------------------------------------------------------------
# If running more servers set their count below, maximum: 4, otherwise leave 0
#-----------------------------------------------------------------------------------
$AdditionalServersCount			= "0",
#
# Configure below sections corresponding to value set in 'AdditionalServersCount'
#-----------------------------------------------------------------------------------
# Rule Name & Path to Additional GameServer (6) & Port
#---------------------------------------------------------------------------------#1
$GameServer6RuleName			= "6. IGC.GameServer_6",
$PathToGameServer6 				= "X:\PATH_TO\6. GameServer_6\IGC.GameServer_6.exe",
$GameServer6TCPPort 			= "56901",
#-----------------------------------------------------------------------------------
# Rule Name & Path to Additional GameServer (7) & Port
#---------------------------------------------------------------------------------#2
$GameServer7RuleName			= "7. IGC.GameServer_7",
$PathToGameServer7 				= "X:\PATH_TO\7. GameServer_7\IGC.GameServer_7.exe",
$GameServer7TCPPort 			= "56902",
#-----------------------------------------------------------------------------------
# Rule Name & Path to Additional GameServer (8) & Port
#---------------------------------------------------------------------------------#3
$GameServer8RuleName			= "8. IGC.GameServer_8",
$PathToGameServer8 				= "X:\PATH_TO\8. GameServer_8\IGC.GameServer_8.exe",
$GameServer8TCPPort 			= "56903",
#-----------------------------------------------------------------------------------
# Rule Name & Path to Additional GameServer (9) & Port
#---------------------------------------------------------------------------------#4
$GameServer9RuleName			= "9. IGC.GameServer_9",
$PathToGameServer9 				= "X:\PATH_TO\9. GameServer_9\IGC.GameServer_9.exe",
$GameServer9TCPPort 			= "56904"
#-----------------------------------------------------------------------------------
) #DO NOT REMOVE

# -------------- DO NOT MODIFY BELOW THIS LINE UNLESS YOU KNOW WHAT YOU DO -------------- #
###########################################################################################

# Data Server TCP Rule
"`nCreating $DataServerRuleName TCP Rule"
netsh.exe advfirewall firewall add rule name="$DataServerRuleName.TCP" dir=in action=allow program="$PathToDataServer" protocol="TCP" localip="127.0.0.1" remoteip=any description="IGC.DataServer TCP Rule" localport="$DataServerTCPPorts"  profile="$profilePrivate" interfacetype="$InterfaceType"
#############################

# DataServer UDP Rule
"`nCreating $DataServerRuleName UDP Rule"
netsh.exe advfirewall firewall add rule name="$DataServerRuleName.UDP" dir=in action=allow program="$PathToDataServer" protocol="UDP" localip="127.0.0.1" remoteip=any description="IGC.DataServer UDP Rule" localport="$DSCSGSUDPPort"  profile="$profilePrivate" interfacetype="$InterfaceType"
#############################

# ConnectServer TCP Rule
"`nCreating $ConnectServerRuleName TCP Rule"
netsh.exe advfirewall firewall add rule name="$ConnectServerRuleName.TCP" dir=in action=allow program="$PathToConnectServer" protocol="TCP" localip=any remoteip=any description="IGC.ConnectServer TCP Rule" localport="$ConnectServerTCPPorts,$ConnectServerAuthServerPort"  profile="$ProfilePrivatePublic" interfacetype="$InterfaceType"
#############################

# ConnectServer UDP Rule
"`nCreating $ConnectServerRuleName UDP Rule"
netsh.exe advfirewall firewall add rule name="$ConnectServerRuleName.UDP" dir=in action=allow program="$PathToConnectServer" protocol="UDP" localip="127.0.0.1" remoteip=any description="IGC.ConnectServer UDP Rule" localport="$DSCSGSUDPPort"  profile="$profilePrivate" interfacetype="$InterfaceType"
#############################

# GameServer_N TCP Rule
"`nCreating $GameServerNRuleName TCP Rule"
netsh.exe advfirewall firewall add rule name="$GameServerNRuleName.TCP" dir=in action=allow program="$PathToGameServerN" protocol="TCP" localip=any remoteip=any description="IGC.GameServer N TCP Rule" localport="$GameServerNTCPPort,$GameServerAuthServerPort"  profile="$ProfilePrivatePublic" interfacetype="$InterfaceType"
#############################

# GameServer_N UDP Rule
"`nCreating $GameServerNRuleName UDP Rule"
netsh.exe advfirewall firewall add rule name="$GameServerNRuleName.UDP" dir=in action=allow program="$PathToGameServerN" protocol="UDP" localip=any remoteip="127.0.0.1" description="IGC.GameServer N UDP Rule" localport="$DSCSGSUDPPort"  profile="$profilePrivate" interfacetype="$InterfaceType"
#############################

# GameServer_A TCP Rule
"`nCreating $GameServerARuleName TCP Rule"
netsh.exe advfirewall firewall add rule name="$GameServerARuleName.TCP" dir=in action=allow program="$PathToGameServerA" protocol="TCP" localip=any remoteip=any description="IGC.GameServer A TCP Rule" localport="$GameServerATCPPort,$GameServerAuthServerPort"  profile="$ProfilePrivatePublic" interfacetype="$InterfaceType"
#############################

# GameServer_A UDP Rule
"`nCreating $GameServerARuleName UDP Rule"
netsh.exe advfirewall firewall add rule name="$GameServerARuleName.UDP" dir=in action=allow program="$PathToGameServerA" protocol="UDP" localip=any remoteip="127.0.0.1" description="IGC.GameServer A UDP Rule" localport="$DSCSGSUDPPort"  profile="$profilePrivate" interfacetype="$InterfaceType"
#############################

# GameServerCS TCP Rule
"`nCreating $GameServerCSRuleName TCP Rule"
netsh.exe advfirewall firewall add rule name="$GameServerCSRuleName.TCP" dir=in action=allow program="$PathTogameServerCS" protocol="TCP" localip=any remoteip=any description="IGC.GameServer CS TCP Rule" localport="$GameServerCSTCPPort,$GameServerAuthServerPort"  profile="$ProfilePrivatePublic" interfacetype="$InterfaceType"

#############################

# GameServerCS UDP Rule
"`nCreating $GameServerCSRuleName UDP Rule"
netsh.exe advfirewall firewall add rule name="$GameServerCSRuleName.UDP" dir=in action=allow program="$PathTogameServerCS" protocol="UDP" localip="127.0.0.1" remoteip=any description="IGC.GameServer CS UDP Rule" localport="$DSCSGSUDPPort"  profile="$profilePrivate" interfacetype="$InterfaceType"
############################

if ($CreateSQLProtectRule -eq "1")
{
    # SQL Port Rule
    "`nCreating $SQLRuleName Rule"
    netsh.exe advfirewall firewall add rule name="$SQLRuleName" dir=in action=allow protocol="TCP" localip="$SQLLocalIPAccess" remoteip="$SQLRemoteIPAccess" description="IGC.SQLServerPort Rule" localport="$SQLPort"  profile="$ProfilePrivatePublic" interfacetype="$InterfaceType"
}



if ($AdditionalServersCount -eq "1" -or $AdditionalServersCount -eq "2" -or $AdditionalServersCount -eq "3" -or $AdditionalServersCount -eq "4")
{
    # GameServer 6 TCP Rule
    "`nCreating $GameServer6RuleName TCP Rule"
    netsh.exe advfirewall firewall add rule name="$GameServer6RuleName.TCP" dir=in action=allow program="$PathToGameServer6" protocol="TCP" localip=any remoteip=any description="IGC.GameServer 6 TCP Rule" localport="$GameServer6TCPPort,$GameServerAuthServerPort"  profile="$ProfilePrivatePublic" interfacetype="$InterfaceType"
    #############################
    # GameServer 6 UDP Rule
    "`nCreating $GameServer6RuleName UDP Rule"
    netsh.exe advfirewall firewall add rule name="$GameServer6RuleName.UDP" dir=in action=allow program="$PathToGameServer6" protocol="UDP" localip=any remoteip="127.0.0.1" description="IGC.GameServer 6 UDP Rule" localport="$DSCSGSUDPPort"  profile="$profilePrivate" interfacetype="$InterfaceType"
    #############################
}


if ($AdditionalServersCount -eq "2" -or $AdditionalServersCount -eq "3" -or $AdditionalServersCount -eq "4")
{
    # GameServer 7 TCP Rule
    "`nCreating $GameServer7RuleName TCP Rule"
    netsh.exe advfirewall firewall add rule name="$GameServer7RuleName.TCP" dir=in action=allow program="$PathToGameServer7" protocol="TCP" localip=any remoteip=any description="IGC.GameServer 7 TCP Rule" localport="$GameServer7TCPPort,$GameServerAuthServerPort"  profile="$ProfilePrivatePublic" interfacetype="$InterfaceType"
    #############################
    # GameServer 7 UDP Rule
    "`nCreating $GameServer7RuleName UDP Rule"
    netsh.exe advfirewall firewall add rule name="$GameServer7RuleName.UDP" dir=in action=allow program="$PathToGameServer7" protocol="UDP" localip=any remoteip="127.0.0.1" description="IGC.GameServer 7 UDP Rule" localport="$DSCSGSUDPPort"  profile="$profilePrivate" interfacetype="$InterfaceType"
    #############################
}


if ($AdditionalServersCount -eq "3" -or $AdditionalServersCount -eq "4")
{
    # GameServer 8 TCP Rule
    "`nCreating $GameServer8RuleName TCP Rule"
    netsh.exe advfirewall firewall add rule name="$GameServer8RuleName.TCP" dir=in action=allow program="$PathToGameServer8" protocol="TCP" localip=any remoteip=any description="IGC.GameServer 8 TCP Rule" localport="$GameServer8TCPPort,$GameServerAuthServerPort"  profile="$ProfilePrivatePublic" interfacetype="$InterfaceType"
    #############################
    # GameServer 8 UDP Rule
    "`nCreating $GameServer8RuleName UDP Rule"
    netsh.exe advfirewall firewall add rule name="$GameServer8RuleName.UDP" dir=in action=allow program="$PathToGameServer8" protocol="UDP" localip=any remoteip="127.0.0.1" description="IGC.GameServer 8 UDP Rule" localport="$DSCSGSUDPPort"  profile="$profilePrivate" interfacetype="$InterfaceType"
    #############################
}


if ($AdditionalServersCount -eq "4")
{
    # GameServer 9 TCP Rule
    "`nCreating $GameServer9RuleName TCP Rule"
    netsh.exe advfirewall firewall add rule name="$GameServer9RuleName.TCP" dir=in action=allow program="$PathToGameServer9" protocol="TCP" localip=any remoteip=any description="IGC.GameServer 9 TCP Rule" localport="$GameServer9TCPPort,$GameServerAuthServerPort"  profile="$ProfilePrivatePublic" interfacetype="$InterfaceType"
    #############################
    # GameServer 9 UDP Rule
    "`nCreating $GameServer9RuleName UDP Rule"
    netsh.exe advfirewall firewall add rule name="$GameServer9RuleName.UDP" dir=in action=allow program="$PathToGameServer9" protocol="UDP" localip=any remoteip="127.0.0.1" description="IGC.GameServer 9 UDP Rule" localport="$DSCSGSUDPPort"  profile="$profilePrivate" interfacetype="$InterfaceType"
    #############################
}

"`nNOTE: Remember to execute 'Set-ExecutionPolicy restricted' once finished`n"

"`nExiting -> DONE"
exit