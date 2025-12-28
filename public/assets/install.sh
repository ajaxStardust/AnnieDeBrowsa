#!/usr/bin/env bash
# Fancy screen rendering courtesy of CalculonGPT

# ANSI Color Codes
RED='\033[31m'
GREEN='\033[32m'
YELLOW='\033[33m'
BLUE='\033[34m'
CYAN='\033[36m'
BOLD='\033[1m'
RESET='\033[0m'

# Progress Animation Function
spinner() {
  local pid=$1
  local delay=0.1
  local spin='|/-\\'
  while kill -0 $pid 2>/dev/null; do
    for i in $(seq 0 3); do
      echo -ne "\r[${CYAN}${spin:$i:1}${RESET}] "
      sleep $delay
    done
  done
  echo -ne "\r[${GREEN}✓${RESET}] "
}

clear

echo -e "${YELLOW}=================================================${RESET}"
echo -e "${BOLD}ADB Deploy Script - Annie De Browsa Installer${RESET}"
echo -e "${YELLOW}=================================================${RESET}\n"

sleep 1
echo -e "${CYAN}Requires PHP running on a local HTTP server (e.g., LAMP stack)${RESET}"
sleep 1

# Define Paths
HTDOCS='/nobody_has_a_folder_like_this/path/public_html' # for EXAMPLE
HOSTNAME='example.localhost'
MY_PROJECT_DIR='one_level_under_htdocs'
MY_PROJECT=$HTDOCS/$MY_PROJECT_DIR
# IMPORTANT! PLEASE SEE LINE 57 before continuing.
# NOTE: the command MKDIR does create MY_PROJECT dir at line 58

echo -e "\n${BOLD}Step 1: Preparing Environment...${RESET}"
sleep 1

# Ensure clean workspace
echo -e "${YELLOW}Cleaning previous installations...${RESET}"
if [ -d "${MY_PROJECT}" ]; then
  sudo rm -rf ${MY_PROJECT} & spinner $!
  echo -e "${GREEN}✔ Cleaned workspace${RESET}"
else
  echo -e "${CYAN}✔ No previous project found, starting fresh!${RESET}"
fi

# Create project directory and set up permissions
sudo mkdir -p --mode=755 ${MY_PROJECT}
echo -e "${GREEN}✔ Created project directory at ${MY_PROJECT}${RESET}"

# Set permissions
echo -e "${YELLOW}Setting permissions...${RESET}"
sudo chmod 755 -R ${MY_PROJECT}
sudo chown $USER:www-data -R ${MY_PROJECT}
echo -e "${GREEN}✔ Permissions set${RESET}"

# Clone repository
echo -e "${BOLD}Step 2: Cloning Repository...${RESET}"
sleep 1
echo -e "${CYAN}Fetching from GitHub...${RESET}"
git clone https://github.com/ajaxStardust/AnnieDeBrowsa.git ${MY_PROJECT}/adbdeploy & spinner $!
echo -e "${GREEN}✔ Repository cloned successfully${RESET}"

# Remove the .git directory to clean up after cloning
echo -e "${YELLOW}Cleaning up .git directory...${RESET}"
sudo rm -rf ${MY_PROJECT}/adbdeploy/.git
echo -e "${GREEN}✔ .git directory removed${RESET}"

# Move contents and clean up
echo -e "${BOLD}Step 3: Organizing Files...${RESET}"
sleep 1
cp -r -vv ${MY_PROJECT}/adbdeploy/* ${MY_PROJECT}/
sudo rm -rf ${MY_PROJECT}/adbdeploy
echo -e "${GREEN}✔ Files moved and deployment directory removed${RESET}"

# Composer installation
echo -e "${BOLD}Step 4: Installing Dependencies...${RESET}"
sleep 1
composer install --working-dir=${MY_PROJECT} & spinner $!
echo -e "${GREEN}✔ Dependencies installed${RESET}"
composer dump-autoload --working-dir=${MY_PROJECT}
echo -e "${GREEN}✔ Autoload dumped${RESET}"

# Display Final URL
echo -e "\n${YELLOW}=================================================${RESET}"
echo -e "${BOLD}Deployment Complete!${RESET}"
echo -e "${YELLOW}=================================================${RESET}\n"
echo -e "${GREEN}✔ Access your app at:${RESET}"
echo -e "${CYAN}https://${HOSTNAME}/${MY_PROJECT_DIR}/public/default.php${RESET}\n"
