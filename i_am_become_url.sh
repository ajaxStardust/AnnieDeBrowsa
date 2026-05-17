#!/bin/sh
# transformurl.sh
# Sends development server path to the browser address
# Loads as a new URL
clear
# Set up color codes
BOLD=$(tput bold)
RESET=$(tput sgr0)
YELLOW=$(tput setaf 3)
GREEN=$(tput setaf 2)
RED=$(tput setaf 1)
CYAN=$(tput setaf 6)

# Check if a filename argument is provided
if [ $# -eq 0 ]; then
    FILENAME=$OLDPWD
else
    FILENAME="$1"
fi

# Resolve the absolute path of the file using realpath
FULL_PATH="$(realpath "$FILENAME")"
FILENAME_ONLY="${FULL_PATH##*/}"

printf "%s\n"
printf "%s\n" "${YELLOW}OLDPWD: ${RESET}${CYAN}${OLDPWD}${RESET}"
printf "%s\n"
sleep 2

        # Check if HOSTNAME is set in the SYSTEM ENV and valid. Uncomment next line to define HOSTNAME here instead. tweak with MYHostname
        # HOSTNAME='localhost.localdomain'
        MYHOSTNAME='transformative.click' #OR WHATEVER you want it to be here is where you can define
        # ADBPATH='anniedebrowsa' #eg the developer setup default

if [ -z "$ADBPATH" ]; then
    ADBPATH='public'
fi
if [ "$MYHOSTNAME" ]; then
    # If HOSTNAME is not set, default to 'localhost' (the default MYHOSTNAME)
    HOSTNAME=$MYHOSTNAME
fi
HOSTNAME=${HOSTNAME}
printf "%s\n"
printf "%s\n" "${CYAN}Trying to serve ${BOLD}${FILENAME_ONLY}${BOLD} on ${GREEN}${BOLD}${HOSTNAME}${RESET}."
        if [ -z "$ADBPATH" ]; then
            ADBPATH='public'
        fi
        if [ "$MYHOSTNAME" ]; then
            # If HOSTNAME is not set, default to 'localhost' (the default MYHOSTNAME)
                HOSTNAME=$MYHOSTNAME
        fi
        HOSTNAME=${HOSTNAME}
        printf "%s\n"
        printf "%s\n" "${CYAN}Sending ${BLUE}${RED}${FILENAME_ONLY}${RESET} to ${GREEN}${BOLD}${HOSTNAME}${RESET}."

sleep 3
# Construct the URL and ensure it is properly formatted
URL="http://${HOSTNAME}/${ADBPATH}/default.php?path2url=${FULL_PATH}"

# Use xdg-open to open the URL in the default browser
# Open browser with the constructed URL
#  printf "%s\n" "${YELLOW}Open browser (using xdg-open alias):${RESET}"
#  printf "%s\n" "${CYAN}The PHP app AnnieDeBrowsa should be at path eg. /var/www/html/anniedebrowsa${RESET}"
#  printf "%s\n" "${YELLOW}Confirm your environment is correct at line 40 in transform.sh${RESET}"
#  eval $(xdg-open $URL)
#  sleep 3

# REMINDER WHERE TO EDIT FILE
printf "%s\n${WHITE}View Line 30 of ${RED}${BOLD} i_am_become_url.sh${RESET}"
sleep 2
printf "%s\n"
printf "%s\n" "${CYAN}Variables used include:${RESET}"
printf "%s\n"
printf "%s\n" "${YELLOW}PWD:${RESET} ${GREEN}$PWD${RESET}"
printf "%s\n"
printf "%s\n" "${YELLOW}OLDPWD:${RESET} ${CYAN}$OLDPWD${RESET}"
printf "%s\n"
printf "%s\n" "${YELLOW}FULL_PATH:${RESET} ${CYAN}$FULL_PATH${RESET}"
sleep 1
printf "%s\n"
printf "%s\n" "${YELLOW}FILENAME_ONLY:${RESET} ${CYAN}$FILENAME_ONLY${RESET}"
sleep 1
printf "%s\n"
printf "%s\n" "${YELLOW}HOSTNAME:${RESET} ${CYAN}$HOSTNAME${RESET}"
printf "%s\n"
# Show the final clickable URL
printf "%s\n" "${CYAN}Click URL:${RESET}"
sleep 1
printf "%s\n" "${GREEN}$URL${RESET}"

# Exit the script
sleep 5
exit
