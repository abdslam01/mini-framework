# MiniFramework PHP MVC
mini framework using php and mvc structure, using the dependency abdslam01/miniframeworkcore

## Installation process
- then execute`git clone <repo_link> project`
- then change directory to the repo `cd project`
- execute `composer install`
- execute `cp .env.example .env`
- configure the following fields in `.env` file:
```
host=localhost
database=database_name
username=root //user
password=     //pass
And Other Required Field
```
- execute `php cmd migrate` to create and configure database and its schema.
- for execution, you got two option:
  - for development: execute `php cmd serve` anc consult __http://127.0.0.1:8080__
  - for deployment: consult the project in browser at __http://127.0.0.1/path_to_project/project__

## License

This framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contributers
Please if you have any suggest, idea or help dont hesitate to share it with us.
Please if you face any issue with the project feel free to open an issue by clicking the link [HERE](https://github.com/abdslam01/mini-framework/issues)
