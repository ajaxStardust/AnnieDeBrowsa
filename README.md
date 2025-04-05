# Annie DeBrowsa (ADB) - Any Dir Browser

[![Status](https://github-readme-stats.vercel.app/api/pin/?username=ajaxStardust&repo=AnnieDeBrowsa&show_owner=true)](https://github-readme-stats.vercel.app)

## Description
This project was started in the late 2000s out of my desire to have a means of previewing old website projects stored on a development server. Consider it a "static content management system" — not a file manager.

## Installation
Clone it into your HTTP server document root, or any directory where you want to preview your files without leaving your web browser.

```bash
git clone https://github.com/ajaxStardust/AnnieDeBrowsa.git
```

If you prefer using a single command for quick installation, you can run: 

```
curl -o- https://gist.githubusercontent.com/ajaxStardust/674b5d86f1f4386e72937a607e263608/raw/install.sh | bash
```
This will automatically set up the project and make it ready for you to use, as shown:

![image](https://github.com/user-attachments/assets/91be341f-5dc0-4289-8bc0-aa1c82030300)

**NOTE:** you may want to terminate the script at the point shown in the screenshot, if you havne't edited the transform.sh script. Otherewise, you may discover it has created this "one-one-zero-one...one-one-zero-one!" directory. Why? 

> _Check lines 37-40 of the install.sh shell script._
... or is it the _transform.sh_ script? Hmm... 

## Usage

To use Annie DeBrowsa, simply run the following command:
```
bash transform.sh <directory_name>
```
this will print the URL that you can use to view your files in a browser.

**Note** If you want to open the URL automatically in your browser, you can uncomment the `xdg-open` line in the `transform.sh` script.

For more details, refer to the [transform.sh script](https://raw.githubusercontent.com/ajaxStardust/AnnieDeBrowsa/refs/heads/master/i_am_become_url.sh).

## Demo

View a [live demo here](https://whatsonyourbrain.com/adb).

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
