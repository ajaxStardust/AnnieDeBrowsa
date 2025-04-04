# Annie DeBrowsa (ADB)

## Description
Annie DeBrowsa (ADB) stands for Any Dir Browser, designed to help you preview old website projects stored on a development server. Think of it as a static content management system — not a file manager, but a way to view content directly from the web interface.

### Installation
To get started, clone this repository into your HTTP server document root or any directory you'd like to preview files from directly in your web browser.

```bash
git clone https://github.com/ajaxStardust/AnnieDeBrowsa.git
```

Alternatively, you can download the project using wget or curl:

#### Using wget

```bash
wget https://github.com/ajaxStardust/AnnieDeBrowsa/archive/refs/heads/main.zip
```

#### Using curl

```bash
curl -L https://github.com/ajaxStardust/AnnieDeBrowsa/archive/refs/heads/main.zip -o AnnieDeBrowsa.zip
```

Once downloaded, extract the contents and move it to your desired directory.

#### Usage
This app places an index.php file in the folder root. Do not place this where an index.php already exists, unless you rename the ADB index file, such as index.phtml or adb.php. Try it out first in an empty directory to get the feel of it.

Visit a demo here: Demo.

#### Support
The author: @ajaxStardust
Feel free to reach out by opening an issue or contributing to the repository.

#### Roadmap
I’m currently rebuilding ADB in Laravel — personal project stuff. It's always a fun template for experimenting with ideas and improvements.

#### Contributing
Contributions are welcome! Open an issue or submit a pull request if you'd like to help improve the project.

#### Authors and Acknowledgments
Created by Jeff Sabarese (@ajaxStardust) from WordPress Center

Special thanks to the open-source community for their tools and contributions.

#### License
This project is licensed under the GPL License.

#### Project Status
Still in development, but it's working! Consider it in the alpha stage.