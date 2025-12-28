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
    FILENAME=$(OLDPWD)
    else
        FILENAME="$1"
        fi

        # Resolve the absolute path of the file using realpath
        FULL_PATH="$(realpath "$FILENAME")"
        FILENAME_ONLY="${FULL_PATH##*/}"

        # Start with a friendly greeting using printf
#        printf "%s\n" "${CYAN}Hello, ${BOLD}$USER${RESET}"
#        printf "%s\n" "${CYAN}Some vars shown are ENV Vars and some set in this script. Please make note of them${RESET}"
#        sleep 2

        # Display the current directory
#        printf "%s\n" "${YELLOW}Current path is:${RESET} [echo ${PWD}]"
#        printf "%s\n" "${GREEN}${PWD}${RESET}"
#        sleep 2

        # Display the filename sent to transform.sh
 #       printf "%s\n" "${YELLOW}\$FILENAME as sent to transform.sh [here]${RESET}"
  #      sleep 1
   #     printf "%s\n" "${CYAN}\$FULL_PATH is created using \$FILENAME and \$(realpath _name_)${RESET}"
    #    sleep 2
     #   printf "%s\n" "${YELLOW}FULL_PATH=\"\$(realpath \"\$FILENAME\")\"${RESET}"
      #  printf "%s\n" "${GREEN}$FULL_PATH${RESET}"
       # sleep 2

        # Display the OLD path
        printf "%s\n"
        printf "%s\n" "${YELLOW}OLD pwd: ${RESET}${CYAN}${OLDPWD}${RESET}"
        sleep 1

        # Display the filename only
        printf "%s\n"

        printf "%s\n" "${CYAN}Object selected to transform.sh: ${RESET}${BOLD}${FILENAME_ONLY}${RESET}"
        sleep 3

        # Check if HOSTNAME is set in the SYSTEM ENV and valid. Uncomment next line to define HOSTNAME here instead. tweak with MYHostname
        HOSTNAME='transformative.click'
        # MYHOSTNAME='centrewebdesign.lan' #OR WHATEVER you want it to be here is where you can define
        # ADBPATH='anniedebrowsa' #eg the developer setup default

        if [ -z "$ADBPATH" ]; then
            ADBPATH='public'
        fi
        if [ -z "$HOSTNAME" ]; then
            # If HOSTNAME is not set, default to 'localhost' (the default MYHOSTNAME)
                HOSTNAME=$MYHOSTNAME

        HOSTNAME=${HOSTNAME}"/"${ADBPATH}
                    printf "%s\n" "${RED}No HOSTNAME set, using default: ${HOSTNAME}${RESET}"
                    else
                        printf "%s\n" "${CYAN}Using system HOSTNAME: ${HOSTNAME}${RESET}"
        fi

                        # Construct the URL and ensure it is properly formatted
                        URL="http://${HOSTNAME}/public/default.php?path2url=${FULL_PATH}"

                        # Open browser with the constructed URL
#                        printf "%s\n" "${YELLOW}Open browser (using xdg-open alias):${RESET}"
#                        printf "%s\n" "${CYAN}The PHP app AnnieDeBrowsa should be at path eg. /var/www/html/anniedebrowsa${RESET}"
#                        sleep 1
#                        printf "%s\n" "${YELLOW}Confirm your environment is correct at line 40 in transform.sh${RESET}"
#                        sleep 3

                        # Use xdg-open to open the URL in the default browser
                        printf "%s\n" "${BLUE}Click the URL now or wait for the explanation. %s\n  $URL {$RESET}"

                        # Show the variables used
#                        sleep 5
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
