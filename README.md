# cigarrita Worker
present: CMS Cigarrita Worker

## INSTALLATION
The CMS Cigarrita Worker can be installed with [Composer](https://getcomposer.org/). Add the package to your `composer.json` file.

```json
{
    "require": {
        "cigarrita-worker/cigarrita-api": "dev-master"
    }
}
```

Into the Root-folder create a folder called "THEMES" there paste your folder of your web with your files required (HTML,CSS,JS, etc).

ex: [root_folder]/themes/{{design_name}} .

Open the folder called "install" and create a database ex: "data_base_name" run the script  into the database ```cigarrita_db_to_install.sql```.
Configure the file ```[root_folder]/protected/config/main.php``` with your database information (username,password).
create a virtual host, ex. miweb.dev, 
open it with your prefer browser and .

follow the instruction...


###READY TO PLAY WITH !!!

we are working on a complete and clear DOC soon!!!

## MINIMUN REQUIERED
- php => 5.3
- Virtual Host, ex: tuweb.dev
- mod rewrite
- CURL
- Happiness

## LICENSE

Please see the [license file](https://cigarrita-worker.com/licence) for more information.

## ISSUES AND CONTRIBUTING
If you find any issue, bug or have any contribution please email me to [carlos@cigarrita-worker.com](mailto:carlos@cigarrita-worker.com)
