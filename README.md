# Annie DeBrowsa (ADB) — Any-Dir Browser

[![Latest Version](https://img.shields.io/packagist/v/ajaxstardust/annie-de-browsa)](https://packagist.org/packages/ajaxstardust/annie-de-browsa)
[![License](https://img.shields.io/packagist/l/ajaxstardust/annie-de-browsa)](https://packagist.org/packages/ajaxstardust/annie-de-browsa)
[![View on YouTube](https://img.shields.io/badge/YouTube-View%20Demo-red?logo=youtube)](https://www.youtube.com/watch?v=6Aup8_JgBsY)

## Description

Annie DeBrowsa (ADB) is a lightweight, web-based directory browser designed to preview static website projects directly from a development server.

This project originated in the late 2000s as a way to browse and preview archived web projects without deploying or re-hosting them. Annie DeBrowsa is primarily a content preview tool that can render both static files and server-side scripted documents (e.g., PHP) directly in the browser, making it easy to browse and test your projects without deploying them elsewhere. It is not intended as a file manager.

## Requirements

- PHP (no framework required)
- A local or remote HTTP server (Apache, Nginx, etc.)
- Shell access (optional, for URL helper script)

## Installation

### Recommended (via Composer / Packagist)
ADB is designed as a standalone preview tool, **not a library** to be embedded. That is, `composer require` has not been tested anywhere. The proper and intended installation method is `composer create-project`, like so:

```bash
composer create-project ajaxstardust/annie-de-browsa <directory> dev-master

```

The files and folders will be deployed as if it were set by the dude who wanted you to try this project and make it ready for you to use, as shown:
The crux of it is the file that processes system URL paths, and then the part that lets you browse your http server content. 

**Try it out!** 
I feel like it's pretty basic, and potentially useful to your production flow tool chain. I've done my best to make it pretty from 2009. 

> _Check lines 37-40 of the i_am_become_url.sh if you want to tweak the URL converter thing to point to your dev server for example instead of mine at transformative.click, as it is. You may use that for testing if you wish ..._

## Usage
Use case tutorial type video on YouTube about [AnnieDeBrowsa](https://www.youtube.com/watch?v=6Aup8_JgBsY)
Pay attention to the part where the file path is copied to the clipboard, and pasted to the terminal in VS Code. 

To use Annie DeBrowsa, simply run the following command.:
```
cd /var/www/html/annie-de-browsa-this-dir-example
bash ./i_am_become_url.sh ./<desired_file_path_to_transform>
```
Using the dot slash method on the command line above, the expression is executed on objects in the current directory.
E.g. the dot, ".", would be analogous to executing: `$> pwd` (print working dir).

> The idea is actually to copy the .sh script to /usr/local/bin/transform.sh

e.g. in .bashrc  add a line like 
```alias 2url=/usr/local/bin/transform.sh ```

so you can just type 
2url ./index.html 
to get 
https://localhost/adb-logic-to-transform-something-whatever/


this will print the URL that you can use to view your files in a browser.

**Note** If you want to open the URL automatically in your browser, you can uncomment the `xdg-open` line in the `transform.sh` script.

For more details, refer to the [transform.sh script](https://raw.githubusercontent.com/ajaxStardust/AnnieDeBrowsa/refs/heads/master/i_am_become_url.sh).

## Demo

View a live demo at [transformative.click](https://transformative.click).

## Support

For questions or issues, please open an issue on this repository or contact me directly @ajaxStardust.

## Roadmap

I am in the process of rebuilding this project in Laravel, as I like to use personal projects as templates for experimenting with ideas.

## Contributing

Feel free to contribute! If you have ideas or improvements, feel free to fork the repository, submit pull requests, or open issues.

## Authors and Acknowledgment

Created by [Jeff Sabarese](https://neutility.life/agency-skills), also available via @ajaxStardust.

## License

This project is licensed under the GPL.

## Project Status

In development. Consider this an "alpha" version for now.
