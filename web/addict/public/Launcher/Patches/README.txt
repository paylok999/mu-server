In this folder you put all the patches you want your players to get
If you want to update your player's client with new patch, first you need to generate new "cVersion" file using LauncherTools, with bigger version then latest listed in "version.wvd" file which exists in "version.zip" file
Then, create folder with the same version which you used in the "cVersion" file you just created.
Take the patch files, and put them in Zip and name it as "up_list"
Take the cVersion file which you generated, and put it in the "up_list.zip" in the folder Data ("up_list.zip\Data\cVersion")
Then put this "up_list.zip" in the folder we just created for the latest version
Last stage is to open the file "version.wvd" which you can find in "version.zip" and add new line and write the version we used in "cVersion", with qoutes ("1.00.01")
